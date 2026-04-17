<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Transaction;
use App\Services\Justqiu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mews\Purifier\Facades\Purifier;

class TransactionController extends Controller
{
    public function deposit(Request $request)
    {
        $credentials = $request->validate([
            'deposit' => 'required|numeric|gte:20000',
            'crypto-idr-ammount' => 'nullable',
            'crypto-rate-ammount' => 'nullable',
            'destination_bank' => 'required',
            'payment' => 'required|numeric',
            'destination_note' => 'nullable',
            'bank' => 'required|alpha_num',
            'unique_amount' => 'required|numeric',
            'settlements' => 'nullable|image'
        ]);

        if ($credentials['bank'] != 'QRIS') {
            $bank = intval($credentials['bank']);
            $checkBank = Payment::where('id', '=', $bank)->where('is_active', '=', 1)->first();

            if (!$checkBank) {
                return redirect()->back()->withErrors('Bro, don\'t try to exploit SQL injection.');
            }

            if (!$request->hasFile('settlements')) {
                return redirect()->back()->withErrors('Harap sertakan bukti transfer.');
            }
        }

        $settlement = $request->hasFile('settlements')
            ? $request->file('settlements')->store('settlements')
            : null;

        $amount = $settlement
            ? $credentials['deposit']
            : $credentials['deposit'] + $credentials['unique_amount'];

        Transaction::create([
            'user_id' => Auth::user()->id,
            'bank_id' => Auth::user()->bank->id,
            'payment_id' => $credentials['bank'] != 'QRIS' ? $credentials['bank'] : Payment::where('bank_type', '=', 'qris')->first()->id,
            'type' => 'deposit',
            'amount' => intval($amount),
            'status' => 'pending',
            'settlement' => $settlement,
            'note' => $credentials['destination_note'] == null ? null : Purifier::clean($credentials['destination_note']),
            'is_manual' => false
        ]);

        return redirect()->back()->with('success', 'Permohonan deposit anda telah di kirim, Silahkan tunggu operator kami untuk memprosesnya.');
    }

    public function withdraw(Request $request)
    {
        $credentials = $request->validate([
            'withdraw' => 'required|gte:50000',
            'password' => 'required',
            'payment' => 'nullable',
        ]);

        if (Hash::check($credentials['password'], Auth::user()->password)) {

            if (Auth::user()->balance < $credentials['withdraw']) {
                return redirect()->back()->withErrors('Saldo tidak cukup');
            }

            $justqiu = new Justqiu();
            $transaction = $justqiu->transaction('withdraw', Auth::user()->username, intval($credentials['withdraw']), retryIfMissing: true);

            if ($justqiu->isSuccessful($transaction)) {
                $balance = data_get($transaction, 'user.balance');
                if (is_numeric($balance)) {
                    Auth::user()->update([
                        'balance' => (int) $balance,
                    ]);
                }

                Transaction::create([
                    'user_id' => Auth::user()->id,
                    'bank_id' => Auth::user()->bank->id,
                    'type' => 'withdraw',
                    'amount' => intval($credentials['withdraw']),
                    'status' => 'pending',
                    'is_manual' => false
                ]);

                return redirect()->back();
            } else {
                return redirect()->back()->withErrors($justqiu->message($transaction, 'Transaksi gagal'));
            }
        } else {
            return redirect()->back()->withErrors('Password salah');
        }

        return redirect()->back();
    }
}
