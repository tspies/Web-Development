<!DOCTYPE <!DOCTYPE html>
<?php include('server.php')?>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home Page</title>
	<link rel="stylesheet" href="landing.css">
	<style>
		.landing
			{
				display: grid;
				margin: 0.5%;
				height: 95%;
				grid-template-columns: 15% 1fr 1fr 1fr 15%;
				grid-template-rows: 5.5% 1fr 5.5%;
				grid-template-areas: 
				"header header header header header"
				". content content content ."
				"footer footer footer footer footer";
				padding: 0.5%;
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
        <div class="sidebar"></div>
        <div class="content">
		<?php
				$user = $_SESSION['username'];
				$query = $dbc->prepare(" SELECT * FROM camagru.userpic");
				$query->execute();
				echo '<div class="container">';
				while ($row = $query->fetch())
				{
						$img = "<img src=\"".$row['picture']."\">";
					echo '<div class="img-con">';
					echo $img;
					echo '</div>';
					
				}
			?>
		</div>
        <div class="footer">Footer</div>
    </div>	
</body>
</html>