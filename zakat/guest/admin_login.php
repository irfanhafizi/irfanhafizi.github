<?php
include '../connection.php';

if (isset($_POST['admin_submit'])) {
  $username = $_POST['username'];

  mysqli_begin_transaction($conn); // Begin the transaction

  try {
      $query = "SELECT * FROM admin WHERE admin_no_pekerja = '$username'";
      $sql = mysqli_query($conn, $query);

      if (mysqli_num_rows($sql) > 0) {
          $row = mysqli_fetch_assoc($sql);
          if (password_verify($_POST['password'], $row['admin_password'])) {
              session_start();
              $_SESSION['admin_login'] = true;
              $_SESSION['admin_id'] = $username;
              session_write_close();

              mysqli_commit($conn); // Commit the transaction
              echo "<script>window.location.href='../admin/index.php';</script>";
          } else {
              mysqli_rollback($conn);
              echo '<div class="modal1">
              <div class="modal-content1 bg-warning">
              <div class="modal-body1">
                <p>Kata Laluan anda tidak sah.</p>
              </div>
              <div class="modal-footer1">
                <button class="btn btn-dark" onclick="closeModal()">Tutup</button>
              </div>
            </div>
            </div>';
          }
      } else {
        mysqli_rollback($conn);
          echo '<div class="modal1">
          <div class="modal-content1 bg-warning">
          <div class="modal-body1">
            <p>Nama Pengguna ini tidak berdaftar.</p>
          </div>
          <div class="modal-footer1">
            <button class="btn btn-dark" onclick="closeModal()">Tutup</button>
          </div>
        </div>
        </div>';
      }
  } catch (Exception $e) {
      mysqli_rollback($conn); // Rollback the transaction
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
mysqli_close($conn);
?>