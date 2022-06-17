<?php

namespace App\Http\Controllers\ModuloUsuarios;

use Tests\Logging;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class PersonasController extends Controller
{
    
    public function getVistaPersonas()
    {
        return view('vistagestionpersonas', ['sarah' => 'hola']);
    }
    
    public function subirArchivo()
    {
        return "hola";
    }
    
    public function getVistaArchivo()
    {
        return view('subirarchivo');
    }
}
