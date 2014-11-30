<?php
	if (isset($_POST['username'])) {
		require 'config.php';

		$name = $config['DB_NAME']; //DB We're using from config

		$username = $_POST['username']; //Data received from form
		$password = $_POST['password'];
		$email = $_POST['email'];
		$faction = $_POST['faction'];

		try {
		    $pdo = new PDO("mysql:host=localhost;dbname=$name", $config['DB_USERNAME'], $config['DB_PASSWORD']);
		    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    try {
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
				echo "User added.</p>";
			} catch(PDOException $e) {
				echo "User not added.</p>";
			}
		}  catch(PDOException $e) {
			echo "<p>Database does not yet exist...</p>";
		}
	} else {
		echo "
			<form id='newUser' name='newUser' action='create_user.php' method='post'>
			<label for='username'>Username:</label>
			<input type='name' id='username' name='username'>
			<label for='password'>Password:</label>
			<input type='password' id='password' name='password'>
			<label for='email'>Email:</label>
			<input type='email' id='email' name='email'>
			<label for='faction'>Faction:</label>
			<input type='faction' id='faction' name='faction'>
			<input type='submit' value='Create User'>
			</form>";
	}	
?>
