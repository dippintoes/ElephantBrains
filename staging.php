<?php 

session_start();

if(!isset($_SESSION['email'])){
    die(header("location: 404.php"));
}
?>
<!DOCTYPE html>
<html lang="en">
<link>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="staging.css" ></link>
    <script type="text/javascript">
            
    </script>    
    <title>Quiz time</title>
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

    <section class="Heading" id="home">
        <div class="nav1-items">
            <div class="logo">
                <img alt="man thinking" src="https://mlufzvs0vlnj.i.optimole.com/W9J5v6g-wlY7Zu_L/w:auto/h:auto/q:75/https://debatechamber.com/wp-content/uploads/2017/02/bigstock-Question-Mark-114454214.jpg" width="140px" height="140px" class="logoimg">
            </div>
            <div class="herohead">
                <h1 class="spreadingUnderline">Elephant Brains</h1>
            </div>
        </div>
    </section>

    <main class="container">
        <ul id="cards">
            <li class="card" id="card_1">
                <div class="card__content">
                    <div>
                        <h2>What's in here</h2>
                        <p>These quizzes provide you with a fun way to learn! In this category, you will find quizzes that will test your knowledge as well as teach you things you never knew before.</p>
                        <p><a href="#top" class="btn btn--accent">Read more</a></p>
                    </div>
                    <figure>
                        <img src="http://3.bp.blogspot.com/_zJrVQFqitUA/Sjv_hoQL_oI/AAAAAAAAII0/wAmB9aeEPDE/s400/right_click.png" alt="Image description">
                    </figure>
                </div>
            </li>
            <li class="card" id="card_2">
                <div class="card__content">
                    <div>
                        <h2>Why so serious?</h2>
                        <p>Have you ever sat down to read a textbook or manual and couldn't get through the first few pages because it was so boring? If you have, educational quizzes can help! Even if you don't know the background on a topic, you can learn a great deal of information from taking an educational quiz. The fun part is that you get to see how much you already know about the topic, how well you can reason, and how many you guessed right.</p>
                        <p><a href="#top" class="btn btn--accent">Read more</a></p>
                    </div>
                    <figure>
                        <img src="https://st.depositphotos.com/1048238/2045/i/950/depositphotos_20457989-stock-photo-have-fun-concept.jpg" alt="Image description">
                    </figure>
                </div>
            </li>
            <li class="card" id="card_3">
                <div class="card__content">
                    <div>
                        <h2>Rule Book</h2>
                        <p>1. Every question has 4 options, out of which only 1 is correct<br>
                            2. For every correct answer, 10 points are awarded<br>
                            3. There is no negative marking<br>
                            4. Once answered, it cannot be modified and the next question will be displayed immediately<br>
                            5. A correct answer is indicated by a green colour, while an incorrect answer is indicated by a red colour<br>
                            6. A progress bar is displayed on the top left, which indicates the number of questions answered<br>
                            7. The score obtained is displayed on the top right, which indicates the score obtained till the point<br>
                            
                        <p><a href="#top" class="btn btn--accent">Read more</a></p>
                    </div>
                    <figure>
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTweVhoHWcx_p_hRe6AyDUDOeH-OpW0fnIbgg&usqp=CAU">
                    </figure>
                </div>
            </li>
            <li class="card" id="card_4">
                <div class="card__content" id="test-alt">
                    <div>
                        <h2>Get started now!!</h2>
                        <br><br><h2><b>Raise you bar high</b></h2>
                        <p>📢Make sure you have read the instructions just to make the process easier.<br> 📢You can see your highest score and analyze your performance whenever you want!!!<br/>📢 Keep challenging yourself!!<br/>📢Never too late to start<br></p>
                        <br>
                        <p><a href="Test.html" class="btn btn--accent">Start</a></p>
                    </div>
                    <figure>
                        <img src="https://c.tenor.com/6IxwooIZL4gAAAAC/clock-ticking.gif" alt="Image description">
                    </figure>
                </div>
            </li>
        </ul>
    </main>
    <!--footer-->
    <footer>
        <!-- Footer main -->
        <section class="ft-main">
          <div class="ft-main-item">
            <h2 class="ft-title">Legal</h2>
            <ul>
              <li><a href="#">Terms of use</a></li>
              <li><a href="#">Privacy policy</a></li>
              <li><a href="#">Interest based ads</a></li>
              <li><a href="#">Do not sell my info</a></li>
              <li><a href="#">Careers</a></li>
            </ul>
          </div>
          <div class="ft-main-item">
            <h2 class="ft-title">Resources</h2>
            <ul>
              <li><a href="#">Docs</a></li>
              <li><a href="#">Blog</a></li>
              <li><a href="#">eBooks</a></li>
              <li><a href="#">Webinars</a></li>
            </ul>
          </div>
          <div class="ft-main-item">
            <h2 class="ft-title">Contact</h2>
            <ul>
              <li><a href="#">Help</a></li>
              <li><a href="#">Sales</a></li>
              <li><a href="#">Advertise</a></li>
            </ul>
          </div>
          <div class="ft-main-item">
            <h2 class="ft-title">Stay Updated</h2>
            <p>Get free updates before others do!</p>
            <form>
              <input type="email" name="email" placeholder="Enter email address">
              <input type="submit" value="Subscribe">
            </form>
          </div>
        </section>
      
        <!-- Footer social -->
        <section class="ft-social">
          <ul class="ft-social-list">
            <li><a href="#"><i class="fa fa-facebook-official"></i></a></li>
            <li><a href="#"><i class="fa fa-git-square"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
            <li><a href="#"><i class="fa fa-telegram"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube-square"></i></a></li>
          </ul>
        </section>
      
        <!-- Footer legal -->
        <section class="ft-legal">
          <ul class="ft-legal-list">
            <li><a href="#">Terms &amp; Conditions</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li>&copy; 2021 by Elephant brains, Aurangabad</li>
          </ul>
        </section>
    </footer>

    </body>
</html>