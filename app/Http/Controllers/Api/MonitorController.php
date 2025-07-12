<?php

namespace App\Http\Controllers\Api;

use App\Models\ServerStat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MonitorController extends Controller
{
    public function report(Request $request)
    {
        $data = $request->validate([
            'hostname' => 'required|string',
            'cpu_usage' => 'required|numeric',
            'memory_usage' => 'required|numeric',
            'disk_usage' => 'required|numeric',
            'uptime' => 'nullable|string',
        ]);

        ServerStat::create($data);

        return response()->json(['message' => 'Reported'], 201);
    }
}
