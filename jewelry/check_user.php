<?php
session_start();
//check if user has login
if(!isset($_SESSION['username'])){
 die( Header("Location: login.php"));
}

if($_SESSION['level']!="admin" and $_SESSION['level']!="manager" ){
    die( Header("Location: login.php"));
}
?>
