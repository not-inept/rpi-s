<?php
// This php script will push json data to the database,
// unless the json file is to be directly sent to the client
// and processed locally with JavaScript
require $_SERVER['DOCUMENT_ROOT'].'/resources/includes/connect.php';
// Import json file and read it in:
$file = file_get_contents('events.json');
$feed = json_decode($file);

// Prepared statement to database:
$stmt = $dbconn->prepare(
	'INSERT INTO `events` (`title`, `description`, `location`, `date`)
	 VALUES  (:title, :description, :location, :datestamp);');
for ($i = 0; $i < count($feed); $i++){
	$stmt->execute(array(
		':title' => $feed[$i]->{'title'},
		':description' => $feed[$i]->{'description'},
		':location' => $feed[$i]->{'location'},
		':datestamp' => strtotime($feed[$i]->{'date'}) + 3600
		));
	//echo nl2br($feed[$i]->{'title'}."\n\n");
}

// Now delete old events from events table:

$cull_events = $dbconn->prepare('
	DELETE FROM `events`
	WHERE `date` < :current_time;');
$cull_events->execute(array(
	':current_time' => time()
	));
?>