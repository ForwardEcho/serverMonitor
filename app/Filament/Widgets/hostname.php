<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use App\Models\ServerStat;

class hostname extends Widget
{
    protected static string $view = 'filament.widgets.hostname';

    protected function getViewData(): array
    {
        return [
            'hostname' => ServerStat::select('hostname')->distinct()->get(),
        ];
    }
}
