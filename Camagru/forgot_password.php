<?php
	include('server.php');
?>
<html>
<head>
		<title>Forgot Password</title>
		<link rel="stylesheet" href="log_sign.css">
		<style>
		</style>
	</head>
	<body style="background-color: #fafafa">
	
			<form class="login" method="post" action="forgot_password.php">
			<div class="title">
				<div style="margin-top: 1.5%; font-size: 2.2vmax;">Forgot Password</div>
			</div>
			<input class="login_input" type="password" placeholder="Username / Email" name="email_reset"/>
			<a>Please Enter Your Email</a>
			<input class="login_button" type="submit" value="Send Link" name="forgot_password"/>
			</form>
		</div>
	</body>
</html>