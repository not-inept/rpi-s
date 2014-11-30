<?php
session_start();

require 'config.php';
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

  $salt_stmt = $dbconn->prepare('SELECT allnaturalseasalt FROM users WHERE username=:username');
  $salt_stmt->execute(array(':username' => $_POST['username']));
  $res = $salt_stmt->fetch();
  $salt = ($res) ? $res['allnaturalseasalt'] : '';

  $salted = hash('sha256', $salt.$_POST['pass']);
  echo $salted;

  $login_stmt = $dbconn->prepare('SELECT username, id, is_admin FROM users WHERE username=:username AND password=:pass');
  $login_stmt->execute(array(':username' => $_POST['username'], ':pass' => $salted));
  
  
  if ($user = $login_stmt->fetch()) {
    $_SESSION['username'] = $user['username'];
    $_SESSION['id'] = $user['id'];
    $_SESSION['is_admin'] = $user['is_admin'];
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
  <title>Login</title>
</head>
<body>
<?php if (isset($_SESSION['username'])): ?>
    <h1>Welcome, <?php echo htmlentities($_SESSION['username']) ?></h1>
    <form method="post" action="index.php">
        <input name="logout" type="submit" value="Logout" />
    </form>
    <form method="post" action="content_entry.php">
        <input name="addUser" type="submit" value="Add User" />
    </form>
<?php else: ?>
  <h1>Login</h1>
  <?php if (isset($err)) echo "<p>$err</p>" ?>
  <form method="post" action="index.php">
    <label for="username">Username: </label><input type="name" name="username" />
    <label for="pass">Password: </label><input type="password" name="pass" />
    <input name="login" type="submit" value="Login" />
  </form>
<?php endif; ?>
</body>
</html>