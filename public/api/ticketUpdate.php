<?php
	// Takes raw data from the request
	$json = file_get_contents('php://input');

	// Converts it into a PHP object
	$data = json_decode($json);

	if(!empty($_GET))
	{
		if(isset($_GET['type'])){
			if($_GET['type'] == 1)
			{
				echo 'Type1';
				print_r($data);
				$dbh = new PDO('mysql:host=localhost;dbname=teleticket', "root", "");
				$stmt = $dbh->prepare(
				"UPDATE teleticket.tickets A
				SET A.id_estado = 3, A.resolucion_problema = :resolucion
				WHERE codigo = :codigo
				");
				$stmt->bindParam(':resolucion', $data->resolucion);
				$stmt->bindParam(':codigo', $data->codigo);
				$stmt->execute();
				exit;
			}
			else if($_GET['type'] == 2)
			{
				echo 'Type2';
				$dbh = new PDO('mysql:host=localhost;dbname=teleticket', "root", "");
				$stmt = $dbh->prepare(
				"UPDATE teleticket.tickets A
				SET A.id_estado = 2
				WHERE codigo = :codigo
				");
				$stmt->bindParam(':codigo', $data->codigo);
				$stmt->execute();
				exit;
			}
		}
	}

	print_r($data);
 	if (!is_null($data))
	{
		$dbh = new PDO('mysql:host=localhost;dbname=teleticket', "root", "");
		$stmt = $dbh->prepare(
		"UPDATE teleticket.tickets A
		SET A.titulo = :titulo, A.id_fuente = :fuente, A.id_estado = :estado, A.id_area = :departamento,
			A.tipo_problema = :tipo, A.desc_problema = :problema, A.resolucion_problema = :resolucion,
			A.id_especialista = (SELECT B.id_tecnico FROM teleticket.especialistas B
				WHERE B.email = :correo
			)
		WHERE codigo = :codigo
		");
		$stmt->bindParam(':titulo', $data->titulo);
		$stmt->bindParam(':fuente', $data->fuente);
		$stmt->bindParam(':estado', $data->estado);
		$stmt->bindParam(':tipo', $data->tema);
		$stmt->bindParam(':departamento', $data->departamento);
		$stmt->bindParam(':problema', $data->problema);
		$stmt->bindParam(':resolucion', $data->respuesta);
		$stmt->bindParam(':correo', $data->correo);
		$stmt->bindParam(':codigo', $data->codigo);
		$stmt->execute();
	} 
?>
