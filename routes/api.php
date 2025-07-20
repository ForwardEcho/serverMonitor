<?php

use App\Http\Controllers\Api\CronController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MonitorController; // ✅ Perbaikan di sini

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/report', [MonitorController::class, 'report']);
Route::get('/sync-cron', [CronController::class, 'syncToLinux'])->name('sync.cron');
Route::post('/sync-cron', [CronController::class, 'syncToLinux'])->name('sync.cron');
