<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServerStat extends Model
{
    protected $fillable = [
        'hostname',
        'cpu_usage',
        'memory_usage',
        'disk_usage',
        'uptime',
    ];
}
