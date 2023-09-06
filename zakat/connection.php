<?php
$host = "localhost"; // server
$user = "root"; // username
$pass = ""; // password
$database = "zakat"; // database name
$conn = mysqli_connect($host, $user, $pass, $database);
if(mysqli_connect_errno()){ // check if connection error occur
echo 'Cannot connect to database : '.mysqli_connect_error();}
?>
