<!DOCTYPE <!DOCTYPE html>
<?php include('server.php');
	if (!(isset($_SESSION['username'])))
		header('Location: login.php');
?>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Profile</title>
	<link rel="stylesheet" href="landing.css">
	<style>
		h3
		{
			background: transparent;
		}
		form
		{
			background: transparent;
		}
	</style>
</head>
<body>
	<div class="landing">
		<div class="header">
			<a href="landing.php">
				<img src="img/home.png" style="background-color: transparent" class="home">
			</a>
			<a href="profile.php">
				<img src="img/message.png" style="background-color: transparent" class="notification">
			</a>
		</div>
		<div class="sidebar">
		<h2 class="profile_heading">User Information</h2>
			<?php 
				$query = $dbc->prepare("SELECT * FROM camagru.user_data WHERE username = :uname");
				$query->execute(["uname"=>$_SESSION['username']]);
				$rows = $query->fetchAll();
			?>
			<div class="details">
				<form method="post">
					<?php foreach ($rows as $e)?>
					<h2 class="sub_headings">Username:</h2>
					<?php echo $e['username']?>
				<form method="post">
					<input class="change_detail_button" type="submit" value="change" name="change_username"/>
				</form>
					<h2 class="sub_headings">Email:</h2>
					<?php echo $e['email']?>
				<form method="post">
					<input class="change_detail_button" type="submit" value="change" name="change_email"/>
				</form>
					<h2 class="sub_headings">Notifications:</h2>
					<?php echo ($e['notifications'] == 1 ? "Post notifications are Turned on" : "Notifications are turn off")?>
				<form method="post" action="profile.php">
					<input class="login_button" type="submit" value="change" name="change_notifications"/>
				</form>
				<h2 class="sub_headings">Password:</h2>
				<form method="post" action="profile.php">
					<input class="login_button" type="submit" value="change" name="password_profile_change"/>
				</form>
			</div>
		</div>
		<div class="content">
			<h2 class="profile_heading">User Pictures</h2>
		</div>
		<div class="footer"><a href="log_out.php" style="color: red; font-size: 2vmax;">LOG OUT</a></div>
	</div>	
</body>
</html>