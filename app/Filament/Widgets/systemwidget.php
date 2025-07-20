<?php

namespace App\Filament\Widgets;

use App\Models\Cronjob;
use App\Models\ServerStat;
use Filament\Widgets\Widget;

class systemwidget extends Widget
{
    protected static string $view = 'filament.widgets.systemwidget';

    protected function getViewData(): array
    {
        $latest = ServerStat::latest()->first();

        return [
            'hostname' => $latest->hostname ?? 'unknown',
            'uptime' => $latest->uptime ?? 'unknown',
            'cronjobCount' => Cronjob::count(),
        ];
    }
}
