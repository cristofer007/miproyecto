<?php
	// Takes raw data from the request
	$json = file_get_contents('php://input');

	// Converts it into a PHP object
	$data = json_decode($json);

 	if (!is_null($data))
	{
		$dbh = new PDO('mysql:host=localhost;dbname=base', "root", "");
		$stmt = $dbh->prepare("
		SELECT titulo, fuentes.fuente, estados_tickets.estado, departamentos.departamento, codigo, tipo_problema AS tipo,
		fecha, usuarios.nombre, usuarios.correo, desc_problema, resolucion_problema, tecnicos.nombre AS tecnico, tecnicos.email AS correo_tecnico, tecnicos.telefono AS telefono_tecnico
		FROM tickets 
		inner join usuarios on id_solicitante = usuarios.Id
		inner join fuentes on id_fuente = tickets.fuente
		inner join estados_tickets on id_estado = tickets.estado
		inner join departamentos on id_departamento = tickets.departamento
		LEFT join tecnicos on tecnicos.id_tecnico = tickets.id_tecnico
		WHERE codigo = :codigo
		");
		$stmt->bindParam(':codigo', $data->codigo);
		$stmt->execute();

		echo(json_encode($stmt->fetch(PDO::FETCH_ASSOC)));
	}
?>
