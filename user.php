<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Account Page</title>
        <style type="text/css">
        form{
            margin:auto;
            position: relative;
            width:50%;
            height:100%;
            font-family: Tahoma, Geneva, sans-serif;
            font-size: 14px;
            font-style: italic;
            line-height: 24px;
            font-weight: bold;
            color: #09C;
            border-radius: 10px;
            padding:10px;
            padding-bottom: 0px;
            border: 1px solid #999;
            border: inset 1px solid #333;
            text-decoration: none;
            box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
        }
        input{
            width:375px;
            display:block;
            border: 1px solid #999;
            height: 25px;
        }
        input[type="radio"]{
            display: inline-block;
            height: 15px;
            width: 40px;
        }
        </style>
    </head>
    <body>

    <?php
require 'resources/includes/config.php';
require 'resources/includes/connect.php';
if (isset($_SESSION['username'])){
  $stmt = $dbconn->prepare('SELECT p.*,f.factionName FROM players p, factions f
WHERE p.name=:username AND p.faction = f.factionID;');
  $stmt->exec(array(
    ':username' => $_SESSION['username']
    ));
  $player_data = $stmt->fetch();
  echo $player_data['username'];
  echo $player_data['faction'];
} else {
  header('location: resources/auth/login.php');
}

        while($row = $stmt->fetch(PDO::FETCH_OBJ)) { // Print out each row of the DB into HTML
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

    ?>

        <form name="input" action="account_update.php" method="post">
            Name: <input type="text" name="first" id="first" value="<?php echo $a; ?>"><br>
            Password: <input type="password" name="pwd" id="pwd" value="<?php echo $b; ?>"><br>
            Email: <input type="text" name="email" id="email" value="<?php echo $c; ?>"><br>
            Location: <input type="text" name="loc" id="loc" value="<?php echo $d; ?>"><br>
            Points: <input type="text" name="point" id="point" value="<?php echo $e; ?>"><br>
            Experience: <input type="text" name="exp" id="exp" value="<?php echo $g; ?>"><br>
            Faction Name: <input type="text" name="faction" id="faction" value="<?php echo $h; ?>"><br>
            Quest: <input type="text" name="quest" id="quest" value="<?php echo $j; ?>"><br>
            Class: <br>
            <input type="radio" name="class" <?php echo ($f=='0')?'checked':'' ?> value="Fr" readonly>Freshmen<br>
            <input type="radio" name="class" <?php echo ($f=='1')?'checked':'' ?> value="So" readonly>Sophomore<br>
            <input type="radio" name="class" <?php echo ($f=='2')?'checked':'' ?> value="Jr" readonly>Junior<br>
            <input type="radio" name="class" <?php echo ($f=='3')?'checked':'' ?> value="Sr" readonly>Senior<br><br>
            <input type="submit" value="Update">
        </form>
    </body>
</html>
