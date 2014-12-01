<?php
	if (isset($_GET['eventID'])) {
		try {
			require_once("./config.php");
	        $name = $config['DB_NAME']; //DB We're using from config
	        $pdo = new PDO("mysql:host=localhost;dbname=$name", $config['DB_USERNAME'], $config['DB_PASSWORD']);
	        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $events = $pdo->prepare('SELECT * FROM `events` WHERE eventID=:id');
	    	$events->execute(array(':id' => $_GET['eventID']));
	        $event = $events->fetch();
	        $action_points = intval($_SESSION['points']);
	        if ($actionPoints >= intval($event['actionCost'])) {
	        	$new_points = $action_points - intval($event['actionCost']);
		        if ($event['actionType'] == "move") {
		        	$prep = $pdo->prepare('INSERT INTO `players` (`current_location`, `action_points`) VALUES (:location, :points) WHERE  playerID = :id;');
	    			
	    			$prep->execute(array(
	    				':location' => $actionParam,
	    				':points' => $new_points,
	    				':id' => $_SESSION['id']
	    				));
	    			$loc = explode(",",$_SESSION['current_location']);
	    			$_SESSION['current_location'] = $actionParam;
	    			$_SESSION['points'] = $new_points;
	    			$_SESSION['cmd'] = $_SESSION['username']."@rpi-s: "."/campus_map/".$loc[0]."/".$loc[1]."_".$loc[2]."$ expendAP ".$event['actionCost']."<br>";
	    			$_SESSION['cmd'] .= $_SESSION['username']."@rpi-s: "."/campus_map/".$loc[0]."/".$loc[1]."_".$loc[2]."$ moveto ".$_SESSION['current_location']."<br>";
	    			header("location: ../../area.php?loc=$actionParam");
		        }
		    } else {
		    	$_SESSION["cmd"] = $actionType;
		    }
        }  catch(PDOException $e) {
        	echo $e;
    	}
    }
?>