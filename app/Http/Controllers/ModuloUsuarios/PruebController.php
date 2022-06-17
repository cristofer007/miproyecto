<?php

namespace App\Http\Controllers\ModuloUsuarios;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PruebController extends Controller
{
    public function subirArchivo()
    {
        return "hola";
    }
    
    public function getVistaArchivo()
    {
        return view('subirarchivo');
    }
}
