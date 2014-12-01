<?php
	session_start();
	if (isset($_GET['eventID']) && isset($_SESSION['username'])) {
		try {
			require_once("./config.php");
	        $name = $config['DB_NAME']; //DB We're using from config
	        $pdo = new PDO("mysql:host=localhost;dbname=$name", $config['DB_USERNAME'], $config['DB_PASSWORD']);
	        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $events = $pdo->prepare('SELECT * FROM `events` WHERE eventID=:id');
	    	$events->execute(array(':id' => $_GET['eventID']));
	        $event = $events->fetch();
	        $action_points = $_SESSION['points'];
	        $action_cost = (int) $event['actionCost'];
	        $actionParam = $event['actionParam'];
	        echo "Entering if...";
	        if ($action_points >= $action_cost) {
	        	$new_points = $action_points - $action_cost;
	        	echo $new_points;
		        if ($event['actionType'] == "move") {
		        	$prep = $pdo->prepare('UPDATE `players` SET (`current_location`, `action_points`) VALUES (:location, :points) WHERE  playerID = :id;');
	    			$prep->execute(array(
	    				':location' => $actionParam,
	    				':points' => $new_points,
	    				':id' => $_SESSION['id']
	    				));
	    			$loc = explode(",",$_SESSION['current_location']);
	    			$_SESSION['current_location'] = $actionParam;
	    			$_SESSION['points'] = $new_points;
	    			$_SESSION['cmd'] = $_SESSION['username']."@rpi-s: "."/campus_map/".$loc[0]."/".$loc[1]."_".$loc[2]."$ expendAP ".$event['actionCost']."<br>".$_SESSION['username']."@rpi-s: "."/campus_map/".$loc[0]."/".$loc[1]."_".$loc[2]."$ moveto ".$_SESSION['current_location']."<br>";
	    			header("location: ../../area.php?loc=$actionParam");
		        }
		    } else {
		    	echo $_SESSION['points'];
		    	echo $action_points;
		    	echo intval($event['actionCost']);
		    	echo "not enough ap bud";
		    }
        }  catch(PDOException $e) {
        	echo $e;
    	}
    }
?>