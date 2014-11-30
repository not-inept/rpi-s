<?php
session_start();
//TODO: Apply styling to login.php
require '../includes/config.php';
// Connect to the database
try {
  $dbname = $config['DB_NAME'];
  $user = $config['DB_USERNAME']; 
  $pass = $config['DB_PASSWORD'];
  $dbconn = new PDO('mysql:host=localhost;dbname='.$dbname, $user, $pass);
}
catch (Exception $e) {
  echo "Error: " . $e->getMessage();
}

// Check login
if (isset($_POST['login']) && $_POST['login'] == 'Login') {

// check user with the salt

  $salt_stmt = $dbconn->prepare('SELECT allnaturalseasalt FROM players WHERE name=:username');
  $salt_stmt->execute(array(':username' => $_POST['username']));
  $res = $salt_stmt->fetch();
  $salt = ($res) ? $res['allnaturalseasalt'] : '';

  $salted = hash('sha256', $salt.$_POST['pass']);
  echo $salted;
  echo $_POST['username'];
  echo $_POST['pass'];
  $login_stmt = $dbconn->prepare('SELECT playerID, name, faction, grade, exp, hp, maxhp   FROM players WHERE name=:username AND password=:pass');
  $login_stmt->execute(array(':username' => $_POST['username'], ':pass' => $salted));
  
  
  if ($user = $login_stmt->fetch()) {
    $_SESSION['username'] = $user['name'];
    $_SESSION['id'] = $user['playerID'];
    //TODO: Convert grade to string from grades table
    $_SESSION['grade'] = $user['grade'];
    //TODO: Convert faction to string from faction table
    $_SESSION['faction'] = $user['faction'];
    $_SESSION['exp'] = $user['exp'];
    $_SESSION['hp'] = $user['hp'];
    $_SESSION['maxhp'] = $user['maxhp'];
    header("Location: ../../index.php");
  }
  else {
    $err = 'Incorrect username or password.';
  }
}

// Logout
if (isset($_SESSION['username']) && isset($_POST['logout']) && $_POST['logout'] == 'Logout') {
    session_unset(); 
    session_destroy();
  // end the session here
  $err = 'You have been logged out.';
}
?>

<!doctype html>
<html>
<head>
  <title>RPI-S: login</title>
  <link rel="stylesheet" href="../css/style.css" type="text/css"/>
</head>
<body>
<?php if (isset($_SESSION['username'])): ?>
  <?php header("Location: ../../index.php"); ?>
<?php else: ?>
  <div id="main2">
    <div id="login">
      <h1>Login</h1>
      <?php if (isset($err)) echo "<p>$err</p>" ?>
      <form method="post" action="login.php">
        <p><label for="username">Username: </label><input type="name" name="username" /></p>
        <p><label for="pass">Password: </label><input type="password" name="pass" /></p>
        <p><input name="login" type="submit" value="Login" /></p>
      </form>
    </div>
    <div id="create">
      <h1>Or create user</h1>
      <form method="post" action="create_user.php">
        <p><input name="create" type="submit" value="Create New User" /></p>
      </form>
    </div>
  </div>
<?php endif; ?>
</body>
</html>
