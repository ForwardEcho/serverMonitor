<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cronjob extends Model
{
    protected $fillable = [
        'job_name',
        'run_as',
        'command',
        'time_to_run',
        'status',
    ];
}
