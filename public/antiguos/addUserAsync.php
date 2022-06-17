<?php
	// Takes raw data from the request
	$json = file_get_contents('php://input');

	// Converts it into a PHP object.
	$data = json_decode($json);

	if (!is_null($data))
	{
		$invalido = true;
		try {
			$dbh = new PDO('mysql:host=localhost;dbname=teleticket', "root", "");
			$stmt = $dbh->prepare("INSERT INTO usuarios (Nombre, Correo, Telefono) VALUES (:nombre, :correo, :telefono) ");
			$stmt->bindParam(':nombre', $data->Nombre);
			$stmt->bindParam(':correo', $data->Correo);
			$stmt->bindParam(':telefono', $data->Telefono);
			$stmt->execute();
			echo '0';
		}
		catch( PDOException $Exception ) {
			echo '1';
		}
	}
?>
