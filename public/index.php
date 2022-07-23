<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Bootstrap CSS -->
		<link href="/styles/style.css" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

		<title>Tele-Ticket</title>
	</head>
	<body>
		

		<div class="container">
			<h2 class="text-center p-3">Sistema de ayuda</h2>
			<div class="row justify-content-end">
				<div class="col-auto">
					<a class="btn btn-primary" href="/consultar.php">Revisar solicitudes</a>
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
							echo '<p class="lead text-center">Su solicitud ha sido enviada.</p>';
							echo '<p class="text-center"><a href="/">Volver</a></p>';
						}
					}
					else
					{
				?>
                                        
					<form>
						<p class="text-white bg-primary p-1 text-center fw-bold">Formulario de solicitud de atención</p>
						<div class="container pb-3">
<!--							<div class="row justify-space-evenly">-->
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
<!--							</div>-->
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
						<div id="errorO" class="text-center fw-bold"></div>
                                                <div class="text-end me-2">
                                                    <button type="button" class="btn btn-primary" onClick="sendFun()">Enviar</button>
                                                </div>
					</form>

					<script>

function err(message)
{
	document.getElementById("errorO").innerHTML += `<p class="text-danger">${message}</p>`;
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
	</body>
</html>

