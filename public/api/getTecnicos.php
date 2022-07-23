<?php
	// Takes raw data from the request
	$json = file_get_contents('php://input');

	// Converts it into a PHP object
	$data = json_decode($json);

 	if (!is_null($data))
	{
		$tecnico = "%".$data->tecnico."%";

		$dbh = new PDO('mysql:host=localhost;dbname=base', "root", "");
		$stmt = $dbh->prepare("SELECT * FROM tecnicos WHERE nombre LIKE ? OR email LIKE ?");
		$stmt->bindParam(1, $tecnico);
		$stmt->bindParam(2, $tecnico);
		$stmt->execute();
		echo(json_encode($stmt->fetchAll(PDO::FETCH_ASSOC)));
	}
?>
