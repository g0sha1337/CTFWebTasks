<?php 
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link rel="stylesheet" href="/styles.css">
</head>
<body style="display: flex; justify-content: center; align-items: center; height: 100vh">
  <div class="flag">
    <?php 
      if(isset($_SESSION['flag'])) {
        echo $_SESSION['flag'];
      } else {
        echo "ERROR 401 - Unauthorized";
      }
    ?>
  </div>
</body>
</html>