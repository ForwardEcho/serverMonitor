<?php

namespace App\Filament\Widgets;

use App\Models\ServerStat;
use Filament\Widgets\ChartWidget;

class ServerLoadChart extends ChartWidget
{
    protected static ?string $heading = 'CPU Usage Last 10 Reports';

    protected function getData(): array
    {
        // Ambil 10 data terakhir berdasarkan waktu
        $stats = ServerStat::orderBy('created_at', 'desc')->limit(10)->get()->reverse();

        return [
            'labels' => $stats->pluck('created_at')->map(fn($date) => $date->format('H:i:s'))->toArray(),
            'datasets' => [
                [
                    'label' => 'CPU Usage (%)',
                    'data' => $stats->pluck('cpu_usage')->toArray(),
                    'backgroundColor' => 'rgba(255, 159, 64, 0.5)', // Soft Orange
                    'borderColor' => 'rgba(255, 159, 64, 1)',
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
