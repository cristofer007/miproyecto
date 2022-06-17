----------------------- VISTA FORO-----------------------------------------------------------------------

<!--        Class ActividadesController
        {
            constructor()
            {
                
            }
            
            irARecursos()
            {
                ;
            }

            irAChat()
            {
                ;
            }
        }
        
        Class NotificacionesController 
        {
            constructor()
            {
                this.listadoNotificaciones = document.getElementById("listadoNotificaciones");
                this.formatosTiposNotificaciones = new Map();
            }
            
            mostrarNotificaciones()
            {
                
            }
            
            agregarElementoALista()
            {
                
            }
            
            generarElementoLista(tipoNotificacion, datos)
            {
                
            }
            
            recibirNuevaNotificacion(datosNotificacion)
            {
                
            }
        }
        
        Class PanelGruposController
        {
            constructor()
            {
                this.panelGrupos = document.getElementById("panelGrupos");
                this.misGrupos;
                this.todosGrupos;
                this.
            }
    
            mostrarPanelGrupos()
            {
                this.panelGrupos.setAttribute();
            }
    
            mostrarMisGrupos()
            {

            }

            mostrarTodosGrupos()
            {

            }
        }
        
        Class BotonesFacilitadores
        {
            constructor()
            {
                this.seccionBotones = document.getElementById("");
                this.botones = document.querySelectorAll(".botonAuxiliar");
                this.imagenDobleFlecha = document.getElementById("imagenIconoDobleFlecha");
                this.posicionBotones = true;
                this.posicionFlecha = true;
            }
            
            girarFlecha()
            {
                let grados;
                if (posicionFlecha)
                {
                    grados = '180deg';
                }
                else 
                {
                    grados = '0deg';
                }
                anime({
                    targets: imagenDobleFlecha,
                    rotateY: grados,
                    duration: 2000
                });
                posicionFlecha = !posicionFlecha;
                return;
            }
        }
        
        Class PublicacionesPanelController
        {
            constructor()
            {
                this.publicaciones = document.getElementById("publicaciones");
                this.funcionesAnexas = new FuncionesAnexasController();
            }
            
            mostrarListadoPublicaciones()
            {
                
            }
            
            agregarPublicacion(nuevaPublicacion)
            {
                
            }
            
            escribirPublicacion(miPublicacion)
            {
                
            }
            
            quitarPublicacion(publicacion)
            {
                
            }
            
            eliminarPublicacion()
        }
        
        Class FuncionesAnexasPanelController
        {
        
        }-->







//-------------------------------FORO CONTROLLER----------------------------------------------------------------


private function getDatosGrupos($idUsuario)
    {
        $datosGrupos = array();
        $indiceGrupos = 0;
        $modelUser = User::find($idUsuario);
        foreach($modelUser->grupos as $grupo)
        {
            
            $datosGrupo = array();
            $datosGrupo["id"] = $grupo->id;
            $datosGrupo["nombre"] = $grupo->nombre;
            $datosGrupo["descripcion"] = $grupo->descripcion;
            $datosGrupo["encargado"] = $grupo->encargado->nombre . $grupo->encargado->apellido;
            $canalesGrupo = array();
            $indiceCanales = 0;
            foreach($grupo->canales as $canal)
            {
                $datosCanal = array();
                $datosCanal["id"] = $canal->id;
                $datosCanal["nombre"] = $canal->nombre;
                $datosCanal["descripcion"] = $canal->descripcion;
                $canalesGrupo[$indiceCanales] = $datosCanal;
                $indiceCanales++;
            }
            
            $datosGrupo["canales"] = $canalesGrupo;
            $datosGrupos[$indiceGrupos] = $datosGrupo;
            $indiceGrupos++;
        }
        $arrayResultante = array("datos" => $datosGrupos);
        return $arrayResultante;
    }

    
    --------------------------------------------------------------------------------------------
    
    
    **********************************************************************************************
    
    
    
    Class Conector()
        {
            consultarGet(objeto, idFuncion, ruta, async)
            {
                xhttp = new XMLHttpRequest();
                xhttp.onload = function()
                {
                    let datosRespuesta = JSON.parse(responseText);
                    objeto.resolverRespuesta(idFuncion, datosRespuesta);
                };
                xhttp.open("GET", ruta, async);
                xhttp.setRequestHeader('X-CSRF-TOKEN', );
                xhttp.setRequestHeader('Content-Type', 'application\json');
                this.xhttp.send();
            }
            
            consultarPost(objeto, ruta, async, parametros)
            {
                xhttp = new XMLHttpRequest();
                xhttp.onload = function()
                {
                    let datosRespuesta = JSON.parse(responseText);
                    funcion(datosRespuesta);
                };
                xhttp.open("POST", ruta, false);
                xhttp.send(parametros);
            }
            
        }
    -------------------------------------------------------------------------------------------     
        
        Class Datos 
        {
            constructor(datosGrupos)
            {
                this.todosGrupos = new Grupos();
                this.misGrupos = new MisGrupos(datosGrupos);
                this.notificaciones = new Notificaciones();
                this.conector = new Conector();
                cargarDatos();
            }
            
            //Cargar los datos iniciales.
            cargarDatos()
            {
                let rutaDatos = "getdatos";
                let datos = this.conector.consultarGet(rutaDatos + '' + id + '');
            }
            
            //Cargar los grupos a los cuales puede enviar solicitud.
            getTodosGrupos()
            {
                this.conector.consultarGet(this, "gettodosgrupos",true);
            }
            
            getGrupos()
            {
                return this.misGrupos.getGrupos(); 
            }
            
            agregarComentario(nuevoComentario, idGrupo, idCanal, idPublicacion)
            {
                
            }
            
            eliminarComentario(idGrupo, idCanal, idPublicacion, idComentario)
            {
                
            }
            
            modificarComentario(idGrupo, idCanal, idPublicacion, idComentario, nuevoComentario)
            {
                
            }
            
            actualizarTrasPublicacion()
            {
                
            }
            
            actualizarTrasComentario()
            {
                
            }
            
            cargarTodosGrupos(todosGrupos)
            {
                
            }
            
            realizarPublicacion(idGrupo, idCanal, publicacion)
            {
                
            }
            
            eliminarPublicacion(idGrupo, idCanal, idPublicacion)
            {
                
                
            }
            
            funcionIngresoGrupo(respuesta)
            {
                
            }
            
            solicitarIngresoGrupo(idGrupo)
            {
                this.conector.consultarGET(this.funcionIngresoGrupo, "solicitaringresogrupo?idGrupo=" + idGrupo, true);
            }
            
            resolverRespuesta(idFuncion, datosResolucion)
            {
                switch(idFuncion) {
                    case 1:
                        this.cargarTodosGrupos(datosResolucion);
                        break;
                    case 2:
                        this.actualizarTrasPublicacion(datosResolucion);
                        break;
                    case 3:
                        this.actualizarTrasComentario();
                        break;
                };
                return;
            }
        }
        
    -------------------------------------------------------------------------------------------  
        
        Class Grupos
        {
            constructor()
            {
                this.grupos = new Map();
            }
            
            getGrupos()
            {
                return this.grupos;
            }
            
            agregarGrupo()
            {
                
            }
        }
        
    -------------------------------------------------------------------------------------------     
       
        Class MisGrupos
        {
            constructor(datosGrupos)
            {
                this.grupos = new Map();
                cargarGrupos(datosGrupos);
            }
            
            cargarGrupos(grupos)
            {
                let cantidadGrupos = grupos.length;
                for(let i=0; i<cantidadGrupos; i++)
                {
                    let grupo = grupos[i];
                    this.grupos.set(grupos["id"], 
                                    new Grupo(grupo["nombre"],
                                              grupo["descripcion"],
                                              grupo["canales"])
                                    );
                }
                return;
            }
            
            getPublicaciones(idGrupo, idCanal)
            {
                return this.grupos.get(idGrupo).getPublicaciones(idCanal);
            }
        }
    -------------------------------------------------------------------------------------------    
        Class Grupo
        {
            constructor(nombre, descripcion, encargado, canales)
            {
                this.nombre = nombre;
                this.descripcion = descripcion;
                this.encargado = encargado;
                this.canales = new Canales(canales);
            }
            
            getCanales()
            {
                return this.canales;
            }
            
            getPublicaciones(idCanal)
            {
                return this.canales.getPublicaciones(idCanal);
            }
        }
    -------------------------------------------------------------------------------------------      
        Class Canales
        {
            constructor(canales)
            {
                this.canales = new Map();
                cargarCanales(canales);
            }
            
            cargarCanales(canales)
            {
                let cantidadCanales = canales.length;
                for(let i=0; i<cantidadCanales; i++)
                {
                    let canal = canales[i];
                    this.canales.set(canal["id"], 
                                     new Canal(canal["nombre"],
                                               canal["descripcion"],
                                               canal["fechaCreacion"],
                                               canal["horaCreacion"]
                                               );
                }
                return;
            }
            
//            getCanales()
//            {
//                return this.canales;
//            }

            getPublicaciones(idCanal)
            {
                return this.canales.get(idCanal).getPublicaciones();
            }
        }
    ------------------------------------------------------------------------------------------- 
        Class Canal
        {
            constructor(nombre, descripcion, fechaCreacion, horaCreacion)
            {
                this.nombre = nombre;
                this.descripcion = descripcion;
                this.fechaCreacion = fechaCreacion;
                this.horaCreacion = horaCreacion;
                this.publicaciones = new Publicaciones();
            }
            
            cargarPublicaciones(publicaciones)
            {
                this.publicaciones.cargarPublicaciones(publicaciones);
                return;
            }
            
            getPublicaciones()
            {
                return this.publicaciones.getPublicaciones();
            }
            
            agregarPublicacion(nuevaPublicacion)
            {
                this.publicaciones.set(nuevaPublicacion[""], )
            }
        }
    -------------------------------------------------------------------------------------------  
        Class Publicaciones
        {
            constructor(publicaciones)
            {
                this.publicaciones = new Map(publicaciones);
            }
            
            cargarNuevasPublicaciones(publicaciones)
            {
                let cantidadPublicaciones = publicaciones.length;
                for(let i=0; i<cantidadPublicaciones ; i++)
                {
                    let publicacion = publicaciones[i];
                    this.publicaciones.set(publicacion["id"], new Publicacion(
                                                                                publicacion["asunto"],
                                                                                publicacion["autor"],
                                                                                publicacion["fecha"],
                                                                                publicacion["hora"],
                                                                                publicacion["comentarios"]
                                                                             ));
                }
            }
            
            //Devuelve un array
            getPublicaciones()
            {
                return this.publicaciones.;
            }
            
            agregarPublicacion(nuevaPublicacion)
            {
                this.publicaciones.set(nuevaPublicacion["id"], nuevaPublicacion["datos"]);
            }
            
            eliminarPublicacion(idPublicacion)
            {
                this.publicaciones.delete(idPublicacion);
            }
        }
 **-----------------------------------------------------------------------------------------     
        Class Publicacion
        {
            constructor(asunto, autor, fecha, hora, comentarios)
            {
                this.asunto = asunto;
                this.autor = autor;
                this.fecha = fecha;
                this.hora = hora;
                this.comentarios = new Comentarios(comentarios);
            }
            
            cargarNuevosComentarios()
            {
                
            }
            
            getComentarios()
            {
                return this.comentarios.getComentarios();
            }
            
            agregarComentario()
            {
                
            }
            
            eliminarComentario()
            {
                this.comentarios
            }
        }
        
        Class Comentarios
        {
            constructor(comentarios)
            {
                this.comentarios = new Array();
                cargarComentarios(comentarios);
            }
            
            cargarComentarios(comentarios)
            {
                let cantidadComentarios = comentarios.length;
                for(let i=0; i < cantidadComentarios; i++)
                {
                    let comentario = comentarios[i];
                    this.comentarios.push(new Comentario(comentario));
                }
                return;
            }
            
            getComentarios()
            {
                return this.comentarios;
            }
            
            agregarComentario(comentario)
            {
                let nuevoComentario = new Comentario(comentario);
                return;
            }
            
            eliminarComentario(idComentario)
            {
                if (this.comentarios.get(idComentario).esPropio())
                {
                    this.comentarios.delete(idComentario);
                }
            }
        }
        
        Class Comentario
        {
            constructor(propio, texto, autor, fecha, hora)
            {
                this.propio = (propio.toLowerCase() === 'true');
                this.texto = texto;
                this.autor = autor;
                this.fecha = fecha;
                this.hora = hora;
            }
            
            getComentario()
            {
                return  {     
                             propio = this.propio,
                              texto = this.texto,
                              autor = this.autor,
                              fecha = this.fecha,
                               hora = this.hora
                        };
            }
            
            modificarComentario(comentario)
            {
                this.texto = comentario["texto"];
                this.autor = comentario["autor"];
                this.fecha = comentario["fecha"];
                this.hora = comentario["hora"];
            }
        }
</script>-->