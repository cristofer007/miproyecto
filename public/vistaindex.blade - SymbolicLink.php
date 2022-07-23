<!doctype html>
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
	<!--*****-->

	<body>
		

		<div class="container">
                    <header >
                       
                            <h2 class="text-center p-3">Sistema de ayuda</h2>
                        
			
                    </header>   
                    <div class="row justify-content-end p-0">
                        <div class="col-auto h-100 m-0">
                                <a class="btn btn-primary" href="/vistaconsultar">Consultar solicitudes</a>
                        </div>
                        <div class="col-auto h-100 m-0">
                                <a class="btn btn-primary me-1" href="/vistalogin">Ingresar</a>
                        </div>
                    </div>
			<div class="container bg-light mb-2 p-2">
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
							</div><!-- comment -->
							<div class="row">
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
                                                    <button type="button" class="btn btn-primary text-right" onClick="sendFun()">Enviar</button>
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
		err("El correo electrónico ingresado es inválido.");
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
                correo: correo,
		nombres: nombre, 
                apellidos: nombre2,
		telefono: telefono
	};

	var xhr = new XMLHttpRequest();
	xhr.open("POST", "/addUserAsync.php", true);
	xhr.onload = function (e) {
		if (xhr.readyState === 4) {
			if (xhr.status === 200) {
				var objTicket = {
					nombre:       nombre,
					correo:       correo,
					titulo:       "Sin titulo",
					estado:       9, //Entrante
					fuente:       3, //Formulario
					tema:         "Sin tema",
					area:         -1, //Sin asignar
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
	
                
        </body>
</html>

