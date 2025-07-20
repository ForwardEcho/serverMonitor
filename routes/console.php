<?php

use Illuminate\Support\Facades\Schedule;

return function (Schedule $schedule) {
    $schedule->command('cron:sync-request')->everyMinute(); // atau sesuaikan
};
