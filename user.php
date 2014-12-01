<!doctype html>
<html>
<?php
require 'resources/includes/header.php';
if (isset($_SESSION['username'])){
	$stmt = $dbconn->prepare('SELECT p.*,f.factionName,g.name FROM players p, factions f, grades g
		WHERE p.name=:username AND p.faction = f.factionID AND g.id = p.grade;');
	$stmt->execute(array(
		':username' => $_SESSION['username']
		));
	$player_data = $stmt->fetch();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { // Print out each row of the DB into HTML
                $a = $row->name;
                $b = $row->password;
                $c = $row->email;
                $d = $row->current_location;
                $e = $row->action_points;
                $f = $row->grade;
                $g = $row->exp;
                $h = $row->factionName;
                $i = $row->special;
                $j = $row->active_quest;
        }

} else {
	header('location: resources/auth/login.php');
}
?>
<body>
        <section>
        <div id = "userDataForm">
        <form name="input" action="account_update.php" method="post">
                <ul>
                        <li>Name: <?php echo $_SESSION['username']; ?></li>
                        <li>Location: <?php echo $_SESSION['location']; ?></li>
                        <li>Action Points: <?php echo $_SESSION[''];  ?></li>
                        <li>Current Quest: <?php echo $_SESSION['quest']; ?></li>
                </ul>
                Name: <input type="text" name="first" id="first" value="<?php echo $a; ?>"><br>
                Password: <input type="password" name="pwd" id="pwd" value="<?php echo $b; ?>"><br>
                Email: <input type="text" name="email" id="email" value="<?php echo $c; ?>"><br>
                Location: <input type="text" name="loc" id="loc" value="<?php echo $d; ?>"><br>
                Points: <input type="text" name="point" id="point" value="<?php echo $e; ?>"><br>
                Experience: <input type="text" name="exp" id="exp" value="<?php echo $g; ?>"><br>
                Faction Name: <input type="text" name="faction" id="faction" value="<?php echo $h; ?>"><br>
                Quest: <input type="text" name="quest" id="quest" value="<?php echo $j; ?>"><br>
                Class: <br>
                <input type="submit" value="Update">
        </form>
        </div>
        </section>
</body>
</html>