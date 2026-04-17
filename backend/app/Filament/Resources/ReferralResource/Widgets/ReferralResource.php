<?php

namespace App\Filament\Resources\ReferralResource\Widgets;

use App\Models\User;
use Filament\Tables;
use Filament\Tables\Table;
use App\Models\Transaction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Widgets\TableWidget as BaseWidget;

class ReferralResource extends BaseWidget
{
    protected static ?string $heading = 'Downline List';
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(User::query()->whereNotNull('referral'))
            ->columns([
                TextColumn::make('index')
                    ->label('#')
                    ->rowIndex(),
                TextColumn::make('referral')
                    ->label('Upline')
                    ->searchable()
                    ->copyable(),
                TextColumn::make('username')
                    ->label('Downline')
                    ->searchable()
                    ->copyable(),
                IconColumn::make('is_ndp')
                    ->label('NDP')
                    ->state(fn(User $record): bool => Transaction::where('user_id', $record->id)->where('type', 'deposit')->where('is_manual', false)->exists())
                    ->boolean(),
                TextColumn::make('total_deposit')
                    ->label('Total Deposit')
                    ->state(fn(User $record): int => Transaction::where('user_id', $record->id)->where('type', 'deposit')->where('status', 'approved')->where('is_manual', false)->sum('amount'))
                    ->money('IDR', locale: 'id'),
                TextColumn::make('created_at')
                    ->label('Downline Register At')
                    ->alignCenter()
                    ->date()
            ])
            ->filters([
                SelectFilter::make('referral')
                    ->label('List Promotor')
                    ->options(User::where('total_downline', '>', 0)->pluck('username', 'username')->toArray())
                    ->searchable()
            ]);
    }
}
