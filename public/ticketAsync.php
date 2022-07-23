<?php
	// Takes raw data from the request
	$json = file_get_contents('php://input');

	// Converts it into a PHP object
	$data = json_decode($json);

	print_r($data);
 	if (!is_null($data))
	{
		$dbh = new PDO('mysql:host=localhost;dbname=base', "root", "");
		$stmt = $dbh->prepare("
		INSERT INTO tickets (titulo, fuente, estado, departamento, tipo_problema, fecha, desc_problema, resolucion_problema, id_solicitante)
		SELECT :titulo, :fuente, :estado, :departamento, :tipo, CURDATE(), :problema, :resolucion, usuarios.Id
		FROM usuarios WHERE usuarios.Correo = :correo
		");
		$stmt->bindParam(':titulo', $data->titulo);
		$stmt->bindParam(':fuente', $data->fuente);
		$stmt->bindParam(':estado', $data->estado);
		$stmt->bindParam(':tipo', $data->tema);
		$stmt->bindParam(':departamento', $data->departamento);
		$stmt->bindParam(':problema', $data->problema);
		$stmt->bindParam(':resolucion', $data->respuesta);
		$stmt->bindParam(':correo', $data->correo);
		$stmt->execute();
	} 
?>
