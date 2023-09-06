<?php
include '../connection.php';
 
if (isset($_POST['admin_submit'])) {
  mysqli_begin_transaction($conn);

  try {
    $name = strtoupper($_POST['name']);
    $nopekerja = $_POST['nopekerja'];
    $noic = $_POST['noic'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $profilepath = '../upload/admin/profile/profile.png';

    $options = [
      'cost' => 12,
    ];
    $password =  password_hash($_POST['noic'], PASSWORD_BCRYPT, $options);

    $query = "INSERT INTO admin (admin_fullname, admin_no_pekerja, admin_icno, admin_tel, admin_email, admin_profile, admin_password)
              VALUES ('$name', '$nopekerja', '$noic', '$tel', '$email', '$profilepath', '$password')";

    if ($conn->query($query)) {
      mysqli_commit($conn);

      echo '<div class="modal1">
        <div class="modal-content1">
        <div class="modal-body1">
          <p class="">Penemuduga baharu telah didaftarkan.</p>
        </div>
        <div class="modal-footer1">
          <a class="btn btn-primary" href="">Teruskan</a>
        </div>
      </div>
      </div>';
    } else {
      throw new Exception('(Unknown Error)');
    }
  } catch (Exception $e) {
    mysqli_rollback($conn);

    if ($e->getCode() == 1062) {
      echo '<div class="modal1">
        <div class="modal-content1 bg-alert">
        <div class="modal-body1">
          <p>Penemuduga telah didaftarkan. Sila semak.</p>
        </div>
        <div class="modal-footer1">
          <button class="btn btn-dark" onclick="closeModal()">Tutup</button>
        </div>
      </div>
      </div>';
    } else {
      echo '<div class="modal1">
        <div class="modal-content1 bg-warning">
        <div class="modal-body1">
          <p>Ralat berlaku.' . $e->getMessage() . '</p>
        </div>
        <div class="modal-footer1">
          <button class="btn btn-dark" onclick="closeModal()">Tutup</button>
        </div>
      </div>
      </div>';
    }
  }
}
?>