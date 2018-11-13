<?php
	include("/connection.php");
	error_reporting(0);
	$username = $_POST['Username'];
	$password = md5($_POST['Password']);
?>
<head>
		<title>Login Page</title>
		<link rel="stylesheet" href="log_sign.css">
		<style>
		</style>
	</head>
	<body style="background-color: #fafafa">
	
			<form class="login" method="POST">
			<div class="title">
				<div style="margin-top: 1.5%; font-size: 2.2vmax;">Login</div>
			</div>
			<input class="login_input" type="text" placeholder="Username" name="Username"/>
			<input class="login_input" type="password" placeholder="Password" name="Password"/>
			<input class="login_button" type="submit" value="GO!" name="login"/>
			<div class="new_user"><a href="sign_up.php">New User -</a><a href=""> Forgot Password</a></div>
			</form>
		</div>
	</body>
</html>