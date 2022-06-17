

<html class="container" style="height:100%; width:100%; border: solid blue; overflow-x:hidden; overflow-y:hidden; margin:0px; padding:0px">

<head style="margin:0px; ">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta id="token" name="csrf-token" content="{{ csrf_token() }}">
    <!--  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
	<!--  <script src="bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
	<!-- Bootstrap CSS -->
	<link href="/styles/style.css" rel="stylesheet">
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">  -->
	<link href="bootstrap.min.css" rel="stylesheet">
        <script src="anime.min.js"></script>
        <script src="popper.min.js"></script>
	<script src="bootstrap.bundle.min.js"></script>
        <script src="jquery-3.6.0.js"></script>
	
</head>

<body style="margin: 0; height:100%; width:100%; overflow-x:hidden; overflow-y:hidden ">

	<header class="p-fixed" style="height:10%; background-image: linear-gradient(30deg, #F7971E, #FFD200); color: white; font-size:1.025em; font-weight:bold;  text-shadow: 2px 2px 3px #000000;">
            <div class="container border border-danger h-100">
                <div class="row border border-danger">
                    <div id="panelConfiguracion" class="col-2 p-0 m-0 text-center d-flex flex-column align-items-center justify-content-center border border-danger">
                        <div class="btn-group h-100">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                 <img  src="iconos/generales/opcionesSimbolo.png" height="70%" width="70%" class="border border-red m-0 p-0">
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li class="text-center fs-6 text-bg-danger p-0 m-0">
                                    Opciones

                                </li>
                                <li>
                                   <hr class="dropdown-divider">
                                </li>
                                <li class="p-0 m-0"><button class="dropdown-item text-center h-100 p-0 m-0" type="button">Ver perfil</button></li>

                                <li class="p-0 m-0">
                                    <button class="dropdown-item h-100 p-0 m-0" type="button">
                                        <form method="POST" action="{{ route('logout') }}">
                                         @csrf

                                            <x-dropdown-link :href="route('logout')" class="p-0 m-0 mx-auto text-center" onclick="event.preventDefault(); this.closest('form').submit();" >
                                                {{ __('Cerrar sesión') }}
                                            </x-dropdown-link>
                                        </form>
                                    </button>
                                </li>
                            </ul>
                          </div>
                        
                        
                    </div>
                    <div class="col-9 border border-danger">
                        <div class="row flex-row" id="nombreGrupo">
                                <div class="col-3 text-center">
                                        Grupo:
                                        
                                </div>
                                <div class="col text-center">
                                        Departamento de ciencias musicales
                                </div>
                        </div>
                        <div class="row flex-row" id="nombreCanal">
                                <div class="col-3 text-center">
                                        Canal:
                                </div>
                                <div class="col text-center">
                                        Metodologías
                                </div>
                        </div>
                    </div>
                    <div id="panelConfiguracion" class="col-1 p-0 m-0 text-center d-flex flex-column align-items-center justify-content-center border border-danger">
                        <div class="btn-group h-100 p-0 m-0">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                 <img  src="iconos/generales/notificacionesSimbolo.png" height="50%" width="85%" class="border border-red m-0 p-0">
                            </button>
                            <ul id="listadoNotificaciones" class="dropdown-menu dropdown-menu-end">
                              <li class="text-center fs-6 text-bg-danger">Notificaciones

                              </li>
                              <li>
                                 <hr class="dropdown-divider">
                              </li>

                            </ul>
                          </div>
                        
                    </div>
                </div>
                
            </div>
	</header>
    
<!--***************************************************************************************************************-->
<!--                         PUBLICACIONES                          -->
<!--**************************************************************************************************************-->
	
        <section id="publicaciones" class="p-0 m-0" style="height: 80% ;padding: 0; margin: 0px; background-image: linear-gradient(40deg, #1fa2ff, #12d8fa, #a6ffcb); overflow-y:auto">
	    <div class="publicacion container border border-danger mx-auto p-0 " style="height:40%; width:75%">
		<div class="row cabeceraPublicacion p-0 g-0" style="height:20%">
                    <div class="row enunciadoPublicacion text-center border border-danger mx-0 g-0" style="height:30%; width:100%; background-color:blue; color:white">
                        Tema/asunto.
                    
                    </div>
                    <div class="row contextoPublicacion mx-auto w-100 g-0" style="height:50%; background-color:white">
                        <div class="col-4 border border-danger text-center">
                            3:00pm
                        </div>
                        
                        <div class="col-4 border border-danger text-center g-0">
                            2 de julio
                        </div>
                        
                        <div class="col-4 border border-danger text-center g-0">
                            
                        </div>
                    </div>
                    
                </div>
                
                
                <div class="row contenidoPublicacion border border-danger w-100 mx-auto" style="height:60%; background-color:white">
                    <div>
                        
                    
                    </div>
                </div>
                <div class="row respuestasPublicacion w-100 mx-auto" style="height: 20%; background-color:blue;">
                    <div>
                        
                    
                    </div>
                </div>
            </div>
            
		
	</section>
<!--***************************************************************************************************************-->
<!--                            PANEL GRUPOS                                 -->
<!--**************************************************************************************************************-->
        <section id="panelGrupos">
            
        </section>

<!--***************************************************************************************************************-->
<!--                           LISTADO BOTONES                               -->
<!--**************************************************************************************************************-->
     
    
	<section id="panelBotonesAuxiliares" style="position: fixed; height:20%; width:40%; bottom:10%; right:0%" class="px-0 mx-0">
		<div id="botonesAuxiliares" class="container mx-0 w-100 px-0 overflow-visible" style="overflow-x:visible; overflow-y:hidden">
			
			<div class="row d-flex border border-success h-100 mx-0 px-0 g-0" style="overflow-x:visible; overflow-y:hidden"> 
			
				<div class="col-10 d-flex m-0 p-0" style="overflow-y: hidden; overflow-x:visible" style="z-index:10">
					<div id="contenedorBotones" class="container m-0 p-0 w-100 h-100" style="overflow-y:hidden; overflow-x:visible">
						
						<div class="row m-0 p-0 g-0 h-50 w-100" style="overflow-x:visible; overflow-y:hidden; z-index:10">
							
                                                        <div id="botonBuscar" class="col-6 d-flex flex-column justify-content-center m-auto p-auto text-center botonAuxiliar w-50 h-100" style="z-index:10;border-radius:50%; background-image:linear-gradient(30deg, #50c9c3, #96deda); overflow:visible" onclick="cambiarPanelBusqueda()">
                                                            <div class="row d-flex flex-column p-0 my-0 mx-auto g-0 overflow-hidden text-center h-50 w-50 justify-content-center " >          
                                                                <img class="text-center mx-auto" src="iconos/generales/busquedaSimbolo.png" style="width:90%; height:95%"> 
                                                            </div>
                                                            <div class="row d-flex flex-column p-0 my-0 justify-content-center alignr-items-center g-0 w-100 text-center h-25" style="font-size:0.9em">
                                                                Buscar
                                                            </div>
							</div>
                                                    
							<div id="botonGrupos" class="col-6 d-flex flex-column justify-content-center m-auto p-auto text-center botonAuxiliar w-50 h-100" style="z-index:10; border-radius:50%; background-image:linear-gradient(30deg, #50c9c3, #96deda); overflow:hidden" onclick="cambiarPanelGrupos()">
                                                            <div class="row d-flex flex-column py-auto p-0 my-0 g-0 overflow-hidden text-center justify-content-center align-items-center mx-auto h-50 w-50" >
                                                                <!--<div class="col-9 d-flex border gy-0 border-danger p-0 m-auto align-self-center" style="height: 60%"> -->
                                                                <img class="text-center mx-auto" src="iconos/generales/gruposSimbolo.png" style="width:97.5%; height:85%">  
                                                               <!-- </div>  -->	
                                                            </div>
                                                            
                                                            <div class="row d-flex flex-column py-auto justify-content-center align-items-center mx-auto g-0 w-100 text-center h-25" style="font-size:0.9em">
                                                                Grupos
                                                            </div>
							</div>
						</div>
                                            
						<div class="row d-flex flex-row mx-auto p-0 g-0 h-50 w-100 justify-content-center overflow-visible">
							<div id="botonEscribir" class="col-6 p-0 d-flex flex-column justify-content-center m-0 text-center botonAuxiliar overflow-hidden w-50 h-100" style="border-radius:50%; background-image: linear-gradient(30deg, #50c9c3, #96deda); z-index:10" onclick="cambiarPanelEscribir()">
								<div class="row d-flex flex-row justify-content-center h-50 w-50 p-0 mx-auto overflow-hidden">
                                                                    <img src="iconos/generales/escribirSimbolo.png" style="width:85%; height:100%" class="p-0 m-auto">
                                                                </div>    
								<div class="row d-flex flex-column h-25 p-0 justify-content-center" style="font-size:0.9em">
									Escribir
								</div>
							</div>
						</div>
					</div>
					
				</div>
				
				<div class="col-2 border border-danger m-0 p-0 text-center d-flex flex-row align-items-center" style="z-index:1; overflow:visible">
					<div class="border border-danger d-flex flex-row align-items-center" style="height:45%; width:100% ;" onclick="moverBotones()" >
                                            <img id="imagenIconoDobleFlecha" src="iconos/generales/dobleFlecha.png" style="width:100%; height:60%">
					</div>
				</div>
				
			</div>
		</div>
		
	</section>
	
<!--***************************************************************************************************************-->
<!--                      BARRA NAVEGACIÓN            -->
<!--**************************************************************************************************************-->
     
	<footer class="container px-0" style="position: fixed; bottom: 0%; height:10%; background-image: linear-gradient(40deg, #1d976c, #93f9b9); color:white; font-weight: bold">
		<div class="row w-100 h-100 border border-danger px-0 mx-0 " >
			
			<div class="col border border-primary text-center p-0 m-0 d-sm-flex flex-sm-column align-items-sm-center" id="pestanaForo">
				<div class="p-0 m-0">
				    Foro
				</div>
				<div class="p-0 m-0">
					<img src="iconos/generales/foroSimbolo.png" width="42.5%">
				</div>
			</div>
			
			<div class="col border border-primary text-center px-0" id="pestanaRecursos" onclick="irARecursos()">
				<div class="p-0 m-0">
				    Recursos
				</div>
				<div class="p-0 m-0">
					<img src="iconos/generales/recursosSimbolo.png"/ width="27.5%">
				</div>
			</div>
			
			<div class="col border border-primary text-center px-0" id="pestanaChat" onclick="irAChat()">
				<div class="p-0 m-0">
				    Chat
				</div>
				<div class="p-0 m-0 text-center">
					<img src="iconos/generales/chatSimbolo.png"/ width="27.5%">
				</div>
			</div>
		
		</div>
	</footer>

</body>

<!--***************************************************************************************************************-->
<!--                              JAVASCRIPT                          -->
<!--**************************************************************************************************************-->
     

<script>
	
        
        
<!--***************************************************************************************************************-->
<!--                  PANTALLA                                 -->
<!--**************************************************************************************************************-->
        
        const datosGrupos = new Datos(<?php echo json_encode($datos); ?> );
        
            <?php $datos = null; ?>  

        
<!--***************************************************************************************************************-->
<!--                               DATOS                       -->
<!--**************************************************************************************************************-->
     
        
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
    <!----------------------------------------------------------------------------------------------->     
        
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
        
    <!----------------------------------------------------------------------------------------------->  
        
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
        
    <!----------------------------------------------------------------------------------------------->     
       
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
    <!----------------------------------------------------------------------------------------------->    
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
    <!----------------------------------------------------------------------------------------------->      
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
    <!-----------------------------------------------------------------------------------------------> 
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
    <!----------------------------------------------------------------------------------------------->  
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
 <!--**------------------------------------------------------------------------------------------->     
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
</script>

</html>
