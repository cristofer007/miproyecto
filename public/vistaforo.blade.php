

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
        
        <style>
            .boton 
            {
                color: white;
                font-weight: bold;
                background-image: linear-gradient(45deg, #000428, #004e92);
            }
        </style> 
	
</head>

<body style="margin: 0; height:100%; width:100%; overflow-x:hidden; overflow-y:hidden ">

	<header class="p-fixed" style="height:10%; background-image: linear-gradient(30deg, #F7971E, #FFD200); color: white; font-size:1.025em; font-weight:bold;  text-shadow: 2px 2px 3px #000000;">
            <div class="container border border-danger h-100">
                <div class="row border border-danger">
                    <div id="panelConfiguracion" class="col-2 p-0 m-0 text-center d-flex flex-column align-items-center justify-content-center border border-danger">
                        <div class="btn-group h-100">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                 <img src="iconos/generales/opcionesSimbolo.png" height="70%" width="70%" class="border border-red m-0 p-0">
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
	    
                    
               <html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Bootstrap CSS -->
		<link href="/styles/style.css" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
                
		<title>>Sistema de ayuda</title>
	</head>
	<body>
		

		<div class="container">
			
			<div class="row justify-content-end">
				<div class="col-auto">
					<a class="btn btn-primary" href="/consultar.php">Consultar solicitudes anteriores</a>
				</div>
				<div class="col-auto">
					<a class="btn btn-primary" href="/login.php">Ingresar</a>
				</div>
			</div>
                        <br>
			<div class="container bg-light mb-4 mt-2 p-2">
				<?php
					if (!empty($_GET))
					{
						if(isset($_GET['sent'])){
                                                        echo '<br>';
							echo '<p class="lead text-center fw-bold">Su solicitud ha sido enviada.</p>';
							echo 
                                                        '<p class="text-center"><a href="/"> '
                                                            . '' .
                                                            '<div class="row  d-flex flex-column justify-content-center align-items-center p-auto">' .
                                                                '<div class="col-1 text-center">' .
                                                                    '<img src="iconos/volverIcono.png" height="25em">' .
                                                                '</div>' .
                                                                
                                                                '<div class="col-1 text-center">' .
                                                                    'Volver' .
                                                                '</div>'
                                                        .   '</a>'
                                                        . '</p>';
						}
					}
					else
					{
				?>
					<form>
						<p class="text-white p-1 text-center fw-bold" style="background-image: linear-gradient(50deg, #457fca, #5691c8);">Formulario de solicitud de atención al cliente</p>
						<div class="container pb-3">
							<div class="row justify-space-evenly">
								<div class ="col">
									<div class="mb-2">
										<label for="nombreI" class="form-label">Nombres (*)</label>
										<input type="text" class="form-control" id="nombreI">
									</div>
								</div>
								<div class ="col">
									<div class="mb-2">
										<label for="apellidoI" class="form-label">Apellidos (*) <span class="text-black-50">(paterno y materno)</span></label>
										<input type="text" class="form-control" id="apellidoI">
									</div>
								</div>
							</div>
							<div class="mb-2">
								<label for="correoI" class="form-label">Correo electrónico (*)</label>
								<input type="email" class="form-control" id="correoI">
							</div>
							<div class="mb-2">
								<label for="telefonoI" class="form-label">Número telefónico</label>
								<input type="tel" class="form-control" id="telefonoI">
							</div>
							<div class="mb-2">
								<label for="problemaI" class="form-label">Por favor, especifique en detalle el problema: (*)</label>
								<textarea class="form-control" id="problemaI" row=3></textarea>
							</div>
						</div>
						<div id="errorO"></div>
                                                <div class="text-end">
                                                    <button type="button" class="btn btn-primary border border-danger text-right" onClick="sendFun()">Enviar</button>
                                                </div>
                                        </form>

					<script>

function err(message)
{
	document.getElementById("errorO").innerHTML += `<p class="text-danger fw-bold p-1 text-center">${message}</p>`;
}

function sendTicket(objTicket)
{
	var xhr = new XMLHttpRequest();
	xhr.open("POST", "/ticketAsync.php", true);
	xhr.onload = function (e) {
		if (xhr.readyState === 4) {
			if (xhr.status === 200) {
				console.log(xhr.response);
				window.location.href = "/?sent";
			} else {
				console.error(xhr.statusText);
			}
		}
	};
	xhr.onerror = function (e) {
		console.error(xhr.statusText);
	};
	xhr.send(JSON.stringify(objTicket));
}

function sendFun()
{
	var valid = true;
	document.getElementById("errorO").innerHTML = '';
	var correo = document.getElementById("correoI").value;
	var nombre = document.getElementById("nombreI").value;
	var nombre2 = document.getElementById("apellidoI").value;
	var problema = document.getElementById("problemaI").value;
	var telefono = document.getElementById("telefonoI").value;
	if(correo === "")
	{
		err("El campo de correo no debe estar vacío.");
		valid = false;
	}
	else if (!document.getElementById("correoI").checkValidity())
	{
		err("El correo es invalido.");
		valid = false;
	}

	if(nombre === "")
	{
		err("Debe ingresar su nombre.");
		valid = false;
	}
	if(nombre2 === "")
	{
		err("Debe ingresar sus apellidos.");
		valid = false;
	}
	if(problema === "")
	{
		err("Debe agregar la descripción de su problema.");
		valid = false;
	}

	if(!valid)
		return;

	var objUser = {
		Nombre: nombre+' '+nombre2,
		Correo: correo,
		Telefono: telefono
	}

	var xhr = new XMLHttpRequest();
	xhr.open("POST", "/addUserAsync.php", true);
	xhr.onload = function (e) {
		if (xhr.readyState === 4) {
			if (xhr.status === 200) {
				var objTicket = {
					nombre:       nombre,
					correo:       correo,
					titulo:       "Sín titulo",
					estado:       9, //Entrante
					fuente:       3, //Formulario
					tema:         "Sín tema",
					departamento: -1, //Sin asignar
					respuesta:    "",
					problema:     problema
				};
				console.log(xhr.response);
				sendTicket(objTicket);
			} else {
				console.error(xhr.statusText);
			}
		}
	};
	xhr.onerror = function (e) {
		console.error(xhr.statusText);
	};
	xhr.send(JSON.stringify(objUser)); 
}
					</script>
				<?php } ?>
			</div>
		</div>

		
		<!-- Bootstrap Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	
                
          
          
            
		
	</section>
<!--***************************************************************************************************************-->
<!--                            PANEL GRUPOS                                 -->
<!--**************************************************************************************************************-->
        <section id="panelGrupos">
            
        </section>

<!--***************************************************************************************************************-->
<!--                           LISTADO BOTONES                               -->
<!--**************************************************************************************************************-->
     
    
	<section id="panelBotonesAuxiliares" style="position: fixed; height:17.5%; width:40%; bottom:10%; right:0%" class="px-0 mx-0">
		<div id="botonesAuxiliares" class="container mx-0 w-100 px-0 overflow-visible" style="overflow-x:visible; overflow-y:hidden">
			
			<!--<div class="row d-flex border border-success h-100 mx-0 px-0 g-0" style="overflow-x:visible; overflow-y:hidden">--> 
			
				<div class="col-10 d-flex m-0 p-0 h-100 w-100 border border-danger" style="overflow-y: hidden; overflow-x:visible" style="">
					<div id="contenedorBotones" class="container m-0 p-0 w-100 h-100" style="overflow-y:hidden; overflow-x:visible">
						
						<div class="boton row text-bg-primary m-0 p-0 g-0 w-100" style="overflow-x:visible; overflow-y:hidden; height:33.3%">
							
                                                    <!--<div id="botonBuscar" class="col-4 d-flex flex-column justify-content-center m-auto p-auto text-center botonAuxiliar w-50 h-100" style="border-radius:50%;  overflow:visible" onclick="cambiarPanelBusqueda()">-->
                                                        <div class="col-4 border border-primary d-flex  p-0 my-0 mx-auto g-0 overflow-hidden text-center h-100 justify-content-center " >          
                                                            <img class="text-center mx-auto" src="iconos/generales/busquedaSimbolo.png" style="width: 60%;height:90%;"> 
                                                        </div>        
                                                        
                                                        <div class="col-8 d-flex flex-column p-0 my-0 justify-content-center alignr-items-center g-0 text-center h-100" style="font-size:0.9em">
                                                                Buscar
                                                            
							</div>
<!--                                                    </div>-->
						</div>
                                            
						<div class="boton row text-bg-primary border border-danger d-flex  mx-auto p-0 g-0 w-100 justify-content-center" style="height:33.3%">
<!--							<div id="botonGrupos" class="col-6 d-flex flex-column justify-content-center m-auto p-auto text-center botonAuxiliar w-50 h-100" style="border-radius:50%; background-image:linear-gradient(30deg, #50c9c3, #96deda); overflow:hidden" onclick="cambiarPanelGrupos()">-->
                                                        <div class="col-4 border border-primary h-100 d-flex flex-column py-auto p-0 my-0 g-0 overflow-hidden text-center justify-content-center align-items-center mx-auto" >
                                                            <!--<div class="col-9 d-flex border gy-0 border-danger p-0 m-auto align-self-center" style="height: 60%"> -->
                                                            <img class="text-center mx-auto" src="iconos/generales/gruposSimbolo.png" style="width:70%; height:85%">  
                                                           <!-- </div>  -->	
                                                        </div>

                                                        <div class="col-8 d-flex  py-auto justify-content-center align-items-center mx-auto g-0 text-center" style="font-size:0.9em">
                                                            Grupos
                                                        </div>
<!--							</div>-->
						</div>
                                                <div class="boton row text-bg-primary border border-danger d-flex  mx-auto p-0 g-0 w-100 justify-content-center overflow-visible" style="height:33.3%">
<!--							<div id="botonEscribir" class="col-6 p-0 d-flex flex-column justify-content-center m-0 text-center botonAuxiliar overflow-hidden w-50 h-100" style="border-radius:50%; background-image: linear-gradient(30deg, #50c9c3, #96deda);" onclick="cambiarPanelEscribir()">-->
                                                    <div class="col-4 border border-primary h-100 d-flex flex-row justify-content-center p-0 mx-auto overflow-hidden ">
                                                        <img src="iconos/generales/escribirSimbolo.png" style="width:60%; height:90%" class="p-0 m-auto">
                                                    </div>    
                                                    <div class="col-8 d-flex p-0 justify-content-center h-100 align-items-center g-0 text-center" style="font-size:0.9em">
                                                            Escribir
                                                    </div>
<!--							</div>-->
						</div>
					</div>
					
				</div>
				
				<div class="col-2 border border-danger m-0 p-0 text-center d-flex flex-row align-items-center" style="z-index:1; overflow:visible">
					<div class="border border-danger d-flex flex-row align-items-center" style="height:45%; width:100% ;" onclick="moverBotones()" >
                                            <img id="imagenIconoDobleFlecha" src="iconos/generales/dobleFlecha.png" style="width:100%; height:60%">
					</div>
				</div>
				
			<!--</div>-->
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
</html>
<!--***************************************************************************************************************-->
<!--                              JAVASCRIPT                          -->
<!--**************************************************************************************************************-->
     

<script>
	
        const datosGrupos = new Datos(<?php echo json_encode($datosGrupos); ?> );
          <?php $datosGrupos = null; ?> 
        
<!--***************************************************************************************************************-->
<!--                  PANTALLA                                 -->
<!--**************************************************************************************************************-->
        
        Class PublicacionesManejo 
        {
            constructor()
            {
                this.panelPublicaciones = document.getElementById("publicaciones");
                this.mostrarPublicaciones();
            }
            
            mostrarPublicaciones()
            {
                let pub = $.parseHTML("hello");
                this.panelPublicaciones.append(pub);
            }
            
            
        }
       
        let asd = new PublicacionesManejo();

        <script>
	
        const datosGrupos = new Datos(<?php echo json_encode($datosGrupos); ?> );
          <?php $datosGrupos = null; ?> 
        
<!--***************************************************************************************************************-->
<!--                  PANTALLA                                 -->
<!--**************************************************************************************************************-->
        
        Class PublicacionesManejo 
        {
            constructor()
            {
                this.panelPublicaciones = document.getElementById("publicaciones");
                this.mostrarPublicaciones();
            }
            
            mostrarPublicaciones()
            {
                let pub = $.parseHTML("hello");
                this.panelPublicaciones.append(pub);
            }
            
            
        }
       
        let asd = new PublicacionesManejo();

 </script>

 </script>
<!--***************************************************************************************************************-->
<!--                               DATOS                       -->
<!--**************************************************************************************************************-->
     
<!--        
        

</html>
