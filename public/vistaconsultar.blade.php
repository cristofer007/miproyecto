<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Bootstrap CSS -->
		<link href="/styles/style.css" rel="stylesheet">
                <script src="bootstrap.bundle.min.js"></script>
                <script src="popper.min.js"></script>
                <link href="bootstrap.min.css" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
                <script src="anime.min.js"></script>
		<title>Sistema de ayuda</title>
                
                <style>
                
                    .elementoLista
                    {
                        
                        transition: transform 2s;
                    }
                    
                    .imagenVerDetalles
                    {
                        opacity: 0.65;
                        transition: transform 0.5s, opacity 0.5s;
                    }
                    
                    .imagenVerDetalles:hover
                    {
                        opacity: 1;
                        transform: rotate(-45deg);    
                    }
                    
                    
                </style>
	</head>
	<!--*****-->
	<!--***************************************************************************************************************************
********************************  BODY  **************************************************************************************************************
*******************************************************************************************************************************-->

	
	<body>
                <header class="text-center" style="height: 20%;" >
                    
                    <h2 class="p-3">Sistema de ayuda</h2>   
                    
                </header>
                <div class="row justify-content-end">
                    <a class="col text-start ms-3" href="/vistaindex" style="text-decoration: none">
                        <div>
                            <img src="iconos/volverIcono.png" style="height:2em">
                            <small>Volver</small>
                        </div>
                    </a>
                    <div class="col-auto">
                        <a class="btn btn-primary me-3" href="/vistalogin">Ingresar</a>
                    </div>
                </div>
		<div class="container">
			
			

			<div class="container bg-light mb-4 mt-2 p-2">
				<p class="text-white p-1 fw-bold text-center" style="background-image: linear-gradient(50deg, #457fca, #5691c8); color:white;">Consulta de solicitud</p>
				<p class="text-muted text-center">Para ver el estado de su solicitud(es), ingrese la dirección de correo electronico que proporcionó al momento de realizar su consulta.</p>
				<div class="mb-3">
					<label for="correoI" class="form-label">Correo electrónico:</label>
					<input type="email" class="form-control" id="correoI"  onChange="consultar()">
				</div>
                                <div class="text-end">
				<button type="button" class="btn btn-primary" onClick="consultar()">Consultar</button>
                                </div>
                                <div>
				<div id="errorO"></div>
				<?php
					if (!empty($_GET) && isset($_GET['mail']))
					{
						$dbh = new PDO('mysql:host=localhost;dbname=teleticket', "root", "");
						$stmt = $dbh->prepare(
						"SELECT * from usuarios WHERE email = ?");
						$stmt->bindParam(1, $_GET['mail']);
						$stmt->execute();
						if($stmt->rowCount() > 0)
						{
							$usuario = $stmt->fetch(PDO::FETCH_ASSOC);
							echo <<<EOT
							<p class="text-white p-1 mt-4 mb-2 fw-bold text-center" style="background-image: linear-gradient(50deg, #457fca, #5691c8); color:white;">Resultados de la consulta</p>
							<div class="row align-items-center mb-1">
								<div class="col-3 fw-bold">Cliente:</div>
								<div class="col">{$usuario["nombres"]}</div>
							</div>
							<div class="row align-items-center mb-1">
								<div class="col-3 fw-bold">Correo:</div>
								<div class="col">{$usuario["email"]}</div>
							</div>
							<div class="row align-items-center mb-1">
								<div class="col-3 fw-bold">Teléfono:</div>
								<div class="col">{$usuario["telefono"]}</div>
							</div>
							EOT;
						}
						$stmt = $dbh->prepare(
						"SELECT *, usuarios.nombres AS cliente, especialistas.nombre AS tecnico, especialistas.email AS correo_tecnico, estados_tickets.estado AS estadodesc
						from tickets
						inner join usuarios on id_usuario = usuarios.email
						inner join estados_tickets on estados_tickets.id_estado = tickets.id_estado 
						LEFT JOIN especialistas ON especialistas.id_especialista = tickets.id_especialista WHERE tickets.id_invitado = ?");
						$stmt->bindParam(1, $_GET['mail']);
						$stmt->execute();
						if($stmt->rowCount() > 0)
						{
							?>
							<table class="table table-striped mt-4">
								<thead>
									<tr>
										<th class="border border-danger text-center" scope="col">Codigo</th>
										<th class="border border-danger text-center" scope="col">Fecha</th>
										<th class="border border-danger text-center" scope="col">Estado</th>
										<th class="border border-danger text-center" scope="col">Encargado</th>
										<th class="border border-danger text-center" scope="col text-center">Detalles</th>
									</tr>
								</thead>
								<tbody id="resultsTable">
									<?php
									foreach($stmt as $row)
									{
										echo '<tr class="border border-danger text-center elementoLista" >';
										echo '<td class="border border-danger text-center">'. $row['codigo'] .'</td>';
										echo '<td class="border border-danger text-center">'. $row['fecha'] .'</td>';
										echo '<td class="border border-danger text-center">'. $row['estadodesc'] .'</td>';
										if(!is_null($row['tecnico']))
											echo '<td>'. $row['tecnico'] .'</td>';
										else
											echo '<td>Sin asignar</td>';
										echo '<td class="border border-danger"> <a class="text-decoration-none cursorClickIcon text-center" onClick="detalles('.$row['codigo'].')"> <img class="imagenVerDetalles" src="iconos/verDetallesIcono.png" height="25em"> </a></td>';
										echo '</tr>';
									}
									?>
								</tbody>
							</table>
							<?php
						}
						else
						{
							echo '<hr><p class="fs-4 mt-4">No se encuentran solicitudes para este correo.</p>';
						}
					}
				?>
			</div>
		</div>
            
            
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header container text-center w-100" style="background-image: linear-gradient(50deg, #457fca, #5691c8); color:white">
                                                <h5 class="modal-title text-center" id="exampleModalLabel">Detalles de consulta</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>                    
					</div>
					<div class="modal-body">
						<div class="row align-items-center mb-1">
							<div class="col-3 fw-bold">Titulo:</div>
							<div class="col" id="oTitulo"></div>
						</div>
						<div class="row align-items-center mb-1">
							<div class="col-3 fw-bold">Codigo:</div>
							<div class="col" id="oCodigo"></div>
							<div class="col-2 col-lg-1 fw-bold">Fecha:</div>
							<div class="col" id="oFecha"></div>
						</div>
						<div class="row align-items-center mb-1">
							<div class="col-3 fw-bold">Usuario:</div>
							<div class="col" id="oCliente"></div>
							<div class="w-100 d-block d-lg-none"></div>
							<div class="col-3 col-lg-1 fw-bold">Correo:</div>
							<div class="col" id="oCorreo"></div>
						</div>
						<div class="row align-items-center mb-1">
							<div class="col-3 fw-bold">Estado:</div>
							<div class="col" id="oEstado"></div>
						</div>
						<div class="row align-items-center mb-1">
							<div class="col-3 fw-bold">Tema:</div>
							<div class="col" id="oTema"></div>
						</div>
						<div class="row align-items-center mb-1">
							<div class="col-3 fw-bold">Departamento:</div>
							<div class="col" id="oDepartamento"> aaaa</div>
						</div>
						<div class="row align-items-center mb-1">
							<div class="col-3 fw-bold">Fuente:</div>
							<div class="col" id="oFuente"></div>
						</div>
                                                <hr>
						<div class="fw-bold mt-4">Descripcion del problema:</div>
						<textarea id="oProblema" class="boxsizingBorder" readonly></textarea>
						<div id="modalOpt"></div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
		</div>
		<script>
                    var elementosListado = document.querySelectorAll('.elementoLista');
                    anime({
                            targets: elementosListado,
                            translateX: 0,
                            opacity: '100%',
                            delay: anime.stagger(150)
                        });
                    
			function err(message)
			{
				document.getElementById("errorO").innerHTML = `<p class="text-danger m-2">${message}</p>`;
			}

			function consultar()
			{	
				correo = document.getElementById("correoI").value;
				
				if(correo === "")
				{
					err("El campo de correo no debe estar vacío.");
					return;
				}
				else if (!document.getElementById("correoI").checkValidity())
				{
					err("El correo es inválido.");
					return;
				}
				window.location.href = '/vistaconsultar.blade.php?mail='+correo;
			}

			function detalles(codigo)
			{
				var obj = {codigo: codigo};

				var xhr = new XMLHttpRequest();
				xhr.open("POST", "/api/detalles.php", true);
				xhr.onload = function (e) {
					if (xhr.readyState === 4) {
						if (xhr.status === 200) {
							var response = JSON.parse(xhr.response);
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
								if(response.telefono_tecnico === null)
									response.telefono_tecnico = "-";
								
								document.getElementById("modalOpt").innerHTML = `
								<div class="row align-items-center mb-1">
									<div class="col-3 fw-bold">Técnico:</div>
									<div class="col">${response.tecnico}</div>
									<div class="w-100 d-block d-lg-none"></div>
									<div class="col-3 col-lg-1 fw-bold">Correo:</div>
									<div class="col">${response.correo_tecnico}</div>
								</div>
								<div class="row align-items-center mb-1">
									<div class="col-3 fw-bold">Telefono:</div>
									<div class="col">${response.telefono_tecnico}</div>
								</div>
								<div class="fw-bold mt-4">Respuesta del técnico:</div>
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
                
                <script>
                    
                    
                </script>
                
		<!-- Bootstrap Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	</body>
</html>

