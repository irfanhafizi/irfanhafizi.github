<?php
session_start();

if(!$_SESSION['admin_login']) {
  session_destroy();
  header('location: ../guest/login.php');
}
$admin_id = $_SESSION['admin_id'];
?>