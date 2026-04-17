<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Transaction;
use App\Models\User;
use App\Services\Justqiu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiQr extends Controller
{
    /**
     * Handle QRIS callbacks forwarded by justqiuv2.
     */
    public function __invoke(Request $request)
    {
        $credentials = $request->validate([
            'amount' => 'required|integer',
            'terminal_id' => 'required|string|max:255',
            'trx_id' => 'required|string|max:255',
            'rrn' => 'nullable|string|max:255',
            'custom_ref' => 'nullable|string|max:36',
            'vendor' => 'nullable|string|max:255',
            'status' => 'required|string|in:pending,success,failed,expired',
            'created_at' => 'nullable',
            'finish_at' => 'nullable',
        ]);

        $user = User::where('username', $credentials['terminal_id'])->first();
        if (! $user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found',
            ], 404);
        }

        $transaction = $this->findQrisTransaction($user, $credentials['trx_id']);
        if (! $transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaction not found',
            ], 404);
        }

        if ($transaction->status === 'approved' && $this->extractTrxId($transaction) === $credentials['trx_id']) {
            return response()->json([
                'success' => true,
                'message' => 'Transaction already processed',
            ]);
        }

        $status = match ($credentials['status']) {
            'success' => 'approved',
            'pending' => 'pending',
            default => 'rejected',
        };

        $note = array_merge($this->parseQrisNote($transaction->note), [
            'purpose' => 'qris_deposit',
            'trx_id' => $credentials['trx_id'],
            'rrn' => $credentials['rrn'] ?? null,
            'custom_ref' => $credentials['custom_ref'] ?? null,
            'vendor' => $credentials['vendor'] ?? null,
            'created_at' => $credentials['created_at'],
            'finish_at' => $credentials['finish_at'] ?? null,
            'callback_status' => $credentials['status'],
        ]);

        if ($status !== 'approved') {
            $transaction->status = $status;
            $transaction->amount = $credentials['amount'];
            $transaction->note = $this->encodeQrisNote($note);
            $transaction->save();

            return response()->json([
                'success' => true,
                'message' => 'Transaction submitted',
            ]);
        }

        $justqiu = new Justqiu();
        $trxJustqiu = $justqiu->transaction('deposit', $user->username, (int) $credentials['amount'], retryIfMissing: true);

        if (! $justqiu->isSuccessful($trxJustqiu)) {
            return response()->json([
                'success' => false,
                'message' => $justqiu->message($trxJustqiu, 'Failed to credit player balance'),
            ], 502);
        }

        DB::transaction(function () use ($credentials, $note, $transaction, $trxJustqiu, $user): void {
            $transaction->status = 'approved';
            $transaction->amount = $credentials['amount'];
            $transaction->note = $this->encodeQrisNote($note);
            $transaction->save();

            $balance = data_get($trxJustqiu, 'user.balance');
            if (is_numeric($balance)) {
                $user->balance = (int) $balance;
                $user->save();
            }
        });

        return response()->json([
            'success' => true,
            'message' => 'Transaction submitted',
        ]);
    }

    private function findQrisTransaction(User $user, string $trxId): ?Transaction
    {
        $qrisPaymentId = Payment::where('bank_type', 'qris')->value('id');
        if (! $qrisPaymentId) {
            return null;
        }

        $transactions = Transaction::query()
            ->where('user_id', $user->id)
            ->where('type', 'deposit')
            ->where('payment_id', $qrisPaymentId)
            ->latest()
            ->limit(10)
            ->get();

        $matched = $transactions->first(fn(Transaction $transaction): bool => $this->extractTrxId($transaction) === $trxId);
        if ($matched instanceof Transaction) {
            return $matched;
        }

        return $transactions->first(fn(Transaction $transaction): bool => $transaction->status === 'pending');
    }

    private function parseQrisNote(?string $note): array
    {
        if (! filled($note)) {
            return [];
        }

        $decoded = json_decode($note, true);
        if (is_array($decoded)) {
            return $decoded;
        }

        return [
            'customer_note' => $note,
        ];
    }

    private function encodeQrisNote(array $note): string
    {
        return json_encode(
            array_filter($note, fn(mixed $value): bool => $value !== null && $value !== ''),
            JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE,
        );
    }

    private function extractTrxId(Transaction $transaction): ?string
    {
        $note = $this->parseQrisNote($transaction->note);

        return is_string($note['trx_id'] ?? null)
            ? $note['trx_id']
            : null;
    }
}
