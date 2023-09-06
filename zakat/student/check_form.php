<?php
include '../connection.php';
if(isset($_GET['id'])){
  $row_status = $conn->query("SELECT * FROM apply WHERE apply_id = '$decrypted_id' AND apply_matric = '$app_id'");
  $row_submited = mysqli_fetch_assoc($row_status);
  if((($row_submited['apply_status']) == 1) OR (($row_submited['apply_status']) == 4)){
    $check_form = true;
  }else{
    $check_form = false;
  }
}else{
  if (basename($_SERVER['PHP_SELF']) == 'mohon_bahagian1.php'){
    $check_form = true;
  }else{
    $check_form = false;
  }
}


$queryform = $conn->query("SELECT * FROM form WHERE form_id = 1");
$row_form = mysqli_fetch_assoc($queryform);
?>