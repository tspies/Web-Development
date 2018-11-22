<?php
    sesssion_start();
    $username= "";
    $email = "";
    $errors = array();

    try
    {
        require('connection.php');
        if (isset($_POST['sign_up']))
        {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $con_password = $_POST['confirm_password'];

            // Checking for empty fields - pushing error message to $errors array
            if (empty($username))
                array_push($errors, "Username cannot be empty");
            if (empty($email) || (!strstr($email, "@")))
                array_push($errors, "Email is not valid");
            if (empty($password))
                array_push($errors, "Password connot be empty");
            if (empty($con_password))
                array_push($errors, "Passwords do not match");

            // Checking is user already exists
            $query = $dbc->prepare("SELECT * FROM camagru.user_data WHERE username = :uname OR email = :mail");
            $query->execute(["uname"=>$username, "mail"=>$email]);
            $rows = $query->fetchAll();
            if (sizeof($rows) >= 1)
                array_push($errors, "Username or Email already exists");
            
            // Add user to database when no errors pushed to array
            if ($count($errors) == 0)
            {
                $_SESSION['username'] = $username;
                $password = hash('whirlpool', str_rot13($password));
                $token = hash('whirlpool', str_rot13($username));
                $link = "http://localhost:8080/WebDev/Camagru/email_auth.php?token=".$token;
                $query = "INSERT INTO camagru.user_data (username, `password`, email)
                            VALUES ('$username', '$email', '$password')";
				$connect->exec($query);
				
				$email_msg = "Please follow the link bellow\nto verify your account\n$link";
				$email_msg = wordwrap($email_msg, 70);
				mail("$email", "SuperGram Verification", $email_msg);
				header('Location: login.php');
            }
        }
    }
    catch(PDOException $err)
    {
        echo $err->getMessage();
    }
?>