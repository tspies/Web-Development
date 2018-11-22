<?php
	include('server.php');
?>
<html>
<head>
		<title>Sign Up</title>
		<style>
			.new_user
			{
				margin-top: 5%;
			}
		</style>
		<link rel="stylesheet" href="log_sign.css">
	</head>
	<body style="background-color: #fafafa">
		<div>
			<form class="sign_up" method="post">
			<div class="title">
				<div style="margin-top: 3%; font-size: 2vmax;">Sign Up</div>
			</div>
            <input class="sign_up_input" type="text" placeholder="Username" name="username"/>
            <input class="sign_up_input" type="text" placeholder="Email" name="email">
			<input class="sign_up_input" type="password" placeholder="Password" name="password"/>
			<input class="sign_up_input" type="password" placeholder="Confirm Password" name="confirm_password"/>
			<input class="login_button" type="submit" name="sign_up" value="Go!"/>
			<div class="new_user" style="margin-top: 0.5%"><a href="login.php">Already a user? - Login</a></div>
			</form>
		</div>
	</body>
</html>