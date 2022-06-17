<?php

namespace App\Http\Controllers\ModuloSolicitudes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    
    public function getVistaSolicitud()
    {
        return view('vistasolicitud');
    }
    
    public function getVistaRespuestas()
    {
        return view('vistarespuestas');
    }
    
    public function getVistaAdmin()
    {
        return view('vistaadmin');
    }
    
    public function getVistaNuevoTicket()
    {
        return view('vistanuevoticket');
    }
    
    public function getVistaEspecialista()
    {
        return view('vistaespecialista');
    }
}
