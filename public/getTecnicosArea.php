<?php
	// Takes raw data from the request
	// $json = file_get_contents('php://input');

	//  Converts it into a PHP object
	//$data = json_decode($json);
	//if (!is_null($data))
	
	    if(isset($_GET['departamento']))
	    {
			$departamento = $_GET['departamento'];

			$dbh = new PDO('mysql:host=localhost;dbname=base', "root", "");
			$stmt = $dbh->prepare("SELECT id_tecnico, nombre, apellido_p, apellido_m, cargo 
								   FROM tecnicos 
								   WHERE id_departamento = :id_departamento
								   ORDER BY apellido_p, apellido_m, nombre");
								   
			$stmt->bindParam(":id_departamento", $departamento);
			
			$stmt->execute();
			
			echo(json_encode($stmt->fetchAll(PDO::FETCH_ASSOC)));
	    }
	
	
?>
