<?php
	ini_set('display_errors', 1);

// Creating Database
try
{

	$first_connect = new PDO("mysql:host=localhost", "root", "abc123");
	$query = $first_connect->prepare("CREATE DATABASE IF NOT EXISTS`camagru`");
	$query->execute();
	echo "DATABASE CREATED!\n";
}
catch(PDOException $err)
{
	echo $err->getMessage();
}

require('database.php');

//Creating Comments Table
try
 {
	$query = $dbc->prepare("CREATE TABLE IF NOT EXISTS`comments` (
		`comment` varchar(100) NOT NULL,
		`pic_id` int(11) NOT NULL,
		`user_tag` varchar(50) NOT NULL,
		`comment_id` int(255) NOT NULL  AUTO_INCREMENT,
		PRIMARY KEY (`comment_id`)
	  );");
	$query->execute();
	echo "Comments Table created!\n";
 }
 catch(PDOException $err)
{	
	echo $err->getMessage();
}

// Creating User Pictures Table
try
 {
	$query = $dbc->prepare("CREATE TABLE IF NOT EXISTS`userpic` (
		`id` int(255) NOT NULL AUTO_INCREMENT,
		`picture` longblob NOT NULL,
		`user_tag` varchar(50) NOT NULL,
		`likes` int(255) NOT NULL,
		PRIMARY KEY (`id`)
	  );");
	$query->execute();
	echo "User Pictures Table Created!\n";
 }
 catch(PDOException $err)
{
	echo $err->getMessage();
}

// Creating User Data Table
try
 {
	$query = $dbc->prepare("CREATE TABLE IF NOT EXISTS `user_data` (
		`id` int(10) NOT NULL AUTO_INCREMENT,
		`username` varchar(20) NOT NULL,
		`password` varchar(260) NOT NULL,
		`email` varchar(40) NOT NULL,
		`notifications` int(1) NOT NULL,
		`verified` int(1) DEFAULT NULL,
		`token` varchar(260) NOT NULL,
		PRIMARY KEY (`id`),
  		UNIQUE KEY `username` (`username`) USING BTREE,
  		KEY `email` (`email`) USING BTREE
		  );");
	$query->execute();
	echo "User Data Table Created!\n";
	header("Location: ../index.php");
 }
 catch(PDOException $err)
{
	echo $err->getMessage();
}


?> 
