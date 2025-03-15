<?php 
  session_set_cookie_params(3600, '/', '.example.com', true, true);
  setcookie('username', 'anonymous');

  if(isset($_COOKIE['username'])) {
    $cookie_value = $_COOKIE['username'];
    if($cookie_value == 'admin') {
      $flag = "DUCKERZ{fake_flag}";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>private_club</title>
  <link rel="stylesheet" href="static/css/main.css">
  <style>
    body {
        margin: 0;
        padding: 0;
        height: 100vh; /* Занимает всю высоту экрана */
        background-image: url('static/wallp.png');
        background-size: cover; /* Изображение будет растянуто на весь экран */
        background-position: center; /* Центрирует изображение */
        background-repeat: no-repeat; /* Запрещает повторение изображения */
        display: flex;
        flex-direction: column;
        justify-content: space-between; /* Распределяет пространство между элементами */
    }

    .header {
      padding: 10px; /* Уменьшение отступов */
      background-color: rgba(0, 0, 0, 0.7); /* Полупрозрачный фон для заголовка */
    }

    .main {
      margin: 20px;
      padding: 20px;
      border-radius: 15px; /* Закругленные углы */
      background-color: rgba(0, 0, 0, 0.5); /* Полупрозрачный фон для основного контента */
      font-weight: bold; /* Жирный шрифт */
      font-size: 1.2em; /* Увеличенный размер шрифта */
      flex-grow: 1; /* Позволяет этому блоку занимать оставшееся пространство */
      display: flex;
      justify-content: center; /* Центрирует содержимое */
      align-items: center; /* Центрирует содержимое по вертикали */
      text-align: center; /* Центрирует текст */
    }

    .info-box {
      background-color: rgba(255, 255, 255, 0.8); 
      padding: 8px; 
      width: 400px; 
      height: 100px; 
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      border: 2px solid black; 
      display: flex; 
      flex-direction: row; 
      justify-content: center;
      align-items: center; 
      font-size: 1.2em; 
      color: black;
    }

    .footer {
      padding: 4px; 
      background-color: rgba(255, 255, 255, 0.8); 
      text-align: center; 
      box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.2); 
    }

    .headerNav {
      color: white; 
      text-decoration: none; 
      font-weight: bold; 
      font-size: 1.2em; 
    }

    .headerNav:hover {
      text-decoration: underline; 
    }
  </style>
</head>
<body>
  <div class="header">
    <div class="headerContent">
      <div class="headerLeftBlock">
        <a class="headerNav" href="index.php">
        Элитарный Клуб Печенек
 </a>
      </div>
    </div>
  </div>

  <div class="main">
    <?php if(isset($flag)): ?>
      <div class="info-box"><?php echo $flag; ?></div>
    <?php else: ?>
      <div class="info-box">
        <p>Сайт находится в стадии разработки. Доступ к клубу есть только у администратора!</p>
      </div>
    <?php endif; ?>
  </div>

  <div class="footer">
    <p> DUCKERZ 2025 | designed by g0sha1337 </p>
  </div>
</body>
</html>