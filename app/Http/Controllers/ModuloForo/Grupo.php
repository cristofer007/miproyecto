<?php

namespace App\Http\Controllers\ModuloForo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Grupo
{
    
    private $nombre;
    private $descripcion;
    private $encargado;
    private $canales;
    private $usuarios;
    private $cantidadCanales;
    
    public function __construct($nombre, $descripcion, $encargado, $canales, $idsUsuarios)
    {
        
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->encargado = $encargado;
        $this->canales = new Canales($canales);
        $this->usuarios = $idsUsuarios;
        $this->cantidadCanales = $this->canales->getCantidadCanales();
    }
    
    //INNECESARIO
//    private function cargarIdsUsuarios($idsUsuarios)
//    {
//        foreach($idsUsuarios as $idUsuario)
//        {
//            $this->usuarios->push($idUsuario);
//        }
//        return;
//    }
    
    public function tieneComoMiembro($idUsuario)
    {
        if (in_array($idUsuario, $this->usuarios))
        {
            return true;
        }
        return false;
    }
    
    public function getCanales()
    {
        
        $canales = $this->canales->getCanales();
        Log::info($canales);
        return $canales;
    }
    
    public function agregarNuevoCanal($datosNuevoCanal)
    {
        $this->canales->agregarNuevoCanal($idNuevoCanal, $datosNuevoCanal);
        $this->cantidadCanales++;
        return;
    }
    
    public function eliminarCanal($idCanal)
    {
        $this->canales->eliminarCanal($idCanal);
        $this->cantidadCanales--;
        return;
    }
    
    public function modificarInformacionCanal($idCanal, $nuevaInformacion)
    {
        $this->canales->modificarInformacionCanal($idCanal, $nuevaInformacion);
    }
    
    public function cambiarEncargadoGrupo($datosNuevoEncargado)
    {
        $this->encargado = $datosNuevoEncargado["nuevoEncargado"];
        $idNuevoEncargado = $datosNuevoEncargado["id"];
        if (!in_array($idNuevoEncargado, $this->usuarios))
        {
            array_push($this->usuarios, $idNuevoEncargado);
        }
    }
    
    public function getNombre()
    {
        return $this->nombre;
    }
    
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    
    public function getEncargado()
    {
        return $this->encargado;
    }
    
    public function getCantidadCanales()
    {
        return $this->cantidadCanales;
    }
}
