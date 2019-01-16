<?php
	include('server.php');
	$token  = $_GET['reset_token'];
	$query = $dbc->prepare("SELECT * FROM camagru.user_data WHERE token = '$token'");
    $query->execute();
    $rows = $query->fetchAll();
    if (sizeof($rows) >= 1)
	{
		$query = $dbc->prepare("UPDATE camagru.user_data SET token = :token");
    	$query->execute(["token"=>$token]);	
		header('location: reset_password.php');
	}
	else
	{
		array_push($errors, "Authentication Error, Please try again");
		foreach ($errors as $e)
					echo $e . "\n";
	}
?>