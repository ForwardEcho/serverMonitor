<?php

namespace App\Filament\Widgets;

use App\Models\ServerStat;
use Filament\Widgets\ChartWidget;

class ServerLoadChart extends ChartWidget
{
    protected static ?string $heading = 'CPU Usage (Last 10 Reports)';
    protected static ?int $contentHeight = 300;

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
                    'label' => 'CPU Usage (%)',
                    'data' => $stats->pluck('cpu_usage')->toArray(),
                    'borderColor' => 'rgba(255, 159, 64, 1)',
                    'backgroundColor' => 'rgba(255, 159, 64, 0.2)',
                    'tension' => 0.4, // garis smooth
                    'pointRadius' => 4,
                    'pointBackgroundColor' => 'rgba(255, 159, 64, 1)',
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
                'x' => [
                    'grid' => [
                        'display' => false,
                    ],
                    'ticks' => [
                        'display' => false, // sembunyikan angka di bawah (sumbu X)
                    ],
                ],
                'y' => [
                    'beginAtZero' => true,
                    'grid' => [
                        'display' => false,
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
