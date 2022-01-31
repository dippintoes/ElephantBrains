<?php session_start();?>

<?php
include "config.php";


if(isset($_POST['but_submit'])){
    $email = trim($_POST['email']);
$password = trim($_POST['password_1']);

    if ($email != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from users where email='".$email."' and password='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            
                $_SESSION['email'] = $email;
                $_SESSION['user_logged_in'] = true;
                echo "<script>alert('Logged in successfully!!');</script>";

            header('Location: index.php');
        }else{
            echo "<script>alert('Invalid email and password');</script>";
        }

    }

}

?>
<html>
    <head>
        <title>Login page</title>
        <link rel="stylesheet" type="text/css" href="style.css" ></link>

        <style>/* Container */
.container{
    width:80vw;
    margin:70px;
    height:70vh;
}
/* Login */
#div_login{
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}

#div_login h1{
    margin-top: 0px;
    font-weight: normal;
    padding: 10px;
    background-color: black;
    color: white;
    font-family: sans-serif;
}

#div_login div{
    clear: both;
    margin-top: 10px;
    padding: 5px;
}

#div_login .textbox{
    
    font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}

#div_login input[type=submit]{
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: rgb(39, 29, 61);
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
#div_login input[type=submit]:hover{
  background: rgb(41, 35, 60);   font-size:larger;
}

/* media */
@media screen and (max-width:720px){
    .container{
        width: 100%;
    }
    #div_login{
        width: 99%;
    }
}
</style>
    </head>
    <body>
    <section class="nav">
        <div class="nav-items"> 
            <ul>
            <div class="item"><a href="index.php">Home</a></div>
            <div class="item"><a href="Category.html">Category</a></div>
            <div class="item"><a href="search.html">Search</a></div>
            <div class="item"><a href="contact.html">Contact us</a></div>
            <div class="item"><a href="about.html">About Us</a></div>            
            </ul>
        </div>
    </section>
        <div class="container">
            <form method="post" action="">
                <div id="div_login">
                    <h1>Login</h1>
                    <div>
                        <input type="text" class="textbox" id="email" name="email" placeholder="Email" />
                    </div>
                    <div>
                        <input type="password" class="textbox" id="password_1" name="password_1" placeholder="Password"/>
                    </div>
                    <div>
                        <input type="submit" value="Submit" name="but_submit" id="but_submit" />
                    </div>
                </div>
            </form>
            <h3 style="color:grey">Please click here, if not redirected to Homepage!!! <a id="login" href="index.php" style="color:blue">Home</a></h3>

        </div>

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

