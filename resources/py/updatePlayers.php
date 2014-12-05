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
    $players = $pdo->prepare('SELECT * FROM `players` WHERE action_points != :max OR hp < maxhp');

	$players->execute(array(':max' => 15));

    $result = $players->fetchAll();

    $playerUpdate = $pdo->prepare('UPDATE `players` SET action_points = :ap, hp = :hp WHERE playerID = :id');

    foreach ($result as $player) {
    	$currentAP = (int) $player['action_points'];
    	echo "<p> Current points are: $currentAP</p>";
    	$newAP = $currentAP + 5;
    	$newHP = $player['hp'] + 15;
    	if ($newAP > 15) {
    		$newAP = 15;
    	}
    	if ($newHP > $player['maxhp']) {
    		$newHP = $player['maxhp'];
    	}
    	$playerUpdate->execute(array(
    		':ap' => $newAP,
    		':hp' => $newHP,
    		':id' => $player['playerID']));
	}
}  catch(PDOException $e) {
	echo $e;
}