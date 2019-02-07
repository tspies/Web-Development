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
				<!-- <button type="button" id="capture">Capture</button>
				<button type="Submit" name="save">Save</button> -->
				<button onclick="alert('hello')">Sumbit</button>
			</form>
			<form action="landing.php" method="POST" enctype="multipart/form-data">
				<label class="label">Upload a file:</label>
<<<<<<< HEAD
				<input type="file" id="file" name="image">
				<input type="hidden" name="saved_image" id="image_upload">
				<input type="submit" name="upload_image" value="Upload">
=======
				<input type="file" id="file">
				<input type="submit" id="save"value="Upload">
>>>>>>> 29c780b47ec2d44d5a72ea77fdfea699807a1997
			</form>
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
					context.drawImage(video, 0, 0, 380, 280);
						context.drawImage(canvas, 0, 0, 380, 280);
							document.getElementById("image").value = canvas.toDataURL();
				});
            </script>
        <div class="footer">Footer</div>
    </div>	
</body>
</html>
