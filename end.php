<?php 

session_start();

if(!isset($_SESSION['email'])){
    die(header("location: 404.php"));
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Congrats!</title>
    <link rel="stylesheet" href="app.css" />
    <link rel="stylesheet" href="style.css" />

  </head>
  <body>
    <section class="nav">
      <div class="nav-items"> 
          <ul>
            <div class="item"><a href="index.php">Home</a></div>
            <div class="item"><a href="Category.html">Category</a></div>
            <div class="item"><a>Search</a></div>
            <div class="item"><a href="contact.html">Contact us</a></div>
            <div class="item"><a href="about.html">About Us</a></div>              
          </ul>
      </div>
  </section>

    <div class="container">
      <div id="end" class="flex-center flex-column">
        <h1 id="finalScore"></h1>
        <form>
          <h2><?php  echo "User email:", $_SESSION['email'], "<br />" ?></h2>
          <button
            type="submit"
            class="btn"
            id="saveScoreBtn"
            onclick="saveHighScore(event)"
          >
            Save
          </button>
        </form>
        <a class="btn" href="/Test.html">Play Again</a>
        <a class="btn" href="/">Go Home</a>
        <a class="btn" href="/highscores.html">Check Highscore</a>
      </div>
    </div>
    <script src="end.js"></script>
  </body>
</html>