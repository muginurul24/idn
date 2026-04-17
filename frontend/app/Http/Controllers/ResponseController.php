<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Mark;
use App\Models\Payment;
use App\Models\Ticket;
use App\Models\User;
use App\Services\Justqiu;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ResponseController extends Controller
{
    public function bankProfiles(Request $request)
    {
        $request->validate([
            'currency' => 'required|numeric'
        ]);

        $banks = Payment::whereIn('bank_type', ['bank', 'wallet'])->get();

        $data = [];

        foreach ($banks as $bank) {
            $bankCode = Str::lower($bank['bank_name']);
            $bankName = Str::upper($bank['bank_name']);
            $data[] = [
                'bank_code' => $bankCode,
                'bank_name' => $bankName
            ];
        }

        return response()->json([
            'available' => true,
            'currencyId' => 1,
            'banks' => json_encode($data)
        ]);
    }

    public function checkUsername(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|alpha_num|min:5|max:12'
        ]);

        $getUsernameRequest = Str::lower($credentials['username']);

        $users = User::where('username', '=', $getUsernameRequest)->first();

        if (!$users) {
            return response()->json([
                'valid' => true
            ]);
        }

        return response()->json([
            'valid' => false
        ]);
    }

    public function checkBankNumber(Request $request)
    {
        $credentials = $request->validate([
            'account_number' => 'required|min:5|regex:/^[A-Za-z0-9\-]+$/'
        ]);

        $getBankNumberRequest = Str::replace('-', '', $credentials['account_number']);

        $banks = Bank::where('account_number', '=', $getBankNumberRequest)->first();

        if (!$banks) {
            return response()->json([
                'valid' => true
            ]);
        }

        return response()->json([
            'valid' => false
        ]);
    }

    public function checkReferral(Request $request)
    {
        $credentials = $request->validate([
            'referral_id' => 'required|min:5|alpha_num'
        ]);

        $getReferrral = Str::lower($credentials['referral_id']);

        $referrals = User::where('username', '=', $getReferrral)->first();

        if ($referrals) {
            return response()->json([
                'valid' => true
            ]);
        }

        return response()->json([
            'valid' => false
        ]);
    }

    public function refreshBalance(Request $request)
    {
        if (Auth::user()->is_active == 0) {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/');
        }

        $balance = $this->syncRemoteBalance(Auth::user());
        if ($balance === null) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyinkronkan saldo akun.',
            ], 502);
        }

        return response()->json([
            'success' => true,
            'balance' => $balance,
        ]);
    }

    public function walletCalibrate()
    {
        if ($this->syncRemoteBalance(Auth::user()) !== null) {
            return response()->json([
                'success' => true,
                'response' => '',
                'incomplete_url' => ''
            ]);
        } else {
            return response()->json([
                'success' => true,
                'response' => 'User tidak ditemukan.',
                'incomplete_url' => '',
                'message' => 'User tidak ditemukan.'
            ]);
        }
    }

    public function walletUpdate()
    {
        $balance = $this->syncRemoteBalance(Auth::user());
        if ($balance !== null) {

            return response()->json([
                'success' => true,
                'response' => '',
                'wallet' => [
                    'main-balance-holder' => $balance . '.00',
                    'balance-holder' => intval($balance),
                    'game-balance-idnplay' => 0,
                    'game-balance-direct-pragmatic' => 0,
                    'game-balance-net22-idnnet22' => 0,
                    'game-balance-direct-pragmatic-rtp' => 0,
                    'game-balance-direct-pragmatic-arcade' => 0
                ]
            ]);
        } else {
            return response()->json([
                'success' => true,
                'response' => '',
                'wallet' => [
                    'main-balance-holder' => '0.00',
                    'balance-holder' => 0,
                    'game-balance-idnplay' => 0,
                    'game-balance-direct-pragmatic' => 0,
                    'game-balance-net22-idnnet22' => 0,
                    'game-balance-direct-pragmatic-rtp' => 0,
                    'game-balance-direct-pragmatic-arcade' => 0
                ]
            ]);
        }
    }

    public function getBankList(Request $request)
    {
        $request->validate([
            'paymentId' => 'required|alpha_num',
            'bankGroupId' => 'required|alpha_num',
            'type' => 'required|alpha_num'
        ]);

        if ($request->paymentId == 204) {
            $payments = Payment::where('bank_type', '=', 'bank')->where('is_active', '=', 1)->get();
            $datas = [];

            foreach ($payments as $payment) {
                $datas[$payment->id] = [
                    'bank_account_id' => $payment->id,
                    'bank_account_name' => $payment->account_name,
                    'bank_account_username' => $payment->account_name,
                    'bank_account_number' => $payment->account_number,
                    'available_bank_id' => $payment->id,
                    'whitelabel_id' => 242,
                    'currency_id' => 257,
                    'bank_account_group_id' => 261,
                    'bank_account_wallet_type' => 0,
                    'bank_account_img' => '',
                    'bank_account_note' => '',
                    'bank_account_conversion_rate' => 0,
                    'payment_id' => 204,
                    'bank_account_url_note' => '{}',
                    'fixed_fee' => 0,
                    'bank_sort' => null,
                    'bank_account_status' => 1,
                    'bank_name' => Str::upper($payment->bank_name),
                    'bank_code' => $payment->bank_name,
                    'payment_name' => 'Bank Transfer',
                    'payment_slug' => 'bank-transfer'
                ];
            }

            $response = [
                'success' => true,
                'data' => $datas,
                'message' => ''
            ];

            return response()->json($response);
        } elseif ($request->paymentId == 1029) {
            $payments = Payment::where('bank_type', '=', 'wallet')->where('is_active', '=', 1)->get();
            $datas = [];

            foreach ($payments as $payment) {
                $datas[$payment->id] = [
                    'bank_account_id' => $payment->id,
                    'bank_account_name' => $payment->account_name,
                    'bank_account_username' => $payment->account_name,
                    'bank_account_number' => $payment->account_number,
                    'available_bank_id' => $payment->id,
                    'whitelabel_id' => 242,
                    'currency_id' => 257,
                    'bank_account_group_id' => 261,
                    'bank_account_wallet_type' => 1,
                    'bank_account_img' => '',
                    'bank_account_note' => '',
                    'bank_account_conversion_rate' => 0,
                    'payment_id' => 1029,
                    'bank_account_url_note' => '{}',
                    'fixed_fee' => 0,
                    'bank_sort' => null,
                    'bank_account_status' => 1,
                    'bank_name' => Str::upper($payment->bank_name),
                    'bank_code' => $payment->bank_name,
                    'payment_name' => 'E-Wallet',
                    'payment_slug' => 'e-wallet'
                ];
            }

            $response = [
                'success' => true,
                'data' => $datas,
                'message' => ''
            ];

            return response()->json($response);
        } elseif ($request->paymentId == 1028) {
            $payments = Payment::where('bank_type', '=', 'pulsa')->where('is_active', '=', 1)->get();
            $datas = [];

            foreach ($payments as $payment) {
                $datas[$payment->id] = [
                    'bank_account_id' => $payment->id,
                    'bank_account_name' => $payment->account_name,
                    'bank_account_username' => $payment->account_name,
                    'bank_account_number' => $payment->account_number,
                    'available_bank_id' => $payment->id,
                    'whitelabel_id' => 242,
                    'currency_id' => 257,
                    'bank_account_group_id' => 261,
                    'bank_account_wallet_type' => 2,
                    'bank_account_img' => '',
                    'bank_account_note' => '',
                    'bank_account_conversion_rate' => 80,
                    'payment_id' => 1028,
                    'bank_account_url_note' => '{}',
                    'fixed_fee' => 0,
                    'bank_sort' => null,
                    'bank_account_status' => 1,
                    'bank_name' => Str::upper($payment->bank_name),
                    'bank_code' => $payment->bank_name,
                    'payment_name' => 'Cellular Balance',
                    'payment_slug' => 'cellular-ballance'
                ];
            }

            $response = [
                'success' => true,
                'data' => $datas,
                'message' => ''
            ];

            return response()->json($response);
        } else {
            $payments = Payment::where('bank_type', '=', 'qris')->where('is_active', '=', 1)->get();
            $datas = [];

            foreach ($payments as $payment) {
                $datas[] = [
                    'bank_account_img' => '',
                    'bank_name' => 'QRIS Payment',
                    'bank_code' => 'QRIS Payment',
                    'bank_account_name' => 'QRIS Payment',
                    'bank_account_number' => 'QRIS',
                    'bank_account_note' => '',
                    'bank_account_conversion_rate' => 0,
                    'bank_account_id' => 'QRIS',
                    'bank_fee_to' => 'MERC',
                    'details' => [
                        'title' => 'QRIS Payment',
                        'code' => 'QRIS',
                        'icon_url' => config('app.cdn') . '/idn/assets/img/bank/logo-qris.png',
                        'icon_url_alt' => null,
                        'category' => 'QRIS Payment',
                        'min_amount' => '10000.00',
                        'max_amount' => '10000000.00',
                        'fee' => 0,
                        'fee_percentage' => 0.8,
                        'fee_charge_to' => 'MERC',
                        'how_to_pay' => '&lt;p&gt;\n&lt;\/p&gt;&lt;div&gt;\n          &lt;div&gt;\n             &lt;ol&gt;\n                &lt;li&gt;Buka aplikasi mobile banking atau e-money&lt;\/li&gt;\n                &lt;li&gt;Klik logo\/tombol\/menu \u00e2\u20ac\u0153Bayar (Pay)\u00e2\u20ac\u009d atau \u00e2\u20ac\u0153Pindai (Scan)\u00e2\u20ac\u009d&lt;\/li&gt;\n                &lt;li&gt;Scan &lt;b&gt;QR Code&lt;\/b&gt;&lt;\/li&gt;\n                &lt;li&gt;Klik tombol \u00e2\u20ac\u0153Pay\u00e2\u20ac\u009d atau \u00e2\u20ac\u0153Bayar\u00e2\u20ac\u009d&lt;\/li&gt;\n            &lt;\/ol&gt;\n          &lt;\/div&gt;\n        &lt;\/div&gt;\n\n&lt;p&gt;&lt;\/p&gt;&lt;br&gt;',
                        'maintenance_status' => 0,
                        'status_pm' => 1,
                        'status_mpm' => 1,
                    ],
                ];
            }

            $response = [
                'success' => true,
                'data' => $datas,
                'message' => ''
            ];

            return response()->json($response);
        }
    }

    public function readMemo(Ticket $ticket)
    {
        $checkMark = Mark::where('user_id', '=', Auth::user()->id)->where('ticket_id', '=', $ticket->id)->first();

        if (!$checkMark) {
            Mark::create([
                'user_id' => Auth::user()->id,
                'ticket_id' => $ticket->id
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Memo telah dibaca'
        ]);
    }

    public function deleteMemo(Ticket $ticket)
    {
        if ($ticket->user_id == Auth::user()->id) {
            $ticket->is_active = 0;
            $ticket->save();

            return response()->json([
                'success' => true,
                'message' => 'Memo telah dihapus'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Kamu siapa?'
            ]);
        }
    }

    public function downlineReferral(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'valselect' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Success'
        ]);
    }

    private function syncRemoteBalance(User $user): ?int
    {
        $justqiu = new Justqiu();
        $balanceInfo = $justqiu->balance($user->username, retryIfMissing: true);

        if ($balanceInfo['success'] === false) {
            $register = $justqiu->register($user->username);
            if ($register['success']) {
                $balanceInfo = $justqiu->balance($user->username, retryIfMissing: true);
            } else {
                return null;
            }
        }

        $balance = data_get($balanceInfo, 'user.balance');

        if (! is_numeric($balance)) {
            return null;
        }

        $user->balance = (int) $balance;
        $user->save();

        return (int) $balance;
    }
}
