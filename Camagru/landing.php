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
	<link rel="stylesheet" href="landing.css">
	<style>
		canvas
		{
			padding: 0;
			margin: 0;
			background: transparent;
		}
		body
		{
			margin: 0;
			padding: 0;
		}
		.landing
			{
				display: grid;
				margin: 0.5%;
				height: 95%;
				grid-template-columns: 15% 1fr 1fr 1fr 15%;
				grid-template-rows: 5.5% 1fr 5.5%;
				grid-template-areas: 
				"header header header header header"
				". content content content content"
				"footer footer footer footer footer";
				padding: 0.5%;
			}
	</style>
</head>
<body>
    <div class="landing">
		
        <div class="header">
            <a href="gallary.php?p=1">
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
				<form method="POST">
					<video id="video" width="480" height="420" autoplay="true"></video>
					<canvas id="canvas" width="480" height="420"></canvas>
					<input type="hidden" name="saved_image" id="image">
					<button type="button" id="capture">Capture</button>
					<button type="Submit" name="save">Save</button>

				</form>
				<form action="landing.php" method="POST" enctype="multipart/form-data">
					<label class="label">Upload a file:</label>
					<input type="file" id="file" name="image">
					<input type="hidden" name="saved_image" id="image_upload">
					<input type="submit" name="upload_image" value="Upload">
				</form>
				<button onclick='draw_sticker("pic1", "20", "190", "150", "150")'><img src="img/kitten.png" width="200px" hieght="200px"id="pic1"></button>
				<button onclick='draw_sticker("pic2", "300", "190", "150", "150")'><img src="img/dog.png" width="200px" hieght="200px"id="pic2"></button>
				<button onclick='draw_sticker("pic3", "0", "0", "480", "420")'><img src="img/frame.png" width="200px" hieght="200px"id="pic3"></button>
			</div>
			<?php
				if (isset($_POST['save']))
				{
					$saved_image = $_POST['saved_image'];
					$user = $_SESSION['username'];
					$query = $dbc->prepare("INSERT INTO camagru.userpic (picture, user_tag, likes) VALUES ('$saved_image', '$user', 0)");
					$query->execute();
				}
				if(isset($_POST['upload_image'])){
					$user = $SESSION['username'];
					$file = file_get_contents($_FILES['image']['tmp_name']);
					$bfile = base64_encode($file);
					$need = 'data:image/png;base64,';
					$saved_image = $need.$bfile;
					$query = $dbc->prepare("INSERT INTO camagru.userpic (picture, user_tag, likes) VALUES ('$saved_image', '$user', 0)");
					$query->execute();
				}
			?>
		<script>
				var video = document.getElementById('video');
				var canvas = document.getElementById('canvas');
				var context = canvas.getContext('2d');

				if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia)
				{
					navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream)
				{
					video.srcObject = stream;
				});
				}

				document.getElementById("capture").addEventListener("click", function() {
					context.drawImage(video, 0, 0, 480, 420);
							document.getElementById("image").value = canvas.toDataURL();
				});
				function draw_sticker(stick_id, x, y, size_x, size_y)
				{
					var sticker = document.getElementById(stick_id);
					console.log('test');
					context.drawImage(sticker, x, y, size_x, size_y);
					document.getElementById("image").value = canvas.toDataURL();
				}
            </script>
        <div class="footer">Footer</div>
    </div>	
</body>
</html>
