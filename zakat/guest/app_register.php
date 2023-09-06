<?php
include '../connection.php';

if (isset($_POST['app_submit'])) {
  $fullname = strtoupper($_POST['fullname']);
  $icnumber = $_POST['icnumber'];
  $phonenumber = $_POST['phonenumber'];
  $matricnumber = $_POST['matricnumber'];
  $birthdate = $_POST['birthdate'];
  $email = $_POST['email'];
  $alamat1 = strtoupper($_POST['alamat1']);
  $alamat2 = strtoupper($_POST['alamat2']);
  $poskod = strtoupper($_POST['poskod']);
  $bandar = strtoupper($_POST['bandar']);
  $negeri = strtoupper($_POST['negeri']);
  $gender = strtoupper($_POST['gender']);
  $fakulti = $_POST['fakulti'];
  $code = $_POST['code'];

  $frontic = $_FILES['frontic'];
  $front_nameic = $frontic['name'];
  $front_tempic = $frontic['tmp_name'];
  $front_sizeic = $frontic['size'];

  $front_new_nameic = $matricnumber . '_' . $front_nameic;
  $pathfrontic = '../upload/applicant/frontic/';
  $front_pathic = $pathfrontic . $front_new_nameic;
  move_uploaded_file($front_tempic, $front_pathic);

  $backic = $_FILES['backic'];
  $back_nameic = $backic['name'];
  $back_tempic = $backic['tmp_name'];
  $back_sizeic = $backic['size'];

  $back_new_nameic = $matricnumber . '_' . $back_nameic;
  $pathbackic = '../upload/applicant/backic/';
  $back_pathic = $pathbackic . $back_new_nameic;
  move_uploaded_file($back_tempic, $back_pathic);

  $frontmatric = $_FILES['frontmatric'];
  $front_namematric = $frontmatric['name'];
  $front_tempmatric = $frontmatric['tmp_name'];
  $front_sizematric = $frontmatric['size'];

  $front_new_namematric = $matricnumber . '_' . $front_namematric;
  $pathfrontmatric = '../upload/applicant/frontmatric/';
  $front_pathmatric = $pathfrontmatric . $front_new_namematric;
  move_uploaded_file($front_tempmatric, $front_pathmatric);

  $backmatric = $_FILES['backmatric'];
  $back_namematric = $backmatric['name'];
  $back_tempmatric = $backmatric['tmp_name'];
  $back_sizematric = $backmatric['size'];

  $back_new_namematric = $matricnumber . '_' . $back_namematric;
  $pathbackmatric = '../upload/applicant/backmatric/';
  $back_pathmatric = $pathbackmatric . $back_new_namematric;
  move_uploaded_file($back_tempmatric, $back_pathmatric);

  $filetawaran = $_FILES['documenttawaran'];
  $file_nametawaran = $filetawaran['name'];
  $file_temptawaran = $filetawaran['tmp_name'];
  $file_sizetawaran = $filetawaran['size'];

  $file_new_nametawaran = $matricnumber . '_' . $file_nametawaran;
  $pathtawaran = '../upload/applicant/surat_tawaran/';
  $file_pathtawaran = $pathtawaran . $file_new_nametawaran;
  move_uploaded_file($file_temptawaran, $file_pathtawaran);

  $fileprofile = $_FILES['profile'];
  $file_nameprofile = $fileprofile['name'];
  $file_tempprofile = $fileprofile['tmp_name'];
  $file_sizeprofile = $fileprofile['size'];

  $file_new_nameprofile = $matricnumber . '_' . $file_nameprofile;
  $pathprofile = '../upload/applicant/profile/';
  $file_pathprofile = $pathprofile . $file_new_nameprofile;
  move_uploaded_file($file_tempprofile, $file_pathprofile);

  $options = [
      'cost' => 12,
  ];
  $password = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
  $confirmpassword = $_POST['confirmpassword'];

  mysqli_begin_transaction($conn);

  try {
      $duplicate = mysqli_query($conn, "SELECT * FROM applicant WHERE app_matric = '$matricnumber'");
      if (mysqli_num_rows($duplicate) > 0) {
          echo '<div class="modal1">
          <div class="modal-content1 bg-warning">
          <div class="modal-body1">
            <p>Nombor matrik telah digunakan. Sila log masuk atau terlupa katalaluan</p>
          </div>
          <div class="modal-footer1">
            <button class="btn btn-dark" onclick="closeModal()">Tutup</button>
          </div>
        </div>
        </div>';
      } else {
          if (password_verify($confirmpassword, $password)) {
              $query = "INSERT INTO applicant (app_fullname,app_gender,app_ic,app_tel,app_matric,
                app_birthdate,app_email,app_faculty,app_code,app_address_line1,app_address_line2,app_poskod,
                app_bandar,app_negeri,app_document_ic,app_document1_ic,app_document_matric,app_document1_matric,
                app_document_tawaran,app_profile,app_password)
                VALUES ('$fullname','$gender','$icnumber','$phonenumber','$matricnumber',
                '$birthdate','$email','$fakulti','$code','$alamat1','$alamat2','$poskod',
                '$bandar','$negeri','$front_pathic','$back_pathic','$front_pathmatric','$back_pathmatric','$file_pathtawaran','$file_pathprofile','$password')";

              if ($conn->query($query)) {
                  mysqli_commit($conn); // Commit the transaction
                  echo '<div class="modal1">
                    <div class="modal-content1">
                    <div class="modal-body1">
                      <p class="">Pendaftaran Berjaya</p>
                    </div>
                    <div class="modal-footer1">
                      <a class="btn btn-primary" href="login.php">Teruskan</a>
                    </div>
                  </div>
                  </div>';
              } else {
                  throw new Exception('(Unknown Error)');
              }
          } else {
              throw new Exception('Ralat Katalaluan');
          }
      }
  } catch (Exception $e) {
      mysqli_rollback($conn); // Rollback the transaction
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