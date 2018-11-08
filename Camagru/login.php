<!DOCTYPE <!DOCTYPE html>
<head>
		<title>Login Page</title>
		<link rel="stylesheet" href="log_sign.css">
		<style>
		</style>
	</head>
	<body style="background-color: #fafafa">
		<?php
			$host = "localhost:8080";
			$username = "root";
			$password = "abc123";
			$database = "camagru";
			$message = "";
			try
			{
				$connect = new PDO("mysql:host=$host; dbname-$database", $username, $password);
				$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				if (isset($_POST['login']))
				{
					if (empty($_POST['Username']) || empty($_POST['Password']))
					{
						$message = '<lable>Please fill in all fields</lable>';
					}
					else
					{
						$statement = "SELECT * FROM user_data WHERE username = :username AND password = :password";
						$query = $connect->prepare($statement);
						$query->execute(
							array(
									'username' => $_POST['username'],
									'password' => $_POST['password']
								)
						);
						$count = $query->rowCount();
						if ($count > 0)
						{
							$_SESSION['username'] = $_POST['username'];
							header("Location: profile.php");
						}
						else
						{
							$message = '<lable>Wrong Password Or Username</lable>';
						}
					}
				}
			}
			catch(PDOException $error)
			{
				$message = $error->getMessage();
			}
		?>
		<div>
			<?php
				if (isset($message))
				{
					echo '<lable>'.$message.'</lable>';
				}
			?>
			<form class="login" action="login_auth.php" method="post">
			<div class="title">
				<div style="margin-top: 1.5%; font-size: 2.2vmax;">Login</div>
			</div>
			<input class="login_input" type="text" name="Username"/>
			<input class="login_input" type="password" name="Password"/>
			<input class="login_button" type="submit" value="GO!" name="login"/>
			<div class="new_user"><a href="sign_up.php">New User -</a><a href=""> Forgot Password</a></div>
			</form>
		</div>
	</body>
</html>