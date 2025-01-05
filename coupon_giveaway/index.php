<?php
session_start();




  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!isset($_POST['coupon'])) {
      return;
    }
    try {
      $db_path = 'static/instance/database.db';
      $db = new PDO('sqlite:' . $db_path);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
      $result = $db->query("SELECT win FROM coupons WHERE id = {$_POST['coupon']}");
    } catch (PDOException $e) {
      $err = $e->getMessage();
    }
    $db = null;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Раздача купонов</title>
  <link rel="stylesheet" href="static/css/main.css">
</head>
<body>
  <div class="header">
    <div class="headerContent">
      <div class="headerLeftBlock">
        <a class="headerNav" href="index.php">
          Раздача купонов
        </a>
      </div>
      <div class="headerRightBlock">
        <a href="login.php" style="color: #000">
          Личный кабинет
        </a>
      </div>
    </div>
  </div>
  <form class="form" method="post">
    <input placeholder="Попробуйте угадать счастливое число от 1 до 10" name="coupon" type="text">
    <input type="submit" value="Подтвердить">
    <?php if (isset($err)) echo "<div>$err</div>"; ?>
  </form>

  <?php
      if(!isset($result)){
        return;
      }
      foreach ($result as $row) {
        echo "
          <div class='toolsItem'>
            <center>
              <div class='toolsItemText'>
                {$row['win']}
              </div>
            </center>
          </div>";
      }
  ?>
</body>
</html>