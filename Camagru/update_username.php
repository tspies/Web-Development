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
			<form class="sign_up" method="post">
				<div class="title">
					<div style="margin-top: 3%; font-size: 2vmax;">Update Username</div>
				</div>
				<input class="sign_up_input" type="text" placeholder=" New Username" name="new_username"/>
				<input class="sign_up_input" type="password" placeholder="Password" name="password_update_username"/>
				<input class="login_button" type="submit" name="update_username" value="Save Changes"/>
			</form>
		</div>
	</body>
</html>