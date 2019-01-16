<?php require_once('server.php');?>
<!DOCTYPE <!DOCTYPE html>
<!DOCTYPE <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Profile</title>
	<link rel="stylesheet" href="landing.css">
	<style>
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
				<video id="player" autoplay></video>
				<canvas id="canvas" width=380 height=280></canvas>
				<br>
				<button type="button" onclick="snapshot()">Capture</button>
				<button type="button" onclick="save_snap()">Save</button>
				<button type="button" onclick="upload()">Upload</button>
                <script type="text/javascript" src="script.js">
                </script>
        </div>
        <div class="footer">Footer</div>
    </div>	
</body>
</html>
