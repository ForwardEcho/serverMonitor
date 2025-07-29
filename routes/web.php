<?php

use App\Jobs\KirimEmailJob;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('filament.admin.pages.dashboard');
});

Route::get('/lapor-server', function () {
    KirimEmailJob::dispatch('victims365@gmail.com', 'Zahid');
    return 'Laporan server dikirim ke email via queue!';
});