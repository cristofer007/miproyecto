<?php

namespace App\Http\Controllers\ModuloForo;

use Illuminate\Http\Request;

class Comentario extends Controller
{   
    public function __construct(){
        
    }
    
    public function getDatos()
    {
        $datos = array('texto' => $this->texto, 
                       'autor' => $this->autor, 
                       'fecha' => $this->fecha, 
                       'hora' => $this->hora);
        return $datos;
    }
}
