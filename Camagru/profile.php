<!DOCTYPE <!DOCTYPE html>
<?php include('server.php')?>
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
	</style>
</head>
<body>
	<div class="landing">
		<div class="header">
			<a href="landing.php">
				<img src="img/home.png" style="background-color: transparent" class="home">
			</a>
			<a href="notifications.php">
				<img src="img/message.png" style="background-color: transparent" class="notification">
			</a>
			<a href="profile.php">
				<img src="img/profile.png" style="background-color: transparent" class="profile">
			</a>
		</div>
		<a href="log_out.php">LOG OUT</a>
		<div class="sidebar">
			<h3>User Information</h3>
			<?php 
				$query = $dbc->prepare("SELECT * FROM camagru.user_data WHERE username = :uname");
				$query->execute(["uname"=>$_SESSION['username']]);
				$rows = $query->fetchAll();
			?>
			<div class="details">
				<?php foreach ($rows as $e)?>
				<?php echo $e['username']?>
				<br>
				<?php echo $e['email']?>
			</div>
		</div>
			
		<div class="content">
			<h3>User Pictures</h3>
		</div>
		<div class="footer">Footer</div>
	</div>	
</body>
</html>