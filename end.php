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
        <h2><?php  echo "email:", $_SESSION['email'] ?></h2>

        <form>
          <button
            type="submit"
            class="btn"
            id="saveScoreBtn"
            onclick="saveHighScore(event)">
            Save
          </button>
        </form>
        <a class="btn" href="/Test.html">Play Again</a>
        <a class="btn" href="/">Go Home</a>
        <a class="btn" href="/highscores.html">Check Highscore</a>
      </div>
    </div>
    <script>
const saveScoreBtn = document.getElementById('saveScoreBtn');
const finalScore = document.getElementById('finalScore');
const LatestScore = localStorage.getItem('LatestScore');
const useremail='<?php echo $_SESSION['email'] ?>';
const highScores = JSON.parse(localStorage.getItem('highScores')) || [];
const indiscores = JSON.parse(localStorage.getItem('IndivividualScores')) || [];
const MAX_HIGH_SCORES = 100;

finalScore.innerText = LatestScore;


saveHighScore = (e) => {
    e.preventDefault();

    const score = {
        score: LatestScore,
        email: useremail,
    };
    
    highScores.push(score);
    highScores.sort((a, b) => b.score - a.score);
    highScores.splice(5);

    localStorage.setItem('highScores', JSON.stringify(highScores));

    window.location.assign('/index.php');
};

    </script>
  </body>
</html>