<?php

namespace App\Filament\Widgets;

use App\Models\Acara;
use App\Models\Pembicara;
use App\Models\Peserta;
use App\Models\Sponsor;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make(label:'Total Acaras', value: Acara::count()),
            Stat::make(label:'Total Pembicaras', value: Pembicara::count()),
            Stat::make(label:'Total Pesertas', value: Peserta::count()),
            Stat::make(label:'Total Sponsors', value: Sponsor::count())
        ];
    }
}
