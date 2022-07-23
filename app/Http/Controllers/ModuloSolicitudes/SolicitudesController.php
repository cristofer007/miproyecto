<?php

namespace App\Http\Controllers\ModuloSolicitudes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class SolicitudesController extends Controller
{
    public function getVistaIndex()
    {
        return view('vistaindex');
    }
    
    public function getVistaConsultar()
    {
        return view('vistaconsultar');
    }
    
    public function getVistaUsuario($id_cuenta)
    {
        Log::info($id_cuenta);
        return view('vistausuario')->with('id_cuenta',$id_cuenta);
    }
    
    public function getVistaRespuestas()
    {
        return view('vistarespuestas');
    }
    
    public function getVistaAdmin($id_cuenta)
    {
        return view('vistaadmin')->with('id_cuenta', $id_cuenta);
    }
    
    public function getVistaNuevoTicket()
    {
        return view('vistanuevoticket');
    }
    
    public function getVistaEspecialista($id_cuenta)
    {
        return view('vistaespecialista')->with('id_cuenta', $id_cuenta);
    }
}
