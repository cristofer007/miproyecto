<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Bootstrap CSS -->
		<link href="/styles/style.css" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

		<title>Panel de administración</title>
	</head>
	<body>
		<div class="container">
			<h2 class="text-center py-3 px-0">Sistema de ayuda</h2>
			<div class="row justify-content-end">
				<div class="col-auto">
					<a class="btn btn-primary" href="/index.php">Salir</a>
				</div>
			</div>
			
			

			<div class="container bg-light mb-4 p-2">
				<div class="row mb-4">
					<div class="col-3 text-start" >
                                            <a class="text-start ms-3" href="/admin.php" style="text-decoration: none">
                                               
                                                    <img src="iconos/volverIcono.png" style="height:2em">
                                                    <small>Volver</small>
                                            </a>
					</div>
					<div class="col-3 text-center">
                                            <a href="/admin.php" >Libres</a>
					</div>
					<div class="col-3 text-center">
                                            <a href="/admin.php?tipo=1">Asignados</a>
					</div>
					<div class="col-3 text-center">
                                            <a href="/admin.php?tipo=2">Resueltos</a>
						
					</div>
				</div>
				
				<form>
					<p class="text-white bg-primary p-1 fw-bold">Usuario</p>
					<div class="container pb-3">
						<div class="mb-1">
							<div class="row justify-space-evenly">
								<div class="col">
									<label class="form-label">Nombre: </label>
                                                                        <p id="nombreI">Seleccione un usuario</p>
								</div>
								<div class="col">
									<button  type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Seleccionar usuario</button>
								</div>
							</div>
						</div>
						<div class="mb-2">
							<label class="form-label">Correo: </label><p id="correoI"></p>
						</div>
					
					
<!--						</div>-->
						<div class="mb-2">
							<label for="fuenteI" class="form-label">Fuente</label>
                                                        
							<select class="form-select" id="fuenteI" aria-label="Select">
                                                               <option value="0" selected>Teléfono</option>
                                                               <option value="3">Formulario</option>
                                                               <option value="1">E-mail</option>
                                                               <option value="2">Chat</option>
							</select>
						</div>
						<div class="mb-2">
							<label for="temaI" class="form-label">Tema asociado</label>
							<input class="form-control" type="text" list="temalist" id="temaI">
							
						</div>
						<div class="mb-2">
							<label for="departamentoI" class="form-label">Área</label>
                                                        
							<select class="form-select" id="departamentoI" aria-label="Select">
                                                            
								<option value="0" selected>Psicopedagogía</option>
								<option value="1">Soporte TI</option>
								<option value="2">Biblioteca</option>
                                                                <option value="3">Docencia</option>
							</select>
						</div>
                                            

                                               
						<div class="mb-2">
							<label for="problemaI" class="form-label">Descripcion del problema</label>
							<textarea class="form-control" id="problemaI"></textarea>
						</div>
						<div class="mb-2">
							<label for="respuestaI" class="form-label">Respuesta inicial</label>
							<textarea class="form-control" id="respuestaI"></textarea>
						</div>
					</div>
					<p class="text-danger text-center" id="errorO"></p>
                                        <div id="alertLoc">
                                        </div>
			
                                        <div class="row justify-content-end">
                                            <button type="button" class="col-3 btn btn-primary me-4 fw-bold" onClick="sendFun()">Crear ticket</button>
                                        </div>
				</form>
                              </div>  
		</div>
                        
                <footer class="container px-0 p-0 w-100" style="max-width:100%; min-width:100%; position: fixed; bottom: 0%; left: 0%; height:10%; background-image: linear-gradient(40deg, #1d976c, #93f9b9); color:white; font-weight: bold">
                    <div class="row w-100 h-100 px-0 mx-0 py-0 " >

                            <div class="col text-center border p-0 m-0 d-sm-flex flex-sm-column align-items-sm-center" id="pestanaForo">
                                <a href="/admin.php" style="text-decoration:none; color:white; text-shadow: 2px 2px 4px #000000;">    
                                    <div class="p-0 m-0 texto-pestana" style="color:white; text-shadow: 2px 2px 4px #000000;">
                                        Solicitudes
                                    </div>
                                    <div class="p-0 m-0 text-center">
                                            <img src="iconos/solicitudesIcono.png" width="17%">
                                    </div>
                                </a>
                            </div>


                            <div class="col text-center border px-0" id="pestanaChat" onclick="irAChat()" style="background-image: linear-gradient(130deg, #ff7e5f, #feb47b)">
                                
                                    <div class="p-0 m-0 texto-pestana">
                                        Nuevo Ticket
                                    </div>
                                    <div class="p-0 m-0 text-center">
                                        <img src="/iconos/nuevoTicketIcono.png" width="50em">
                                    </div>
                            </div>

                    </div>
                </footer>
		

		<script>
                    
                    
                    
		var usrList = [
			<?php
				$dbh = new PDO('mysql:host=localhost;dbname=base', "root", "");
				$stmt = $dbh->prepare("SELECT * from Usuarios");
				$stmt->execute();
				foreach($stmt as $row)
				{
					echo '{ Nombre: "'. $row['Nombre'] . '", Correo: "'. $row['Correo'] .'" },';
				}
			?>
		];
                
                
		</script>

		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header" style="background-image: linear-gradient(50deg, #457fca, #5691c8); color:white">
						<h5 class="modal-title" id="exampleModalLabel" style="margin-left:31%">Cambiar usuario</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">

					<form class="mb-2">
						<p class="lead fw-bold">Agregar usuario</p>
						<div class="mb-3">
                                                    <label for="nombreIMf" class="form-label">Nombre</label>
                                                    <input type="text" class="form-control" id="nombreIMf">
						</div>
						<div class="mb-3">
                                                    <label for="correoIMf" class="form-label">Correo</label>
                                                    <input type="email" class="form-control" id="correoIMf">
						</div>
                                                <div class="row justify-content-end">
                                                    <button type="button" class="btn btn-primary col-2 me-3 px-0" onClick="addUser()" data-bs-dismiss="modal">Agregar</button>
                                                </div>
                                        </form>

					<p class="lead fw-bold">Buscar existente</p>
					<ul class="list-group" id="listaModal">
												
					</ul>
					</div>
					<div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onClick="selUser()">Seleccionar</button>
					</div>
				</div>
			</div>
		</div>

		<script>
			function sendFun()
			{
				var obj = {
					nombre:       document.getElementById("nombreI").innerHTML,
					correo:       document.getElementById("correoI").innerHTML,
					titulo:       document.getElementById("tituloI").value,
					estado:       parseInt(document.getElementById("estadoI").value),
					fuente:       parseInt(document.getElementById("fuenteI").value),
					tema:         document.getElementById("temaI").value,
					departamento: parseInt(document.getElementById("departamentoI").value),
					respuesta:    document.getElementById("respuestaI").value,
					problema:     document.getElementById("problemaI").value
				};

				if(obj.correo === "")
				{
					document.getElementById("errorO").innerHTML = "Seleccione un usuario primero.";
					return;
				}
				else
					document.getElementById("errorO").innerHTML = "";

				var xhr = new XMLHttpRequest();
				xhr.open("POST", "/ticketAsync.php", true);
				xhr.onload = function (e) {
					if (xhr.readyState === 4) {
						if (xhr.status === 200) {
							console.log(xhr.response);
						} else {
							console.error(xhr.statusText);
						}
					}
				};
				xhr.onerror = function (e) {
					console.error(xhr.statusText);
				};
				xhr.send(JSON.stringify(obj));

				document.getElementById("alertLoc").innerHTML =`
				<div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
					<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
					Ticket creado exitosamente.
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>`;

				document.getElementById("nombreI").innerHTML = "";
				document.getElementById("correoI").innerHTML = "";
				document.getElementById("tituloI").value = "";
				document.getElementById("estadoI").value = 0;
				document.getElementById("fuenteI").value = 0;
				document.getElementById("temaI").value = "";
				document.getElementById("departamentoI").value = 0;
				document.getElementById("respuestaI").value = "";
				document.getElementById("problemaI").value = "";
			}

			var active = -1;
			function selFun(index)
			{
				active = index;
				c = document.getElementById("listaModal").children; 
				var i
				for(i = 0; i < c.length; i++)
				{
					let node = c[i];
					if(i == index)
					{
						node.setAttribute("class", "list-group-item list-group-item-action active");
						node.setAttribute("aria-current", "true");
					}
					else
					{
						node.setAttribute("class", "list-group-item list-group-item-action");
						node.removeAttribute("aria-current");
					}
				}
			}

			function addUser(index)
			{
				var obj = {
					Nombre: document.getElementById("nombreIMf").value,
					Correo: document.getElementById("correoIMf").value,
					Telefono: null
				}

				var xhr = new XMLHttpRequest();
				xhr.open("POST", "/addUserAsync.php", true);
				xhr.onload = function (e) {
					if (xhr.readyState === 4) {
						if (xhr.status === 200) {
							var code = parseInt(xhr.response);
							if(code == 0)
							{
								usrList.push(obj);
								document.getElementById("nombreI").innerHTML = obj.Nombre;
								document.getElementById("correoI").innerHTML = obj.Correo;

								var node = document.createElement("LI");
								node.setAttribute("class", "list-group-item list-group-item-action"); 
								node.setAttribute("onClick", "selFun("+(usrList.length-1)+")"); 
								var textnode = document.createTextNode(obj.Nombre);
								node.appendChild(textnode);
								document.getElementById("listaModal").appendChild(node);
							}
							else
								alert('Este correo ya existe en el sistema.');
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

			function selUser()
			{
				if(active >= 0)
				{
					document.getElementById("nombreI").innerHTML = usrList[active].Nombre;
					document.getElementById("correoI").innerHTML = usrList[active].Correo;
				}
			}

			var i
			for(i = 0; i < usrList.length; i++)
			{
				var node = document.createElement("LI");
				node.setAttribute("class", "list-group-item list-group-item-action"); 
				node.setAttribute("onClick", "selFun("+i+")"); 
				var textnode = document.createTextNode(usrList[i].Nombre);
				node.appendChild(textnode);
				document.getElementById("listaModal").appendChild(node); 
			}
			
		</script>
		<br><br><br>
		<!-- Bootstrap Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
<!--    function sendFun()
			{
				var obj = {
					nombre:       document.getElementById("nombreI").innerHTML,
					correo:       document.getElementById("correoI").innerHTML,
					titulo:       document.getElementById("tituloI").value,
					estado:       0,
					fuente:       parseInt(document.getElementById("fuenteI").value),
					tema:         document.getElementById("temaI").value,
					departamento: parseInt(document.getElementById("departamentoI").value),
					respuesta:    document.getElementById("respuestaI").value,
					problema:     document.getElementById("problemaI").value
				};

				if(obj.correo === "")
				{
					document.getElementById("errorO").innerHTML = "Seleccione un usuario primero.";
					return;
				}
				else
					document.getElementById("errorO").innerHTML = "";

				var xhr = new XMLHttpRequest();
				xhr.open("POST", "/ticketAsync.php", true);
				xhr.onload = function (e) {
					if (xhr.readyState === 4) {
						if (xhr.status === 200) {
							console.log(xhr.response);
						} else {
							console.error(xhr.statusText);
						}
					}
				};
				xhr.onerror = function (e) {
					console.error(xhr.statusText);
				};
				xhr.send(JSON.stringify(obj));

				document.getElementById("alertLoc").innerHTML =`
				<div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
					<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
					Ticket creado exitosamente.
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>`;

				document.getElementById("nombreI").innerHTML = "";
				document.getElementById("correoI").innerHTML = "";
				document.getElementById("tituloI").value = "";
				document.getElementById("estadoI").value = 0;
				document.getElementById("fuenteI").value = 0;
				document.getElementById("temaI").value = "";
				document.getElementById("departamentoI").value = 0;
				document.getElementById("respuestaI").value = "";
				document.getElementById("problemaI").value = "";
			}

			var active = -1;
			function selFun(index)
			{
				active = index;
				c = document.getElementById("listaModal").children; 
				var i
				for(i = 0; i < c.length; i++)
				{
					let node = c[i];
					if(i == index)
					{
						node.setAttribute("class", "list-group-item list-group-item-action active");
						node.setAttribute("aria-current", "true");
					}
					else
					{
						node.setAttribute("class", "list-group-item list-group-item-action");
						node.removeAttribute("aria-current");
					}
				}
			}

			function addUser(index)
			{
				var obj = {
					Nombre: document.getElementById("nombreIMf").value,
					Correo: document.getElementById("correoIMf").value,
					Telefono: null
				}

				var xhr = new XMLHttpRequest();
				xhr.open("POST", "/addUserAsync.php", true);
				xhr.onload = function (e) {
					if (xhr.readyState === 4) {
						if (xhr.status === 200) {
							var code = parseInt(xhr.response);
							if(code == 0)
							{
								usrList.push(obj);
								document.getElementById("nombreI").innerHTML = obj.Nombre;
								document.getElementById("correoI").innerHTML = obj.Correo;

								var node = document.createElement("LI");
								node.setAttribute("class", "list-group-item list-group-item-action"); 
								node.setAttribute("onClick", "selFun("+(usrList.length-1)+")"); 
								var textnode = document.createTextNode(obj.Nombre);
								node.appendChild(textnode);
								document.getElementById("listaModal").appendChild(node);
							}
							else
								alert('Este e-mail ya existe en el sistema.');
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

			function selUser()
			{
				if(active >= 0)
				{
					document.getElementById("nombreI").innerHTML = usrList[active].Nombre;
					document.getElementById("correoI").innerHTML = usrList[active].Correo;
				}
			}

			var i;
			for(i = 0; i < usrList.length; i++)
			{
				var node = document.createElement("LI");
				node.setAttribute("class", "list-group-item list-group-item-action"); 
				node.setAttribute("onClick", "selFun("+i+")"); 
				var textnode = document.createTextNode(usrList[i].Nombre);
				node.appendChild(textnode);
				document.getElementById("listaModal").appendChild(node); 
			}
			
		</script>
		<br><br><br>
		 Bootstrap Bundle with Popper 
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>-->
	</body>
</html>
