<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Filament\Notifications\Notification;
use Filament\Notifications\Actions\Action;

class CheckPendingTransactions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-pending-transactions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check pending deposit transactions and send notification.';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        if (Cache::has('check-pending-transactions-lock')) {
            $this->info('Already running...');
            return self::SUCCESS;
        }

        Cache::put('check-pending-transactions-lock', true, now()->addSeconds(30));

        $pendings = Transaction::where('status', 'pending')->where('type', 'deposit')->get();

        foreach ($pendings as $pending) {
            $hash = md5($pending->user->username . $pending->amount);
            $admins = User::where('is_admin', true)->get();

            foreach ($admins as $admin) {
                $exists = DB::table('notifications')
                    ->where('notifiable_id', $admin->id)
                    ->whereRaw("JSON_SEARCH(data, 'one', ?, NULL, '$.actions[*].extraAttributes.hash') IS NOT NULL", [$hash])
                    ->first();

                if (!$exists) {
                    Notification::make()
                        ->title('Pending Transactions')
                        ->body($pending->user->username . ' baru saja melakukan deposit sebesar ' . number_format($pending->amount))
                        ->actions([
                            Action::make('See Details')->url('/backoffice/transactions?activeTab=pending')
                                ->extraAttributes([
                                    'hash' => $hash,
                                ]),
                        ])
                        ->sendToDatabase(User::where('is_admin', true)->get());
                }
            }
        }

        Cache::forget('check-pending-transactions-lock');

        return self::SUCCESS;
    }
}
