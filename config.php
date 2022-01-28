<?php
// Create connection
$con =  mysqli_connect("triviaadmin.mysql.database.azure.com", "triviaadmin", "elephant@12345", "login", 3306);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
}