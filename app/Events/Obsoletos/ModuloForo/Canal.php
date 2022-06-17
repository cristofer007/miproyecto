<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Http\Controllers\ModuloForo;
use Illuminate\Support\Facades\Log;

/**
 * Description of Canal
 *
 * @author Pc
 */
class Canal {
    private $nombre;
    private $descripcion;
    private $idsPublicaciones;
    private $cantidadPublicaciones;
   
    public function __construct($nombre, $descripcion, $idsPublicaciones)
    {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->publicaciones = $idsPublicaciones;
        $this->cantidadPublicaciones = count($idsPublicaciones);
    }
    
    public function getNombre()
    {
        return $this->nombre;
    }
    
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    
    public function getIdsPublicaciones()
    {
        return $this->idsPublicaciones;
    }
    
    public function modificarInfo($nuevaInfo)
    {
        $this->nombre = $nuevaInfo->nombre;
        $this->descripcion = $nuevaInfo->descripcion;
    }
    
    public function agregarNuevaPublicacion($idNuevaPublicacion)
    {
        array_unshift($this->idsPublicaciones, $idNuevaPublicacion);
        $this->cantidadPublicaciones++;
        return;
    }
    
    public function eliminarPublicacion($idPublicacion)
    {
        $arrayPublicaciones = $this->idsPublicaciones;
        $this->cantidadPublicaciones--;
        array_splice(arrayPublicaciones, array_search($idPublicacion, $arrayPublicaciones), 1);
    }
}
