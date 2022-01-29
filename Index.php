<?php 
  session_start(); 
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['email']);
  	header("location: end.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech trivia</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
      
.dropdown {
  float: left;
  overflow: hidden;
  margin-right:70px;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.dropdown:hover .dropbtn {
  background-color: red;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
      </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
        <section class="nav">
            <div class="nav-items"> 
                <ul>
                <div class="item"><a href="#home">Home</a></div>
                <div class="item"><a href="Category.html">Category</a></div>
                <div class="item"><a href="search.html">Search</a></div>
                <div class="item"><a href="contact.html">Contact us</a></div>
                <div class="item"><a href="about.html">About Us</a></div> 
                <?php  if (isset($_SESSION['email'])) : ?>
                  <div class="item">
                    <div class="dropdown"  style="float:right;">
                      <button class="dropbtn"><i class="fa fa-user"></i> 
                        <i class="fa fa-caret-down"></i>
                      </button>
                      <div class="dropdown-content">
                      <a href="highscores.html"><i class="fa fa-fighter-jet"></i>Leaderboard</a>
                      <a href="index.php?logout='1'"><i class="fa fa-user"></i>Logout</a>
                      </div>
                    </div> 
                </div>
    <?php endif ?>
    <?php  if (!isset($_SESSION['email'])) : ?>
    	<div class="item"><a href="register.php"><i class="fa fa-sign-in"></i></a></div>
    <?php endif ?>             
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

        <section class="intro"></section>
        <section class="intro2"></section>

        <section class="categories" id="categories">
            <div class="head">
                <h2>Most renowned</h2>
            </div>
             <!--Slider-->
            <div id="slider">  
                <div class="slide" style="background:dodgerBlue;">
                <img src="https://previews.123rf.com/images/sumkinn/sumkinn1511/sumkinn151100036/47783764-quiz-background-the-concept-is-the-question-with-the-answer-vector-.jpg" height="450px" width="500px">
                <h2 class="subheading"><a id="acad" href="staging.php">Academic</a></h2>
                </div>
                
                <div class="slide" style="background:coral;">
                <img src="http://www.themanthanschool.co.in/blog/wp-content/uploads/2019/12/general-knowledge.jpg" height="450px" width="500px">
                <h2 class="subheading"><a id="gk" href="staging.php">General Knowledge</a></h2>
                </div>
            
                <div class="slide" style="background:crimson;">
                <img src=" https://is1-ssl.mzstatic.com/image/thumb/Purple/v4/c7/41/e8/c741e80a-1cc1-377a-e3d6-e8063aa0d7b7/source/512x512bb.jpg" height="450px" width="500px">
                <h2 class="subheading"><a id="bolly" href="staging.php">Bolly Quiz</a></h2>
                </div>
                
                <div class="slide" style="background: #6edf10;">
                <img src="https://1.bp.blogspot.com/-qKzqBlxDa8U/YG33phsPJxI/AAAAAAAAEAI/jauqXwwmLh8fPnmZkxbroGwwE76n5-m3wCLcBGAsYHQ/s1277/literature%2Bquiz.PNG"  height="450px" width="500px">
                <h2 class="subheading"><a id="lit" href="staging.php">Literature Quiz</a></h2>
                </div>
                
                <!--Controlling arrows-->
                <span class="controls" onclick="prevSlide(-1)" id="left-arrow"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                </span>
                <span class="controls" id="right-arrow" onclick="nextSlide(1)"><i class="fa fa-arrow-right" aria-hidden="true"></i>
                </span>
                </div>
                <div id="dots-con">
                <span class="dot"></span><span class="dot"></span><span class="dot"></span><span class="dot"></span>
                </div>
                
        </section>

        <?php  if (!isset($_SESSION['email'])) : ?>
          <section class="registerhere">
            <form id="form1">
              <div class="mobilesize">         
                  <div class="toptitale">
                      <label for="SingIn">Sign yourself up</label>
                  </div>
                      <span class="pointtop"></span>
                  <div class="SingInBox">
                      <h3>Get yourself registered to dip your toes in the world of random questions  </h3>
                      <a id="btn" href="register.php">Register now</a>
                  </div>
              </div>
          </form>
          </section>
        <?php endif ?> 
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


        <script>
            var slides = document.querySelectorAll(".slide");
            var dots = document.querySelectorAll(".dot");
            var index = 0;

            function prevSlide(n){
            index+=n;
            console.log("prevSlide is called");
            changeSlide();
            }

            function nextSlide(n){
            index+=n;
            changeSlide();
            }

            changeSlide();

            function changeSlide(){
                
                if(index>slides.length-1)
                    index=0;
                
                if(index<0)
                    index=slides.length-1;
                
                for(let i=0;i<slides.length;i++){
                    slides[i].style.display = "none";
            
                    dots[i].classList.remove("active");
                    }
                    
                slides[index].style.display = "block";
                dots[index].classList.add("active");
            }

      
            document.getElementById("acad").addEventListener("click", function() {
              sessionStorage.setItem('category','18');
            });

            document.getElementById("gk").addEventListener("click", function() {
              sessionStorage.setItem('category','9');
            });
            document.getElementById("bolly").addEventListener("click", function() {
              sessionStorage.setItem('category','11');
            });
            document.getElementById("lit").addEventListener("click", function() {
              sessionStorage.setItem('category','20');
            });
        </script>

</body>
</html>