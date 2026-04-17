<?php

namespace App\Filament\Widgets;

use App\Services\Justqiu;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class CoinOverview extends BaseWidget
{
    protected function getColumns(): int
    {
        return 4;
    }

    protected function getStats(): array
    {
        $justqiu = new Justqiu();
        $merchantInfo = $justqiu->merchantInfo();
        $balances = $merchantInfo['balance'] ?? [];

        return [
            Stat::make('Store', (string) data_get($merchantInfo, 'store.name', 'JustQiu')),
            Stat::make('NexusGGR', number_format((int) ($balances['nexusggr'] ?? 0), 0, ',', '.')),
            Stat::make('Pending', number_format((int) ($balances['pending'] ?? 0), 0, ',', '.')),
            Stat::make('Settle', number_format((int) ($balances['settle'] ?? 0), 0, ',', '.')),
        ];
    }
}
