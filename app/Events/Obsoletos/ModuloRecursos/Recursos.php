<?php

namespace App\Http\Controllers\ModuloRecursos;


class Recursos extends Controller
{
    private $recursos;
    
    
    //$recursos es un arreglo asociativo en que las Key son las Ids de los grupos
    function __construct($recursos)
    {
        $this->recursos = array();
        $this->cargarRecursos();
    }
    
    private function cargarRecursos()
    {
        $this->recursos;
    }
    
    function getTodosRecursos()
    {
        
    }
    
    function getRecursos(Array $filtroRecursos)
    {
        
    }
    
    function marcarPrestacionRecurso($idRecurso, $idPrestador, $idReceptor)
    {
        
    }
    
    function solicitarRecurso($idRecurso, $idSolicitante, $idEncargado)
    {
        
    }
    
    function eliminarRecurso($idRecurso)
    {
        
    }
    
    function agregarRecurso($datosNuevoRecurso, $idEncargado)
    {
        
    }
    
    function modificarRecurso($recursoModificado)
    {
        
    }
    
    function ()
    {
        
    }
}
