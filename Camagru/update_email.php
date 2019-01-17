<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Update Email</title>
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
					<div style="margin-top: 3%; font-size: 2vmax;">Update Email</div>
				</div>
				<input class="sign_up_input" type="text" placeholder="New Email" name="update_email"/>
				<input class="sign_up_input" type="password" placeholder="Password" name="password_email"/>
				<input class="login_button" type="submit" name="update_email" value="Save Changes"/>
			</form>
		</div>
	</body>
</html>