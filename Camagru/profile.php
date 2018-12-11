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
                <button id="capture" class="video_button">Capture</button>
                <canvas id="canvas" width=320 height=240></canvas>
                <script>
                    const player = document.getElementById('player');
                    const canvas = document.getElementById('canvas');
                    const context = canvas.getContext('2d');
                    const captureButton = document.getElementById('capture');

                    const constraints = {
                        video: true,
                    };

                    captureButton.addEventListener('click', () => {
                        // Draw the video frame to the canvas.
                        context.translate(canvas.width, 0);
                        context.scale(-1, 1);
                        context.save();
                        context.restore();
                        context.drawImage(player, 0, 0, canvas.width, canvas.height);
                    });

                    // Attach the video stream to the video element and autoplay.
                    navigator.mediaDevices.getUserMedia(constraints)
                        .then((stream) => {
                        player.srcObject = stream;
                        });
                </script>
        </div>
        <div class="footer">Footer</div>
    </div>	
</body>
</html>