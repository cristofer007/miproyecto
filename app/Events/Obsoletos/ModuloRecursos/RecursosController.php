<?php

namespace App\Http\Controllers\ModuloRecursos;

use Illuminate\Http\Request;
use App\Http\Controllers\ModuloRecursos\Archivos;
use App\Http\Controllers\ModuloRecursos\Recursos;
use App\Http\Controllers\Controller;

class RecursosController extends Controller
{
    private $recursos;
    
    
    function __construct()
    {
        $this->recursos = new Recursos();   
        
    }
    
    function getRecursos()
    {
        
    }
    
    public function cargarDatosRecursos()
    {
        
    }
    
    public function eliminarRecurso()
    {
        
    }
    
    public function agregarRecurso()
    {
        
    }
    
    public function solicitarRecurso()
    {
        
    }
    
    public function avisarDevolucion()
    {
        
    }
    
    public function agregarRecurso($idGrupo, $idUsuario, $datosRecurso)
    {
        
    }
    
//    function modificarRecurso(Request $recursoModificado)
//    {
//        $this->recursos->modificarRecurso($recursoModificado->id, $recursoModificado->);
//        return;
//    }
    
       
    public function cambiarEstadoRecurso($idRecurso, $idGrupo, $nuevoEstado)
    {
        $this->recursos->cambiarEstadoRecurso($idRecurso, $nuevoEstado);
        
    }
    
//    function eliminarRecurso(Request $datos)
//    {
//        $this->recursos->eliminarRecurso($idRecurso);
//        return;
//    }
//    
//    function agregarRecurso(Request $datos)
//    {
//        $this->recursos->agregarRecurso($nuevoRecurso);
//        return;
//    }
    
    
    
    function getArchivo()
    {
        
    }
    
    
}
