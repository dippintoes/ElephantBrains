<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration form</title>
	<link rel="stylesheet" type="text/css" href="style.css" ></link>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Bootstrap JS -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<style>
		.container{
    width:80vw;
    margin:100px;
    height:90vh;
}
a{
	color:white;
	margin-top:20px;
}
#login{
	color:black;
}
/* signup */
#div_sign{
    position: relative;
  background: #FFFFFF;
  max-width: 50vw;
  margin: 0 auto 150px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}

#div_sign h1{
    margin-top: 0px;
    font-weight: normal;
    padding: 10px;
	width:100%;
    background-color: black;
    color: white;
    font-family: sans-serif;
}
.form-group{
	width:50%;
}

#div_sign .textbox{
    
font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 35px;
  box-sizing: border-box;
  font-size: 14px;
}
#div_sign div{
    margin-top: 10px;
    padding: 10px;
}

#div_sign label{
    width: 100%;
    padding: 7px;
}

#div_sign input[type=submit]{
	font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: rgb(39, 29, 61);
  width: 50%;
  border: 0;
text-align:center;  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  margin-top:80px;
  margin-left:200px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
  margin-bottom:40px;
}
#div_sign input[type=submit]:hover{
    background: rgb(41, 35, 60);   font-size:larger;
}

/* media */
@media screen and (max-width:720px){
    .container{
        width: 100%;
    }
    #div_sign{
        width: 99%;
    }
}
</style>
	</style>


	<?php 
	$error_message = "";$success_message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $con = mysqli_init(); 
	mysqli_real_connect($con, "triviaadmin.mysql.database.azure.com", "triviaadmin", "elephant@12345", "login", 3306);

	if (mysqli_connect_errno($con)) {
		die('Failed to connect to MySQL: '.mysqli_connect_error());
	}
	else{

	// Register user
		
		$name = trim($_POST['name']);
		$email = trim($_POST['email']);
		$password = trim($_POST['password_1']);
		$confirmpassword = trim($_POST['password_2']);

		$isValid = true;

		// Check fields are empty or not
		if($name == '' || $email == '' || $password == '' || $confirmpassword == ''){
			$isValid = false;
			$error_message = "Please fill all fields.";
		}

		// Check if confirm password matching or not
		if($isValid && ($password != $confirmpassword) ){
			$isValid = false;
			$error_message = "Confirm password not matching.";
		}

		// Check if Email-ID is valid or not
		if ($isValid && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  	$isValid = false;
		  	$error_message = "Invalid Email-ID.";
		}

		if($isValid){

			// Check if Email-ID already exists
			$stmt = $con->prepare("SELECT * FROM users WHERE email = ?");
			$stmt->bind_param("s", $email);
			$stmt->execute();
			$result = $stmt->get_result();
			$stmt->close();
			if($result->num_rows > 0){
				$isValid = false;
				$error_message = "Email-ID is already existed.";
			}
			
		}

		// Insert records
		if($isValid){
			$insertSQL = "INSERT INTO users(username,email,password ) values('$name','$email','$password')";
			
			if($con->query($insertSQL)===TRUE){
				$success_message = "Account created successfully.";
				header('Location: login.php');
			}
			else{
				echo "error creating database:".$con->error;
			}
			$con->close();
		}
	}
}
	?>
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

	<div class='container'>
			<div id="div_sign">
				<form method='post' action=''>
					<h1>SignUp</h1>
					<?php 
					// Display Error message
					if(!empty($error_message)){
					?>
						<div class="alert alert-danger">
						  	<strong>Error!</strong> <?= $error_message ?>
						</div>

					<?php
					}
					?>
					<?php 
					// Display Success message
					if(!empty($success_message)){
					?>
						<div class="alert alert-success">
						  	<strong>Success!</strong> <?= $success_message ?>
						</div>

					<?php
					}
					?>
				
					
					<div class="form-group">
					    <label for="name">Name:</label>
					    <input type="text" class="form-control" name="name" id="name" required="required" maxlength="80">
					</div>
					<div class="form-group">
					    <label for="email">Email address:</label>
					    <input type="email" class="form-control" name="email" id="email" required="required" maxlength="80">
					</div>
					<div class="form-group">
					    <label for="password_1">Password:</label>
					    <input type="password" class="form-control" name="password_1" id="password_1" required="required" maxlength="80">
					</div>
					<div class="form-group">
					    <label for="password_2">Confirm Password:</label>
					    <input type="password" class="form-control" name="password_2" id="password_2" required="required" maxlength="80">
					</div>
					
					<input type="submit" name="btnsignup"></input>
				</form>
				<p>Already a member? <a id="login" href="login.php">Sign in</a></p>
			</div>		
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
