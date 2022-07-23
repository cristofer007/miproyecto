<!doctype html>
<?php
$tipoUsuario = 0;
$extra = "";

if (!empty($_GET))
{
	if(isset($_GET['tipo'])){
		$tipoUsuario = $_GET['tipo'];
		if($tipoUsuario < 0)
			$tipoUsuario = 0;
	}
}
?>	


<html lang="en" style="max-height:100%; min-height:100%">
    <head>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <!-- Bootstrap CSS -->
            <link href="/styles/style.css" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

            <title>Panel de administración</title>
            <style>
                
            </style>
    </head>
<!--***************************************************************************************************************************
*******************************  BODY  **************************************************************************************************************
*******************************************************************************************************************************-->

    <body class="border border-secondary bg-light p-0">
        <header class="container text-white p-0 w-100" style="position:fixed; top: 0% ;background-image:linear-gradient(50deg, #f7971e, #ffd200);">
            <div class="row h-100 px-0">
                <h2 style="" class="text-center py-2 px-0">Sistema de ayuda</h2>
                <div style="position:absolute; right:0%;" class="col-3 apuntable p-0 align-middle text-end mb-0 me-2 mt-3">
                     <a class="w-100 align-self-center " href="/vistaindex" style="text-decoration:none; color:white">
                         <img src="/iconos/salirIcono.png" style="height:1.75em">Salir
                     </a>
                 </div>
             </div>
            
        </header>
<!---------------------------------------------------------------------------------------------------------------------------------->
            
                <div class="container px-0  mx-0 my-0 w-100" style=" position:absolute; top:7%; right:0%">
                    <div class="row m-0 mb-3  px-0" >
			<div class="container bg-light my-auto px-0  border  w-100" >
				<div class="row my-auto border py-2 w-100 mx-0 px-0">
                                    <?php
					$secciones = array("Usuarios", "Especialistas");
					$vals = array(0, 1);
					for($i = 0; $i < 2; $i++)
					{
                                            echo '<div class="col text-center my-auto align-self-center" >';
                                            if($vals[$i] == $tipoUsuario){
                                                echo $secciones[$i];
                                            }
                                            else{
                                                echo '<a href="/vistagestionusuarios.blade.php?tipo='.$vals[$i].'">'. $secciones[$i] .'</a>';
                                            }
                                            echo '</div>';
					}
                                    ?>
					
				</div>
                                
				<div class="input-group h-75 p-0 g-0 border w-100 m-0">
                                    <div class="row w-100 g-0 my-auto p-0 border m-0">
                                        <div class="col col-sm-10 p-0 ms-0 h-100 my-auto border">
                                            <div class="form-outline row w-100 my-auto d-flex flex-row p-0 h-100 g-0">
                                                <div class="col-8 col-sm-10 p-0 mx-auto">
                                                    
                                                    <input type="search" id="directSearch" class="col-6 col-sm-10 w-100 form-control p-0  h-100" onChange="search1()"/>
                                                </div>
                                                <div class="col-4 col-sm-2 my-auto mb-0">    
                                                    <button type="button" class="btn btn-primary h-100 w-100 col-sm-4 col-2  m-auto" onClick="search1()">
                                                        Buscar
                                                    </button>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="row my-auto p-0 border w-100" >
                                        <div class="row d-flex flex-row m-0 p-0 h-100 g-0 w-100 justify-content-center border ">
                                        <?php 

//                                           echo '<a class="col-5 text-center my-auto py-auto h-100" href="/vistaadmin.blade.php?tipo='.$tipoTicket.'" style= "font-size: 0.85em">'
//                                                . '<img src="iconos/limpiarBusquedaIcono.png" height="25em">'
//
//                                                . ' Limpiar busqueda</a>'

                                        ?>

                                            <div class="col-1"></div>
                                            <a class=" col-5 cursorClickIcon text-center my-auto py-auto p-0 h-100" data-bs-toggle="modal" data-bs-target="#searchModal" style="font-size:0.85em"><img src="iconos/busquedaAvanzadaIcono.png" style="height:2em"> <span></span>Búsqueda avanzada</a>
                                         </div>
                                     </div>
<!--                                        <div class="col-1">
                                         </div>-->
                                    </div>
                                </div>
                        
                                <div class="overflow-scroll px-0 m-0 w-100"  style="height:30%; max-height:30%; overflow:scroll;">
				<?php
                                        $consulta;
                                        if($tipoUsuario == 0)
                                        {
                                            $consulta =
                                                    "SELECT id_usuario, nombres, apellido_p, apellido_m, cargo    
                                                    FROM usuarios
                                                    ORDER BY apellido_p"
                                            ; 
                                        }
                                        else
                                        {
                                            $consulta =
                                                    "SELECT id_especialista, nombres, apellido_p, apellido_m, cargo 
                                                    FROM especialistas
                                                    ORDER BY apellido_p";
                                        }
                                        
					$dbh = new PDO('mysql:host=localhost;dbname=teleticket', "root", "");
					
//					$consulta = $consulta . $extra;
					
					$stmt = $dbh->prepare($consulta);
//					$stmt->bindParam(1, $tipoTicket);
//					$paramI = 2;
//					if(!is_null($keywords))
//					{
//						$keywords = "%".$keywords."%";
//						$stmt->bindParam($paramI, $keywords);
//						$stmt->bindParam($paramI+1, $keywords);
//						$stmt->bindParam($paramI+2, $keywords);
//						$paramI += 3;
//					}
//					if(!is_null($departamento))
//					{
//						$stmt->bindParam($paramI, $departamento);
//						$paramI += 1;
//					}
//					if(!is_null($start) && !is_null($end))
//					{
//						$stmt->bindParam($paramI, $start);
//						$stmt->bindParam($paramI+1, $end);
//						$paramI += 2;
//					}
//					if(!is_null($cliente))
//					{
//						$cliente = "%".$cliente."%";
//						$stmt->bindParam($paramI, $cliente);
//						$stmt->bindParam($paramI+1, $cliente);
//						$paramI += 2;
//					}
//					if(!is_null($tecnico))
//					{
//						$tecnico = "%".$tecnico."%";
//						$stmt->bindParam($paramI, $tecnico);
//						$stmt->bindParam($paramI+1, $tecnico);
//						$paramI += 2;
//					}
					$stmt->execute();
					if($stmt->rowCount() > 0)
					{
                                            
                                        
                                    ?>
                                            <div style="width:100%; height:30em; min-height: 30em; max-height:30em; overflow-y:scroll" class="h-50 border p-0 mx-0" >
                                                <table class="table table-striped mt-0 border border-primary " >
							<thead class="bg-light" style="position:sticky">
								<tr>
									<th class="border border-dark text-center" scope="col">Id</th>
									<th class="border border-dark text-center" scope="col">Nombre(s)</th>
									<th class="border border-dark text-center" scope="col">Apellidos</th>
									<th class="border border-dark text-center" scope="col">Cargo</th>
                                                                       
									<th class="border border-dark text-center" scope="col">Detalles</th>
									
								</tr>
							</thead>
							<tbody id="resultsTable">
                                                    <?php
                                                                    foreach($stmt as $row)
                                                                    {
                                                                            echo '<tr>';
                                                                            $idCliente;
                                                                            if($tipoUsuario == 0)
                                                                            {
                                                                                $idCliente = $row['id_usuario'];
                                                                            }
                                                                            else 
                                                                            {
                                                                                $idCliente = $row['id_especialista'];
                                                                            }
                                                                            echo '<td class="text-center align-middle">' . $idCliente . '</td>';
                                                                            echo '<td class="text-center my-auto align-middle">'. $row['nombres'] .'</td>';
                                                                            echo '<td class="text-center align-middle">'. $row['apellido_p'] . ' ' . $row['apellido_m'] .'</td>';
                                                                            echo '<td class="text-center align-middle">'. $row['cargo'] .'</td>';
//                                                                            if(!is_null($row['tecnico']))
//                                                                                    echo '<td class="text-center my-auto align-middle">'. $row['tecnico'] .'</td>';
//                                                                            else
//                                                                                    echo '<td class="text-center my-auto align-middle py-0"><a class="text-decoration-none cursorClickIcon " onClick="asignar('.$row['codigo'].')"> <img src="iconos/asignarIcono.png" class="pb-0 mb-0 align-middle" height="31em"> </a></td>';
//                                                                            $idCliente = "";
//                                                                            if ($tipoUsuario == 0)
//                                                                            {
//                                                                                $idCliente = $row['id_usuario'];
//                                                                            }
//                                                                            else 
//                                                                            {
//                                                                                $idCliente = $row['id_especialista'];
//                                                                            }
                                                                            $celdaDetalles = '<td class="text-center my-0 py-0 align-middle"> <a class="text-decoration-none cursorClickIcon" onClick="detalles('. $idCliente .',' . $tipoUsuario  . ')"> <img src="iconos/verDetallesIcono.png" height="28em"></a></td>';
                                                                            
                                                                            
                                                                            echo $celdaDetalles;
                                                                            
                                                                            echo '</tr>';
                                                                    }
                                        }
                                                    ?>
                                  
                                    </tbody>
                                </table>
                            </div> 
                        </div>
                    </div>
                <div id="botonNuevoTicket" class="row justify-content-center me-1" style="border: 3px solid blue ;position:fixed; height: 11%; width: 18%; border-radius:50%; right:2.5%; bottom:11%; background-image: radial-gradient(#005c97, #363795);">
                    <a href="/vistaregistrarusuario" class="text-center h-100 w-100 p-0" style="position:relative;">
                        
                        <img class="align-middle" src="iconos/nuevoUsuarioIcono.png" style="position:absolute; left:2%; top: 2% ;height: 95%">
                    </a>
                </div>    
            </div>        
<!--***************************************************************************************************************************
*******************************  FOOTER **************************************************************************************************************
*******************************************************************************************************************************-->
                   
        <footer class="container px-0 p-0 border border-danger" style="position: fixed; bottom: 0%; left: 0%; height:10%; background-image: linear-gradient(40deg, #1d976c, #93f9b9); color:white; font-weight: bold">
            <div class="row w-100 h-100 px-0 mx-0 py-0 border border-danger" >

                    <div class="col border border-primary text-center p-0 m-0 d-sm-flex flex-sm-column align-items-sm-center" id="pestanaForo">
                            <div class="p-0 m-0 texto-pestana">
                                Solicitudes
                            </div>
                            <div class="p-0 m-0 text-center">
                                    <img src="iconos/solicitudesIcono.png" style="width:30.5%">
                            </div>
                    </div>

                    <div class="col border border-danger text-center px-0" id="pestanaRecursos" onclick="irARecursos()">

                            <div class="p-0 m-0 texto-pestana">
                                Usuarios
                            </div>
                            <div class="p-0 m-0">
                                    <img src="iconos/usuariosIcono.png" style="width:40%">
                            </div>
                        <
                    </div>

                    <div class="col border border-primary text-center px-0" id="pestanaChat" onclick="irAChat()">
                            <div class="p-0 m-0 texto-pestana">
                                Canales
                            </div>
                            <div class="p-0 m-0 text-center">
                                    <img src="iconos/canalesIcono.png" style="height:40.5%">
                            </div>
                    </div>

            </div>
        </footer>
                    
<!--***************************************************************************************************************************
*******************************  MODALS **************************************************************************************************************
*******************************************************************************************************************************-->

                <div class="modal fade" id="exampleModal" style="top:5%" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header" style="background-image: linear-gradient(50deg, #457fca, #5691c8)">
						<h5 class="modal-title text-white fw-bold" id="exampleModalLabel">Detalles de cuenta.</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="row align-items-center mb-1">
							<div class="col-3 fw-bold">Nombre(s):</div>
							<div class="col" id="oNombre"></div>
						</div>
						<div class="row align-items-center mb-1">
							<div class="col-3 fw-bold">Apellidos:</div>
							<div class="col" id="oApellidos"></div>
						</div>
						<div class="row align-items-center mb-1">
							<div class="col-3 fw-bold">Cargo:</div>
                                                        <div class="col" id="oCargo"></div>
						</div>
                                                <div class="row align-items-center mb-1">
							<div class="col-3 col-lg-1 fw-bold">Correo:</div>
                                                        <div class="col" id="oCorreo"></div>
						</div>
						<div class="row align-items-center mb-1">
							<div class="col-3 fw-bold">Teléfono:</div>
							<div class="col" id="oTelefono"></div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
						<button type="button" class="btn btn-primary" data-bs-dismiss="modal" onClick="editar()">Modificar</button>
						//<?php 
//							if($tipoTicket == 3)
//								echo '<button type="button" class="btn btn-primary" data-bs-dismiss="modal" onClick="aceptarResolucion()">Aceptar resolución</button>'
//						?>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" style="top:20%; width:90%; left:5%" id="warnModal" tabindex="-1" aria-labelledby="warnModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header text-white" style="background-image: linear-gradient(50deg, #e43a15, #e65245)">
						<h5 class="modal-title text-center" id="warnModalLabel">Eliminar tickets</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
					<p id="modalWarnMsg"></p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
						<button type="button" class="btn btn-danger" data-bs-dismiss="modal" onClick="eliminar()">Eliminar</button>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" style="top:3%; width:95%; left:2.5%" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header" style="background-image:linear-gradient(50deg, #457fca, #5691c8); color:white">
						<h5 class="modal-title" id="searchModalLabel">Búsqueda avanzada</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="mb-2">
							<label for="smKeywords" class="form-label">Codigo, título o descripción</label>
							<input type="search" class="form-control form-control-sm" id="smKeywords"/>
						</div>
						<div class="mb-2">
							<label for="smEstado" class="form-label">Buscar en estado del ticket</label>
							<select class="form-select form-select-sm" id="smEstado" aria-label="Select">
								<option value="0">Abierto</option>
								<option value="1">Asignado / Cerrado</option>
								<option value="2">Resuelto</option>
								<option value="3">Resuelto (Esperando aceptación)</option>
								<option value="9">Entrante</option>
							</select>
						</div>
						<div class="mb-2">
							<label for="smDepartamento" class="form-label">Buscar en departamento</label>
							<select class="form-select form-select-sm" id="smDepartamento" aria-label="Select">
								<option value="-1" selected>Cualquiera</option>
								<option value="0">Soporte</option>
								<option value="1">Redes</option>
								<option value="2">Servidores</option>
							</select>
						</div>
						<div class="mb-2">
							<label for="smCliente" class="form-label">Buscar por cliente</label>
							<input type="text" class="form-control form-control-sm" id="smCliente">
						</div>
						<div class="mb-2">
							<label for="smTecnico" class="form-label">Buscar por técnico</label>
							<input type="text" class="form-control form-control-sm" id="smTecnico">
						</div>
						<div class="mb-2">
							<label for="smStart" class="form-label">Fecha de inicio</label>
							<input type="date" class="form-control form-control-sm" id="smStart">
						</div>
						<div class="mb-2">
							<label for="smEnd" class="form-label">Fecha de término</label>
							<input type="date" class="form-control form-control-sm" id="smEnd">
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
						<button type="button" class="btn btn-primary" data-bs-dismiss="modal" onClick="search2()">Buscar</button>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="asignarModal" tabindex="-1" aria-labelledby="asignarModalLabel" aria-hidden="true" style="width:95%; top:10%; left:2.5%">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header text-white" style="background-image: linear-gradient(50deg, #457fca, #5691c8);">
						<h5 class="modal-title" id="asignarModalLabel">Asignar técnico</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
					<p class="lead">Buscar existente</p>
					<input type="search" id="tecnicoSearch" class="form-control mb-2" onInput="getTecnicos(this.value)"/>
					<ul class="list-group" id="listaTecnicos">

					</ul>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
					</div>
				</div>
			</div>
		</div>	
</body>
<!--***************************************************************************************************************************
*******************************  SCRIPTS **************************************************************************************************************
*******************************************************************************************************************************-->
</html>  
		<script>

			function getTecnicos(tecnico)
			{
				let obj = {tecnico: tecnico};

				let xhr = new XMLHttpRequest();
				xhr.open("POST", "/api/getTecnicos.php", true);
				xhr.onload = function (e) {
					if (xhr.readyState === 4) {
						if (xhr.status === 200) {
							let tecnicos = document.getElementById("listaTecnicos");
							tecnicos.textContent = '';
							let response = JSON.parse(xhr.response);

							for(var i = 0; i < response.length; i++)
							{
								let node = document.createElement("LI");
								node.setAttribute("class", "list-group-item list-group-item-action p-0"); 
								node.setAttribute("onClick", "asignarTecnico("+codigoTecnico+","+response[i].id_tecnico+")");
								node.setAttribute("data-bs-dismiss", "modal");
								let nombreEspecialista = document.createTextNode(response[i].nombre + ' ' + response[i].apellido_p);
                                                                celdaNombre = document.createElement("div");
                                                                celdaNombre.setAttribute("class", "col text-center");
                                                                celdaNombre.appendChild(nombreEspecialista);
                                                                
                                                                let cargoEspecialista = document.createTextNode(response[i].cargo);
                                                                celdaCargo = document.createElement("div");
                                                                celdaCargo.setAttribute("class", "col text-center");
                                                                celdaCargo.appendChild(cargoEspecialista);
                                                                
                                                                let contenedorInfo = document.createElement("div");
                                                                contenedorInfo.setAttribute("class", "row m-0 p-0 text-center justify-content-center");
                                                                contenedorInfo.appendChild(celdaNombre);
                                                                contenedorInfo.appendChild(celdaCargo);
								node.appendChild(contenedorInfo);
								tecnicos.appendChild(node); 
							}
						} else {
							console.error(xhr.statusText);
						}
					}
				};
				xhr.onerror = function (e) {
					console.error(xhr.statusText);
				};
				xhr.send(JSON.stringify(obj));
			}
			
			

			function search2()
			{
				let keywords = document.getElementById("smKeywords").value;
				let estado = document.getElementById("smEstado").value;
				let depto = document.getElementById("smDepartamento").value;
				let cliente = document.getElementById("smCliente").value;
				let tecnico = document.getElementById("smTecnico").value;
				let start = document.getElementById("smStart").value;
				let end = document.getElementById("smEnd").value;

				console.log(start);
				console.log(end);

				let request = "/vistaadmin.blade.php?tipo="+estado;
				if(keywords !== "")
					request += "&keywords="+keywords;
				if(depto >= 0)
					request += "&departamento="+depto;
				if(cliente !== "")
					request += "&cliente="+cliente;
				if(tecnico !== "")
					request += "&tecnico="+tecnico;

				if(start !== "" || end !== "")
				{
					if(start === "")
						request+= "&start=1960-01-01";
					else
						request+= "&start="+start;
					if(end === "")
						request+= "&end=2100-01-01";
					else
						request+= "&end="+end;
				}

				window.location.href = request;
			}

//			function search1()
//			{
//				let request = "/vistaadmin.blade.php?tipo="+tipoTicket;
//				request += "&keywords="+document.getElementById("directSearch").value;
//
//				window.location.href = request;
//			}
			
			
			function eliminar()
			{
				var xhr = new XMLHttpRequest();
				xhr.open("POST", "/api/eliminarTickets.php", true);
				xhr.onload = function (e) {
					if (xhr.readyState === 4) {
						if (xhr.status === 200) {
							console.log(xhr.response);
							location.reload(true);
						} else {
							console.error(xhr.statusText);
						}
					}
				};
				xhr.onerror = function (e) {
					console.error(xhr.statusText);
				};
				xhr.send(JSON.stringify(codigos));
			}


                        function detalles(idCliente, tipoUsuario)
			{
//				//editCode = codigo;
				var obj = {id_cliente: idCliente};

				var xhr = new XMLHttpRequest();
                                let route;
                                if (tipoUsuario === 0)
                                {
                                    route = "detallesUsuario.php";
                                }
                                else
                                {
                                    route = "detallesInvitado.php";
                                }
				xhr.open("POST", "/api/" . route, true);
				xhr.onload = function (e) {
					if (xhr.readyState === 4) {
						if (xhr.status === 200) {
							var response = JSON.parse(xhr.response);
							if(response === false)
                                                            window.location.reload(true); 
                                                        console.log(response);
                                                        document.getElementById("oNombre").innerHTML = response.titulo;
                                                        document.getElementById("oApellidos").innerHTML = response.fuente;
                                                        document.getElementById("oCargo").innerHTML = response.departamento;
                                                        document.getElementById("oCorreo").innerHTML = response.tipo;
                                                        document.getElementById("oTelefono").innerHTML = response.estado;
                                                        
//                                                        if(response.tecnico !== null && response.correo_tecnico !== null)
//							{
//								document.getElementById("modalOpt").innerHTML = `
//								<div class="row align-items-center mb-1">
//									<div class="col-3 fw-bold">Técnico:</div>
//									<div class="col">${response.tecnico}</div>
//									<div class="w-100 d-block d-lg-none"></div>
//									<div class="col-3 col-lg-1 fw-bold">Correo:</div>
//									<div class="col">${response.correo_tecnico}</div>
//								</div>
//								<div class="fw-bold mt-4">Respuesta del técnico:</div>
//								<textarea class="boxsizingBorder" readonly>${response.resolucion_problema}</textarea>
//								`;
//							}
//							else
//								document.getElementById("modalOpt").innerHTML = "";
							
							var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
							myModal.toggle();

						} else {
							console.error(xhr.statusText);
						}
					}
				};
				xhr.onerror = function (e) {
					console.error(xhr.statusText);
				};
				xhr.send(JSON.stringify(obj));
			}
			
		</script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

		
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	
      
<!--        <style>
            #eliminarBoton 
            {
                cursor:pointer;
                transition: transform 0.5s;
            }
            
            #eliminarBoton:hover
            {
                transform: scale(1.05);
            }
        </style>-->

