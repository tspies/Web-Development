<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Update Notifications</title>
		<style></style>
		<link rel="stylesheet" href="log_sign.css">
	</head>
	<body style="background-color: #fafafa">
		<div>
			<form class="sign_up" method="post">
				<div class="title">
					<div style="margin-top: 3%; font-size: 2vmax;">Update Notifications</div>
				</div>
				<input type="radio" name="Notifications_ON"/><a> Notifications on</a>
				<input type="radio" name="Notifications_OFF"/><a> Notifications off</a>
				<input class="sign_up_input" type="password" placeholder="Password" name="notif_password"/>
				<input class="login_button" type="submit" name="update_notifications" value="Go!"/>
			</form>
		</div>
	</body>
</html>