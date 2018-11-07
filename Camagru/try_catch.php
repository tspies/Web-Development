<?php
	try{
		$handler = new PDO('mysql:host=localhost;dbname=camagru', 'root', 'abc123');
		$handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "GOOD DATABASE CONNECTION";
	} catch(PDOException $e){
		die('DATABASE PROBLEM');
	}
?>