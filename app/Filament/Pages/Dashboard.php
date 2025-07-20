<?php

namespace App\Filament\Pages;

use app\Filament\Widgets\DiskUsage;
use app\Filament\Widgets\hostname;
use app\Filament\Widgets\MemUsage;
use app\Filament\Widgets\ServerLoadChart;
use app\Filament\Widgets\uptime;
// use Filament\Widgets\FilamentInfoWidget; // sudah tidak dipakai
use Filament\Pages\Page;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static string $view = 'filament.pages.dashboard';
}
