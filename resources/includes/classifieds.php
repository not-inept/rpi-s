<?php
// Grab all of the events that are in the morning mail quests:
require_once('connect.php');
$result = $dbconn->query('SELECT * FROM events WHERE quest = 0;');
if ($result){
	if ( $result->rowCount() != 0 ){
		foreach ($dbconn->query('SELECT * FROM events WHERE quest = 0;') as $results){
			echo '<li>>> '.strtoupper($results['location']).': '.$results['title'].'</li>';	
		}
	} else {
		echo '<li>>> Sorry, no events to show :\\</li>';
	}
} else {
	echo '<li>>~ ERROR: could not retrieve events :(</li>';
}
?>