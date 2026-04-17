<?php

namespace App\Filament\Resources\TransactionResource\Widgets;

use Flowframe\Trend\Trend;
use App\Models\Transaction;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class TransactionsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $currentMonthDeposit = Transaction::where('status', 'approved')
            ->where('type', 'deposit')
            ->where('is_manual', false)
            ->whereMonth('created_at', now()->month)
            ->sum('amount');

        $lastMonthDeposit = Transaction::where('status', 'approved')
            ->where('type', 'deposit')
            ->where('is_manual', false)
            ->whereMonth('created_at', now()->subMonth()->month)
            ->sum('amount');

        $changePercentage = $lastMonthDeposit > 0 ? (($currentMonthDeposit - $lastMonthDeposit) / $lastMonthDeposit) * 100 : 100;

        $trendIcon = $changePercentage >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down';
        $trendColor = $changePercentage >= 0 ? 'success' : 'danger';

        $chartData = Trend::query(Transaction::where('status', 'approved')->where('type', 'deposit')->where('is_manual', false))
            ->between(
                start: now()->subDays(6),
                end: now(),
            )
            ->perDay()
            ->sum('amount')
            ->map(fn(TrendValue $value) => $value->aggregate)
            ->toArray();

        $depositToday = Transaction::where('status', 'approved')
            ->where('type', 'deposit')
            ->where('is_manual', false)
            ->whereDate('created_at', now())
            ->sum('amount');

        $ticketToday = Transaction::where('status', 'approved')
            ->where('type', 'deposit')
            ->where('is_manual', false)
            ->whereDate('created_at', now())
            ->count();

        return [
            Stat::make('All Deposit', number_format($currentMonthDeposit, 0))
                ->description(number_format($changePercentage, 2) . '% from last month')
                ->descriptionIcon($trendIcon)
                ->chart($chartData)
                ->color($trendColor),
            Stat::make('Deposit Today', number_format($depositToday, 0)),
            Stat::make('Ticket Today', $ticketToday),
        ];
    }
}
