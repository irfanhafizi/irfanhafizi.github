<?php
if (isset($_POST['profile_submit'])) {
  mysqli_begin_transaction($conn);

  try {
    $name = strtoupper($_POST['name']);
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $poskod = $_POST['poskod'];
    $bandar = $_POST['bandar'];
    $negeri = $_POST['negeri'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $birthdate = $_POST['birthdate'];
    $kod = $_POST['kod'];

    $file = $_FILES['profile'];
    $file_name = $file['name'];
    $file_temp = $file['tmp_name'];
    $file_size = $file['size'];

    $file_new_name = $app_id . '_profile.jpg';
    $path = '../upload/applicant/profile/';
    $file_path = $path.$file_new_name;
    move_uploaded_file($file_temp, $file_path);

    $query = "UPDATE applicant SET
      app_fullname='$name',
      app_address_line1='$address1',
      app_address_line2='$address2',
      app_poskod='$poskod',
      app_bandar='$bandar',
      app_negeri='$negeri',
      app_tel='$tel',
      app_email='$email',
      app_birthdate='$birthdate',
      app_code='$kod',
      app_profile='$file_path'
      
      WHERE app_matric = '$app_id'";

    if (mysqli_query($conn, $query)) {
      mysqli_commit($conn);

      echo '<div class="modal1">
        <div class="modal-content1">
        <div class="modal-body1">
          <p class=""><i class="bi bi-check-circle me-1"></i>Maklumat anda telah dikemaskini.</p>
        </div>
        <div class="modal-footer1">
          <a class="btn btn-primary" href="">Tutup</a>
        </div>
      </div>
      </div>';
    } else {
      throw new Exception('(Unknown Error)');
    }
  } catch (Exception $e) {
    mysqli_rollback($conn);

    echo '<div class="modal1">
      <div class="modal-content1 bg-warning">
      <div class="modal-body1">
        <p>Ralat berlaku. ' . $e->getMessage() . '</p>
      </div>
      <div class="modal-footer1">
        <button class="btn btn-dark" onclick="closeModal()">Tutup</button>
      </div>
    </div>
    </div>';
  }
}

?>