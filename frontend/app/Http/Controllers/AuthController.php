<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Payment;
use App\Models\Point;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|min:5|max:30|regex:/^[A-Za-z ]+$/',
            'email' => 'required|email|unique:users,email',
            'currency' => 'required|numeric',
            'telephone' => 'required|min:8|max:16|regex:/^[0-9]+$/|unique:users,phone',
            'telephone_prefix' => 'required|min:2|max:4|string',
            'username' => 'required|min:5|max:16|alpha_num|unique:users,username',
            'password' => 'required|min:5|max:16',
            'password_confirmation' => 'required|same:password',
            'bank_name' => 'required|alpha',
            'account_name' => 'required|min:5|max:30|regex:/^[A-Za-z ]+$/',
            'account_number' => 'required|min:5|max:50|regex:/^[0-9\-]+$/',
            'referral_id' => 'nullable|min:5|max:16|alpha_num|exists:users,username',
            'captcha' => 'required|numeric|min:4',
            'agreement' => 'required|accepted'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ]);
        }

        $bankName = Str::upper($request->bank_name);
        $checkBank = Payment::where('bank_name', '=', $bankName)->first();

        if (!$checkBank) {
            return response()->json([
                'success' => false,
                'message' => [
                    'bank_name' => 'Nama Bank tidak valid!'
                ]
            ]);
        }

        $accountNumber = Str::replace('-', '', $request->account_number);
        $checkAccountNumber = Bank::where('account_number', '=', $accountNumber)->where('bank_name', '=', $bankName)->first();
        if ($checkAccountNumber) {
            return response()->json([
                'success' => false,
                'message' => [
                    'account_number' => 'Nomor rekening sudah terdaftar!'
                ]
            ]);
        }

        if (!empty(session('referral')) || session('referral') != null) {
            $upline = session('referral');
            $checkUpline = User::where('username', $upline)->first();
            if ($checkUpline) {
                $checkUpline->increment('total_downline');
            }
        } else {
            $upline = null;
        }

        $createUser = User::create([
            'username' => Str::lower($request->username),
            'name' => Str::title($request->fullname),
            'email' => $request->email,
            'phone' => $request->telephone_prefix . $request->telephone,
            'password' => Hash::make($request->password),
            'referral' => $upline
        ]);

        $bankType = in_array($bankName, ['DANA', 'OVO', 'GOPAY', 'LINKAJA', 'SAKUKU', 'SHOPEEPAY']) ? 'wallet' : 'bank';

        Bank::create([
            'user_id' => $createUser->id,
            'bank_type' => $bankType,
            'bank_name' => $bankName,
            'account_name' => Str::title($request->account_name),
            'account_number' => $accountNumber
        ]);

        Point::create([
            'user_id' => $createUser->id,
        ]);

        if (!empty(session('referral')) || session('referral') != null) {
            Session::forget('referral');
        }

        Auth::login($createUser);

        return response()->json([
            'success' => true,
            'message' => 'Registration successful'
        ]);
    }

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'username' => 'required|exists:users,username',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ]);
        }

        $checkIsActiveUser = User::where('username', '=', Str::lower($request->username))->first();

        if ($checkIsActiveUser->is_active == 0) {
            return response()->json([
                'success' => false,
                'error' => true,
                'message' => [
                    'username' => 'Oops. Akun anda telah ditangguhkan.'
                ]
            ]);
        }

        if (Auth::attempt(['username' => Str::lower($request->username), 'password' => $request->password])) {
            $request->session()->regenerate();
            return response()->json([
                'success' => true,
                'message' => 'Login berhasil!'
            ]);
        }

        return response()->json([
            'success' => false,
            'error' => true,
            'message' => [
                'username' => 'Username atau Password tidak valid!'
            ]
        ]);
    }

    public function resetPassword(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|min:5|max:16|alpha_num|exists:users,username',
            'email' => 'required|email|exists:users,email',
            'captcha' => 'required|numeric|min:4'
        ]);

        $checkUserAndEmailAreValid = User::where('username', '=', $credentials['username'])->first();
        $email = $checkUserAndEmailAreValid->email;

        if ($email == $credentials['email']) {
            $password = Str::random(9);
            $hashPassword = Hash::make($password);

            $checkUserAndEmailAreValid->update(['password' => $hashPassword]);
            $checkUserAndEmailAreValid->save();

            session(['reset' => $password]);

            return redirect()->back();
        }
    }

    public function updatePassword(Request $request)
    {
        $credentials = $request->validate([
            'old_password' => 'required|min:5|max:16',
            'password' => 'required|min:5|max:16',
            'password_confirmation' => 'required|same:password',
            'captcha' => 'required|numeric|min:4'
        ]);

        if (Hash::check($credentials['old_password'], Auth::user()->password)) {
            Auth::user()->password = Hash::make($credentials['password']);
            Auth::user()->update();

            return redirect()->back()->with('success', 'Your password has been updated.');
        } else {
            return redirect()->back()->withErrors('old password anda tidak benar');
        }
    }

    public function createMemo(Request $request)
    {
        $credentials = $request->validate([
            'title' => 'required|string|regex:/^[A-Za-z0-9 ]+$/',
            'content' => 'required|string'
        ]);

        $credentials['title'] = strip_tags(clean($credentials['title']));
        $credentials['title'] = preg_replace('/[^A-Za-z0-9 ]+/', '', $credentials['title']);
        $credentials['content'] = clean($credentials['content']);

        Ticket::create([
            'user_id' => Auth::user()->id,
            'category' => 'memo',
            'title' => $credentials['title'],
            'description' => $credentials['content'],
            'ip_address' => $request->ip()
        ]);

        return redirect()->back()->with('success', 'Memo Telah Berhasil Di kirim Kepada Operator Kami');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
