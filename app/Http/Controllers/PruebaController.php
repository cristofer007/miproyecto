<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class PruebaController extends Controller
{   
    public function prueba()
    {
        return view('prueba');
    }
    
    public function prueba2(){
        $usuarios = User::cursorPaginate(40);
        return $usuarios;
    }

    public function prueba3(){
        $usuarios = User::cursorPaginate(10);
        return $usuarios;
    }
    
    public function getVistaArchivo()
    {
        return view('subirarchivo');
    }
    
    public function subirArchivo(Request $request)
    {
        $sarah = $request->file('sarahZX')->store('Usuarios');
        $url = '/storage/' . $sarah;
        Log::info($url);
        Log::info(asset($url));
    }
}
