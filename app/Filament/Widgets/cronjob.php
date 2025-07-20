<?php

namespace App\Filament\Widgets;

use App\Models\Cronjob as ModelsCronjob;
use Filament\Widgets\Widget;

class cronjob extends Widget
{
    protected static string $view = 'filament.widgets.cronjob';

    protected function getViewData(): array
    {
        return [
            'cronjobCount' => ModelsCronjob::count(),
        ];
    }
}
