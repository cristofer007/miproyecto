<?php

namespace App\Http\Controllers\ModuloUsuarios;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsuariosController extends Controller
{
    private $usuariosConectados;
    
    function __construct()
    {
        
    }
    
    function getVistaLogin()
    {
        return view('vistalogin');
    }
    
    function getVistaGestionUsuarios()
    {
        return view('vistagestionusuarios');
    }
    
   
}
