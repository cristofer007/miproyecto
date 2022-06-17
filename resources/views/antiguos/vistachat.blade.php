

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
                <div class="row border border-danger h-100">
                    <div id="panelConfiguracion" class="col-2 p-0 m-0 text-center d-flex flex-column align-items-center justify-content-center border border-danger">
                        <img  src="iconos/generales/opcionesSimbolo.png" height="40%" width="45%" class="border border-red m-0 p-0">
                    </div>
                    <div class="col-9 border border-danger d-flex flex-column align-items-center justify-content-center text-center fs-6">
                        Mensajes
                    </div>
                    <div id="panelConfiguracion" class="col-1 p-0 m-0 text-center d-flex flex-column align-items-center justify-content-center border border-secondary">
                        <div id="cantNotificacionesSinLeer" style="border-radius:50%; background-color:red ; border: solid red; position:relative; top:20%; left:30%">
                            3
                        </div>
                        <img  src="iconos/generales/notificacionesSimbolo.png" height="50%" width="75%" class="border border-red m-0 p-0">
                        
                    </div>
                </div>
                
            </div>
	</header>
	
        <section>
            
        
        </section>
        
	
	
	<footer class="container px-0" style="position: fixed; bottom: 0%; height:10%; background-image: linear-gradient(40deg, #1d976c, #93f9b9); color:white; font-weight: bold">
		<div class="row w-100 h-100 border border-danger px-0 mx-0 " >
			
			<div class="col border border-primary text-center p-0 m-0 d-sm-flex flex-sm-column align-items-sm-center" id="pestanaForo" onclick="">
				<div class="p-0 m-0">
				    Foro
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
				    Chat
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
        
        Class SeccionesControlador
        {
            irARecursos()
            {
                window.location.href = "recursos.php";
            }

            irAForo()
            {
                window.location.href = "foro.php";
            }
        }
           
        Class PanelesControlador
        {
            cambiarPanelContactos()
            {

            }

            cambiarPanelChat()
            {

            }

            cambiarPanelUsuarios()
            {

            }
        }
        
        Class Panel extends Panel
        {
            constructor()
            {
                this.publicaciones = ;
                this.
            }
        }
        
        Class Panel 
        {
            constructor()
            {
                this.panel = ;
                this.anchura = ;
                this.altura = ;
            }
            
        }
        
        
        
//  |----------------------------------------------------------------------------------------------------------------------------------------|
//  |****************************************************************************************************************************************|
//  |      DATOS    DATOS    DATOS   DATOS   DATOS    DATOS    DATOS    DATOS   DATOS   DATOS   DATOS    DATOS    DATOS   DATOS   DATOS      |
//  |****************************************************************************************************************************************|
//  |----------------------------------------------------------------------------------------------------------------------------------------|
    
        Class Datos
        {
            constructor()
            {
                this.conversaciones = new Conversaciones();
                this.usuarios = new Usuarios();
                this.conector = new Conector();
            }
            
            cargarDatos()
            {
                let datos = this.conector.consultarGet();
                this.conversaciones.cargarConversaciones();
                this.usuarios.cargarUsuarios();
            }
            
            getConversaciones()
            {
                return this.conversaciones;
            }
            
            getUsuarios()
            {
                return this.usuarios;
            }
            
            getMensajes()
            {
                
            }
            
            agregarMensaje()
            {
                
            }
            
            eliminarMensaje()
            {
                
            }
            
            modificarMensaje()
            {
                
            }
            
            agregarUsuario()
            {
                
            }
            
            eliminarUsuario()
            {
                
            }
            
            modificarUsuario()
            {
                
            }
        }
        
        Class Conversaciones
        {
            constructor()
            {
                this.conversaciones = new Map();
            }
            
            getMensajes(idConversacion)
            {
                return this.conversaciones.get(idConversacion).getMensajes();
            }
            
            agregarMensaje(idConversacion, nuevoMensaje)
            {
                
                this.conversaciones.get(idConversacion).agregarMensaje(nuevoMensaje);
            }
            
            eliminarMensaje(idConversacion, idMensaje)
            {
                this.conversaciones.get(idConversacion).eliminarMensaje(idMensaje);
            }
            
            modificarMensaje(idConversacion, idMensaje, mensajeModificado)
            {
                this.conversaciones.get(idConversacion).modificarMensaje(idMensaje, mensajeModificado);
            }
            
            cargarConversaciones()
            {
                
            }
        }
        
        Class Conversacion
        {
            constructor()
            {
                this.mensajes = new Mensajes();
            }
            
            getMensajes()
            {
                return this.mensajes.getMensajes();
            }
            
            agregarMensaje(nuevoMensaje)
            {
                this.mensajes.agregarMensaje;
            }
            
            eliminarMensaje(idMensaje)
            {
                this.mensajes.eliminarMensaje(idMensaje);
            }
            
            modificarMensaje(idMensaje, mensajeModificado)
            {
                this.mensajes.modificarMensaje(idMensaje, mensajeModificado);
            }
            
        }
        
        Class Mensajes
        {
            constructor()
            {
                this.mensajes = new Array();
            }
            
            getMensajes()
            {
                let mensajes = new Array();
                this.mensajes.forEach(function(value){
                    mensajes.unshift(value.getDatos());
                });
            }
        }
        
        Class Mensaje
        {
            constructor(idMensaje, mensaje, autor, fecha, hora)
            {
                this.idMensaje = idMensaje;
                this.mensaje = mensaje;
                this.autor = autor;
                this.fecha = fecha; 
                this.hora = hora;
            }
            
            getDatos()
            {
                return {idMensaje: this.idMensaje,
                        mensaje: this.mensaje,
                        autor: this.autor,
                        fecha: this.fecha,
                        hora: this.hora};
            }
           
        }
        
        Class Usuarios
        {
            constructor()
            {
                this.usuarios = new Map();
            }
            
            getUsuarios()
            {
                let datosUsuarios = {};
                this.usuarios.forEach(function(value, key){
                    datosUsuarios[key] = value[] 
                });
            }
            
            eliminarUsuario(idUsuario)
            {
                this.usuarios.delete(idUsuario);
            }
            
            modificarInfoUsuario(idUsuario, nuevaInformacion)
            {
                
            }
            
            agregarUsuario(nuevoUsuario)
            {
                if (!this.usuarios.has(nuevoUsuario["idUsuario"]))
                    this.usuarios.set(nuevoUsuario["idUsuario"], {  nombre: nuevoUsuario["nombre"],
                                                                    segundoNombre: nuevoUsuario["segundoNombre"],      
                                                                    apellido: nuevoUsuario["apellido"],
                                                                    segundoApellido: nuevoUsuario["segundoApellido"],
                                                                    cargo: nuevoUsuario["cargo"]
                                                                  });
                return false;
            }
            
            cargarUsuarios()
            {
                
            }
        }
        
        Class Usuario
        {
            constructor(idUsuario, nombre, segundoNombre, apellido, segundoApellido, cargo, estadoConexion)
            {
                this.idUsuario = idUsuario;
                this.nombre = nombre;
                this.segundoNombre = segundoNombre;
                this.apellido = apellido;
                this.segundoApellido = segundoApellido;
                this.cargo = cargo;
                this.estadoConexion = estadoConexion;
            }
            
            getDatos()
            {
                return {
                        idUsuario: this.idUsuario,
                        nombre: this.nombre,
                        segundoNombre: this.segundoNombre,
                        apellido: this.apellido,
                        segundoApellido: this.segundoApellido,
                        cargo: this.cargo,
                        estadoConexion: this.estadoConexion             
                };
            }
            
            setDatos(nuevosDatos)
            {
                if (this.nombre != nuevosDatos["nombre"])
                    this.nombre = nuevosDatos["nombre"];
                if (this.segundoNombre != nuevosDatos["segundoNombre"])
                    this.segundoNombre = nuevosDatos["segundoNombre"];
                if (this.apellido != nuevosDatos["apellido"])
                    this.apellido = nuevosDatos["apellido"];
                if (this.segundoApellido != nuevosDatos["segundoApellido"])
                    this.segundoApellido = nuevosDatos["segundoApellido"];
                if (this.cargo != nuevosDatos["cargo"])
                    this.cargo = nuevosDatos["cargo"];
            }
            
            cambiarEstadoConexion()
            {
                this.estadoConexion = !this.estadoConexion;
            }
        }
        
        Class Conector
        {
            constructor()
            {
                this.xhttp = new XMLHttpRequest();
                this.funciones = new Funciones();
            }
            
            consultarGet(funcion, ruta)
            {
                xhttp.onload = function(){
                    funcion();
                };
                xhttp.open("GET", ruta, false);
                xhttp.send();
            }
            
            consultarPost(funcion, ruta, datos)
            {
                xhttp.onload = function(){
                    funcion();
                };
                xhttp.open("POST", ruta, false);
                xhttp.send(datos);
            }
            
        }
        
        Class Funciones
        {
            
        }
</script>

</html>
