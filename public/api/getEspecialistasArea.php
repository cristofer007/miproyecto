<?php
	// Takes raw data from the request
	// $json = file_get_contents('php://input');

	//  Converts it into a PHP object
	//$data = json_decode($json);
	//if (!is_null($data))
	
	    if(isset($_GET['area']))
	    {
			$area = $_GET['area'];

			$dbh = new PDO('mysql:host=localhost;dbname=teleticket', "root", "");
			$stmt = $dbh->prepare("SELECT id_especialista, nombres, apellido_p, apellido_m, cargo FROM especialistas WHERE id_area = :area");
			$stmt->bindParam(":area", $area);
			
			$stmt->execute();
			echo(json_encode($stmt->fetchAll(PDO::FETCH_ASSOC)));
	    }
	
	
?>
