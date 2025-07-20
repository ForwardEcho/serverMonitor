<?php

namespace App\Filament\Widgets;

use App\Models\ServerStat;
use Filament\Widgets\ChartWidget;

class MemUsage extends ChartWidget
{
    protected static ?string $heading = 'Memory Usage Over Time';
    protected static ?int $contentHeight = 300; // tinggi chart (px)

    protected function getData(): array
    {
        $stats = ServerStat::orderBy('created_at', 'desc')
            ->limit(10)
            ->get()
            ->reverse();

        return [
            'labels' => $stats->pluck('created_at')
                ->map(fn($date) => $date->format('H:i:s'))
                ->toArray(),
            'datasets' => [
                [
                    'label' => 'Memory Usage (%)',
                    'data' => $stats->pluck('memory_usage')->toArray(),
                    'borderColor' => 'rgba(153, 102, 255, 1)',
                    'backgroundColor' => 'rgba(153, 102, 255, 0.3)',
                    'tension' => 0.4,
                    'pointRadius' => 4,
                    'pointBackgroundColor' => 'rgba(153, 102, 255, 1)',
                    'fill' => true,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
    protected function getOptions(): array
    {
        return [
            'responsive' => true,
            'maintainAspectRatio' => false,
            'animation' => [
                'duration' => 1000,
                'easing' => 'easeInOutQuart',
            ],
            'scales' => [
                'y' => [
                    'grid' => [
                        'display' => false,
                    ],
                ],
                'x' => [
                    'ticks' => [
                        'display' => false,
                    ],
                    'grid' => [
                        'display' => false,
                    ],
                ]
            ],
            'plugins' => [
                'legend' => [
                    'display' => false,
                    'position' => 'top',
                ],
            ],
        ];
    }
}
