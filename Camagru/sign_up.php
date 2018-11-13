<?php
	include("/connection.php");
	error_reporting(0);
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$confirm_password = md5($POST['confirm_password']);
	$email = $_POST['email'];

	if (isset($username, $password, $confirm_password, $email))
	{
		if (strstr($email, "@"))
		{
			if ($password == $confirm_password)
			{
				$query = $dbc->prepare("SELECT * FROM user_data WHERE username = ? OR email = ?");
				$query = $query->execute(array($username,$email));
				if ($query->rowCount() > 0)
					echo "There is already a user with that name or password registered";
				else
				{
					$_SESSION['username'] = $username;
					$query = $dbc->prepare("INSERT INTO user_data SET username = ?, 'password' = ?, email = ?");
					$query = $query->execute(array($username, $password, $email));
				}
			}
			else
				echo "Passwords Do Not Match!";
		}
	}
	else
		echo "Please Complete All Fields"
?>
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
			<form class="sign_up" method="POST">
			<div class="title">
				<div style="margin-top: 3%; font-size: 2vmax;">Sign Up</div>
			</div>
            <input class="sign_up_input" type="text" placeholder="Username" name="username"/>
            <input class="sign_up_input" type="text" placeholder="Email" name="email">
			<input class="sign_up_input" type="password" placeholder="Password" name="password"/>
			<input class="sign_up_input" type="password" placeholder="Confirm Password" name="confirm_password"/>
			<input class="login_button" type="submit" value="Go!"/>
			<div class="new_user" style="margin-top: 0.5%"><a href="login.php">Already a user? - Login</a></div>
			</form>
		</div>
	</body>
</html>