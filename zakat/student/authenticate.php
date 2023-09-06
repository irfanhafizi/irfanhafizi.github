<?php
session_start();

if(!$_SESSION['app_login']) {
  session_destroy();
  header('location: ../guest/login.php');
}

$app_id = $_SESSION['app_id'];
?>