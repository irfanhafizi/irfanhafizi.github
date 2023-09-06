<?php
include '../connection.php';

mysqli_begin_transaction($conn);
try {
    if (isset($_POST['pass'])) {
        $password = $_POST['password'];

        $options = [
          'cost' => 12,
        ];
        $newpassword = password_hash($_POST['newpassword'], PASSWORD_BCRYPT, $options);
        $renewpassword = $_POST['renewpassword'];

        $query = "SELECT * FROM applicant WHERE app_matric = '$app_id'";
        $sql = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($sql);

        if(password_verify($password, $row['app_password'])){
          if(password_verify($renewpassword, $newpassword)){

            $change = $conn->query("UPDATE applicant SET app_password = '$newpassword' WHERE app_matric = '$app_id'");
            if(mysqli_query($conn, $query)){
              mysqli_commit($conn); // Commit the transaction
                  echo '<div class="modal1">
                    <div class="modal-content1">
                    <div class="modal-body1">
                      <p class="">Penukaran Kata Laluan Berjaya.</p>
                    </div>
                    <div class="modal-footer1">
                      <a class="btn btn-primary" href="">Tutup</a>
                    </div>
                  </div>
                  </div>';
            }else{
              throw new Exception('(Unknown Error)');
            }
          }else{
            throw new Exception('Kata laluan yang dimasukkan tidak sama.');
          }
        }else{
          throw new Exception('Kata laluan sekarang tidak betul.');
        }
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
?>