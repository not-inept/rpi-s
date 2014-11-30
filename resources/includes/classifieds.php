<?php
require $_SERVER['DOCUMENT_ROOT'].'/resources/includes/connect.php';
// Grab all of the events that are in the morning mail quests:
$result = $dbconn->query('SELECT * FROM events WHERE quest = 0;');
if ($result){
	if ( $result->rowCount() != 0 ){
		foreach ($dbconn->query('SELECT * FROM events WHERE quest = 0;') as $results){
			echo '<li>>> '.$results['location'].'</li>';	
		}
	} else {
		echo '<li>>> Sorry, no events to show :\\</li>';
	}
} else {
	echo '<li>>~ ERROR: could not retrieve events :(</li>';
}
?>