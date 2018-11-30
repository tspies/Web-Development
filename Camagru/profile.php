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
                <video id="video_stream" width="30%" height="30%"></video>
                <a href="#" id="capture" class="video_button">Take Photo</a>
                <canvas id="canvas" width="30%" hight="30%"></canvas>
                <img id="phto" src="" alt="Your Photo">
            </div>
            <script src="script.js">
                (function(){
                    var video = document.getElementById('video_stream'),
                        canvas = document.getElementById('canvas'),
                        context = canvas.getContext('2d'),
                        photo = document.getElementById('photo'),
                        vendorURL = window.URL || window.webkitURL;

                    navigator.getMedia =    navigator.getUserMedia ||
                                            navigator.webkitGetUserMedia ||
                                            navigator.mozGetUserMedia ||
                                            navigator.msGetUserMedia;
                    navigator.getMedia({
                        video: true
                    }, function(stream){
                        video.src = vendorURL.createObjectURL(stream);
                        video.play();
                    }, function(error){

                    });
                })();
            </script>
        </div>
        <div class="footer">Footer</div>
    </div>	
</body>
</html>