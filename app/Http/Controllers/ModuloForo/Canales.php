<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Http\Controllers\ModuloForo;
use Illuminate\Support\Facades\Log;
/**
 * Description of Canales
 *
 * @author Pc
 */
class Canales {
    
    private $canales;
    public function __construct($canales)
    {
        $this->canales = $this->cargarCanales($canales);
    }
    
    private function cargarCanales($canales)
    {
        $arrayCanales = array();
        foreach($canales as $canal){
            $arrayCanales[$canal["id"]] = new Canal(
                                                        $canal["nombre"],
                                                        $canal["descripcion"],
                                                        $canal["idsPublicaciones"]
                                                   );
        }
        
        return $arrayCanales;
    }
    
    public function getCanales()
    {
        $arregloCanales = array();
        
        foreach($this->canales as $canal)
        {     
            array_push($arregloCanales, array(
                                                "nombre" => $canal->getNombre(),
                                                "descripcion " => $canal->getDescripcion()
                                             ));
            
        }
        return $arregloCanales;
    }
    
    public function agregarNuevoCanal($idNuevoCanal, $datosNuevoCanal)
    {
        $nuevoCanal = new Canal(
                                $datosNuevoCanal["nombre"],
                                $datosNuevoCanal["descripcion"],
                                $datosNuevoCanal["idsPublicaciones"]
                                );
        
        $this->canales[$idNuevoCanal] = $nuevoCanal;
        return;
    }
    
    public function eliminarCanal($idCanal)
    {
        $refCanales = $this->canales;
        array_splice($refCanales, array_search($idCanal, $refCanales), 1);
        return;
    }
    
    public function modificarInfoCanal($idCanal, $infoCanal)
    {
        $this->canales[$idCanal]->modificarInfo($infoCanal);
        return;
    }
    
    public function getCantidadCanales()
    {
        return count($this->canales);
    }
}
