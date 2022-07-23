

<html class="container" style="height:100%; width:100%; border: solid blue; overflow-x:hidden; overflow-y:hidden; margin:0px; padding:0px">
<!--*****-->
<head>
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
        <meta charset="utf-8">
		

		<!-- Bootstrap CSS -->
        <link href="/styles/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
                
		
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
<!--            <header class="container text-white p-0 w-100" style="position:fixed; top: 0% ;background-image:linear-gradient(50deg, #f7971e, #ffd200);">-->
            <div class="row h-100 px-0">
                <h2 style="" class="text-center py-2 px-0">Sistema de ayuda</h2>
                <div style="position:absolute; right:0%;" class="col-3 apuntable p-0 align-middle text-end mb-0 me-2 mt-3">
                     <a class="w-100 align-self-center " href="/vistaindex" style="text-decoration:none; color:white">
                         <img src="/iconos/salirIcono.png" style="height:1.75em">Salir
                     </a>
                 </div>
             </div>
            
        
	</header>
    
<!--***************************************************************************************************************-->
<!--                         PUBLICACIONES                          -->
<!--**************************************************************************************************************-->
	
        <section id="publicaciones" class="p-0 m-0" style="height: 80% ;padding: 0; margin: 0px; background-image: linear-gradient(40deg, #1fa2ff, #12d8fa, #a6ffcb); overflow-y:auto">
	    
                 
		<div class="container">
			
			<div class="row justify-content-end">
				<div class="col-auto">
					
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
					<form id="formulario">
						<p class="text-white p-1 text-center fw-bold" style="background-image: linear-gradient(50deg, #457fca, #5691c8);">Formulario de solicitud de atención al cliente</p>
                                                    <div class="container pb-3">
                                                    
							<div class="row">	
                                                            <div class="mb-2">
                                                                <label for="asuntoI" class="form-label">Asunto(*) </label>
                                                                <input type="text" class="form-control" id="asunto">
                                                            </div>    
							</div>
                                                        
                                                        <div class ="row p-0">
                                                            <div class="mb-2">
                                                                <label for="areaI" class="form-label">Área (*)</label>
                                                                <?php
                                                                    $dbh = new PDO('mysql:host=localhost;dbname=teleticket', "root", "");
                                                                    $stmt = $dbh->prepare("SELECT * FROM areas WHERE id_area != -1 ORDER BY area");
                                                                    $stmt->execute();
                                                                   
                                                                ?>
                                                                <select id="selectorArea" class="form-select" name="area">
                                                                    <option value="-1"> Seleccione un área o departamento</option>
                                                                    <?php
                                                                        if ($stmt->rowCount() > 0)
                                                                        {
                                                                            foreach($stmt as $row)
                                                                            {
                                                                                echo '<option value=" ' . $row['id_area'] . '">' . $row['area'] . '</option>';
                                                                            }
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        
							<div class="mb-2" style="height:31.5%">
								<label for="especialistaI" class="form-label">Especialista </label>
                                                                
                                                                <div class="row p-0 border w-100 mx-auto text-white fw-bold" style="background-image: linear-gradient(50deg, #2193b0, #6dd5ed); ">
                                                                    <div class="col-7 border text-center">
                                                                        Nombre
                                                                    </div>
                                                                    <div class="col-5 border text-center">
                                                                        Cargo
                                                                    </div> 
                                                                </div>
                                    <!-- -- ---LISTA- ---->     <ul id="listaEspecialistas" class="list-group w-100 border bg-white bg-gradient" style="overflow-y:scroll; height:55%">
                                                                    
                                                                </ul>
                                                                <div class="row w-100 mx-auto text-center" style="height:15%">
                                                                    <img id="botonDeseleccionar" hidden src="/iconos/deseleccionarIcono.png" style="height:78%; width: 5.5%; display:block; margin-left:auto; margin-right:1%" class="px-0">
                                                                </div>
							</div>
							
							<div class="mb-2">
								<label for="problemaI" class="form-label">Por favor, especifique en detalle el problema: (*)</label>
								<textarea class="form-control" id="problema" row="3"></textarea>
							</div>
                                                    </div>
						<div id="errorO"></div>
                                                <div class="text-end">
                                                    <button type="button" class="btn btn-primary text-right" onclick="enviarSolicitud()">Enviar</button>
                                                </div>
                                        </form>
                            
<!--.*************************************************************************************************************************************************************************************-->
<!--.********************************* MODAL ERRORES ************************************************************************************************************************************-->

 
<div class="modal fade" id="modalErrores" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Error</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         Errores encontrados:
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>
                            
                            
<!--.*************************************************************************************************************************************************************************************-->
<!--.*************************************************************************************************************************************************************************************-->                             
<!--**************************************************************************************************************************************************************************************-->
                            

					<script>
 
//-----------------------
//*************************************************************************************************************+
//-----------------------

var elementoListaActivo = null;
const listaFuncionariosSeleccionable = document.getElementById("listaEspecialistas"); 
const botonDeseleccionar = document.getElementById("botonDeseleccionar");
botonDeseleccionar.addEventListener("click", function(){
   deseleccionarElemento(); 
});

document.getElementById("selectorArea").addEventListener("change", function(){
    while (listaFuncionariosSeleccionable.firstChild) {
        listaFuncionariosSeleccionable.removeChild(listaFuncionariosSeleccionable.firstChild);
    }
    if (this.value != -1)
    {
        elementoListaActivo = null;
        botonDeseleccionar.setAttribute("hidden", true);
        cargarTablaEspecialistas(getEspecialistas(this.value));
    }
});

function getEspecialistas(idArea)
{
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "/api/getEspecialistasArea.php?area=" + idArea, true);
    xhr.onload = function()
    {
        if (xhr.readyState === 4) 
        {
            if (xhr.status === 200) 
            {     
                let listadoEspecialistas = JSON.parse(xhr.response);     
                cargarTablaEspecialistas(listadoEspecialistas);
            } 
            else 
            {
                console.error(xhr.statusText);
            }
        }   
    };
    
    xhr.send();
} 

function cargarTablaEspecialistas(listadoEspecialistas)
{
    const cantidadEspecialistas = listadoEspecialistas.length;
    for(let i=0; i< cantidadEspecialistas; i++)
    {
        let especialista = listadoEspecialistas[i];
       
        let elementoLista = document.createElement("li");
        elementoLista.setAttribute("class", "p-0 border list-group-item list-group-item-action py-1");
        elementoLista.setAttribute("onclick", "activarElementoLista(this);");
        elementoLista.setAttribute("data-bs-dismiss", "modal");
        elementoLista.setAttribute("data-idespecialista", especialista.id_especialista);
        let filaElemento = document.createElement("div");
        filaElemento.setAttribute("class", "row w-100");
        let columnaElemento = document.createElement("div");
        columnaElemento.setAttribute("class", "col-8 text-center");
        let nombresEspecialista = document.createTextNode(especialista.nombres + " " + especialista.apellido_p );
        columnaElemento.appendChild(nombresEspecialista);
        let columna2Elemento = document.createElement("div");
        columna2Elemento.setAttribute("class", "col-4 text-center");
        let cargoEspecialista = document.createTextNode(especialista.cargo);
        columna2Elemento.appendChild(cargoEspecialista);
        filaElemento.appendChild(columnaElemento);
        filaElemento.appendChild(columna2Elemento);
        elementoLista.appendChild(filaElemento);
        listaFuncionariosSeleccionable.appendChild(elementoLista);
    }
} 

function activarElementoLista(elementoLista)
{   
    if (!elementoLista.hasAttribute('active'))
    {
        
        if (elementoListaActivo != null)
        {
            elementoListaActivo.removeAttribute('active');
            elementoListaActivo.style.backgroundColor = null;
            elementoListaActivo.style.color = null;
        }
        else
        {
            botonDeseleccionar.removeAttribute("hidden");
        }
        elementoLista.setAttribute('active', true);
        elementoLista.style.backgroundColor = "#1ABC9C";
        elementoLista.style.color = "white";
        elementoListaActivo = elementoLista;
    }
    return;
}

function deseleccionarElemento()
{
    botonDeseleccionar.setAttribute("hidden", true);
    elementoListaActivo.removeAttribute('active');
    elementoListaActivo.style.backgroundColor = null;
    elementoListaActivo.style.color = null;
    
    return;
}
 




 

//**************************************************************************************************************************************************************
//******  ***********************************************************************************************************
//**************************************************************************************************************************************************************

function mostrarErrores()
{
    modalErrores.toggle();
}


const modalErrores = new bootstrap.Modal(document.getElementById('modalErrores'), {focus:true, keyboard:true, backdrop:true});
mostrarErrores();

function enviarSolicitud()
{
    
    let errores = new Array();
    
    const asunto = document.getElementById("asunto").value;
    if (asunto == "")
    {
        errores.push("asunto");
    }
    const area = document.getElementById("selectorArea").value;
    if (area == -1)
    {
        errores.push("area");
    }
    const especialista = elementoListaActivo.getAttribute("data-idespecialista");
    const problema = document.getElementById("problema").value;
    if (problema == "")
    {
        errores.push("problema");
    }
    if (errores.length == 0)
    {
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function()
                       {
            
                       };
        xhttp.open("POST", "/api/crearSolicitud.php", true);
        let elementosSolicitud = {
                                    id_asunto: asunto,
                                    id_area: area,
                                    id_especialista: especialista,
                                    problema: problema,
                                    id_usuario: <?php echo $id_cuenta; ?>
                                 };
        xhttp.send(JSON.stringify(elementosSolicitud));
    }
    else 
    {
        mostrarErrores(errores);
    }
    return;
}


                                            

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
				    Solicitud
				</div>
				<div class="p-0 m-0 text-center">
					<img src="iconos/formularioIcono.png" width="30.5%">
				</div>
			</div>
			
			<div class="col border border-primary text-center px-0" id="pestanaRecursos" onclick="irARecursos()">
                            
				<div class="p-0 m-0">
				    Respuestas
				</div>
				<div class="p-0 m-0">
					<img src="iconos/replicaIcono.png"/ width="40%">
				</div>
                            
			</div>
			
			<div class="col border border-primary text-center px-0" id="pestanaChat" onclick="irAChat()">
				<div class="p-0 m-0">
				    Foro
				</div>
				<div class="p-0 m-0 text-center">
					<img src="iconos/foroIcono.png"/ width="40.5%">
				</div>
			</div>
		
		</div>
	</footer>

</body>
</html>
<!--***************************************************************************************************************-->
<!--                              JAVASCRIPT                          -->
<!--**************************************************************************************************************-->
     


<!--***************************************************************************************************************-->
<!--                               DATOS                       -->
<!--**************************************************************************************************************-->
     
<!--        
        

</html>
