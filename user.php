<?php
require 'resources/includes/config.php';
require 'resources/includes/connect.php';
if (isset($_SESSION['username'])){
	$stmt = $dbconn->prepare('SELECT p.*,f.factionName FROM players p, factions f
WHERE p.name=:username AND p.faction = f.factionID;');
	$stmt->exec(array(
		':username' => $_SESSION['username']
		));
	$player_data = $stmt->fetch();
	echo $player_data['username'];
	echo $player_data['faction'];
} else {
	header('location: resources/auth/login.php');
}
?>