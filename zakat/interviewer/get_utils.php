<?php
include '../connection.php';

if(isset($_GET['id'])){
  $encoded_id = $_GET["id"];
  $key = $_SESSION['inter_id'];
  $iv = $_SESSION['iv'];

  $decoded_id = base64_decode($encoded_id);
  $encrypted_id = substr($decoded_id, 0, -16);
  $decrypted_id = openssl_decrypt($encrypted_id, "AES-256-CBC", $key, 0, $iv);
}else{
  exit;
}

?>