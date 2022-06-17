<?php

namespace app\Http\Controllers\ModuloChat;


class Conversacion extends Controller
{
    private $fechaInicio;
    private $interlocutores;
    private $mensajes;
    private $cantidadMensajes;
    
    public function __construct($datosConversacion)
    {
        //*
        //*     $datosConversacion - Formato?????????: 
        //*     [
        //           "fechaInicio" => "", 
        //           "interlocutores" => ["idInterlocutorX" => "nombre", "idInterlocutorY" => "nombre"], 
        //           "mensajes" => ["idMensaje" => [ ], idMensaje => [ ], ...] 
        //       ] 
        //*
        //*
        $this->fechaInicio = $datosConversacion["fechaInicio"];
        $this->mensajes = new Mensajes($datosConversacion["mensajes"]);
        $this->interlocutores = $datosConversacion["interlocutores"];
    }
    
    public function getMensajes()
    {
        return $this->mensajes->getMensajes();
    }
    
    public function agregarMensaje()
    {
        
    }
    
    public function eliminarMensaje()
    {
        
    }
    
    public function modificarMensaje()
    {
        
    } 
}
