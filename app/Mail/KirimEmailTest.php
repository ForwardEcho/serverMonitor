<?php
namespace App\Mail;

use App\Models\ServerStat;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class KirimEmailTest extends Mailable
{
    use Queueable, SerializesModels;

    public $stat;

    public function __construct(ServerStat $stat)
    {
        $this->stat = $stat;
    }

    public function build()
    {
        return $this->subject('Laporan Status Server')
                    ->view('emails.kirim-email');
    }
}
