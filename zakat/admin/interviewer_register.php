<?php
include '../connection.php';

if(isset($_POST['inter_submit'])){
  mysqli_begin_transaction($conn);

try {
  $name = strtoupper($_POST['name']);
  $nopekerja = $_POST['nopekerja'];
  $noic = $_POST['noic'];
  $tel = $_POST['tel'];
  $email = $_POST['email'];
  $fakulti = $_POST['fakulti'];
  $profilepath = '../upload/interviewer/profile/profile.png';
  
  $options = [
    'cost' => 12,
  ];
  $password = password_hash($_POST['noic'], PASSWORD_BCRYPT,$options);

  $query = "INSERT INTO interviewer (inter_name,inter_no_pekerja,inter_ic,inter_tel,inter_email,inter_faculty,inter_profile,inter_password)
    VALUES ('$name','$nopekerja','$noic','$tel','$email','$fakulti','$profilepath','$password')";

  if($conn->query($query)){
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
  }else{
    mysqli_rollback($conn);

    echo '<div class="modal1">
      <div class="modal-content1 bg-warning">
      <div class="modal-body1">
        <p>Ralat (Unknown error).</p>
      </div>
      <div class="modal-footer1">
        <button class="btn btn-dark" onclick="closeModal()">Tutup</button>
      </div>
    </div>
    </div>';
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
      <p>Ralat berlaku. (Unknown error).</p>
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