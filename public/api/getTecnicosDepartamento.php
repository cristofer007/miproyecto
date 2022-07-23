<?php
	// Takes raw data from the request
	$json = file_get_contents('php://input');

	// Converts it into a PHP object
	$data = json_decode($json);

 	if (!is_null($data))
	{
            $departamento = $data->departamento;

            $dbh = new PDO('mysql:host=localhost;dbname=base', "root", "");
            $stmt = $dbh->prepare("SELECT tecnicos.id_tecnico, nombre, apellido_p, apellido_m, cargo, count(*) as cant_tickets
                                    FROM tecnicos 
                                         left join tickets on tecnicos.id_tecnico = tickets.id_tecnico 
                                    WHERE tickets.estado = :departamento
                                    GROUP BY tecnicos.id_tecnico
                                    "
                                  );
            $stmt->bindParam(':departamento', $departamento);
            $stmt->execute();
            echo(json_encode($stmt->fetchAll(PDO::FETCH_ASSOC)));
	}
?>
