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
		$extra .= " AND (especialistas.nombre LIKE ? OR especialistas.email LIKE ?)";
	}
}
?>	

<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags --> <!--*****-->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Bootstrap CSS -->
		<link href="/styles/style.css" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

		<title>Panel de administración</title>
	</head>
	<body>
		<div class="container">
			<h2 class="text-center">Sistema de ayuda</h2>
			<div class="row justify-content-end">
				<div class="col-auto">
					<a class="" href="/vistaindex.blade.php"><img src="iconos/salirIcono.png" height="25em">Salir</a>
				</div>
			</div>
<!--			<ul class="nav mb-4">
				//<li class="nav-item">
				//	<a class="nav-link active" href="#">Tickets</a>
				//</li>
				//<li class="nav-item">
				//	<a class="nav-link" href="#">Usuarios</a>
				//</li>
				
			</ul>-->

                        
                     @yield('contenido')






                    </div>
                

        <footer class="container px-0" style="position: fixed; bottom: 0%; height:10%; background-image: linear-gradient(40deg, #1d976c, #93f9b9); color:white; font-weight: bold">
                    <div class="row w-100 h-100 border border-danger px-0 mx-0 " >

                            <div class="col border border-primary text-center p-0 m-0 d-sm-flex flex-sm-column align-items-sm-center" id="pestanaForo">
                                    <div class="p-0 m-0">
                                        Solicitudes
                                    </div>
                                    <div class="p-0 m-0 text-center">
                                            <img src="iconos/solicitudesIcono.png" width="30.5%">
                                    </div>
                            </div>

                            <div class="col border border-primary text-center px-0" id="pestanaRecursos" onclick="irARecursos()">

                                    <div class="p-0 m-0">
                                        Usuarios
                                    </div>
                                    <div class="p-0 m-0">
                                            <img src="iconos/usuariosIcono.png"/ width="40%">
                                    </div>
                                <
                            </div>

                            <div class="col border border-primary text-center px-0" id="pestanaChat" onclick="irAChat()">
                                    <div class="p-0 m-0">
                                        Canales
                                    </div>
                                    <div class="p-0 m-0 text-center">
                                            <img src="iconos/canalesIcono.png"/ width="40.5%">
                                    </div>
                            </div>

                    </div>
            </footer>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	</body>
</html>


