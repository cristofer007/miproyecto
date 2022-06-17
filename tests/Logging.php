<?php

namespace Tests;

use Illuminate\Support\Facades\Log;

class Logging {
    
    public static function log($informacion)
    {
        Log::info($informacion);
//        Log::build([
//            'driver' => 'single',
//            'path' => storage_path('logs/prueba.log'),
//            'level' => 'emergency'
//          ])->info($informacion);
    }
}
