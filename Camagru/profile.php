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
            <div class="video_screen">
                <video autoplay id="video_stream"></video>
                <button></button>
            </div>
            <script>
                var video = document.getElementById('video_stream'),
                var canvas = document.getElementById();
                if (navigator.mediaDevices.getUserMedia)
                {
                    navigator.mediaDevices.getUserMedia({video: true})
                    .then(function(stream)
                    {
                        video.srcObject = stream;
                        return video.play();
                    })
                }
            </script>
        </div>
        <div class="footer">Footer</div>
    </div>	
</body>
</html>