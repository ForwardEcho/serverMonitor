<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Cronjob;
use Symfony\Component\Process\Process;

class SyncCronToLinux extends Command
{
    protected $signature = 'cron:sync';
    protected $description = 'Sync cronjobs from DB to Linux system';

    public function handle()
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
            $tempPath = "/home/me/logs/laravel_cronjobs_{$user}.txt";
            file_put_contents($tempPath, $fileContent);

            $command = "sudo crontab -u {$user} {$tempPath}";
            $process = Process::fromShellCommandLine($command);
            $process->run();

            if (!$process->isSuccessful()) {
                $this->error("Gagal sync cron untuk user {$user}: " . $process->getErrorOutput());
            } else {
                $this->info("Berhasil sync cron untuk user {$user}");
            }
        }
    }
}
