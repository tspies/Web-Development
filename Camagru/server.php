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
        require('connection.php');
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
                $query = "INSERT INTO camagru.user_data (username, email, `password`, notifications)
                            VALUES ('$username', '$email', '$password', '$Notifications')";
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
        if (isset($_POST['login']))
        {
            require('connection.php');
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
    }
    catch(PDOException $err)
    {
        echo $err->getMessage();
    }
?>