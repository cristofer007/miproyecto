

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
	<script src="bootstrap.bundle.min.js"></script>
	
</head>

<body style="margin: 0; height:100%; width:100%; border: solid green; overflow-x:hidden; overflow-y:hidden ">
        
	<header class="p-fixed" style="height:10%; background-image: linear-gradient(30deg, #F7971E, #FFD200); color: white; font-size:1.025em; font-weight:bold;  text-shadow: 2px 2px 3px #000000;">
            <div class="container border border-danger h-100">
                <div class="row border border-danger">
                    <div id="panelConfiguracion" class="col-2 p-0 m-0 text-center d-flex flex-column align-items-center justify-content-center border border-danger">
                        <img  src="iconos/generales/opcionesSimbolo.png" height="40%" width="45%" class="border border-red m-0 p-0">
                        

                   
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" style="font-size:0.5em">
                                {{ __('Cerrar sesión') }}
                            </x-dropdown-link>
                        </form>
                   
                
                    </div>
                    <div class="col-9 border border-danger">
                        <div class="row flex-row" id="nombreGrupo">
                                <div class="col-3 text-center">
                                        Grupo:
                                            
                                        <?php $sarah = 'ola';
                                                echo $sarah; ?>
                                        
                    <a href="/vistaarchivo">
                        ssus
                    </a>
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
                        <img  src="iconos/generales/notificacionesSimbolo.png" height="50%" width="75%" class="border border-red m-0 p-0">
                    </div>
                </div>
                
            </div>
	</header>
	
        <section id="grupos" class="p-0 m-0" style="height: 80% ;padding: 0; margin: 0px; background-image: linear-gradient(40deg, #1fa2ff, #12d8fa, #a6ffcb); overflow-y:auto">
	    <div class="publicacion container border border-danger mx-auto p-0 " style="height:40%; width:75%">
		
            </div>
            
		
	</section>
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
	
	
		
	<footer class="container px-0" style="position: fixed; bottom: 0%; height:10%; background-image: linear-gradient(40deg, #1d976c, #93f9b9); color:white; font-weight: bold">
		<div class="row w-100 h-100 border border-danger px-0 mx-0 " >
			
			<div class="col border border-primary text-center p-0 m-0 d-sm-flex flex-sm-column align-items-sm-center" id="pestanaForo">
				<div class="p-0 m-0">
				    Personas
				</div>
				<div class="p-0 m-0">
					<img src="iconos/generales/foroSimbolo.png" width="42.5%">
				</div>
			</div>
			
			<div class="col border border-primary text-center px-0" id="pestanaRecursos">
				<div class="p-0 m-0">
				    Recursos
				</div>
				<div class="p-0 m-0">
					<img src="iconos/generales/recursosSimbolo.png"/ width="27.5%">
				</div>
			</div>
			
			<div class="col border border-primary text-center px-0" id="pestanaChat">
				<div class="p-0 m-0">
				    Mensajes
				</div>
				<div class="p-0 m-0 text-center">
					<img src="iconos/generales/chatSimbolo.png"/ width="27.5%">
				</div>
			</div>
                    
		</div>
	</footer>

</body>

<script>
    
        
	
        const botones = document.querySelectorAll(".botonAuxiliar");
        const imagenDobleFlecha = document.getElementById("imagenIconoDobleFlecha");
        var posicionBotones = true;
        var posicionFlecha = true;
        const datos = "hola";
        
        
        
//***********************************************************************************************************************
        //   INTERFAZ
//***********************************************************************************************************************
        
        Class PanelGrupos
        {
            constructor()
            {
                this.listadoGrupos = ;
                this.panelGrupos = document.createElement("section");
            }
            
            
        }
        
        Class PanelUsuarios()
        {
            constructor()
            {
                this.listadoUsuarios = document.createElement("div");
                this.panelUsuarios = document.createElement("section");
            }
            
            llenarListadoUsuarios()
            {
                ;
            }
            
            mostrarListadoUsuarios()
            {
                ;
            }
        }
        
        Class PanelesController
        {
            constructor()
            {
                this.panelGrupos = new PanelGrupos();
                this.panelUsuarios = new PanelUsuarios();
            }

            mostrarPanelGrupos()
            {

            }

            mostrarPanelBusqueda()
            {

            }
            
            irARecursos()
            {
                window.location.href = "/vistarecursosglobales";
            }

            irAMensajes()
            {
                window.location.href = "/vistamensajes";
            }
        }
        
//************************************************************************************************************
        //    DATOS
//************************************************************************************************************
        
        Class Datos
        {
            constructor()
            {
                this.conector = new Conector();
                this.grupos = new Grupos(cargarDatos());
                this.usuarios = new Usuarios();
            }
            
            cargarDatos()
            {
                
            }
            
            getGrupos()
            {
                
            }
            
            agregarGrupo()
            {
                
            }
            
            eliminarGrupo()
            {
                
            }
        }
        
        Class Conector
        {
            consultarGet(funcion, ruta, async)
            {
                xhttp = new XMLHttpRequest();
                xhttp.onload = function(){
                    funcion(JSON.parse(this.responseText));
                };
                xhttp.open("GET", ruta, async);
                xhttp.setRequestHeader('Content-Type', 'application\json');
                var token = document.getElementById('token').getAttribute('content');
                xhttp.setRequestHeader('X-CSRF-TOKEN', token);
                xhttp.send();
            }
            
            consultarPost(funcion, ruta, datos, async)
            {
                xhttp = new XMLHttpRequest();
                xhttp.onload = function(){
                    funcion(JSON.parse(this.responseText));
                };
                xhttp.open("POST", ruta, async);
                xhttp.setRequestHeader('Content-Type', 'application\json');
                var token = document.getElementById('token').getAttribute('content');
                xhttp.setRequestHeader('X-CSRF-TOKEN', token);
                xhttp.send(datos);
            }
        }
        
        Class Grupos
        {
            constructor()
            {
                this.grupos = new Map();
            }
            
            getGrupos()
            {
                
            }
        }
        
        Class Grupo
        {
            constructor()
            {
                this.usuarios = Map();
            }
            
            agregarGrupo(nuevoGrupo)
            {
                
            }
            
            eliminarGrupo(idGrupo)
            {
                
            }
            
            modificarGrupo(idGrupo, nuevosDatos)
            {
                
            }
            
            cambiarEncargadoGrupo(idGrupo, idEncargado)
            {
                
            }
            
            incorporarUsuario(datosUsuario)
            {
                
            }
            
            quitarUsuario(idUsuario)
            {
            
            }
            
            getUsuarios()
            {
                
            }
        }
        
        Class Integrantes
        {
            constructor()
            {
                
            }
            
            agregarUsuario(usuario)
            {
                
            }
            
            eliminarUsuario(idUsuario)
            {
                
            }
            
            modificarUsuario()
            {
                
            }
            
            getUsuarios()
            {
                
            }
        }
        
        Class Integrante
        {
            constructor()
        }
        
        Class Usuarios
        {
            constructor(usuarios)
            {
                this.usuariosConectados = new Array();
                this.usuariosNoConectados = new Array();
                cargarUsuarios();
                ordenarListas();
            }
            
            getUsuarios()
            {
                return ;
            }
            
            setUsuario(nuevoUsuario)
            {
                
            }
            
            quitarUsuario(idUsuario)
            {
                
            }
            
            modificarUsuario()
            {
                
            }
            
            ordenarLista(listado)
            {
                listado.sort(function(a, b){
                    
                });
            }
            
            conectarUsuario()
            {
                
            }
        }
        
        Class Usuario
        {
            constructor()
            {
                
            }
        }
        
       
        
        
        
       
</script>

</html>
