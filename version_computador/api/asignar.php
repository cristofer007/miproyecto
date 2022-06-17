<?php
	// Takes raw data from the request
	$json = file_get_contents('php://input');

	// Converts it into a PHP object
	$data = json_decode($json);

 	if (!is_null($data))
	{
		$dbh = new PDO('mysql:host=localhost;dbname=teleticket', "root", "");
		$stmt = $dbh->prepare("UPDATE tickets
			SET id_especialista = ?, estado = 1
			WHERE codigo = ?");
		$stmt->bindParam(1, $data->tecnico);
		$stmt->bindParam(2, $data->codigo);
		$stmt->execute();
		echo($stmt->rowCount());
	}
?>
