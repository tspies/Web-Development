<?php require_once('server.php');?>
<!DOCTYPE <!DOCTYPE html>
<?php
	if (isset($_POST['save']))
	{
		echo "SAVED!!!!";
	}
?>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>landing</title>
	<link rel="stylesheet">
	<style>
		body
		{
			background-color: purple;
		}
	</style>
</head>
<body>
    <div class="landing">
        <div class="header">
            <a href="gallary.php">
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
        <!-- <div class="content"> -->
			<form method="POST">
				<video id="video" width="380" height="280" autoplay="true"></video>
				<canvas id="canvas" width="380" height="280"></canvas>
				<input type="hidden" name="saved_image" id="image">
				<canvas id="canvas2" width="380" height="280"></canvas>
				<button type="button" id="capture">Capture</button>
				<button type="Submit" name="save">Save</button>
			</form>
			<form action="landing.php" method="POST" enctype="multipart/form-data">
				<label class="label">Upload a file:</label>
				<input type="file" id="file">
				<input type="hidden" name="saved_image" id="image_upload">
				<input type="submit" id="save"value="Upload">
			</form>
			<?php
				if (isset($_POST['save']))
				{
					$saved_image = $_POST['saved_image'];
					$user = $_SESSION['username'];
					$query = $dbc->prepare("INSERT INTO camagru.userpic (picture, user_tag, likes) VALUES ('$saved_image', '$user', 0)");
					$query->execute();
				}
			?>
		<!-- </div> -->
		<script>
				var video = document.getElementById('video');
				var canvas = document.getElementById('canvas');
				var context = canvas.getContext('2d');
				var canvas2 = document.getElementById('canvas2');
				var context2 = canvas2.getContext('2d');

				if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia)
				{
					navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream)
				{
					video.srcObject = stream;
				});
				}

				document.getElementById("capture").addEventListener("click", function() {
					context2.drawImage(video, 0, 0, 380, 280);
						context2.drawImage(canvas, 0, 0, 380, 280);
							document.getElementById("image").value = canvas2.toDataURL();
				});
				document.getElementById("save").addEventListener("click", function ()
				{
					var canvas = document.getElementById("file")
					document.getElementById("image_upload").value = canvas.toDataURL();
				});
            </script>
        <div class="footer">Footer</div>
    </div>	
</body>
</html>
