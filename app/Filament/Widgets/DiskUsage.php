<?php

namespace App\Filament\Widgets;

use App\Models\ServerStat;
use Filament\Widgets\ChartWidget;

class DiskUsage extends ChartWidget
{
    protected static ?string $heading = 'Disk Usage';

    protected function getData(): array
    {
        $stats = ServerStat::orderBy('created_at', 'desc')->limit(10)->get()->reverse();

        return [
            'labels' => $stats->pluck('created_at')->map(fn($date) => $date->format('H:i:s'))->toArray(),
            'datasets' => [
                [
                    'label' => 'Disk Usage (%)',
                    'data' => $stats->pluck('disk_usage')->toArray(),
                    'backgroundColor' => [
                        'rgba(75, 192, 192, 0.7)',   // Teal
                        'rgba(54, 162, 235, 0.7)',   // Soft Blue
                        'rgba(255, 206, 86, 0.7)',   // Yellow
                        'rgba(255, 99, 132, 0.7)',   // Light Red
                        'rgba(153, 102, 255, 0.7)',  // Purple
                    ],
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
