<?php
include '../connection.php';

$today = date('Y-m-d');
$sesi = $conn->query("SELECT * FROM sesi WHERE CURDATE() BETWEEN sesi_date_start AND sesi_date_end ORDER BY sesi_id DESC LIMIT 1");
if ($sesi && $sesi->num_rows > 0) {
  $row_sesi = mysqli_fetch_assoc($sesi);
  $latest_sesi = $row_sesi['sesi_id'];
} else {
  $sesi = $conn->query("SELECT * FROM sesi ORDER BY sesi_id DESC LIMIT 1");
  $row_sesi = mysqli_fetch_assoc($sesi);
  $latest_sesi = $row_sesi['sesi_id'];
}

?>