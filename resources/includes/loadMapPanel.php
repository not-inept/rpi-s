  <?php
	try {
        $name = $config['DB_NAME']; //DB We're using from config
        $pdo = new PDO("mysql:host=localhost;dbname=$name", $config['DB_USERNAME'], $config['DB_PASSWORD']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $areaInfo = $pdo->prepare('SELECT * FROM areas WHERE areaID=:id');
    	$areaInfo->execute(array(':id' => $_GET['loc']));
        $result = $areaInfo->fetch();
    	echo "<div id='panel1'>";
    	echo "<h1>".$result['name']."</h1>";
    	echo "<p>".$result['description']."</p>";
    	echo "</div>";
    }  catch(PDOException $e) {
    	echo "<p>Error loading info..</p>";
	}
?>

