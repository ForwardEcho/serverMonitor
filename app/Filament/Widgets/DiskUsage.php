<?php

namespace App\Filament\Widgets;

use App\Models\ServerStat;
use Filament\Widgets\ChartWidget;

class DiskUsage extends ChartWidget
{
    protected static ?string $heading = 'Disk Usage Over Time';
    protected static ?int $contentHeight = 500;

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
                    'label' => 'Disk Usage (%)',
                    'data' => $stats->pluck('disk_usage')->toArray(),
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'tension' => 0.4,
                    'fill' => true,
                    'pointBackgroundColor' => 'rgba(75, 192, 192, 1)',
                    'pointRadius' => 4,
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
                'x' => [
                    'grid' => [
                        'display' => false, // hilangkan garis vertikal
                    ],
                    'ticks' => [
                        'display' => false,
                    ],
                ],
                'y' => [
                    'beginAtZero' => true,
                    'ticks' => [
                        'stepSize' => 10,
                    ],
                    'grid' => [
                        'display' => false, // hilangkan garis horizontal
                    ],
                ],
            ],
            'plugins' => [
                'legend' => [
                    'display' => true,
                    'position' => 'top',
                ],
            ],
        ];
    }
}
