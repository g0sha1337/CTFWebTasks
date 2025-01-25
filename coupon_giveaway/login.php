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

    $stmt = $db->prepare('SELECT username, password FROM users WHERE username = ?');
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && $user['password'] == hash('sha512', $password)) {
      $_SESSION['auth'] = $username;

      if($username = 'admin') {
        echo "PolyCTF{fake_flag}";
      }
      exit();
    } else {
      $err = "Неправильный логин или пароль";
    }
  }
?>

<html>
  <head>
    <link rel="stylesheet" href="static/css/main.css">
    <title>Вход</title>
  </head>
  <body>
    <div class="login">
      <h1>Вход</h1>
      <form method="post">
        <input type="text" name="username" placeholder="Логин" required="required" />
        <input type="password" name="password" placeholder="Пароль" required="required" />
        <button type="Вход">Войти</button>
        <?php if (isset($err)) echo "<h4>$err</h4>"; ?>
      </form>
      <a href="/">назад</a>
    </div>
  </body>
</html>
