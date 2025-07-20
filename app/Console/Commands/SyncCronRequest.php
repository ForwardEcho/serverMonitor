<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SyncCronRequest extends Command
{
    protected $signature = 'cron:sync-request';
    protected $description = 'Kirim request ke /sync-cron';

    public function handle()
    {
        $response = Http::post(route('sync.cron'));

        if ($response->successful()) {
            $this->info('Request berhasil: ' . $response->body());
        } else {
            $this->error('Request gagal: ' . $response->status());
        }
    }
}
