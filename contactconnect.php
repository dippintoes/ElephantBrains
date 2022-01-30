<html?>
    <body>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conn = mysqli_init(); 
mysqli_real_connect($conn, "triviaadmin.mysql.database.azure.com", "triviaadmin", "elephant@12345", "contact", 3306);

if (mysqli_connect_errno($conn)) {
die('Failed to connect to MySQL: '.mysqli_connect_error());
}
else{

    echo "<script type='text/javascript'>alert('submitted successfully!!'); window.location.href = 'https://elephantbrains.azurewebsites.net/';</script>";

        $name=$_POST["name"];
        $email=$_POST["email"];
        $option=$_POST["option"];
        $surname=$_POST["surname"];
        $phone=$_POST["phone"];
        $message=$_POST["message"];
    
//INSERT QUERY
$sql="INSERT INTO contactdetails VALUES ('$option','$name','$surname','$email','$phone','$message')";

if($conn->query($sql)===TRUE){
    
}
else{
    echo "error creating database:".$conn->error;
}
$conn->close();
}
}
?>
</body>
</html>