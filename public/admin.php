<?php

$tipoTicket = 0;
$keywords = null;
$departamento = null;
$start = null; $end = null;
$cliente = null;
$tecnico = null;

$extra = "";

if (!empty($_GET))
{
	if(isset($_GET['tipo'])){
		$tipoTicket = $_GET['tipo'];
		if($tipoTicket < 0)
			$tipoTicket = 0;
	}

	if(isset($_GET['keywords'])){
		$keywords = $_GET['keywords'];
		$extra .= " AND (titulo LIKE ? OR desc_problema LIKE ? OR codigo LIKE ?)";
	}

	if(isset($_GET['departamento'])){
		$departamento = $_GET['departamento'];
		$extra .= " AND (tickets.departamento = ?)";
	}

	if(isset($_GET['start']) && isset($_GET['end']))
	{
		$start = $_GET['start'];
		$end = $_GET['end'];
		$extra .= " AND (fecha BETWEEN ? AND ?)";
	}

	if(isset($_GET['cliente'])){
		$cliente = $_GET['cliente'];
		$extra .= " AND (usuarios.Nombre LIKE ? OR usuarios.Correo LIKE ?)";
	}

	if(isset($_GET['tecnico'])){
		$tecnico = $_GET['tecnico'];
		$extra .= " AND (tecnicos.nombre LIKE ? OR tecnicos.email LIKE ?)";
	}
}
?>	

<!doctype html>
<html lang="en" class="px-0" style="position:fixed; width:100% ;overflow-x:hidden">
	<head class="w-100">
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Bootstrap CSS -->
		<link href="/styles/style.css" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

		<title>Panel de administración</title>
	</head>
	<body class="px-0 mx-0 justify-content-center">
		<div class="container px-0 mx-auto">
			<h2 class="text-center py-3 px-0">Sistema de ayuda</h2>
			<div class="row justify-content-end">
				<div class="col-auto">
				    <a class="btn btn-primary" href="/index.php">Salir</a>
				</div>
			</div>

			<div class="container bg-light p-0 " style="height:37em; margin:auto">
				<div class="row mb-4 p-0">
					<?php
					$secciones = array("Nuevos", "Libres", "Asignados", "Resueltos", "Cerrados");
					$vals = array(9, 0, 1, 3, 2);
					for($i = 0; $i < 5; $i++)
					{
						echo '<div class="col px-0 mx-0 w-100 text-center align-middle border" >';
						if($vals[$i] == $tipoTicket)
							echo $secciones[$i];
						else
							echo '<a class="w-100 px-0" style="text-decoration:none" href="/admin.php?tipo='.$vals[$i].'">'. $secciones[$i] .'</a>';
						echo '</div>';
					}
					?>
					
				</div>
			
				<div class="input-group mx-auto justify-content-center">
					<div class="form-outline">
                                            <input type="search" id="directSearch" class="form-control" onChange="search1()"/>
					</div>
					<button type="button" class="btn btn-primary" onClick="search1()">
                                            Buscar
                                        </button>
				</div>
                                <div class="row w-100 mx-auto justify-content-center">
				<?php echo '<a class="col fw-light text-center" style="text-decoration:none" href="/admin.php?tipo='.$tipoTicket.'"> <img src="/iconos/limpiarBusquedaIcono.png" style="height:1.25em">  Limpiar busqueda</a>'?>
				<a class="col fw-light cursorClickIcon text-center" style="text-decoration:none" data-bs-toggle="modal" data-bs-target="#searchModal"><img style="height:1.7em" src="/iconos/busquedaAvanzadaIcono.png">Búsqueda avanzada</a>
                                </div>
				<?php
					$dbh = new PDO('mysql:host=localhost;dbname=base', "root", "");
					$stmt = $dbh->prepare("SELECT *, usuarios.nombre AS cliente, tecnicos.nombre AS tecnico, tecnicos.email AS correo_tecnico, tickets.departamento AS departamento, departamentos.departamento AS nombre_departamento 
                                                               from tickets
                                                               inner join usuarios on id_solicitante = usuarios.Id 
                                                               LEFT JOIN tecnicos ON tecnicos.id_tecnico = tickets.id_tecnico 
                                                               inner join departamentos on tickets.departamento = departamentos.id_departamento
                                                               WHERE estado = ?" . $extra);
                                        $stmt->bindParam(1, $tipoTicket);
					$paramI = 2;
					if(!is_null($keywords))
					{
						$keywords = "%".$keywords."%";
						$stmt->bindParam($paramI, $keywords);
						$stmt->bindParam($paramI+1, $keywords);
						$stmt->bindParam($paramI+2, $keywords);
						$paramI += 3;
					}
					if(!is_null($departamento))
					{
						$stmt->bindParam($paramI, $departamento);
						$paramI += 1;
					}
					if(!is_null($start) && !is_null($end))
					{
						$stmt->bindParam($paramI, $start);
						$stmt->bindParam($paramI+1, $end);
						$paramI += 2;
					}
					if(!is_null($cliente))
					{
						$cliente = "%".$cliente."%";
						$stmt->bindParam($paramI, $cliente);
						$stmt->bindParam($paramI+1, $cliente);
						$paramI += 2;
					}
					if(!is_null($tecnico))
					{
						$tecnico = "%".$tecnico."%";
						$stmt->bindParam($paramI, $tecnico);
						$stmt->bindParam($paramI+1, $tecnico);
						$paramI += 2;
					}
					$stmt->execute();
					if($stmt->rowCount() > 0)
					{
						?>
                                        <div class="px-0 w-100 mx-0" style="height:30em">
                                            <div class="" style="height:80%; overflow-y:scroll">
						<table class="table table-striped mt-2" style="">
							<thead style="">
								<tr class="text-center align-middle">
									<th scope="col"></th>
									<th scope="col">Título</th>
									<th scope="col">Fecha</th>
									<th scope="col">Solicitante</th>
									<th scope="col">Encargado</th>
									<th scope="col">Detalles</th>
								</tr>
							</thead>
							<tbody id="resultsTable">
                                                            <?php
                                                            foreach($stmt as $row)
                                                            {
                                                                echo '<tr class="text-center align-middle py-0" style="height:4em">';
                                                                echo '<td><input type="checkbox" data-codigo="'.$row['codigo'].'" onchange="chkCount(this)"></td>';
                                                                echo '<td style="line-height:1.2em">'. $row['titulo'] .'</td>';
                                                                echo '<td>'. $row['fecha'] .'</td>';
                                                                echo '<td style="line-height:1.2em">'. $row['cliente'] .'</td>';
                                                                if(!is_null($row['tecnico']))
                                                                        echo '<td style="line-height:1.2em">'. $row['tecnico'] .'</td>';
                                                                else
                                                                        echo '<td><a class="text-decoration-none cursorClickIcon" data-departamento="' . $row['nombre_departamento'] . '" onClick="asignar(' . $row['codigo'] . ',' . $row['departamento'] . ', this);">[Asignar]</a></td>';
                                                                echo '<td> <a class="text-decoration-none cursorClickIcon" onClick="detalles('.$row['codigo'].')"> <img src="/iconos/verIcono.png" style="height:1.2em"> </a></td>';
                                                                echo '</tr>';
                                                            }
                                                            ?>
							</tbody>
						</table>
                                                <div style="position:absolute; top:87.5% ">
                                                    <button type="button" class="btn btn-danger py-1 ps-0 pe-2 ms-2 mb-1" id="eliminarBtn" disabled onClick="eliminarDialog()">
                                                       <img src="/iconos/eliminarIcono.png" style="height:1.5em; margin-right:0px"> 
                                                            Eliminar
                                                    </button>
                                                </div>
                                                <div id="alertLoc" class="w-100" style="position: absolute; top: 92.5%; height:7.5%">
                                                </div>
                                            </div>
                                        </div>
						<?php
					}
					else
					{
						echo '<p class="fs-4 mt-4 text-center">No hay resultados</p>';
					}
				?>
			</div>
		</div>

		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="top:3%">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header fw-bold" style="background-image: linear-gradient(40deg, #457fca, #5691c8); color:white">
						<h5 class="modal-title" id="exampleModalLabel" style="margin-left:6.5em">Detalles del ticket</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="row align-items-center mb-1">
							<div class="col-5 fw-bold">Titulo:</div>
							<div class="col-6 text-center" id="oTitulo"></div>
						</div>
						<div class="row align-items-center mb-1">
							<div class="col-5 fw-bold">Codigo:</div>
							<div class="col-6 text-center" id="oCodigo"></div>
						</div>
                                                <div class="row align-items-center mb-1">
                                                    <div class="col-5 col-lg-1 fw-bold">Fecha:</div>
					            <div class="col-6 text-center" id="oFecha"></div>
                                                </div>
						<div class="row align-items-center mb-1">
							<div class="col-5 fw-bold">Cliente:</div>
							<div class="col-6 text-center" id="oCliente"></div>	
						</div>
                                                <div class="row align-items-center mb-1">
                                                        <div class="col-5 col-lg-1 fw-bold">Correo:</div>
							<div class="col-6 text-center" id="oCorreo"></div>
                                                </div>
						<div class="row align-items-center mb-1">
							<div class="col-5 fw-bold">Estado:</div>
							<div class="col-6 text-center" id="oEstado"></div>
						</div>
						<div class="row align-items-center mb-1">
							<div class="col-5 fw-bold">Tema:</div>
							<div class="col-6 text-center" id="oTema"></div>
						</div>
						<div class="row align-items-center mb-1">
							<div class="col-5 fw-bold">Área:</div>
							<div class="col-6 text-center" id="oDepartamento"> aaaa</div>
						</div>
						<div class="row align-items-center mb-1">
							<div class="col-5 fw-bold">Fuente:</div>
							<div class="col-6 text-center" id="oFuente"></div>
						</div>
						<div class="fw-bold my-2" >Descripcion del problema:</div>
						<textarea id="oProblema" style="line-height:1.2em" class="boxsizingBorder" readonly></textarea>
						<div id="modalOpt" class="my-2"></div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
						<button type="button" class="btn btn-primary" data-bs-dismiss="modal" onClick="editar()">Modificar</button>
						<?php 
							if($tipoTicket == 3)
								echo '<button type="button" class="btn btn-primary" data-bs-dismiss="modal" onClick="aceptarResolucion()">Cerrar ticket</button>'
						?>
					</div>
				</div>
			</div>
		</div>
            
              
            
                <footer class="container px-0 p-0 w-100" style="max-width:100%; min-width:100%; position: fixed; bottom: 0%; left: 0%; height:10%; background-image: linear-gradient(40deg, #1d976c, #93f9b9); color:white; font-weight: bold">
                    <div class="row w-100 h-100 px-0 mx-0 py-0 " >

                            <div class="col text-center border p-0 m-0 d-sm-flex flex-sm-column align-items-sm-center" id="pestanaForo" style="background-image: linear-gradient(130deg, #ff7e5f, #feb47b)">
                                    <div class="p-0 m-0 texto-pestana" style="color:white; text-shadow: 2px 2px 4px #000000;">
                                        Solicitudes
                                    </div>
                                    <div class="p-0 m-0 text-center">
                                            <img src="iconos/solicitudesIcono.png" width="17%">
                                    </div>
                            </div>

                      

                            <div class="col text-center border px-0" id="pestanaChat" onclick="irAChat()">
                                <a href="/nuevoticket.php" style="text-decoration:none; color:white; text-shadow: 2px 2px 4px #000000;">
                                    <div class="p-0 m-0 texto-pestana">
                                        Nuevo Ticket
                                    </div>
                                    <div class="p-0 m-0 text-center">
                                            <img src="iconos/nuevoTicketIcono.png" width="50em">
                                    </div>
                                </a>
                            </div>

                    </div>
                </footer>

		<div class="modal fade" style="top: 26%; width:95%; left:2.5%" id="warnModal" tabindex="-1" aria-labelledby="warnModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header text-white fw-bold" style="background-image: linear-gradient(40deg, #ff4b1f, #ff9068);">
						<h5 class="modal-title" id="warnModalLabel" style="margin-left: 35%">Eliminar tickets</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
					<p id="modalWarnMsg" class="text-center"></p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
						<button type="button" class="btn btn-danger" data-bs-dismiss="modal" onClick="eliminar()">Eliminar</button>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true" style="width: 95%; top:6.5%; left:2.5%">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header" style="background-image: linear-gradient(40deg, #457fca, #5691c8);">
						<h5 class="modal-title text-white fw-bold" style="margin-left:6.1em" id="searchModalLabel">Búsqueda avanzada</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="mb-2">
							<label for="smKeywords" class="form-label">Código, título o descripción</label>
							<input type="search" class="form-control form-control-sm" id="smKeywords"/>
						</div>
						<div class="mb-2"> 
                                                    <label for="smEstado" class="form-label">Buscar por estado del ticket</label>
                                                    <select class="form-select form-select-sm" id="smEstado" aria-label="Select">
                                                        <option value="9">Entrantes</option>
                                                        <option value="0">Libres</option>
                                                        <option value="1">Asignados</option>
                                                        <option value="3">Resueltos</option>
                                                        <option value="2">Cerrados</option>						
                                                    </select>
						</div>
						<div class="mb-2">
                                                        <?php
                                                            $dbh = new PDO('mysql:host=localhost;dbname=base', "root", "");
                                                            $stmt = $dbh->prepare("SELECT id_departamento, departamento 
                                                                                   FROM departamentos
                                                                                   WHERE id_departamento != -1
                                                                                   ORDER BY departamento
                                                                                  ");
                                                            $stmt->execute();
                                                        ?>
							<label for="smDepartamento" class="form-label">Buscar por área</label>
							<select class="form-select form-select-sm" id="smDepartamento" aria-label="Select">
                                                            <option value="-1" selected>Cualquiera</option>
                                                            <?php
                                                                foreach($stmt as $row)
                                                                {
                                                                    $id_departamento = $row['id_departamento'];   
                                                                    $departamento = $row['departamento'];
                                                                    echo '<option value="' . $id_departamento . '">' . $departamento . '</option>';
                                                                }
                                                            ?>
<!--								
                                                            <option value="0">Soporte</option>
                                                            <option value="1">Redes</option>
                                                            <option value="2">Servidores</option>-->
							</select>
						</div>
						<div class="mb-2">
							<label for="smCliente" class="form-label">Buscar por cliente</label>
							<input type="text" class="form-control form-control-sm" id="smCliente">
						</div>
						<div class="mb-2">
							<label for="smTecnico" class="form-label">Buscar por especialista</label>
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

		<div class="modal fade" style="top:10%" id="asignarModal" tabindex="-1" aria-labelledby="asignarModalLabel" aria-hidden="true">
			<div class="modal-dialog" style="height:90% ;">
				<div class="modal-content border" style="height:80%">
                                        <div class="modal-header" style="background-image: linear-gradient(40deg, #457fca, #5691c8); color:white">
                                                <h5 class="modal-title fw-bold" id="asignarModalLabel" style="margin-left:32%">Asignar especialista</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body border" style="height:60%">
                                            <p class="lead">Seleccionar encargado</p>
                                            <input type="search" id="tecnicoSearch" class="form-control mb-2" onInput="getTecnicos(this.value)"/>
    <!--                                        <div class="row text-center">
                                                <div class="col-6">
                                                    Nombre
                                                </div>
                                                <div class="col-6">
                                                    Cargo
                                                </div>
                                            </div>-->
                                            <div id="mensajeArea" class="row my-2">
                                                <div class="col-3 fw-bold text-start"> 
                                                    Area:
                                                </div>
                                                <div id="areaIndicador" class="col-9 text-start">
                                                    
                                                </div>
                                            </div>
    
                                            <div class=" border border-primary h-50" >
                                                <div class="row border border-danger mx-auto px-auto">
                                                    <div class="col-6 text-center border">
                                                        Nombre
                                                    </div>
                                                    <div class="col-3 text-center border ">
                                                        Cargo
                                                    </div><!-- comment -->
                                                    <div class="col-3 text-center border">
                                                        N° tickets
                                                    </div>
                                                </div>
                                                <ul class="list-group" id="listaTecnicos">

                                                </ul>
                                            </div>
                                            <div class="modal-footer border">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            </div>
                                        </div>
                                </div>
			</div>
		</div>

		<script>
			var editCode = -1;
			var tipoTicket = <?php echo $tipoTicket; ?>;
			var codigos = [];
			var codigoTicket = null;
			var checkboxCount = 0;
			var checkList = document.getElementById("resultsTable");
                        const alertLoc = document.getElementById("alertLoc");
                        
                        var nombreDepartamento = null;
                        const areaIndicador = document.getElementById("areaIndicador");
                        
                       
			if(checkList !== null)
			{
				checkList=checkList.getElementsByTagName("input");
				for (var i=0; i<checkList.length; i++)
				{
					checkboxCount += checkList[i].checked;
				}
			}
                        
                        function reload()
                        {
                            location.reload(true);
                        }

			function aceptarResolucion()
			{
				var obj = {
					codigo: editCode
				};

				var xhr = new XMLHttpRequest();
				xhr.open("POST", "/api/ticketUpdate.php?type=2", true);
				xhr.onload = function (e) {
					if (xhr.readyState === 4) {
						if (xhr.status === 200) {
							console.log(xhr.response);
                                                        alertLoc.innerHTML =`
                                                                <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                                                                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                                                        El ticket ha sido cerrado.
                                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                                </div>`;
                                                        setTimeout(reload, 4000);	
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

			function editar(codigo)
			{
				let request = "editarTicket.php?" + "mode=0&codigo="+editCode + "&tipo=" + tipoTicket;
				request+= "&b="+btoa(window.location.href);
				window.location.href = request;
			}

			function getTecnicos(departamento)
			{
                            let obj = {departamento: departamento};

                            let xhr = new XMLHttpRequest();
                            xhr.open("POST", "/api/getTecnicosDepartamento.php", true);
                            xhr.onload = function (e) {
                                if (xhr.readyState === 4) {
                                        if (xhr.status === 200) {
                                            
                                            let tecnicos = document.getElementById("listaTecnicos");
                                            tecnicos.textContent = '';
                                            let response = JSON.parse(xhr.response);
                                            
                                            
                                            for(var i = 0; i < response.length; i++)
                                            {
                                                const tecnico = response[i];

                                                let node = document.createElement("LI");
                                                node.setAttribute("class", "list-group-item list-group-item-action px-0 py-0"); 
                                                node.setAttribute("onClick", "asignarTecnico("+codigoTicket+","+tecnico.id_tecnico+")");
                                                node.setAttribute("data-bs-dismiss", "modal");
                                                
                                                let filaDatos = document.createElement("div");
                                                filaDatos.setAttribute("class", "row px-0 mx-auto g-0");

                                                let nombre = document.createElement("div");
                                                nombre.setAttribute("class", "col-6 text-center border px-0 mx-auto");
                                                nombre.appendChild( document.createTextNode(tecnico.nombre + tecnico.apellido_p + tecnico.apellido_m) );
                                                filaDatos.appendChild(nombre);

                                                let cargo = document.createElement("DIV");
                                                cargo.setAttribute("class", "col-3 text-center border px-0 mx-auto");
                                                cargo.appendChild( document.createTextNode(tecnico.cargo));
                                                filaDatos.appendChild(cargo);

                                                let cantTickets = document.createElement("DIV");
                                                cantTickets.setAttribute("class", "col-3 text-center border px-0 mx-auto");
                                                cantTickets.appendChild(document.createTextNode("" + tecnico.cant_tickets + ""));
                                                filaDatos.appendChild(cantTickets);

                                                
                                                node.appendChild(filaDatos);
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
			
			function asignarTecnico(codigo, tecnico)
			{
                            let obj = {
                                tecnico: tecnico,
                                codigo: codigo
                            };

                            let xhr = new XMLHttpRequest();
                            xhr.open("POST", "/api/asignar.php", true);
                            xhr.onload = function (e) {
                                if (xhr.readyState === 4) {
                                    if (xhr.status === 200) {
                                        console.log(xhr.response);
                                        alertLoc.innerHTML =`
                                            <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                                El ticket ha sido asignado.
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>`;
                                        setTimeout(reload, 4000);
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
                        
                        

			function asignar(codigo, departamento, elementoData) //Dialogo modal
			{
                            
                            codigoTicket = codigo;
                            areaIndicador.innerHTML = elementoData.getAttribute("data-departamento");
                            getTecnicos(departamento);
                            document.getElementById('tecnicoSearch').value = "";
                            var myModal = new bootstrap.Modal(document.getElementById('asignarModal'));
                            myModal.toggle();
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

				let request = "/admin.php?tipo="+estado;
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

			function search1()
			{
				let request = "/admin.php?tipo="+tipoTicket;
				request += "&keywords="+document.getElementById("directSearch").value;

				window.location.href = request;
			}
			
                    function eliminarDialog()
                    {
                        codigos = [];
                        for (var i=0; i<checkList.length; i++)
                        {
                                if(checkList[i].checked)
                                {
                                        codigos.push(checkList[i].getAttribute("data-codigo"));
                                }
                        }


                        document.getElementById("modalWarnMsg").innerHTML =
                        "Está apunto de eliminar "+ codigos.length +" ticket(s). ¿Desea continuar?";

                        var myModal = new bootstrap.Modal(document.getElementById('warnModal'));
                        myModal.toggle();
                    }

                    function eliminar()
                    {
                            var xhr = new XMLHttpRequest();
                            xhr.open("POST", "/api/eliminarTickets.php", true);
                            xhr.onload = function (e) {
                                    if (xhr.readyState === 4) {
                                            if (xhr.status === 200) {
                                                    console.log(xhr.response);
                                                    alertLoc.innerHTML =`
                                                            <div class="alert alert-success d-flex align-items-center alert-dismissible fade show fw-bold border" role="alert">
                                                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                                                    El ticket(s) será eliminado.
                                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                            </div>`;
                                                    setTimeout(reload, 4000);
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

			function chkCount(checkbox)
			{
                            var btn = document.getElementById("eliminarBtn");
                            if(checkbox.checked)
                                checkboxCount++;
                            else
                                checkboxCount--;

                            if(checkboxCount > 0)
                                btn.removeAttribute("disabled");
                            else
                                btn.setAttribute("disabled", "");
			}


			function detalles(codigo)
			{
                            editCode = codigo;
                            var obj = {codigo: codigo};

                            var xhr = new XMLHttpRequest();
                            xhr.open("POST", "/api/detalles.php", true);
                            xhr.onload = function (e) {
                                if (xhr.readyState === 4) {
                                    if (xhr.status === 200) {
                                        var response = JSON.parse(xhr.response);
                                        if(response === false)
                                                window.location.reload(true); 
                                        console.log(response);
                                        document.getElementById("oTitulo").innerHTML = response.titulo;
                                        document.getElementById("oFuente").innerHTML = response.fuente;
                                        document.getElementById("oDepartamento").innerHTML = response.departamento;
                                        document.getElementById("oTema").innerHTML = response.tipo;
                                        document.getElementById("oEstado").innerHTML = response.estado;
                                        document.getElementById("oFecha").innerHTML = response.fecha;
                                        document.getElementById("oCodigo").innerHTML = response.codigo;
                                        document.getElementById("oProblema").innerHTML = response.problema;
                                        document.getElementById("oCliente").innerHTML = response.nombre;
                                        document.getElementById("oCorreo").innerHTML = response.correo;
                                        document.getElementById("oProblema").innerHTML = response.desc_problema;
                                        if(response.tecnico !== null && response.correo_tecnico !== null)
                                        {
                                                document.getElementById("modalOpt").innerHTML = `
                                                <div class="row align-items-center mb-1">
                                                        <div class="col-3 fw-bold">Especialista:</div>
                                                        <div class="col">${response.tecnico}</div>
                                                        <div class="w-100 d-block d-lg-none"></div>
                                                        <div class="col-3 col-lg-1 fw-bold">Correo:</div>
                                                        <div class="col">${response.correo_tecnico}</div>
                                                </div>
                                                <div class="fw-bold mt-4">Respuesta a la consulta:</div>
                                                <textarea class="boxsizingBorder" readonly>${response.resolucion_problema}</textarea>
                                                `;
                                        }
                                        else
                                                document.getElementById("modalOpt").innerHTML = "";

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
		<!-- Bootstrap Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	</body>
</html>
