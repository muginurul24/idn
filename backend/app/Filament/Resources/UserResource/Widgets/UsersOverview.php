<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Models\User;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class UsersOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $allUsers = User::where('is_admin', false)->where('is_active', true)->count();

        $currentMonthRegister = User::where('is_active', true)
            ->where('is_admin', false)
            ->whereMonth('created_at', now()->month)
            ->count();

        $lastMonthRegister = User::where('is_active', true)
            ->where('is_admin', false)
            ->whereMonth('created_at', now()->subMonth()->month)
            ->count();

        $changePercentage = $lastMonthRegister > 0 ? (($currentMonthRegister - $lastMonthRegister) / $lastMonthRegister) * 100 : 100;

        $trendIcon = $changePercentage >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down';
        $trendColor = $changePercentage >= 0 ? 'success' : 'danger';

        $chartData = Trend::query(User::where('is_admin', false)->where('is_active', true))
            ->between(
                start: now()->subDays(6),
                end: now(),
            )
            ->perDay()
            ->count()
            ->map(fn(TrendValue $value) => $value->aggregate)
            ->toArray();

        $activeUsers = User::whereHas('transactions', fn(Builder $query) => $query->where('type', 'deposit')->where('status', 'approved'))->count();
        $inactiveUsers = User::doesntHave('transactions')->count();

        return [
            Stat::make('All Users', number_format($allUsers, 0))
                ->description(number_format($changePercentage, 2) . '% from last month')
                ->descriptionIcon($trendIcon)
                ->chart($chartData)
                ->color($trendColor),
            Stat::make('Active Users', number_format($activeUsers, 0)),
            Stat::make('Inactive Users', $inactiveUsers),
        ];
    }
}
