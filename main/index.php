<?php
 session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GameOn</title>
  <script src="../p5.js"></script>
  <script src="../addons/p5.sound.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="index.css">
</head>

<body>
  <div class="grid">
    <header>
      <img class="logo" src="images/logo.png" alt="logo">
      <nav>
        <ul class="nav_links">
          <?php
           if(isset($_SESSION['id']))
           {
             echo '<li><a href="userprofile.php">'.$_SESSION['name'].'</a></li>';
           }
           else {
            echo '<li><a href="signin.php">Sign In</a> </li>';
           }
          ?>
        </ul>
      </nav>
      <?php
       if(isset($_SESSION['id']))
       {
         echo '<form class="logout-form" action="../php/logout.inc.php" method="post">
 					<button type="submit" name="logout-submit">Logout</button>
        </form>';
       }
      ?>
      <a class="cta" href="developer.php"><button>Contact</button> </a>
    </header>

    <div class="catg">
      <ul>
        <li><a href="../games/snake/index.php">Snake</a></li>
        <li><a href="../games/pong/index.php">Pong</a></li>
        <li><a href="../games/pac-man/index.php">Pacman</a></li>
        <li><a href="../games/flappy/index.php">Flappy Bird</a></li>
        <li><a href="../games/tic-tac-toe-AI/index.php">Tic-Tac-Toe</a></li>
      </ul>
    </div>
    <div class="slide-container">
      <button type="button" id="prevBtn">Prev</button>
      <button type="button" id="nextBtn">Next</button>
      <div class="slides">
        <img src="games_wp/packman.jpg" id="lastclone" alt="">
        <img src="games_wp/snake.png" alt="snake2">
        <img src="games_wp/pong.jpg" alt="pong">
        <img src="games_wp/tetris.jpg" alt="tetris">
        <img src="games_wp/mario.jpg" alt="mario">
        <img src="games_wp/snake.png" id="firstclone" alt="">
      </div>
    </div>
    <div class="content">
      <div class="title">
        THE GAMING LAND
      </div>
      <div class="mp-game">
        <a href="../games/flappy/index.php"><img src="games_wp/flappybird.jpg" alt="game_images"></a>
        <a href="../games/pong/index.php"><img src="games_wp/pong.jpg" alt="game_images"></a>
      </div>
      <div class="oth-games">
      <figure class="gallery__item gallery__item--1">
        <a href="../games/snake/index.php"><img src="games_wp/snake.png" class="gallery__img" alt="Image 1"></a>
      </figure>
      <figure class="gallery__item gallery__item--2">
        <a href="../games/pong/index.php"><img src="games_wp/pong.jpg" class="gallery__img" alt="Image 2"></a>
      </figure>
      <figure class="gallery__item gallery__item--3">
        <a href="#"><img src="games_wp/tetris.jpg" class="gallery__img" alt="Image 3"></a>
      </figure>
      <figure class="gallery__item gallery__item--4">
        <a href="#"><img src="games_wp/mario.jpg" class="gallery__img" alt="Image 4"></a>
      </figure>
      <figure class="gallery__item gallery__item--5">
        <a href="../games/pac-man/index.php"><img src="games_wp/packman.jpg" class="gallery__img" alt="Image 5"></a>
      </figure>
      <figure class="gallery__item gallery__item--6">
        <a href="../games/tic-tac-toe-AI/index.php"><img src="games_wp/tic-tac-toe.jpg" class="gallery__img" alt="Image 6"></a>
      </figure>
      </div>
    </div>

    <footer>
      <div class="wrapper">
        <nav>
          <ul>
            <li><a href="../games/snake/index.php">Snake</a></li>
            <li><a href="../games/pong/index.php">Pong</a></li>
            <li><a href="../games/pac-man/index.php">Pacman</a></li>
            <li><a href="../games/flappy/index.php">Flappy Bird</a></li>
            <li><a href="../games/tic-tac-toe-AI/index.php">Tic-Tac-Toe</a></li>
          </ul>
        </nav>
      </div>
      <div class="footer-logo">
        <img src="images/logo.png" alt="logo">
      </div>
    </footer>

  <script src="index.js">carousel();</script>
</body>

</html>
