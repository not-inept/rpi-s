<?php
// This php script will push json data to the database:
require "../includes/config.php";
require "../includes/connect.php";
// Import json file and read it in:


// Prepared statement to database:
try {
    $name = $config['DB_NAME']; //DB We're using from config
    $pdo = new PDO("mysql:host=localhost;dbname=$name", $config['DB_USERNAME'], $config['DB_PASSWORD']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $players = $pdo->prepare('SELECT * FROM `players` WHERE action_points != :max');

	$players->execute(array(':max' => 15));

    $result = $players->fetchAll();

    $playerUpdate = $pdo->prepare('UPDATE `players` SET action_points = :ap WHERE playerID = :id');

    foreach ($result as $player) {
    	$newAP = $player['action_points']+5;
    	if ($newAP > 15) {
    		$newAP = 15;
    	}
    	$playerUpdate->execute(array(
    		':ap' => $newAp,
    		':id' => $player['playerID']));
	}
}  catch(PDOException $e) {
	echo $e;
}