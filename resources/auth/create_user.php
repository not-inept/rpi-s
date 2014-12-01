<?php

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['faction']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['faction'])) {
	require '../includes/config.php';
    $name = $config['DB_NAME']; //DB We're using from config
    $username = $_POST['username']; //Data received from form
    $password = $_POST['password'];
    $email = $_POST['email'];
    $faction = $_POST['faction'];
    //TODO: Add email verification.
    try {
    	$pdo = new PDO("mysql:host=localhost;dbname=$name", $config['DB_USERNAME'], $config['DB_PASSWORD']);
    	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	try {

    		$user_chk = $pdo->prepare('SELECT `name` FROM `players` WHERE name=:username');
    		$user_chk->execute(array(':username' => $username));

    		if ($user_chk->fetch()) {
    			echo "Duplicate username.<br/><a href='create_user.php'>Back</a>";
			//header('location: login.php');
    		}
    		else{
    			$prep = $pdo->prepare('INSERT INTO `players` (`name`, `allnaturalseasalt`, `password`,`email`,`faction`) VALUES (:username, :salt, :password, :email, :faction);');
    			$salt = hash('sha256',uniqid(mt_rand(), true));
    			$password = hash('sha256',$salt.$password);

    			$prep->execute(array(
    				':username' => htmlspecialchars($username),
    				':salt' => $salt,
    				':password' => $password,
    				':email' => $email,
    				':faction' => $faction
    				));
        	//echo "User added.</p>";
    			header('location: login.php');
    		}
    	} catch(PDOException $e) {
    		print_r($e);
    		echo "User not added.</p>";
    	}
    }  catch(PDOException $e) {
    	echo "<p>Database does not yet exist...</p>";
    }
} else {
	echo "
	<html>
	<head>
	<title>RPI-S: create user</title>
	<link rel='stylesheet' href='../css/style.css' type='text/css'/>
	</head>
	<form id='newUser' name='newUser' action='create_user.php' method='post'>
	<a href='login.php'> Back </a>
	<p>
	<label for='username'>Username:</label>
	<input type='name' id='username' name='username'>
	</p>
	<p>
	<label for='password'>Password:</label>
	<input type='password' id='password' name='password'>
	</p>
	<p>
	<label for='email'>Email:</label>
	<input type='email' id='email' name='email'>
	</p>
	<p>
	<label for='faction'>Faction:</label>
	<input type='faction' id='faction' name='faction'>
	<p>
	<p><input type='submit' value='Create User'></p>
	</form>
	</html>";
} 
?>
