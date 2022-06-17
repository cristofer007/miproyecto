<?php
	$invalido = false;
	if (!empty($_POST))
	{
		$invalido = true;
		$dbh = new PDO('mysql:host=localhost;dbname=teleticket', "root", "");
		$stmt = $dbh->prepare("SELECT token from Cuentas WHERE email = :name AND password = :pass");
		$stmt->bindParam(':name', $_POST["email"]);
		$stmt->bindParam(':pass', $_POST["password"]);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		if($result != false)
		{
			if($result['token'] == 'ADMIN')
				header("Location: /vistaadmin.blade.php");
			else
				header("Location: /vistatecnico.blade.php?t=".$result['token']);
		}
	}
?>

<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags --->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Bootstrap CSS -->
		<link href="/styles/style.css" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

		<title>Ingresar</title>
	</head>
	<body>
		<div class="container">
			<h2 class="text-center">Sistema de ayuda</h2>
			<form class="p-3" action="vistalogin.blade.php" method="post">
				<div class="mb-3">
					<label for="exampleInputEmail1" class="form-label">Correo electrónico</label>
					<input type="email" name="email" class="form-control" id="exampleInputEmail1">
				</div>
				<div class="mb-3">
					<label for="exampleInputPassword1" class="form-label">Password</label>
					<input type="password" name="password" class="form-control" id="exampleInputPassword1">
				</div>
				<div class="mb-3">
					<p class="text-danger"><?php
						if($invalido)
							echo "Correo o contraseña incorrecto";
					?></p>
				</div>
				<div class="row border border-danger p-0 justify-content-end">
					<button type="submit" class="col-2 btn btn-primary ">Ingresar</button>
				</div>
			</form>

		</div>

		<!-- Bootstrap Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	</body>
</html>


