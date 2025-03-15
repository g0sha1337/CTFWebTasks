<?php 
session_start();

$valid_username = "admin";
$valid_password = "admin"; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username === $valid_username && $password === $valid_password) {
            $_SESSION['authenticated'] = true; 
            header('Location: index.php'); 
            exit();
        } else {
            $error = "Неверный логин или пароль.";
        }
    } elseif (isset($_POST['num1']) && isset($_POST['num2']) && isset($_POST['num3']) && isset($_POST['num4'])) {
        if ($_SESSION['authenticated'] && $_POST['num1'] == "1" && $_POST['num2'] == "3" && $_POST['num3'] == "3" && $_POST['num4'] == "7") {
            $_SESSION['flag'] = "DUCKERZ{fake_flag}";
            header('Location: admin.php');
            exit(); 
        } else {
            $error = "Неверный пин-код.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Точно не брутфорс</title>
  <link rel="stylesheet" href="/styles.css">
</head>
<body>
<div class="login" style="background-image: url('/serve_image.php?image=m1000x1000.jpg'); background-size: cover; background-position: center;">
    <?php if (!isset($_SESSION['authenticated'])): ?>
        <div class="loginContent" id="login"> 
            <h1>Введите логин и пароль</h1>
            <!--@fckdata-->
            <form method="post">
            <div class="inputContainer">

            <input type="text" name="username" placeholder="Логин" required />

            <input type="password" name="password" placeholder="Пароль" required />

            </div>
                
                <button type="submit">Войти</button>
                
            </form>
            <?php if (isset($error)) echo "<p>$error</p>"; ?>
        </div>
    <?php else: ?>
        <form method="post" class="loginContent" id="recover">
            <h1>Введите 4х значный пин</h1>
            <div class="recoverBlock">
                <input name="num1" type="text" id="pinDigit1" maxlength="1" size="1" required/>
                <input name="num2" type="text" id="pinDigit2" maxlength="1" size="1" required/>
                <input name="num3" type="text" id="pinDigit3" maxlength="1" size="1" required/>
                <input name="num4" type="text" id="pinDigit4" maxlength="1" size="1" required/>
            </div>
            <button type="submit">Отправить</button> 
            <?php if (isset($error)) echo "<p>$error</p>"; ?>
        </form>
    <?php endif; ?>
</div>
</body>
</html>