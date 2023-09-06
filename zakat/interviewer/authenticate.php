<?php
session_start();

if(!$_SESSION['inter_login']) {
  session_destroy();
  header('location: ../guest/login.php');
}
$inter_id = $_SESSION['inter_id'];
?>