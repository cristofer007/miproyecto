<?php
$json = file_get_contents('php://input');
// Converts it into a PHP object
$data = json_decode($json);

if (!is_null($data))
{
	$dbh = new PDO('mysql:host=localhost;dbname=teleticket', "root", "");
	$stmt = $dbh->prepare("SELECT token from Cuentas WHERE email = :name AND password = :pass");
	$stmt->bindParam(':name', $data->email);
	$stmt->bindParam(':pass', $data->pass);
	$stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	$response = array();
	if($result != false)
	{
            if($result['token'] == 'ADMIN')
            {
                    $response = array("resp"=>0, "token"=>$result['token']);
                    //header("Location: /admin.php");
            }
            else
            {
                if ($result['token'] == 'ESPECIALISTA')
                {
                    $response = array("resp"=>1, "token"=>$result['token']);
                }

                    //header("Location: /tecnico.php?t=".$result['token']);
                else
                {    
                    $response = array("resp"=>2, "token"=>$result['token']);
                }   
            }
	}
        else 
        {
            $response = array("resp"=>-1); 
        }
	
	echo(json_encode($response));
}
?>