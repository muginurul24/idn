<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Transaction;
use App\Services\Justqiu;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TransactionResource\Pages;
use App\Filament\Resources\TransactionResource\RelationManagers;
use App\Filament\Resources\TransactionResource\Widgets\TransactionsOverview;
use Illuminate\Support\HtmlString;
use Filament\Tables\Actions\Action;
use Filament\Notifications\Notification;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationIcon = 'iconsax-bol-bitcoin-refresh';
    protected static ?int $navigationSort = 3;

    public static function getWidgets(): array
    {
        return [
            TransactionsOverview::class,
        ];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('Username')
                    ->reactive()
                    ->afterStateUpdated(fn(?string $state, callable $set) => $state != null ? $set('balance', number_format(User::find($state)->balance, 0, ',', '.')) : $set('balance', 0))
                    ->options(User::where('is_admin', false)->pluck('username', 'id'))
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('balance')
                    ->readOnly()
                    ->reactive()
                    ->nullable(),
                Forms\Components\Select::make('type')
                    ->options([
                        'deposit' => 'Deposit',
                        'withdraw' => 'Withdraw',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('amount')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('index')
                    ->label('#')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('user.username')
                    ->label('Username')
                    ->searchable()
                    ->copyable(),
                Tables\Columns\TextColumn::make('bank.bank_name')
                    ->label('User Bank')
                    ->description(fn(Transaction $record): HtmlString => new HtmlString($record->bank->account_name . '<br>' . $record->bank->account_number))
                    ->sortable()
                    ->searchable(query: fn($query, string $search) => $query->whereHas('bank', fn($q) => $q->where('account_name', 'like', "%{$search}%")->orWhere('account_number', 'like', "%{$search}%"))),
                Tables\Columns\TextColumn::make('payment.bank_name')
                    ->label('Company Bank')
                    ->description(function (Transaction $record): HtmlString {
                        $accountName = $record->payment->bank_type ?? '';
                        if ($accountName === 'qris') {
                            return new HtmlString('QRIS Payment');
                        }
                        $name = isset($record->payment->account_name) ? $record->payment->account_name : 'NULL';
                        $number = isset($record->payment->account_number) ? $record->payment->account_number : 'NULL';
                        return new HtmlString("{$name}<br>{$number}");
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('type')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'deposit' => 'success',
                        'withdraw' => 'danger',
                    })
                    ->formatStateUsing(fn(string $state): string => Str::title($state))
                    ->sortable(),
                Tables\Columns\TextColumn::make('settlement')
                    ->color('primary')
                    ->formatStateUsing(fn(Transaction $record): HtmlString => new HtmlString("<a href='/storage/$record->settlement' target='_blank'>Settlement</a>")),
                Tables\Columns\TextColumn::make('amount')
                    ->numeric()
                    ->money('IDR', locale: 'id')
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->sortable()
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'pending' => 'warning',
                        'approved' => 'success',
                        'rejected' => 'danger',
                    })
                    ->icon(fn(string $state): string => match ($state) {
                        'pending' => 'heroicon-o-clock',
                        'approved' => 'heroicon-s-check-badge',
                        'rejected' => 'heroicon-s-x-circle',
                    })
                    ->formatStateUsing(fn(string $state): string => Str::title($state)),
                Tables\Columns\TextColumn::make('user.referral')
                    ->label('Upline')
                    ->searchable()
                    ->copyable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\IconColumn::make('is_manual')
                    ->label('Manual')
                    ->boolean()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make('approve')
                    ->requiresConfirmation()
                    ->visible(fn(Transaction $record) => $record->status == 'pending')
                    ->action(function (Transaction $record) {
                        if ($record->status == 'pending' && $record->type == 'deposit') {
                            $justqiu = static::justqiu();
                            $approved = static::submitUpstreamTransaction($record->user, $record->type, (int) $record->amount);
                            if ($justqiu->isSuccessful($approved)) {
                                static::syncUserBalance($record->user, $approved, $record->type, (int) $record->amount);
                                $record->update([
                                    'status' => 'approved'
                                ]);
                                Notification::make()
                                    ->title('Saved successfully')
                                    ->success()
                                    ->send();
                            } else {
                                Notification::make()
                                    ->title($justqiu->message($approved, 'Transaksi gagal'))
                                    ->danger()
                                    ->send();
                            }
                        } elseif ($record->status == 'pending' && $record->type == 'withdraw') {
                            static::refreshUserBalance($record->user);
                            $record->update([
                                'status' => 'approved'
                            ]);
                            Notification::make()
                                ->title('Saved successfully')
                                ->success()
                                ->send();
                        } else {
                            Notification::make()
                                ->title('Error')
                                ->danger()
                                ->send();
                        }
                    }),
                Action::make('reject')
                    ->requiresConfirmation()
                    ->color('danger')
                    ->visible(fn(Transaction $record) => $record->status == 'pending')
                    ->action(function (Transaction $record) {
                        if ($record->type == 'withdraw') {
                            $justqiu = static::justqiu();
                            $rejected = static::submitUpstreamTransaction($record->user, 'deposit', (int) $record->amount);
                            if ($justqiu->isSuccessful($rejected)) {
                                static::syncUserBalance($record->user, $rejected, 'deposit', (int) $record->amount);
                                $record->update([
                                    'status' => 'rejected'
                                ]);
                                Notification::make()
                                    ->title('Saved successfully')
                                    ->success()
                                    ->send();
                            } else {
                                Notification::make()
                                    ->title($justqiu->message($rejected, 'Transaksi gagal'))
                                    ->danger()
                                    ->send();
                            }
                        } else {
                            $record->update([
                                'status' => 'rejected'
                            ]);
                            Notification::make()
                                ->title('Saved successfully')
                                ->success()
                                ->send();
                        }
                    })
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    private static function justqiu(): Justqiu
    {
        return app(Justqiu::class);
    }

    private static function submitUpstreamTransaction(User $user, string $type, int $amount): array
    {
        return static::justqiu()->transaction($type, $user->username, $amount, retryIfMissing: true);
    }

    private static function syncUserBalance(User $user, array $response, string $type, int $amount): void
    {
        $balance = data_get($response, 'user.balance');
        if (is_numeric($balance)) {
            $user->update([
                'balance' => (int) $balance,
            ]);

            return;
        }

        $nextBalance = $type === 'deposit'
            ? $user->balance + $amount
            : max($user->balance - $amount, 0);

        $user->update([
            'balance' => $nextBalance,
        ]);
    }

    private static function refreshUserBalance(User $user): void
    {
        $response = static::justqiu()->balance($user->username, retryIfMissing: true);
        $balance = data_get($response, 'user.balance');

        if (! is_numeric($balance)) {
            return;
        }

        $user->update([
            'balance' => (int) $balance,
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransaction::route('/create'),
            // 'edit' => Pages\EditTransaction::route('/{record}/edit'),
        ];
    }
}
