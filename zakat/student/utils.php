<?php
$parameter = $parameter_id;
$key = $_SESSION['app_id'];
$iv = $_SESSION['iv'];

$encrypted_id = openssl_encrypt($parameter, "AES-256-CBC", $key, 0, $iv);
$encoded_id = base64_encode($encrypted_id . $iv);
?>