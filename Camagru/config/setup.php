<?php
	require('database.php');

// Creating Database
try
{
	$query = $first_connect->prepare("CREATE DATABASE camagru");
	$query->execute();
	echo "DATABSE CREATED!\n";
}
catch(PDOException $err)
{
	echo $err->getMessage();
}

// Creating Comments Table
try
 {
	$query = $dbc->prepare("CREATE TABLE `comments2` (
		`comment` varchar(100) NOT NULL,
		`pic_id` int(11) NOT NULL,
		`user_tag` varchar(50) NOT NULL,
		`comment_id` int(255) NOT NULL  AUTO_INCREMENT,
		PRIMARY KEY (`comment_id`)
	  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
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
	$query = $dbc->prepare("CREATE TABLE `userpic2` (
		`id` int(255) NOT NULL AUTO_INCREMENT,
		`picture` longblob NOT NULL,
		`user_tag` varchar(50) NOT NULL,
		`likes` int(255) NOT NULL,
		PRIMARY KEY (`id`)
	  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
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
	$query = $dbc->prepare("CREATE TABLE `user_data2` (
		`id` int(10) NOT NULL AUTO_INCREMENT,
		`username` varchar(20) NOT NULL,
		`password` varchar(260) NOT NULL,
		`email` varchar(40) NOT NULL,
		`notifications` int(1) NOT NULL,
		`verified` int(1) DEFAULT NULL,
		`token` varchar(260) NOT NULL,
		PRIMARY KEY (`id`),
  		UNIQUE KEY `username` (`username`) USING BTREE,
  		KEY `email` (`email`) USING BTREE;

	  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
	$query->execute();
	echo "User Data Table Created!\n";
 }
 catch(PDOException $err)
{
	echo $err->getMessage();
}
?> 
