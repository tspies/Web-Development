<?php
    session_start();
    error_reporting(-1);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    $username= "";
    $email = "";
	$errors = array();
	$special = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';


    try
    {
		require('database.php');
		// Sign Up
        if (isset($_POST['sign_up']))
        {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
			$con_password = $_POST['confirm_password'];
			$Notifications = 0;
			if (isset($_POST['Notifications']))
				$Notifications = 1;

            // Checking for empty fields - pushing error message to $errors array
            if (empty($username))
                array_push($errors, "Username cannot be empty");
            if (empty($email) || (!strstr($email, "@")))
                array_push($errors, "Email is not valid");
            if (empty($password))
				array_push($errors, "Password connot be empty");
				if (!preg_match('/[A-Z]/', $password))
					array_push($errors, "Password must contain atleast one uppercase letter (A - Z)");
				if (!preg_match('/[0-9]/', $password))
					array_push($errors, "Password must contain atleast one numerical digit (0 - 9)");
				if (!preg_match('/[a-z]/', $password))
					array_push($errors, "Password must contain atleast one lower case letter (a - z)");
				if (!preg_match($special, $password))
					array_push($errors, "Password must contain atleast one special character ('/[(~`!@#$%^&*()+=_-{}[]\|:;”’?/<>,.)");
            if (empty($con_password))
                array_push($errors, "Passwords do not match");

            // Checking is user already exists
            $query = $dbc->prepare("SELECT * FROM camagru.user_data WHERE username = :uname OR email = :mail");
            $query->execute(["uname"=>$username, "mail"=>$email]);
            $rows = $query->fetchAll();
            if (sizeof($rows) >= 1)
				array_push($errors, "Username or Email already exists");
            
            // Add user to database when no errors pushed to array
            if (count($errors) == 0)
            {
                $_SESSION['username'] = $username;
                $password = hash('whirlpool', str_rot13($password));
                echo $password;
                $token = hash('whirlpool', str_rot13($username));
                $link = "http://localhost:8080/WebDev/Camagru/email_auth.php?token=".$token;
                $query = "INSERT INTO camagru.user_data (username, email, `password`, notifications, token)
                            VALUES ('$username', '$email', '$password', '$Notifications', '$token')";
				$dbc->exec($query);
				
				$email_msg = "Please follow the link bellow\nto verify your account\n$link";
				$email_msg = wordwrap($email_msg, 70, "\n");
				mail("$email", "SuperGram Verification", "$email_msg");
                header('Location: login.php');
            }
            else
            {
                foreach ($errors as $e)
                    echo $e . "\n";
            }
		}
		// Login
        if (isset($_POST['login']))
        {
            require('database.php');
            unset($errors);

            $log_name = $_POST['log_name'];
            $log_pass = $_POST['log_pass'];
            $errors = array();

            // Checking if all fields are filled
            if (empty($log_name))
                array_push($errors, "Username cannot be empty");
            if (empty($log_pass))
				array_push($errors, "Username cannot be empty");

			// Check is user exists in database
			$query = $dbc->prepare("SELECT * FROM camagru.user_data WHERE username = :uname AND `password` = :log_pass");
			$query->execute(["uname"=>$log_name, "log_pass"=>hash('whirlpool', str_rot13($log_pass))]);
			$rows = $query->fetchAll();
			if (sizeof($rows) >= 1)
			{
				// Checking for Verification
				$query = $dbc->prepare("SELECT * FROM camagru.user_data WHERE username = :uname AND verified IS NOT NULL");
				$query->execute(["uname"=>$log_name]);
				$rows = $query->fetchAll();
				if (!(sizeof($rows)) >= 1)
					array_push($errors, "User is not verified");

			}
			else
				array_push($errors, "Username or Password incorrect");
            if (count($errors) == 0)
            {
                    $_SESSION['username'] = $log_name;
                    $_SESSION['id'] = $rows[0]['id'];
                    header('Location: index.php');
			}
			else
            {
                foreach ($errors as $e)
                    echo $e . "\n";
			}
		}
		// Change password from profile
		if (isset($_POST['password_profile_change']))
			header ('location: forgot_password.php');
		// Reset Password
		if (isset($_POST['forgot_password']))
		{
			$errors = array();

			// Checking for existing email in DB
			require('database.php');
			$query = $dbc->prepare("SELECT * FROM camagru.user_data WHERE email = :email");
			$query->execute(["email"=>$_POST['email_reset']]);
			$rows = $query->fetchAll();
			if (sizeof($rows) >= 1)
			{
				//Generating Random Token
				$raw_string = rand(10, 100);
				$reset_token = hash('whirlpool', str_rot13($raw_string));
				$link = "http://localhost:8080/WebDev/Camagru/reset_password.php?reset_token=".$reset_token;

				// Update database with new token
				$query = $dbc->prepare("UPDATE camagru.user_data SET token = :new_token");
				$query->execute(["new_token"=>$reset_token]);

				// Send reset email
				$email_msg = "Please follow the link bellow\nto reset your password.\n$link";
				$email_msg = wordwrap($email_msg, 70, "\n");
				mail($_POST['email_reset'], "SuperGram Password reset", "$email_msg");
			}
			else
			{
				echo "That Username/Email does not exist";
			}
		}
		// Reset Password Authentication
		if (isset($_POST['change_password']))                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
		{
			$new_password = $_POST['New_Password'];
			$con_new_password = $_POST['Confirm_New_Password'];
			if (empty($new_password))
			array_push($errors, "Password connot be empty");
			if (!preg_match('/[A-Z]/', $new_password))
				array_push($errors, "Password must contain atleast one uppercase letter (A - Z)");
			if (!preg_match('/[0-9]/', $new_password))
				array_push($errors, "Password must contain atleast one numerical digit (0 - 9)");
			if (!preg_match('/[a-z]/', $new_password))
				array_push($errors, "Password must contain atleast one lower case letter (a - z)");
			if (!preg_match($special, $new_password))
				array_push($errors, "Password must contain atleast one special character ('/[(~`!@#$%^&*()+=_-{}[]\|:;”’?/<>,.)");
            if (!($new_password == $con_new_password))
				array_push($errors, "Passwords do not match");
			if (count($errors) == 0)
			{
				$query = $dbc->prepare("UPDATE camagru.user_data SET `password` = :new_password");
				$query->execute(["new_password"=>hash('whirlpool', str_rot13($new_password))]);
				header('Location: login.php');
			}
			else
            {
                foreach ($errors as $e)
                    echo $e . "\n";
			}
		}
		if (isset($_POST['change_username']))
			{
				header ('location: update_username.php');
			}
			if (isset($_POST['change_email']))
			{
				header ('location: update_email.php');
			}
			if (isset($_POST['change_notifications']))
			{
				header ('location: update_notifications.php');
			}
		// Updating Notifications
		if (isset($_POST['update_notifications']))
		{
			$errors = array();
			if (isset($_POST['Notifications_ON']) && isset($_POST['Notifications_OFF']))
				array_push($errors, "Please select only one option");
			elseif (!(isset($_POST['Notifications_ON'])) && !(isset($_POST['Notifications_OFF'])))
				array_push($errors, "Please select an option");
			elseif (isset($_POST['Notifications_ON']))
			{
				$query = $dbc->prepare("SELECT * FROM camagru.user_data WHERE username = :uname AND `notifications` = 0");
				$query->execute(["uname"=>$_SESSION['username']]);
				$rows = $query->fetchAll();
				if (sizeof($rows) >= 1)
				{
					$query = $dbc->prepare("UPDATE camagru.user_data SET `notifications` = 1");
					$query->execute();				}
				else
					array_push($errors, "Notifications are already turned on!");
			}	
			elseif (isset($_POST['Notifications_OFF']))
			{
				$query = $dbc->prepare("SELECT * FROM camagru.user_data WHERE username = :uname AND `notifications` = 1");
				$query->execute(["uname"=>$_SESSION['username']]);
				$rows = $query->fetchAll();
				if (sizeof($rows) >= 1)
				{
					$query = $dbc->prepare("UPDATE camagru.user_data SET `notifications` = 0 WHERE username = :uname");
					$query->execute(["uname"=>$_SESSION['username']]);
				}
				else
					array_push($errors, "Notifications are already turned off!");
			}
			if (isset($_POST['notif_password']))
			{
				$query = $dbc->prepare("SELECT * FROM camagru.user_data WHERE username = :uname AND `password` = :pass");
				$query->execute(["uname"=>$_SESSION['username'], "pass"=>hash('whirlpool', str_rot13($_POST['notif_password']))]);
				$rows = $query->fetchAll();
				if (sizeof($rows) <= 0)
					array_push($errors, "Password incorrect");
			}
			else
				array_push($errors, "Please insert a password");
			if (count($errors) == 0)
				header ('location: profile.php');
			else
			{
                foreach ($errors as $e)
					echo $e . "\n";
			}
		}
		// Updating Email
		if (isset($_POST['update_email']))
		{
			$errors = array();
			if (empty($_POST['new_email']))
				array_push($errors, "Email cannot be empty");
			else
			{
				$update_email = $_POST['new_email'];
				$query = $dbc->prepare("SELECT * FROM camagru.user_data WHERE email = :email");
				$query->execute(["email"=>$update_email]);
				$rows = $query->fetchAll();
				if (sizeof($rows) >= 1)
					array_push($errors, "Email Already in use");
			}
			if (isset($_POST['password_email']) && !(empty($_POST['password_email'])))
			{
				$query = $dbc->prepare("SELECT * FROM camagru.user_data WHERE username = :uname AND `password` = :pass");
				$query->execute(["uname"=>$_SESSION['username'], "pass"=>hash('whirlpool', str_rot13($_POST['password_email']))]);
				$rows = $query->fetchAll();
				if (sizeof($rows) <= 0)
					array_push($errors, "Password incorrect");
			}
			else
				array_push($errors, "Please insert a password");
			if (count($errors) == 0)
			{
				$query = $dbc->prepare("UPDATE camagru.user_data SET email = :email WHERE username = :user");
				$query->execute(["email"=>$update_email, "user"=>$_SESSION['username']]);
				header ('location: profile.php');
			}
			else
			{
                foreach ($errors as $e)
					echo $e . "\n";
			}
		}
		// Update username
		if (isset($_POST['update_username']))
		{
			$errors = array();
			if (empty($_POST['new_username']))
				array_push($errors, "Username cannot be empty");
			else
			{
				$query = $dbc->prepare("SELECT * FROM camagru.user_data WHERE username = :update_user");
				$query->execute(["update_user"=>$_POST['new_username']]);
				$rows = $query->fetchAll();
				foreach ($rows as $e)
					echo $e['username'];
				if (sizeof($rows) >= 1)
				{
					echo "IN ERRO STATE!";
					array_push($errors, "Username already in use");
				}
			}
			if (isset($_POST['password_update_username']) && !(empty($_POST['password_update_username'])))
			{
				$query = $dbc->prepare("SELECT * FROM camagru.user_data WHERE username = :uname AND `password` = :pass");
				$query->execute(["uname"=>$_SESSION['username'], "pass"=>hash('whirlpool', str_rot13($_POST['password_update_username']))]);
				$rows = $query->fetchAll();
				if (sizeof($rows) <= 0)
					array_push($errors, "Password incorrect");
			}
			else
				array_push($errors, "Please insert a password");
			if (count($errors) == 0)
			{
				echo $_SESSION['id'];
				$query = $dbc->prepare("UPDATE camagru.user_data SET username = :update_user WHERE id = :id");
				$query->execute(["update_user"=>$_POST['new_username'], "id"=>$_SESSION['id']]);
				$_SESSION['username'] = $_POST['new_username'];
				header ('location: profile.php');
			}
			else
			{
                foreach ($errors as $e)
					echo $e . "\n";
			}	
		}
		if (isset($_POST['post_comment']))
		{
			$user = $_SESSION['username'];
			$comment = $_POST['comment'];
			$id = $_POST['add_like'];
			if (!(empty($comment)))
			{
				$query = $dbc->prepare("SELECT * FROM camagru.comments WHERE comment = :comment");
				$query->execute(["comment"=>$comment]);
				$rows = $query->fetch();
				if (count($rows) <= 1)
				{
					$query = $dbc->prepare("INSERT INTO camagru.comments (comment, pic_id, user_tag) VALUES ('$comment', '$id', '$user')");
					$query->execute();
				}
			}
		}
		if (isset($_POST['like_pic']))
		{
			$user = $_SESSION['username'];
			$query = $dbc->prepare("UPDATE camagru.userpic SET likes = likes + 1  WHERE id = :pic_id");
			$query->execute(["pic_id"=>$_POST['add_like']]);
		}
    }
    catch(PDOException $err)
    {
        echo $err->getMessage();
	}
?>