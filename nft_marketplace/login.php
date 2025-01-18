<?php 
  if(isset($_SESSION['auth'])) {
    session_destroy();
  }
  if(session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $db_path = 'static/instance/database.db';
    $db = new PDO('sqlite:' . $db_path);
    $err = '';

    $stmt = $db->prepare('SELECT username, password FROM users WHERE username = ?');
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && $user['password'] == hash('sha512', $password)) {
      $_SESSION['auth'] = $username;

      
      echo "Hey $username, its nothing to see here! Honeypot >:3";
      exit();
    } else {
      $err = "Invalid creditioanals";
    }
  }
?>

<html>
  <head>
    <link rel="stylesheet" href="static/css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet"> </head>
    <title>Sign-In</title>
  </head>
  <body>
    <div class="login">
      <h1>Login</h1>
      <form method="post">
        <input type="text" name="username" placeholder="Username" required="required" />
        <input type="password" name="password" placeholder="Password" required="required" />
        <button type="submit">Login</button>
        <?php if (isset($err)) echo "<h4>$err</h4>"; ?>
      </form>
      <a href="/">back</a>
    </div>
  </body>
</html>
