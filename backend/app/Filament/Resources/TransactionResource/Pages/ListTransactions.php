<?php

namespace App\Filament\Resources\TransactionResource\Pages;

use App\Filament\Resources\TransactionResource;
use App\Filament\Resources\TransactionResource\Widgets\TransactionsOverview;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListTransactions extends ListRecords
{
    protected static string $resource = TransactionResource::class;

    protected function getHeaderWidgets(): array
    {
        return [
            TransactionsOverview::class,
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make(),
            'pending' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', 'pending')),
            'approved' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', 'approved')),
            'rejected' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', 'rejected')),
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
