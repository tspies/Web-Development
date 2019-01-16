<?php
	include('server.php');
?>
<html>
<head>
		<title>Reset Password</title>
		<link rel="stylesheet" href="log_sign.css">
		<style>
		</style>
	</head>
	<body style="background-color: #fafafa">
	
			<form class="login" method="post" action="reset_password.php">
			<div class="title">
				<div style="margin-top: 1.5%; font-size: 2.2vmax;">Reset Password</div>
			</div>
			<input class="login_input" type="text" placeholder="New Password" name="New_Password"/>
			<input class="login_input" type="text" placeholder="Confirm New Password" name="Confirm_New_Password"/>
			<a>Please Enter you new Password</a>
			<input class="login_button" type="submit" value="Reset Password" name="change_password"/>
			</form>
		</div>
	</body>
</html>