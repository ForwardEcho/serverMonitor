<?php

namespace App\Filament\Widgets;

use App\Models\ServerStat;
use Filament\Widgets\ChartWidget;

class MemUsage extends ChartWidget
{
    protected static ?string $heading = 'Memory Usage Reports';

    protected function getData(): array
    {
        $stats = ServerStat::orderBy('created_at', 'desc')->limit(10)->get()->reverse();

        return [
            'labels' => $stats->pluck('created_at')->map(fn($date) => $date->format('H:i:s'))->toArray(),
            'datasets' => [
                [
                    'label' => 'Memory Usage (%)',
                    'data' => $stats->pluck('memory_usage')->toArray(),
                    'backgroundColor' => 'rgba(153, 102, 255, 0.6)',
                    'fill' => true,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
