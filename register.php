<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration form</title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Bootstrap JS -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	

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
	<div class='container'>
		<div class='row'>
			<div class='col-md-12'>
				<h2></h2>
			</div>

			<div class='col-md-6' >
					
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
					
					<button type="submit" name="btnsignup" class="btn btn-default">Submit</button>
				</form>

				<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
			</div>
			
			
		</div>
	</div>
</body>
</html>
