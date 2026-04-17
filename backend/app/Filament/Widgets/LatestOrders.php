<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use App\Models\Transaction;
use Illuminate\Support\HtmlString;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestOrders extends BaseWidget
{
    protected static ?string $heading = 'Latest Deposit Order';
    protected int | string | array $columnSpan = 'full';

    protected function getTableQuery(): Builder
    {
        return Transaction::where('type', 'deposit')->where('status', 'approved')->where('is_manual', false)->latest()->limit(10);
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('index')
                ->label('#')
                ->rowIndex(),
            TextColumn::make('user.username')
                ->label('Username')
                ->searchable(),
            TextColumn::make('bank.bank_name')
                ->label('From')
                ->description(fn(Transaction $record): HtmlString => new HtmlString($record->bank->account_name . '<br>' . $record->bank->account_number))
                ->searchable(query: fn($query, string $search) => $query->whereHas('bank', fn($q) => $q->where('account_name', 'like', "%{$search}%")->orWhere('account_number', 'like', "%{$search}%")))
                ->alignCenter(),
            TextColumn::make('payment.bank_name')
                ->label('Company Bank')
                ->description(function (Transaction $record): HtmlString {
                    $accountName = $record->payment->bank_type ?? '';
                    if ($accountName == 'qris') {
                        return new HtmlString('QRIS Payment');
                    } else {
                        return new HtmlString($accountName . '<br>' . $record->bank->account_number ?? '');
                    }
                })
                ->alignCenter(),
            TextColumn::make('status')
                ->badge()
                ->colors([
                    'warning' => 'pending',
                    'success' => 'completed',
                    'danger' => 'cancelled',
                ]),
            TextColumn::make('amount')
                ->numeric()
                ->money('IDR', locale: 'id'),
            TextColumn::make('created_at')
                ->label('Approved At')
                ->since(),
        ];
    }
}
