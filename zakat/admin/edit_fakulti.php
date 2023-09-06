<?php
include '../connection.php';

if (isset($_POST['add_fac'])) {
  $fac = $_POST['fac_name'];
  $query = "INSERT INTO faculty (fac_name) VALUES ('$fac')";

  mysqli_begin_transaction($conn);

  try {
    if ($conn->query($query)) {
      mysqli_commit($conn);
      echo '<div class="modal1">
      <div class="modal-content1">
      <div class="modal-body1">
        <p class=""><i class="bi bi-check-circle me-1"></i>Penambahan rekod berjaya.</p>
      </div>
      <div class="modal-footer1">
      <a class="btn btn-primary" href="'.basename($_SERVER["PHP_SELF"]).'">Teruskan</a>
      </div>
    </div>
    </div>';
    }
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
} else if (isset($_GET['delete'])) {
  $fac = $_GET['delete'];
  $query = "DELETE FROM faculty WHERE fac_id='$fac'";

  mysqli_begin_transaction($conn);

  try {
    if ($conn->query($query)) {
      mysqli_commit($conn);
      echo '<div class="modal1">
      <div class="modal-content1 bg-danger">
      <div class="modal-body1">
        <p class="text-white"><i class="bi bi-check-circle me-1"></i>Rekod telah dihapuskan.</p>
      </div>
      <div class="modal-footer1">
      <a class="btn btn-primary" href="'.basename($_SERVER["PHP_SELF"]).'">Teruskan</a>
      </div>
    </div>
    </div>';
    }
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
}

?>