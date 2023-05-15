<?php

namespace App\Http\Controllers;

use Barryvdh\Debugbar\LaravelDebugbar;
use Illuminate\Support\Facades\Log;

class ApiBenchmarkController extends Controller
{
    public function __invoke()
    {
        $debugbar = app(LaravelDebugbar::class);

        $data = [
            'data' => $debugbar->getData(),

        ];

        Log::debug('Benchmarking Results:', $data);

        return response()->json($data);
    }
}
