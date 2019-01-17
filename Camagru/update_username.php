<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Update Username</title>
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
			<form class="sign_up" method="post" action="sign_up.php">
				<div class="title">
					<div style="margin-top: 3%; font-size: 2vmax;">Update Username</div>
				</div>
				<input class="sign_up_input" type="text" placeholder=" New Username" name="username"/>
				<input class="sign_up_input" type="password" placeholder="Password" name="password"/>
				<input class="login_button" type="submit" name="sign_up" value="Save Changes"/>
			</form>
		</div>
	</body>
</html>