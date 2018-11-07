<!DOCTYPE <!DOCTYPE html>
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
			<form class="sign_up" action="profile.php">
			<div class="title">
				<div style="margin-top: 3%; font-size: 2vmax;">Sign Up</div>
			</div>
            <input class="sign_up_input" type="text" placeholder="Username"/>
            <input class="sign_up_input" type="text" placeholder="Email">
			<input class="sign_up_input" type="password" placeholder="Password"/>
			<input class="login_button" type="submit" value="Go!"/>
			<div class="new_user" style="margin-top: 0.5%"><a href="login.php">Already a user? - Login</a></div>
			</form>
		</div>
	</body>
</html>