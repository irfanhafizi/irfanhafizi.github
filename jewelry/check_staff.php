<?php
session_start();
//check if user has login
if(!isset($_SESSION['username'])){
 die( Header("Location: login.php"));
}

if($_SESSION['level']!="worker" and $_SESSION['level']!="supervisor" ){
    die( Header("Location: login.php"));
}
?>
