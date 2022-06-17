<?php
	// Takes raw data from the request
	$json = file_get_contents('php://input');

	// Converts it into a PHP object
	$data = json_decode($json);

	

 	if (!is_null($data))
	{
		$dbh = new PDO('mysql:host=localhost;dbname=teleticket', "root", "");
		$stmt = $dbh->prepare("DELETE FROM tickets WHERE codigo = :codigo");
		foreach($data as $codigo)
		{
			$stmt->bindParam(':codigo', $codigo);
			$stmt->execute();
			echo $codigo."\n";
		}
	}
?>
