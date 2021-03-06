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
	        	$loc = explode(",",$_SESSION['current_location']);
		        if ($event['actionType'] == "move") {
		        	$prep = $pdo->prepare('UPDATE `players` SET current_location=:location, action_points=:points WHERE  playerID = :id;');
	    			$prep->execute(array(
	    				':location' => $actionParam,
	    				':points' => $new_points,
	    				':id' => $_SESSION['id']
	    				));
	    			$_SESSION['current_location'] = $actionParam;
	    			$_SESSION['points'] = $new_points;
	    			$_SESSION['cmd'] = $_SESSION['username']."@rpi-s: "."/campus_map/".$loc[0]."/".$loc[1]."_".$loc[2]."$ expendAP ".$event['actionCost']."<br>".$_SESSION['username']."@rpi-s: "."/campus_map/".$loc[0]."/".$loc[1]."_".$loc[2]."$ moveto ".$_SESSION['current_location']."<br>";
	    			header("location: ../../area.php?loc=$actionParam");
		        } elseif ($event['actionType'] == "enemy") {
	        		$enemies = $pdo->prepare('SELECT * FROM `enemies` WHERE enemyID=:id');
	    			$enemies->execute(array(':id' => $actionParam));
	        		$enemy = $enemies->fetch();
	        		$cmd = $_SESSION['username']."@rpi-s: "."/campus_map/".$loc[0]."/".$loc[1]."_".$loc[2]."$ expendAP ".$event['actionCost']."<br>";
	        		$cmd .= $_SESSION['username']."@rpi-s: "."/campus_map/".$loc[0]."/".$loc[1]."_".$loc[2]."$ attack ".$enemy['name']."<br>";
	        		$damage = 0; $hits = 0;
	        		$new_exp = $_SESSION['exp'];
	        		while ($hits < $enemy['hits']) {
	        			$damMax = (int) $enemy['maxDamage'] - $damage;
	        			$curDam = rand(0,$damMax);
	        			$damage += $curDam;
	        			$cmd .= $enemy['name']." attacks for ".$curDam." hp<br>";
	        			$hits++;
	        		}
	        		$new_hp = (int) $_SESSION['hp'] - $damage;
	        		$new_exp = (int) $_SESSION['exp'] + $enemy['exp'];
	        		$new_grade = (int) $_SESSION['grade'];
	        		if ($new_hp <= 0) {
	        			$new_hp = 0;
	        			$new_exp = $_SESSION['exp'];
	        			$new_points = 0;
	        			$cmd .= $_SESSION['name']." killed you D:<br>";
	        		} else {
	        			$expToDisp = $new_exp - (int) $_SESSION['exp'];
	        			$cmd .= $enemy['name']." fainted, you gained ".$expToDisp." experience points<br>";
	        		}
	        		if ($new_exp > (int) $_SESSION['maxxp']) {
	        			$new_grade++;
	        			$grade = $pdo->prepare('SELECT `name`,`maxEXP` FROM `grades` WHERE `id` = :grade;');
    					$grade->execute(array(
      						':grade' => $new_grade
      					));

    					$grade_data = $grade->fetch();
    					$_SESSION['maxxp'] = $grade_data['maxEXP'];
    					$_SESSION['grade_str'] = $grade_data['name'];
    					$cmd .= "grade promoted to ".$_SESSION['grade_str']."<br>";

	        		}
		        	$prep = $pdo->prepare('UPDATE `players` SET hp=:hp, action_points=:points, exp=:exp, grade=:grade WHERE  playerID = :id;');
	    			$prep->execute(array(
	    				':hp' => $new_hp,
	    				':points' => $new_points,
	    				':id' => $_SESSION['id'],
	    				':exp' => $new_exp,
	    				':grade' => $new_grade
	    				));
	    			$loc = explode(",",$_SESSION['current_location']);
	    			$_SESSION['points'] = $new_points;
	    			$_SESSION['cmd'] = $cmd;
	    			$_SESSION['exp'] = $new_exp;
	    			$_SESSION['grade'] = $new_grade;
	    			$_SESSION['hp'] = $new_hp;
	    			$newLocation = $_SESSION['current_location'];
	    			header("location: ../../area.php?loc=$newLocation");
		        }
			} else {
		   		echo $_SESSION['points'];
		   		echo $action_points;
		   		echo intval($event['actionCost']);
		   		echo "not enough ap bud";
		   		$_SESSION['cmd'] = $_SESSION['username']."@rpi-s: "."/campus_map/".$loc[0]."/".$loc[1]."_".$loc[2]."$ expendAP ".$event['actionCost']."<br>"."ERROR: Failed. Insufficient AP Remaining.<br>";
	    		$newLocation = $_SESSION['current_location'];
	    		header("location: ../../area.php?loc=$newLocation");
			}
    	}  catch(PDOException $e) {
        	echo $e;
        }
    }
?>