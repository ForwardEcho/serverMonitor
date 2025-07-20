<?php

namespace App\Http\Controllers\Api;

use App\Models\Cronjob;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use App\Http\Controllers\Controller;
use Filament\Notifications\Notification;

class CronController extends Controller
{
    public function syncToLinux()
    {
        $cronGrouped = Cronjob::where('status', 'active')->get()->groupBy('run_as');

        foreach ($cronGrouped as $user => $jobs) {
            $cronLines = [];

            foreach ($jobs as $job) {
                if (!empty($job->time_to_run) && !empty($job->command)) {
                    $cronLines[] = $job->time_to_run . ' ' . $job->command;
                }
            }

            $fileContent = implode("\n", $cronLines) . "\n";

            $tempPath = "/tmp/laravel_cronjobs_{$user}.txt";
            file_put_contents($tempPath, $fileContent);

            $command = "sudo crontab -u {$user} {$tempPath}";
            $process = Process::fromShellCommandLine($command);
            $process->run();

            if (!$process->isSuccessful()) {
                Notification::make()
                    ->title("Gagal Sinkron Cron untuk user {$user}")
                    ->body($process->getErrorOutput())
                    ->danger()
                    ->send();

                return redirect()->back();
            }
        }

        Notification::make()
            ->title('Berhasil Sinkron Cronjob')
            ->body('Cronjob berhasil disinkron ke sistem Linux.')
            ->success()
            ->send();

        return redirect()->back();
    }
}
