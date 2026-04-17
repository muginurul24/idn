<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Transaction;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Support\Htmlable;
use App\Filament\Resources\ReferralResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ReferralResource\RelationManagers;

class ReferralResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $modelLabel = 'referrals';
    protected static ?int $navigationSort = 4;
    protected static ?string $navigationIcon = 'heroicon-o-link';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('total_downline', '>', 0);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('index')
                    ->label('#')
                    ->rowIndex(),
                TextColumn::make('username')
                    ->label('Promotor')
                    ->searchable()
                    ->copyable(),
                TextColumn::make('total_downline')
                    ->label('Total Downline')
                    ->sortable(),
                TextColumn::make('total_ndp')
                    ->label('Total NDP')
                    ->state(fn(User $record) => User::where('referral', $record->username)->whereHas('transactions', fn(Builder $query) => $query->where('type', 'deposit')->where('status', 'approved')->where('is_manual', false))->count()),
                TextColumn::make('total_deposit')
                    ->label('Total Deposit Downline')
                    ->state(fn(User $record) => Transaction::whereHas('user', fn(Builder $query) => $query->where('referral', $record->username))->where('type', 'deposit')->where('status', 'approved')->where('is_manual', false)->sum('amount'))
                    ->money('IDR', locale: 'id'),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReferrals::route('/'),
        ];
    }
}
