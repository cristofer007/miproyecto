<?php
	// Takes raw data from the request
	$json = file_get_contents('php://input');

	// Converts it into a PHP object
	$data = json_decode($json);

	if (!is_null($data))
	{
		$invalido = true;
		try {
			$dbh = new PDO('mysql:host=localhost;dbname=teleticket', "root", "");
			$stmt = $dbh->prepare("INSERT INTO usuarios (email, nombres, apellidos, telefono) VALUES (:email, :nombres, :apellidos, :telefono)");
			$stmt->bindParam(':email', $data->correo);
			$stmt->bindParam(':nombres', $data->nombres);
			$stmt->bindParam(':apellidos', $data->apellidos);
			$stmt->bindParam(':telefono', $data->telefono);
			$stmt->execute();
			echo '0';
		}
		catch( PDOException $Exception ) {
			echo '1';
		}
	}
?>
