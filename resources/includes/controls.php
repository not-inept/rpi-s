<?php 
function parseActionText($config, $actionText,$actionParam,$actionCost) {
	//allows to add rule macros for movement, etc
	if (str_replace(":L","BLARRRRGH",$actionText) != $actionText) {
		//We know it is movement
		try {
	        $name = $config['DB_NAME']; //DB We're using from config
	        $pdo = new PDO("mysql:host=localhost;dbname=$name", $config['DB_USERNAME'], $config['DB_PASSWORD']);
	        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $events = $pdo->prepare('SELECT `name` FROM `areas` WHERE areaID=:id');
	    	$events->execute(array(':id' => $actionParam));
	        $result = $events->fetch();
	        $replace = $result['name'];
        }  catch(PDOException $e) {
        	$replace = "...Error loading location.";
        	$replace.= $e;
    	}
		$actionText = str_replace(":L",$replace,$actionText);
	}
	if (str_replace(":E","BLARRRRGH",$actionText) != $actionText) {
		//We know it is an enemy
		try {
	        $name = $config['DB_NAME']; //DB We're using from config
	        $pdo = new PDO("mysql:host=localhost;dbname=$name", $config['DB_USERNAME'], $config['DB_PASSWORD']);
	        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $events = $pdo->prepare('SELECT `name` FROM `enemies` WHERE enemyID=:id');
	    	$events->execute(array(':id' => $actionParam));
	        $result = $events->fetch();
	        $replace = $result['name'];
        }  catch(PDOException $e) {
        	$replace = "...Error loading enemy.";
        	$replace.= $e;
    	}
		$actionText = str_replace(":E",$replace,$actionText);
	}
	$actionText .= " (costs ".$actionCost." action points)<br><br>";
	return $actionText;
}

if (isset($_SESSION['username'])) { //if active user & user character in location
	if (isset($_SESSION['current_location']) && $_SESSION['current_location'] == $_GET['loc']) {
		//Generate event based commands
		try {
	        $name = $config['DB_NAME']; //DB We're using from config
	        $pdo = new PDO("mysql:host=localhost;dbname=$name", $config['DB_USERNAME'], $config['DB_PASSWORD']);
	        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $events = $pdo->prepare('SELECT * FROM `events` WHERE areaID=:id');
	    	$events->execute(array(':id' => $_GET['loc']));
	        $result = $events->fetchAll();
	        if (count($result) == 0) {
	        	echo "<li class='control'>";
        		echo "<a href='./index.php'>";
        		echo "Ooops, looks like you're stuck. Sorry, mate.";
        		echo "</a>";
				echo "</li>";
	        } else {
		        foreach ($result as $event) {
	        		echo "<li class='control'>";
	        		echo "<a href='resources/includes/actions.php?eventID=".$event['eventID']."'>";
	        		echo parseActionText($config, $event['actionText'],$event['actionParam'],$event['actionCost']);
					echo "</li>";
	            }
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
		''>Your character appears to be elsewhere. <br><br>(click  to go there)</a>
		</li>";
	}
} else {
	echo '
	<li class="controls">
	<a href="resources/auth/login.php">[ insert card ] <br><br>(click to play)</a>
	</li>';
}
?>