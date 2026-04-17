<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use App\Models\Ticket;
use App\Models\Payment;
use App\Models\Transaction;
use App\Services\Justqiu;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class AuthPageController extends Controller
{
    public $agent;

    public function __construct()
    {
        $this->agent = app('agent')->deviceType() == 'phone' ? 'Mobile.' : 'Desktop.';
    }

    public function register(Request $request)
    {
        if ($request->has('ref')) {
            $checkReferral = User::where('username', '=', Str::lower($request->get('ref')))->first();
            if ($checkReferral) {
                session(['referral' => $request->get('ref')]);
            }
        }

        return view($this->agent . 'Guest.Register');
    }

    public function openGameCasino()
    {
        $justqiu = new Justqiu();
        $getUrl = $justqiu->launch(Auth::user()->username, 'PRAGMATICLIVE', '', 'id', retryIfMissing: true);

        if ($justqiu->isSuccessful($getUrl) && filled($getUrl['launch_url'] ?? null)) {
            $url = $getUrl['launch_url'];
            return view('Desktop.OpenGame', [
                'url' => $url
            ]);
        } else {
            return back()->withErrors($justqiu->message($getUrl, 'Game\'s Under Maintenance'));
        }
    }

    public function openGame(Game $game)
    {
        $justqiu = new Justqiu();
        $getUrl = $justqiu->launch(Auth::user()->username, $game->provider->code, $game->code, 'id', retryIfMissing: true);

        if ($justqiu->isSuccessful($getUrl) && filled($getUrl['launch_url'] ?? null)) {
            return view('Desktop.OpenGame', [
                'url' => $getUrl['launch_url']
            ]);
        } else {
            return back()->withErrors($justqiu->message($getUrl, 'Game\'s Under Maintenance'));
        }
    }

    public function resetPassword()
    {
        return view($this->agent . 'Guest.ForgotPassword');
    }

    public function changePassword()
    {
        return view($this->agent . 'Auth.ChangePassword');
    }

    public function referral()
    {
        $downlines = User::where('referral', Auth::user()->username)->latest()->paginate(10);

        return view($this->agent . 'Auth.Popup.Referral', [
            'downlines' => $downlines,
        ]);
    }

    public function transactionHistory(Request $request)
    {
        $request->validate([
            'from' => 'nullable|date',
            'to' => 'nullable|date',
            'type' => 'nullable|alpha'
        ]);

        if ($request->has('type')) {
            $type = trim($request->get('type'));
            if ($type == 'manual') {
                $transactions = Transaction::where('user_id', '=', Auth::user()->id)
                    ->whereBetween('created_at', [$request->get('from') . ' 00:00:00', $request->get('to') . ' 00:00:00'])
                    ->where('is_manual', true)
                    ->get();
            } else {
                $transactions = Transaction::where('user_id', '=', Auth::user()->id)
                    ->where('type', $type)
                    ->whereBetween('created_at', [$request->get('from') . ' 00:00:00', $request->get('to') . ' 00:00:00'])
                    ->where('is_manual', '!=', true)
                    ->get();
            }
        } else {
            $transactions = Transaction::where('user_id', '=', Auth::user()->id)
                ->latest()
                ->get();
        }

        return view($this->agent . 'Auth.Popup.Transaction.History', [
            'transactions' => $transactions
        ]);
    }

    public function bonusHistory()
    {
        return view($this->agent . 'Auth.Popup.Transaction.BonusHistory');
    }

    public function memo()
    {
        $notifs = Ticket::where('category', '=', 'notif')->latest()->get();

        $checkMemo = Ticket::where('category', '=', 'memo')->where('user_id', '=', Auth::user()->id)->where('is_active', '=', 1)->first();

        $getAllUserMemo = Ticket::where('category', '=', 'memo')->where('user_id', '=', Auth::user()->id)->where('is_active', '=', 1)->latest()->get();

        return view($this->agent . 'Auth.Popup.Memo', [
            'notifs' => $notifs,
            'sender' => $checkMemo,
            'memos' => $getAllUserMemo
        ]);
    }

    public function transactionDeposit()
    {
        $allowed = true;

        $transaction = Transaction::where('user_id', '=', Auth::user()->id)->where('status', '=', 'pending')->first();

        if ($transaction) {
            $allowed = false;
        }

        return view($this->agent . 'Auth.Popup.Transaction.Deposit', [
            'allowed' => $allowed,
            'transaction' => $transaction
        ]);
    }

    public function transactionWithdraw()
    {
        $allowed = true;

        $transaction = Transaction::where('user_id', '=', Auth::user()->id)->where('status', '=', 'pending')->first();

        if ($transaction) {
            $allowed = false;
        }

        return view($this->agent . 'Auth.Popup.Transaction.Withdraw', [
            'allowed' => $allowed
        ]);
    }
}
