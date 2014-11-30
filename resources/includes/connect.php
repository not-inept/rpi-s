<?php
// Connect to the database
require $_SERVER['DOCUMENT_ROOT'].'/resources/includes/config.php';
try {
  $dbconn = new PDO('mysql:host=localhost;dbname='.$config['name'], 
  	$config['user'], $config['pass']);
}
catch (Exception $e) {
  echo "Error: " . $e->getMessage();
}
echo ">> SUCCESSFULLY CONNECTED!"
?>