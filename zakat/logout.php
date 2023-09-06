<?php
session_start();
session_unset();
session_destroy();
session_write_close();
header('Location: guest/login.php');
exit;
?>