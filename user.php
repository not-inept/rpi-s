<!doctype html>
<html>
<?php
require 'resources/includes/header.php';
if (isset($_SESSION['username'])){
	//$stmt = $dbconn->prepare('SELECT o.* FROM inventory i, objects o WHERE i.playerID=:usernum AND o.objID=i.objID;');
        $stmt = $dbconn->prepare('SELECT * FROM objects;');
        $stmt->execute(array(
		':usernum' => $_SESSION['id']
	));
} else {
	header('location: resources/auth/login.php');
}
?>
<body>
        <section id = "userInventory">
        <h2 class = "userInventory">Player Items:</h2>
        <ul>
        <?php
        $inventory = $stmt->fetch(PDO::FETCH_ASSOC);
        echo $inventory['name'];
        while ($row = $stmt->fetch()){
                echo $row['n'];
        }
        ?>
        </ul>
        </section>
</body>
</html>