<?php

namespace App\Filament\Resources\ReferralResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\ReferralResource;
use App\Filament\Resources\ReferralResource\Widgets\ReferralResource as WidgetsReferralResource;

class ListReferrals extends ListRecords
{
    protected static string $resource = ReferralResource::class;

    protected function getFooterWidgets(): array
    {
        return [
            WidgetsReferralResource::class,
        ];
    }
}
