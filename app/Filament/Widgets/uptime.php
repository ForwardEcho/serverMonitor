<?php

namespace App\Filament\Widgets;

use App\Models\ServerStat;
use Filament\Widgets\Widget;

class uptime extends Widget
{
    protected static string $view = 'filament.widgets.uptime';

    protected function getViewData(): array
    {
        $latest = ServerStat::latest()->first();
        return [
            'uptime' => $latest->uptime,
        ];
    }
}
