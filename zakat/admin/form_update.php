<?php
include '../connection.php';

mysqli_begin_transaction($conn);

try {
  if (isset($_POST['form_open'])) {
    $sql = "UPDATE form SET form_open = true WHERE form_id = 1";
  } else {
    $sql = "UPDATE form SET form_open = false WHERE form_id = 1";
  }

  mysqli_query($conn, $sql);

  mysqli_commit($conn);

  echo "<script>window.location.href='index.php';</script>";
} catch (Exception $e) {
  mysqli_rollback($conn);

  echo '<div class="modal1">
  <div class="modal-content1 bg-warning">
  <div class="modal-body1">
    <p>Ralat berlaku. '.$e->getMessage().'</p>
  </div>
  <div class="modal-footer1">
    <button class="btn btn-dark" onclick="closeModal()">Tutup</button>
  </div>
</div>
</div>';
}

?>