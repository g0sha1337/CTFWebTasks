<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Telegram gifts nft marketplace</title>
  <link rel="stylesheet" href="static/css/main.css">
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet"> </head>
<body>
  <div class="header">
    <div class="headerContent">
      <div class="headerLeftBlock">
        <a class="headerNav" href="index.php">
          > NFT gifts marketplace
        </a>
      </div>
      <div class="headerRightBlock">
        <a href="login.php" style="color: #000">
          Sign-In
        </a>
      </div>
    </div>
  </div>
  
  <div class="nav">
    <div class="navContent">
      <a> Categories:</a>
      <a href="?category=All" class="navItem">All</a>
      <a href="?category=Common" class="navItem">Common</a>
      <a href="?category=Rare" class="navItem">Rare</a>
      <a href="?category=Exclusive" class="navItem">Exclusive</a>
      <a href="?category=Legendary" class="navItem">Legendary</a>
    </div>
  </div>
  <?php

// Проверяем, есть ли GET-запрос
if ($_SERVER['REQUEST_METHOD'] == 'GET' && !isset($_GET['category'])) {
?>
  <!-- Новый блок с картинкой и текстом -->
  <div class="mainContent">
    <div class="imageBlock">
      <img src="static/images/pic.jpg" alt="pic" />
    </div>
    <div class="textBlock">
      <h2>Telegram gifts nft marketplace</h2>
      <p>Welcome to the Telegram Gifts NFT Marketplace, where digital gifting meets the world of non-fungible tokens! Explore a vibrant collection of unique, collectible gifts that can be traded, upgraded, and showcased on your profile. Join a community of enthusiasts and discover the joy of giving and receiving one-of-a-kind digital assets that carry personal significance and rarity.</p>
    </div>
  </div>
<?php
}

?>
<div class="container">
  <div class="toolsList">
  <?php
    if($_SERVER['REQUEST_METHOD'] == 'GET') {
      if(!isset($_GET['category'])) {
        return;
      }

      try {
        $db_path = 'static/instance/database.db';
        $db = new PDO('sqlite:' . $db_path);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if($_GET['category'] == 'All') {
          $result = $db->query("SELECT id, title, text, image FROM tools");
        } else {
          $result = $db->query("SELECT id, title, text, image FROM tools WHERE category = '{$_GET['category']}'");
        }
      } catch (PDOException $e) {
        $err = $e->getMessage();
      }
      $db = null;
    }

    if(!isset($result)){
      return;
    }
    foreach ($result as $row) {
      echo "
        <div class='toolsItem'>
          <div class='toolsItemImage'>
            <img style='height: 200px;border-radius: 10px 0px 0px 10px' src='{$row['image']}' />
          </div>
          <div class='toolsItemTitle'>
            {$row['title']}
          </div>
          <div class='toolsItemText'>
            {$row['text']}
          </div>
        </div>";
    }
  ?>
  </div>
  </div>
  <div>
    <?php if(isset($err)) echo $err ?>
  </div>
  <div class="footer">
    <div class="footerContent">
      PolyCTF 2025 || All rights reserved
    </div>
  </div>
</body>
</html>