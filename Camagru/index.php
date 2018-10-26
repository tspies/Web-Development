
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Landing</title>
	<link rel="stylesheet" href="landing.css">
	<style>
		*{text-decoration: none;}

		.welcome
		{
			background-color: #e3e3e3;
			text-align: center;	
		}
		.greeting
		{
			backgground-color: red;

		}
		.login_button 
		{
			width: 15%;
			height: 4vmax;
			padding: 0;
			margin-top: 15%;
			font-size: 1.5em;
			color: #fff;
			text-align: center;
			background: #f0776c;
			border: 0;
			border-radius: 5px;
			cursor: pointer; 
			outline:0;
			display: inline-block;
		}
		.supergram
		{
			margin-top: 3%;
			font-size: 8vmax;
		}
		.pee
		{
			color: black;
			background: transparent;
			margin-top: 7%;
			font-size: 1.5vmax;
		}
		h1
		{
			margin-top: 2%;
			font-size: 3vmax;
		}
	</style>
</head>
<body>
	<div class="welcome">
		<div class="greeting">
			<h1>WELCOME TO<br><div class="supergram">SUPERGRAM<div></h1>
			<a href="login.php">
			<div class="login_button"><div class="pee">Get Started</div><div>
			</a>
	</div>
	</div>	
</body>
</html>
<?php

//     try {
//         $handler = new PDO('mysql:host=localhost;dbname=camagru', 'root', 'abc123');
//         $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//         // echo "DATABASE CONNECTED";
//     } catch(PDOException $e){
//         echo $e->getMessage();
//         die();
//     }
// $query = $handler->query('SELECT * FROM user_info');

// while($r = $query->fetch(PDO::FETCH_OBJ)){
//     echo $r->username, '<br>';
// }
?>