<?php

namespace App\Http\Controllers\ModuloForo;

use App\Models\User;
use App\Models\Usuario;
use App\Models\Grupo;
use App\Models\Canal;
use App\Models\Publicacion;
use App\Models\Comentario;
use Illuminate\Support\Facades\Log;

/**
 * Description of ConectorDatos
 *
 * @author Pc
 */
class EjecutorConsultas {
    
    public function getDatosGrupos()
    {
        $datosGrupos = array();
        $indiceGrupos = 0;
        foreach(Grupo::all() as $grupo)
        { 
            $datosGrupo = array();
            $datosGrupo["id"] = $grupo->id;
            $datosGrupo["nombre"] = $grupo->nombre;
            $datosGrupo["descripcion"] = $grupo->descripcion;
            $encargado = $grupo->encargado->usuario;
            $datosGrupo["encargado"] = $encargado->nombre . $encargado->apellido . $encargado->segApellido;
            $canalesGrupo = array();
            $indiceCanales = 0;
            foreach($grupo->canales as $canal)
            {
                $datosCanal = array();
                $datosCanal["id"] = $canal->id;
                $datosCanal["nombre"] = $canal->nombre;
                $datosCanal["descripcion"] = $canal->descripcion;
                $idsPublicaciones = array();
                $publicaciones = $canal->publicaciones;
                foreach($publicaciones as $publicacion)
                {
                    array_push($idsPublicaciones, $publicacion->id); 
                }
                $datosCanal["idsPublicaciones"] = $idsPublicaciones;
                $canalesGrupo[$indiceCanales] = $datosCanal;
                $indiceCanales++;
            }
            
            $datosGrupo["canales"] = $canalesGrupo;
            $idsUsuariosGrupo = array();
            $usuariosEnGrupo = $grupo->usuarios;
            foreach($usuariosEnGrupo as $usuario)
            {
                array_push($idsUsuariosGrupo, $usuario->id);
            }
            $datosGrupo["idsUsuarios"] = $idsUsuariosGrupo;
            $datosGrupos[$indiceGrupos] = $datosGrupo;
            $indiceGrupos++;
        }
        //$arrayResultante = array("datos" => $datosGrupos);
        return $datosGrupos;
    }
    
    public function agregarNuevoGrupo($idUsuario, $datosNuevoGrupo)
    {
        if (User::find($idUsuario)->hasRole('administrador'))
        {
            Grupo::create([
                "nombre" => $datosNuevoGrupo["nombre"],
                "descripcion" => $datosNuevoGrupo["descripcion"],
                "id_encargado" => $datosNuevoGrupo["idEncargado"],
            ]);
            return true;
        }
        return false;
    }
    
    public function eliminarGrupo($idUsuario, $idGrupo)
    {
         if (User::find($idUsuario)->hasRole('administrador'))
         {
             Grupo::destroy($idGrupo);
             return true;
         }
         return false;
    }
    
    public function modificarGrupo($idUsuario, $idGrupo, $nuevosDatos)
    {
        if (User::find($idUsuario)->hasRole('administrador'))
        {
            $grupo = Grupo::find($idGrupo);
            if (strcmp($nuevosDatos["nombre"], "") != 0)
            {
                $grupo->nombre = $nuevosDatos["nombre"];
            }
            if (strcmp($nuevosDatos["descripcion"], "") != 0)
            {
                $grupo->nombre = $nuevosDatos["descripcion"];
            }    
            $grupo->save();
            return true;
        }
        return false;
    }
    
    public function agregarNuevoCanal($idUsuario, $idGrupo, $datosNuevoCanal)
    {
        if ($idUsuario == Grupo::find($idGrupo)->encargado->id)
        {
            Canal::create([
                "nombre" => $datosNuevoCanal["nombre"],
                "descripcion" => $datosNuevoCanal["descripcion"]
            ]);
            return true;
        }
        return false;
    }
    
    public function eliminarCanal($idUsuario, $idCanal)
    {
        $canal = Canal::find($idCanal);
        if ($idUsuario == $canal->grupo->encargado->id)
        {
            $canal->delete();
            return true;
        }
        return false;
    }
    
    public function modificarCanal($idUsuario, $idCanal, $datosNuevoCanal)
    { 
        $canal = Canal::find($idCanal);
        if ($idUsuario == $canal->grupo->encargado->id)
        {
            if (strcmp($datosNuevoCanal["nombre"], "") != 0)
            {
                $canal->nombre = $datosNuevoCanal["nombre"];
            }
            if (strcmp($datosNuevoCanal["descripcion"], "") != 0)
            {
                $canal->descripcion = $datosNuevoCanal["descripcion"];
            } 
            $canal->save();
            return true;
        }
        return false;  
    }
    
    public function agregarPublicacion($idCanal, $idAutor, $datosPublicacion)
    {
        Publicacion::create([
            "asunto" => $datosPublicacion["asunto"],
            "texto"  => $datosPublicacion["texto"],
            "id_autor" => $idAutor,
            "id_canal" => $idCanal
        ]);
        return;
    }
    
    public function eliminarPublicacion($idPublicacion)
    {
        Publicacion::destroy($idPublicacion);
        return;
    }
    
    public function modificarPublicacion($idPublicacion, $datosPublicacion)
    {
        $publicacion = Publicacion::find($idPublicacion);
        if (strcmp($datosPublicacion["asunto"], "") != 0) {
            $publicacion->asunto = $datosPublicacion["asunto"];
        }
        if (strcmp($datosPublicacion["texto"], "") != 0) {
            $publicacion->texto = $datosPublicacion["texto"];
        }
        $publicacion->save();
        return;
    }
    
    public function agregarComentario($idPublicacion, $idAutor, $datosComentario)
    {
        Comentario::create([
           "texto" => $datosComentario["texto"],
           "id_user" => $idAutor,
           "id_publicacion" => $idPublicacion
        ]);
    }
    
    public function getPublicaciones($idCanal)
    {
        $publicaciones = Publicacion::where('id_canal', $idCanal)->paginate(5);
        return $publicaciones;
    }
    
//    public function getComentarios($idPublicacion)
//    {
//        Comentario::where("id_publicacion", $idPublicacion);
//    }
    
    public function solicitarIngresoGrupo(Request $request, $idGrupo)
    {
        $this->ejecutorConsultas->solicitarIngresoGrupo($request->user()->id, $idGrupo);
        return;
    }
    
    public function enviarInvitacionGrupo($idGrupo, $idUsuarioInvitado)
    {
        $this->ejecutorConsultas->enviarInvitacionGrupo();
        return;
    }
    
    public function eliminarMiembro($idUsuario, $idGrupo)
    {
        $this->ejecutorConsultas->eliminarMiembro($idUsuario, $idGrupo);
        return;
    }
    
    private function getNotificaciones($idUsuario)
    {
        $this->ejecutorConsultas->getNotificaciones();
        return;
    }
    
    public function getNuevaPaginaPublicaciones(){
        $paginaPublicaciones = Publicacion::cursorPaginate(40);
        return $paginaPublicaciones;
    }
}
