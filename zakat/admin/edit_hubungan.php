<?php
include '../connection.php';

if (isset($_POST['add_hubungan'])) {
  $hubungan = $_POST['hubungan_name'];
  $query = "INSERT INTO hubungan (hubungan_name) VALUES ('$hubungan')";

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
  $hubungan = $_GET['delete'];
  $query = "DELETE FROM hubungan WHERE hubungan_id='$hubungan'";

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