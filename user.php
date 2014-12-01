<!doctype html>
<html>
<?php
require 'resources/includes/header.php';
if (isset($_SESSION['username'])){
	$stmt = $dbconn->prepare('SELECT o.* FROM inventory i, objects o WHERE i.playerID=:usernum AND o.objID=i.objID;');
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
        foreach ($stmt as $row){
                echo '<li>'.$row['name'].'</li>';
        }
        ?>
        </ul>
        </section>
</body>
</html>