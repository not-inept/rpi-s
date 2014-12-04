<?php
// Connect to the database:
// NOTE: The php script that requires this file
// must also require the file containing $config (array)
require_once('config.php');

try {
  $dbconn = new PDO('mysql:host='.$config['DB_HOST'].';dbname='.$config['DB_NAME'], 
  	$config['DB_USERNAME'], $config['DB_PASSWORD']);
}
catch (Exception $e) {
  echo "Error: " . $e->getMessage();
}
//echo ">> SUCCESSFULLY CONNECTED!"
?>
