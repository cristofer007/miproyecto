<?php
	// Takes raw data from the request
	$json = file_get_contents('php://input');

	// Converts it into a PHP object
	$data = json_decode($json);

 	if (!is_null($data))
	{
		$dbh = new PDO('mysql:host=localhost;dbname=teleticket', "root", "");
		$stmt = $dbh->prepare("
		SELECT titulo, fuentes.fuente, estados_tickets.estado, areas.area, codigo, tipo_problema AS tipo,
		fecha, fecha_exp, usuarios.nombre, usuarios.correo, desc_problema, resolucion_problema, especialistas.nombre AS tecnico, especialistas.email AS correo_tecnico, especialistas.telefono AS telefono_tecnico
		FROM tickets 
		inner join usuarios on id_solicitante = usuarios.Id
		inner join fuentes on id_fuente = tickets.id_fuente
		inner join estados_tickets on id_estado = tickets.id_estado
		inner join areas on id_area = tickets.id_area
		LEFT join especialistas on especialistas.id_especialista = tickets.id_especialista
		WHERE codigo = :codigo
		");
		$stmt->bindParam(':codigo', $data->codigo);
		$stmt->execute();

		echo(json_encode($stmt->fetch(PDO::FETCH_ASSOC)));
	}
?>
