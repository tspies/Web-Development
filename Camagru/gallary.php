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
				margin: 0;
			}
		.img-con
		{
			margin-top: 5px;
			margin-bottom: 5px;
			border-radius: 20px;
			background: transparent;
			margin: 0;
			padding: 0;
		}
		.comment
		{
			height: 10px;
			color: red;
			background-color: transparent;
			margin-bottom: 6px;
			padding: 0;
		}
		.content
		{
			margin 0;
			padding: 0;
		}
	</style>
</head>
<body>
    <div class="landing">
        <div class="header">
		<?php
			if (isset($_SESSION['username']))
			{
				echo '<a href="landing.php">';
                	echo '<img src="img/home.png" style="background-color: transparent" class="home">';
            	echo '</a>';
           		echo '<a href="notifications.php">';
                	echo '<img src="img/message.png" style="background-color: transparent" class="notification">';
            	echo '</a>';
            	echo '<a href="profile.php">';
                	echo '<img src="img/profile.png" style="background-color: transparent" class="profile">';
            	echo '</a>';
			}
		?>
            
        </div>
        <div class="sidebar"></div>
        <div class="content">
		<?php
				$limit = 5;
				$start = $_GET['p'] * $limit - $limit;
				$query = $dbc->prepare("SELECT * FROM camagru.userpic LIMIT $start, $limit");
				$query->execute();
				echo '<div class="container">';
				while ($row = $query->fetch())
				{
						$img = "<img src=\"".$row['picture']."\">";
					echo '<div class="img-con">';
					echo $img;
					echo '</div>';
					if (isset($_SESSION['username']))
					{
						echo '<form method="POST" action="gallary.php">';
							echo '<input type="text" name="comment" placeholder="Type Comment..." style="margin-right: 4px;"/>';
							echo '<input type="submit" value="POST" name="post_comment" style="margin-right: 4px;"/>';
							echo '<input type="submit" value="'.$row['likes']." ".'LIKES" name="like_pic"/>';
							echo '<input type="hidden" value="'.$row['id'].'" name="add_like"/>';
						echo '</form>';
						echo '<div class="comment_box">';
							$comment_query = $dbc->prepare("SELECT * FROM camagru.comments WHERE pic_id = :id");
							$comment_query->execute(["id"=>$row['id']]);
							while ($comment_row = $comment_query->fetch())
							{
								$comment = $comment_row['comment'];
								echo '<div class="comment">';
								echo $comment;
								echo '</div>';
							}
					}
				}
				echo '</div>';				
				$nextpage = $_GET['p'] + 1;
				if ($_GET['p'] > 1)
				{
					$previous = $nextpage - 2;
					echo '<a href="http://localhost:8080/Web-Development/Camagru/gallary.php?p=' . $previous . '">Previous</a>';
				}
				else
					echo '<a href="http://localhost:8080/Web-Development/Camagru/gallary.php?p=1">Previous</a>';
				$link = '<a href="http://localhost:8080/Web-Development/Camagru/gallary.php?p=' . $nextpage . '">Next</a>';
				echo $link;
				echo '</div>'
			?>
		</div>
        <div class="footer">Footer</div>
    </div>	
</body>
</html>