<?php
require $_SERVER['DOCUMENT_ROOT'].'/resources/includes/connect.php';
// Grab all of the events that are in the morning mail quests:
foreach ($dbconn->query('SELECT * FROM events WHERE quest = 0') as $results){
	echo '<li>>> '.$results['location'].'</li>';
}
?>