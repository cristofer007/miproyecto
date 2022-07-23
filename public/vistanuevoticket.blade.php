<!doctype html>

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
                .apuntable:hover
                {
                    cursor: pointer;
                }
                
                #botonNuevoTicket
                {
                   
                }
            </style>
    </head>




<!--*****-->
<!--¨********************************************************************************************************************--->
<!--¨*********************************************************************************************--->
<!--¨********************************************************************************************************************--->
<!--        -->
        <body>
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
            <div style="position: absolute; top:7.5%; height:85.5%; width:100% ">
                <div class="row w-100 mx-auto" style="position: absolute; height:5.5%">
                        <div class="col  text-center p-0" >
                                <a href="/vistaadmin.blade.php?tipo=0" class="align-middle" >Nuevos</a>
                        </div>
                        <div class="col  text-center p-0">
                                <a href="/vistaadmin.blade.php?tipo=1" class="align-middle">Asignados</a>
                        </div>
                        <div class="col text-center p-0">
                                <a href="/vistaadmin.blade.php?tipo=2" class="align-middle">Resueltos</a>
                        </div>
                        <div class="col  text-center p-0">
                                <b class="align-middle">Nuevo ticket </b>
                        </div>
                </div>
		<div class="container border p-1 m-0 bg-primary" style="position:absolute; width: 100% ;height:95% ;top:5%; overflow:scroll">
                        
			<div class="container bg-light mb-4 p-2">
				
                                
				<div id="alertLoc">
				</div>
                                <div>
                                    <h3 class="text-center">Crear nuevo ticket</h3>
                                </div> 
                                
				<form>
					<p class="text-white bg-primary py-1 w-100 fw-bold text-center">Usuario</p>
					<div class="container pb-3">
						<div class="mb-1">
                                                    <h6 class="text-center ">
                                                        Seleccione un usuario
                                                    </h6>
                                                    <br>
							<div class="row justify-space-evenly">
								<div class="col">
									<label class="form-label">Nombre: <p id="nombreI"></p></label>
								</div>
								<div class="col">
									<button  type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Seleccionar</button>
								</div>
							</div>
						</div>
						<div class="mb-2">
							<label class="form-label">Correo: <p id="correoI"></p></label>
						</div>
<!--						<div class="mb-2 form-check">
							<input type="checkbox" class="form-check-input" id="exampleCheck1">
							<label class="form-check-label" for="exampleCheck1">Aviso ticket</label>  Sin input 
						</div>-->
					</div>
					<p class="text-white bg-primary py-1 w-100 fw-bold text-center">Ticket</p>
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
							<label for="fuenteI" class="form-label">Fuente</label>
							<select class="form-select" id="fuenteI" aria-label="Select">
								<option value="0" selected>Teléfono</option>
								<option value="1">Correo</option>
								<option value="2">Chat</option>
								<option value="3">Formulario</option>
							</select>
						</div>
						
						<div class="mb-2">
							<label for="problemaI" class="form-label">Descripcion del problema</label>
							<textarea class="form-control" id="problemaI" row=3></textarea>
						</div>
<!--						<div class="mb-2">
							<label for="respuestaI" class="form-label">Respuesta inicial</label>
							<textarea class="form-control" id="respuestaI" row=3></textarea>
						</div>-->
                                            
<!--      *******************************************************************+******************************************-->
                                            <p class="text-white bg-primary py-1 w-100 mx-0 fw-bold text-center">Encargado</p>
                                                <div class="mb-2">
                                                        <?php
                                                            $dbh = new PDO('mysql:host=localhost;dbname=teleticket', "root", "");
                                                            $stmt = $dbh->prepare("SELECT * FROM areas WHERE id_area != -1 ORDER BY area");
                                                            $stmt->execute();

                                                        ?>
							<label for="departamentoI" class="form-label">Área</label>
                                                        
							<select class="form-select" id="departamentoI" aria-label="Select">
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
<!--          *******************************************************************+******************************************-->
                                        
                                        
                                        
					</div>
					<p class="text-danger" id="errorO"></p>
                                        <div class="text-end">
                                            <button type="button" class="btn btn-primary me-0" onClick="sendFun()">Crear ticket</button>
                                        </div>
				</form>

			</div>
		</div>
            </div>

		<script>
		var usrList = [
			<?php
				$dbh = new PDO('mysql:host=localhost;dbname=teleticket', "root", "");
				$stmt = $dbh->prepare("SELECT * from usuarios");
				$stmt->execute();
				foreach($stmt as $row)
				{
                                    echo '{ Nombre: "'. $row['nombres'] . '", Correo: "'. $row['email'] .'" },';
				}
			?>
		];
		</script>

		<div class="modal fade h-75" style="top:8%;" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content p-0" >
					<div class="modal-header text-white p-2 w-100" style="position:sticky; background-image:linear-gradient(50deg, #457fca, #5691c8)">
						<h5 class="modal-title " id="exampleModalLabel">Seleccionar usuario</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body" >
<!--                                        <form class="">
						<p class="lead fw-bold text-center">Agregar usuario</p>
						<div class="mb-3">
							<label for="nombreIMf" class="form-label">Nombre</label>
							<input type="text" class="form-control" id="nombreIMf">
						</div>
						<div class="mb-3">
							<label for="correoIMf" class="form-label">Correo</label>
							<input type="email" class="form-control" id="correoIMf">
						</div>
                                                <div class=" text-end">
                                                    <button type="button" class="btn btn-primary" onClick="addUser()" data-bs-dismiss="modal">Agregar</button>
                                                </div>
                                        </form>
                                        <hr class="w-100">-->
					<p class="lead fw-bold text-center">Buscar existente</p>
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
                @include('adminfooter')
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
								alert('Éste correo ya existe en el sistema.');
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
	</body>
</html>
