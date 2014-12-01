<?php
	if (isset($_GET['eventID'])) {
		try {
			require_once("./config.php");
	        $name = $config['DB_NAME']; //DB We're using from config
	        $pdo = new PDO("mysql:host=localhost;dbname=$name", $config['DB_USERNAME'], $config['DB_PASSWORD']);
	        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $events = $pdo->prepare('SELECT * FROM `events` WHERE eventID=:id');
	    	$events->execute(array(':id' => $_GET['eventID']));
	        $result = $events->fetch();
	        print_r($result);
        }  catch(PDOException $e) {
        	echo $e;
    	}
    }
?>