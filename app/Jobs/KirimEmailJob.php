<?php

namespace App\Jobs;

use App\Models\ServerStat;
use App\Mail\KirimEmailTest;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class KirimEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $email;
    public $nama;

    public function __construct($email, $nama)
    {
        $this->email = $email;
        $this->nama = $nama;
    }

    public function handle()
    {
        $stat = ServerStat::latest()->first();

        if (!$stat) return;

        try {
            Mail::to($this->email)->send(new KirimEmailTest($stat));
        } catch (\Exception $e) {
            Log::error("Gagal kirim email: " . $e->getMessage());
        }
    }
}