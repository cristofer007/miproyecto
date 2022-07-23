<?php
	// Takes raw data from the request
	$json = file_get_contents('php://input');

	// Converts it into a PHP object
	$data = json_decode($json);

 	if (!is_null($data))
	{
		$dbh = new PDO('mysql:host=localhost;dbname=teleticket', "root", "");
		$stmt = $dbh->prepare("
		SELECT nombre, apellido_p, apellido_m, cargo, email, telefono
		FROM invitados
		WHERE id_invitado = :id_invitado
		");
		$stmt->bindParam(':id_invitado', $data->id_invitado);
		$stmt->execute();

		echo(json_encode($stmt->fetch(PDO::FETCH_ASSOC)));
	}
?>
