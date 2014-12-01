<?php 
function parseActionText($actionText,$actionParam) {
	//allows to add rule macros for movement, etc
	$actionText = str_replace(":L",$actionParam,$actionText);
	return $actionText;
}

if (isset($_SESSION['username'])) { //if active user & user character in location
	if (isset($_SESSION['current_location']) && $_SESSION['current_location'] == $_GET['loc']) {
		try {
	        $name = $config['DB_NAME']; //DB We're using from config
	        $pdo = new PDO("mysql:host=localhost;dbname=$name", $config['DB_USERNAME'], $config['DB_PASSWORD']);
	        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $events = $pdo->prepare('SELECT * FROM `events` WHERE areaID=:id');
	    	$events->execute(array(':id' => $_GET['loc']));
	        $result = $events->fetchAll();
	        foreach ($result as $event) {
        		echo "<li class='control'>";
        		echo "<a href='action.php?actionType=".$event['actionType']."&actionParam=".$event['actionParam']."'>";
        		echo parseActionText($event['actionText'],$event['actionParam']);
				echo "</li>";
            }
        }  catch(PDOException $e) {
        	echo "<p>Error loading controls..</p>";
        	echo $e;
    	}
	} else {
		echo "
		<li class='control'>
		<a href='
		area.php?loc=".$_SESSION['current_location']."
		''>Your character appears to be elsewhere. Click here to go there!</a>
		</li>";
	}
} else {
	echo '
	<li class="controls">
	<a href="resources/auth/login.php">[ insert card ] <br>to play</a>
	</li>';
}
?>