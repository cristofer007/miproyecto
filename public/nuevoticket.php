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
			<h2 class="text-center py-2">Sistema de ayuda</h2>
			<div class="row justify-content-end">
				<div class="col-auto">
					<a class="btn btn-primary" href="/index.php">Salir</a>
				</div>
			</div>
			

			<div class="container bg-light mb-4 p-2">
				<div class="row mb-4">
					<div class="col text-center" >
						<a href="/admin.php" >Libres</a>
					</div>
					<div class="col text-center">
						<a href="/admin.php?tipo=1">Asignados</a>
					</div>
					<div class="col text-center">
						<a href="/admin.php?tipo=2">Cerrados</a>
					</div>
					<div class="col text-center">
						Nuevo ticket
					</div>
				</div>
				<div id="alertLoc">
				</div>
				<form>
					<p class="text-white bg-primary p-1 fw-bold">Usuario</p>
					<div class="container pb-3">
						<div class="mb-1">
							<div class="row justify-space-evenly">
								<div class="col">
									<label class="form-label">Nombre: <p id="nombreI">Seleccione un usuario</p></label>
								</div>
								<div class="col">
									<button  type="button" class="btn btn-primary fw-bold text-center" data-bs-toggle="modal" data-bs-target="#exampleModal">Cambiar usuario</button>
								</div>
							</div>
						</div>
						<div class="mb-2">
							<label class="form-label">Correo: <p id="correoI"></p></label>
						</div>
						<div class="mb-2 form-check">
							<input type="checkbox" class="form-check-input" id="exampleCheck1">
							<label class="form-check-label" for="exampleCheck1">Aviso ticket</label> <!-- Sin input -->
						</div>
					</div>
					<p class="text-white bg-primary p-1 fw-bold">Ticket</p>
					<div class="container pb-3">
						<div class="row justify-space-evenly">
							<div class ="col">
								<div class="mb-2">
									<label for="tituloI" class="form-label">Título</label>
									<input type="text" class="form-control" id="tituloI">
								</div>
							</div>

						</div>
						<div class="mb-2">
                                                    <?php
                                                        $dbh = new PDO('mysql:host=localhost;dbname=base', "root", "");
                                                        $stmt = $dbh->prepare("SELECT id_fuente, fuente 
                                                                                FROM fuentes                 
                                                                                ORDER BY fuente
                                                                                ");
                                                        $stmt->execute();
                                                    ?>
                                                    <label for="fuenteI" class="form-label">Fuente</label>
                                                    <select class="form-select" id="fuenteI" aria-label="Select">
                                                    <?php
                                                        foreach($stmt as $row)
                                                        {
                                                            $id_fuente = $row['id_fuente'];   
                                                            $fuente = $row['fuente'];
                                                            echo '<option value="' . $id_fuente . '">' . $fuente . '</option>';
                                                        }
                                                    ?>
<!--								<option value="0" selected>Telefono</option>
                                                            <option value="1">Correo</option>
                                                            <option value="2">Chat</option>
                                                            <option value="3">Formulario</option>-->
                                                    </select>
						</div>
						<div class="mb-2">
							<label for="temaI" class="form-label">Tema asociado</label>
							<input class="form-control" type="text" name="city" list="temalist" id="temaI">
							
						</div>
                                                <div class="mb-2">
                                                    <div class ="col">
                                                        <div class="mb-2">
                                                            <label for="estadoI" class="form-label">Estado inicial</label>
                                                            <select class="form-select" id="estadoI" aria-label="Select">
                                                                    <option value="0" selected>Libre</option>
                                                                    <option value="1">Asignado</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
						<div class="mb-2">
                                                    <?php
                                                        $dbh = new PDO('mysql:host=localhost;dbname=base', "root", "");
                                                        $stmt = $dbh->prepare("SELECT id_departamento, departamento 
                                                                                FROM departamentos
                                                                                WHERE id_departamento <> -1
                                                                                ORDER BY departamento
                                                                              ");
                                                        $stmt->execute();
                                                    ?>
                                                    
                                                    <label for="departamentoI" class="form-label">Área</label>
                                                    <select class="form-select" id="departamentoI" aria-label="Select">
                                                    <option value="-1"> Seleccione un área</option>
                                                    <?php
                                                        
                                                        foreach($stmt as $row)
                                                        {
                                                            $id_departamento = $row['id_departamento'];   
                                                            $departamento = $row['departamento'];
                                                            echo '<option value="' . $id_departamento . '">' . $departamento . '</option>';
                                                        }
                                                    ?>
<!--                                                        <option value="0" selected>Soporte</option>
                                                            <option value="1">Redes</option>
                                                            <option value="2">Servidores</option>-->
                                                    </select>
						</div>
                                            
                                                <div id="areaSeleccionarEncargado" class="mb-3" style="display:none">
                                                    <label for="problemaI" class="form-label">Encargado</label>
                                                    
                                                    <div class="row px-0 w-100 mx-auto text-white fw-bold" style="background-image: linear-gradient(50deg, #667db6, #0082c8, #0082c8, #667db6)">
                                                        <div class="col-6 text-center border px-0 mx-auto">
                                                            Nombre
                                                        </div>
                                                        
                                                        <div class="col-3 text-center border px-0 mx-auto">
                                                            Cargo
                                                        </div>
                                                        
                                                        <div class="col-3 text-center border px-0 mx-auto">
                                                            N° tickets
                                                        </div>
                                                    </div>
                                                    <ul class="list-group border bg-white" style="height:9em" id="listaTecnicos">

                                                    </ul>
						</div>
                                            
						<div class="mb-2">
							<label for="problemaI" class="form-label">Descripcion del problema</label>
							<textarea class="form-control" id="problemaI" row=3></textarea>
						</div>
						<div class="mb-2">
							<label for="respuestaI" class="form-label">Respuesta inicial</label>
							<textarea class="form-control" id="respuestaI" row=3></textarea>
						</div>
					</div>
					<p class="text-danger p-0" id="errorO" style="visibility:hidden"></p>
                                        <div class="text-end justify-content-end">
                                            <button type="button" class="btn btn-primary" onClick="sendFun()">Crear ticket</button>
                                        </div>
				</form>

			
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
                                            <img src="iconos/nuevoTicketIcono.png" width="50em">
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
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Cambiar usuario</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">

					<form class="mb-5">
						<p class="lead">Agregar usuario</p>
						<div class="mb-3">
							<label for="nombreIMf" class="form-label">Nombre</label>
							<input type="text" class="form-control" id="nombreIMf">
						</div>
						<div class="mb-3">
							<label for="correoIMf" class="form-label">Correo</label>
							<input type="email" class="form-control" id="correoIMf">
						</div>
						<button type="button" class="btn btn-primary" onClick="addUser()" data-bs-dismiss="modal">Agregar</button>
					</form>

					<p class="lead">Buscar existente</p>
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
                        const mostradorErrores =  document.getElementById("errorO");
                        
    
                        function mostrarMensajeError()
                        {
                            mostradorErrores.style.visibility = "visible";
                            
                            setTimeout(ocultarMensajeError, 10000);
                        }
                        
                        function ocultarMensajeError()
                        {
                            mostradorErrores.style.visibility = "hidden";
                        }
                    
                       
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
                                        tecnico:      idTecnicoSeleccionado,
                                        respuesta:    document.getElementById("respuestaI").value,
                                        problema:     document.getElementById("problemaI").value
                                      };

                            const errores = [];
                            if (obj.correo == "")
                            {
                                errores.push('<div class="text-center py-0">Olvidó seleccionar a un usuario. </div>');
                            }
                            if (obj.departamento == -1)
                            {
                                errores.push('<div class="text-center py-0">Olvidó seleccionar un área.</div>');
                            }
                            if (obj.estado == 1)
                            {
                                if (obj.tecnico == null)
                                {
                                    errores.push('<div class="text-center py-0">Olvidó seleccionar a un especialista como encargado.</div>');
                                }
                            }

                            if(errores.length > 0)
                            {

                                let mensajes = "";

                                for(let i=0 ; i < errores.length; i++)
                                {
                                    mensajes = mensajes + errores[i] + "<br>";
                                }

                                mostradorErrores.innerHTML = mensajes;

                                mostrarMensajeError();
                                return;
                            }

                            else
                            {
                                mostradorErrores.innerHTML = "";
                            }

                            var xhr = new XMLHttpRequest();
                            xhr.open("POST", "/ticketAsync.php", true);
                            xhr.onload = function (e) 
                            {
                                if (xhr.readyState === 4) 
                                {
                                    if (xhr.status === 200) 
                                    {
                                        console.log(xhr.response);
                                    } 
                                    else 
                                    {
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
                            var i;
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
				};

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
 
//  ***********************************************************************************************************************
//  ******************************* MOSTRAR ESPECIALISTAS *****************************************************************
//  ***********************************************************************************************************************
                        
                    const estadoInicialInput = document.getElementById("estadoI");
                    var tipoTicketSeleccionado = 0;
                    const encargadoInput = document.getElementById("encargadoI");
                    const areaSeleccionarEncargado = document.getElementById("areaSeleccionarEncargado");
                    const departamentoInput = document.getElementById("departamentoI");
                    const listadoTecnicos = document.getElementById("listaTecnicos");
                    var departamentoSeleccionado = -1;
                    
                    estadoInicialInput.addEventListener("change", function()
                    {                        
                        if (!(this.value == tipoTicketSeleccionado))
                        {
                            if(this.value == 1)
                            {
                                getTecnicosDepartamento(departamentoInput.value);
                                tipoTicketSeleccionado = 1;
                                mostrarSeleccionEspecialistas();
                               
                            }
                            else
                            {
                                
                                ocultarSeleccionEspecialistas();
                                tipoTicketSeleccionado = 0;
                                tecnicoSeleccionado = null;
                                idTecnicoSeleccionado = null;
                                
                            }
                        }
                    });
                    
                    departamentoInput.addEventListener("change", function(){
                        if (tipoTicketSeleccionado == 1)
                        {
                            if (!(this.value == departamentoSeleccionado))
                            {
                                if(departamentoSeleccionado != -1)
                                {
                                   
                                    borrarListado();
                                }
                                getTecnicosDepartamento(this.value);
                                departamentoSeleccionado = this.value;
                                mostrarSeleccionEspecialistas();
                            }
                        }
                        else 
                        {
                            tecnicoSeleccionado = null;
                            idTecnicoSeleccionado = null;
                        }
                    });
                    
                    
                    var tecnicoSeleccionado = null;
                    var idTecnicoSeleccionado = null;
                    function getTecnicosDepartamento(departamento)
                    {
                        if (departamento != -1)
                        {
                            let obj = {departamento: departamento};
                            
                            let xhr = new XMLHttpRequest();
                            
                            xhr.open("POST", "/api/getTecnicosDepartamento.php", true);
                            xhr.onload = function (e) 
                            {
                                if (xhr.readyState === 4) 
                                {
                                    if (xhr.status === 200) 
                                    {
                                        let tecnicos = document.getElementById("listaTecnicos");
                                        
                                        tecnicos.textContent = '';
                                        
                                        let response = JSON.parse(xhr.response);
                                       
                                    
                                        for(var i = 0; i < response.length; i++)
                                        {
                                            
                                            let tecnico = response[i];
                                            
                                            let node = document.createElement("li");
                                            node.setAttribute("class", "list-group-item list-group-item-action border row flex-row px-0 mx-auto py-0"); 
                                            node.setAttribute("data-bs-dismiss", "modal");
                                            node.setAttribute("data-id", tecnico.id_tecnico);
                                            node.addEventListener("click", function(){
                                                if (tecnicoSeleccionado !== null)
                                                {    
                                                    idTecnicoSeleccionado = null;
                                                    tecnicoSeleccionado.style.backgroundColor = "";
                                                    tecnicoSeleccionado.style.color = "";
                                                    tecnicoSeleccionado.style.fontWeight = "";
                                                    tecnicoSeleccionado.removeAttribute("active");  
                                                    tecnicoSeleccionado = null;
                                                }
                                                tecnicoSeleccionado = this;
                                                idTecnicoSeleccionado = this.getAttribute("data-id");
                                                this.style.backgroundColor = "#51e2f5";
                                                this.style.color = "white";
                                                this.style.fontWeight = "bold";
                                                this.setAttribute("active", "true");        
                                            });
                                            
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
                                    } 
                                    else {
                                        console.error(xhr.statusText);
                                    }
                                }
                            };
                            xhr.onerror = function (e) 
                            {
                                console.error(xhr.statusText);
                            };
                            xhr.send(JSON.stringify(obj));
                            
                        }
                    }
       
                    function mostrarSeleccionEspecialistas()
                    {
                        areaSeleccionarEncargado.style.display = "inline"; 
                    }
                    
                    function ocultarSeleccionEspecialistas()
                    {
                        areaSeleccionarEncargado.style.display = "none";
                    }
                    
                    function borrarListado()
                    {
                        var child = listadoTecnicos.lastElementChild; 
                        while (child) {
                            listadoTecnicos.removeChild(child);
                            child = listadoTecnicos.lastElementChild;
                        }   
                    }
			
		</script>
		<br><br><br>
		<!-- Bootstrap Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	</body>
</html>
