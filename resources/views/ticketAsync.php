<?php
	// Takes raw data from the request
	$json = file_get_contents('php://input');

	// Converts it into a PHP object
	$data = json_decode($json);

	print_r($data);
 	if (!is_null($data))
	{
		$dbh = new PDO('mysql:host=localhost;dbname=teleticket', "root", "");
		$stmt = $dbh->prepare("
		INSERT INTO tickets (titulo, id_fuente, id_estado, id_area, tipo_problema, fecha, desc_problema, resolucion_problema, id_invitado, fecha_exp)
		SELECT :titulo, :fuente, :estado, :area, :tipo, CURDATE(), :problema, :resolucion, invitados.email, :fecha
		FROM invitados WHERE invitados.email = :correo
		");
		$stmt->bindParam(':titulo', $data->titulo);
		$stmt->bindParam(':fuente', $data->fuente);
		$stmt->bindParam(':estado', $data->estado);
		$stmt->bindParam(':tipo', $data->tema);
		$stmt->bindParam(':area', $data->departamento);
		$stmt->bindParam(':problema', $data->problema);
		$stmt->bindParam(':resolucion', $data->respuesta);
		$stmt->bindParam(':correo', $data->correo);
		$stmt->bindParam(':fecha', $data->fecha);
		$stmt->execute();
	} 
?>
