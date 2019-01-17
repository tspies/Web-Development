<?php
	include('server.php');
	if (isset($_GET['reset_token']))
	{
		$token  = $_GET['reset_token'];
		$query = $dbc->prepare("SELECT * FROM camagru.user_data WHERE token = :token");
		$query->execute(["token"=>$token]);
		$rows = $query->fetchAll();
		if (sizeof($rows) >= 1)
		{
			$query = $dbc->prepare("UPDATE camagru.user_data SET token = :token");
			$query->execute(["token"=>$token]);	
		}
		else
		{
			array_push($errors, "Authentication Error, Please try again");
			foreach ($errors as $e)
						echo $e . "\n";
			header('location: login.php');
		}
	}
	else
	{
		array_push($errors, "Authentication FAILED, Please try again");
		foreach ($errors as $e)
					echo $e . "\n";
		header('location: login.php');
	}
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