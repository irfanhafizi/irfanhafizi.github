<?php
if (isset($_POST['profile_submit'])) {
  mysqli_begin_transaction($conn);

  try {
    $name = strtoupper($_POST['name']);
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $fac = $_POST['fac'];

    $file = $_FILES['profile'];
    $file_name = $file['name'];
    $file_temp = $file['tmp_name'];
    $file_size = $file['size'];

    $file_new_name = $admin_id . '_profile.jpg';
    $path = '../upload/admin/profile/';
    $file_path = $path.$file_new_name;
    move_uploaded_file($file_temp, $file_path);

    $query = "UPDATE admin SET
              admin_fullname='$name',
              admin_tel='$tel',
              admin_email='$email',
              admin_profile = '$file_path'
              WHERE admin_no_pekerja = '$admin_id'";

    if (mysqli_query($conn, $query)) {
      mysqli_commit($conn);

      echo '<div class="modal1">
      <div class="modal-content1">
      <div class="modal-body1">
        <p class=""><i class="bi bi-check-circle me-1"></i>Berjaya simpan!</p>
      </div>
      <div class="modal-footer1">
      <a class="btn btn-primary" href="">Tutup</a>
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