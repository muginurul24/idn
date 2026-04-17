<?php

namespace App\Filament\Resources\TransactionResource\Pages;

use App\Models\User;
use App\Services\Justqiu;
use Filament\Actions;
use Illuminate\Database\Eloquent\Model;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\TransactionResource;

class CreateTransaction extends CreateRecord
{
    protected static string $resource = TransactionResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $user = User::where('id', $data['user_id'])
            ->where('is_active', true)
            ->firstOrFail();

        $justqiu = new Justqiu();
        $transaction = $justqiu->transaction($data['type'], $user->username, intval($data['amount']), retryIfMissing: true);

        if (! $justqiu->isSuccessful($transaction)) {
            throw new \Exception($justqiu->message($transaction, 'Transaksi gagal'));
        }

        $balance = data_get($transaction, 'user.balance');
        $nextBalance = is_numeric($balance)
            ? (int) $balance
            : ($data['type'] === 'deposit'
                ? $user->balance + (int) $data['amount']
                : max($user->balance - (int) $data['amount'], 0));

        $user->update(['balance' => $nextBalance]);

        $data['bank_id'] = $user->bank->id;
        $data['status'] = 'approved';
        $data['is_manual'] = true;

        unset($data['balance']);

        return $data;
    }

    protected function handleRecordCreation(array $data): Model
    {
        return static::getModel()::create($data);
    }


    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Transaction Created Successfully';
    }

    protected function getCreatedNotification(): ?Notification
    {
        $title = $this->getCreatedNotificationTitle();

        if (blank($title)) {
            return null;
        }

        return Notification::make()
            ->success()
            ->title($title);
    }
}
