<?php

namespace App\Http\Controllers\ModuloForo;

use Illuminate\Http\Request;
use App\Http\Controllers\ModuloForo\Grupo;
use Illuminate\Support\Facades\Log;

class Grupos
{
    private $grupos;
    
    function __construct($datosGrupos)
    {
        $this->grupos = array();
        $this->cargarGrupos($datosGrupos);
    }
    
    private function cargarGrupos($datosGrupos)
    {
        $cantidadGrupos = count($datosGrupos);
        for ($i=0; $i < $cantidadGrupos; $i++)
        {
            $grupo = $datosGrupos[$i];
            $this->grupos[$grupo["id"]] = new Grupo($grupo["nombre"],
                                                          $grupo["descripcion"],
                                                          $grupo["encargado"],
                                                          $grupo["canales"],
                                                          $grupo["idsUsuarios"]);
        }
    }
    
    private function ordenarGrupos($a, $b)
    {
        $resultado = strcasecmp($a, $b);
        if ($resultado == 0)
        {
            return 0;
        }
        return ($resultado < 0)?-1:1;
    }
    
    function getGruposUsuario($idUsuario)
    {
        $arrayGrupos = array();
        
        foreach($this->grupos as $grupo)
        {
            $arrayGrupo = array();
            
            if ($grupo->tieneComoMiembro($idUsuario))
            {
                
                $arrayGrupo["nombre"] = $grupo->getNombre();
                
                $arrayGrupo["descripcion"] = $grupo->getDescripcion();
                $arrayGrupo["encargado"] = $grupo->getEncargado();
                $canalesGrupo = $grupo->getCanales();
                
                Log::info($canalesGrupo);
                
                $arrayGrupo["canales"] = $canalesGrupo;
                array_push($arrayGrupos, $arrayGrupo);
            }
            
        }
        
        return $arrayGrupos;
    }
    
    function agregarNuevoGrupo($datosNuevoGrupo)
    {
        
        $this->grupos[$datosNuevoGrupo["id"]] = new Grupo($datosNuevoGrupo["nombre"],
                                                          $datosNuevoGrupo["descripcion"],
                                                          $datosNuevoGrupo["encargado"],
                                                          $datosNuevoGrupo["canales"],
                                                          $datosNuevoGrupo["idsUsuarios"],
                                                          $datosNuevoGrupo[""]
                                                          );
        return;
    }
    
    function eliminarGrupo($idGrupo)
    {
        $refGrupos = $this->grupos;
        array_splice($refGrupos, array_search($idGrupo, $refGrupos), 1);
        return;
    }
    
    function modificarInfoGrupo($idGrupo, $nuevaInfoGrupo)
    {
        $this->grupos[$idGrupo]->modificarInfoGrupo($nuevaInfoGrupo);
        return;
    }
    
    function cambiarEncargadoGrupo($idGrupo, $datosNuevoEncargado)
    {
        $this->grupos[$idGrupo]->cambiarEncargadoGrupo($datosNuevoEncargado);
    }
    
    function agregarNuevoCanal()
    {
        
    }
    
    function eliminarCanal()
    {
        
    }
    
    function modificarInfoCanal()
    {
        
    }
    
    function agregarMiembroGrupo()
    {
        
    }
    
    function eliminarMiembroGrupo()
    {
        
    }
}
