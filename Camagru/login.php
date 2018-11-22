<?php
	include('server.php');
?>
<head>
		<title>Login Page</title>
		<link rel="stylesheet" href="log_sign.css">
		<style>
		</style>
	</head>
	<body style="background-color: #fafafa">
	
			<form class="login" method="post" action="login.php">
			<div class="title">
				<div style="margin-top: 1.5%; font-size: 2.2vmax;">Login</div>
			</div>
			<input class="login_input" type="text" placeholder="Username" name="log_name"/>
			<input class="login_input" type="password" placeholder="Password" name="log_pass"/>
			<input class="login_button" type="submit" value="GO!" name="login"/>
			<div class="new_user"><a href="sign_up.php">New User -</a><a href=""> Forgot Password</a></div>
			</form>
		</div>
	</body>
</html>