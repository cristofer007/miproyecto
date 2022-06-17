<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LoggingController extends Controller
{
    public static function guardarInformacion($informacion)
    {
        Log::info($informacion);
    }
}
