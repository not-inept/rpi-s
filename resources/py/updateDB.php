<?php
// This php script will push json data to the database:
require "../includes/config.php";
require "../includes/connect.php";
// Import json file and read it in:
$file = file_get_contents('events.json');
$feed = json_decode($file);

// Prepared statement to database:
$stmt = $dbconn->prepare(
	'INSERT INTO `events` (`title`, `description`, `location`, `date`, `quest`)
	 VALUES  (:title, :description, :location, :datestamp, 0);');
for ($i = 0; $i < count($feed); $i++){
	$stmt->execute(array(
		':title' => $feed[$i]->{'title'},
		':description' => $feed[$i]->{'description'},
		':location' => $feed[$i]->{'location'},
		':datestamp' => strtotime($feed[$i]->{'date'}) + 3600
		));
}

// Now delete old events from events table:

$cull_events = $dbconn->prepare('
	DELETE FROM `events`
	WHERE `date` < :current_time;');
$cull_events->execute(array(
	':current_time' => time()
	));
?>