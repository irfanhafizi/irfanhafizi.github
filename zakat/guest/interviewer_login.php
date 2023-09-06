<?php
include '../connection.php';

if (isset($_POST['inter_submit'])) {
  $username = $_POST['username'];

  mysqli_begin_transaction($conn);

  try {
    $query = "SELECT * FROM interviewer WHERE inter_no_pekerja = '$username'";
    $sql = mysqli_query($conn, $query);

    if (mysqli_num_rows($sql) > 0) {
      $row = mysqli_fetch_assoc($sql);
      if (password_verify($_POST['password'], $row['inter_password'])) {
        session_start();
        $_SESSION['inter_login'] = true;
        $_SESSION['inter_id'] = $username;
        $_SESSION['iv'] = random_bytes(16);
        session_write_close();

        mysqli_commit($conn); // Commit the transaction

        echo "<script>window.location.href='../interviewer/index.php';</script>";
      } else {
        throw new Exception('Kata Laluan anda tidak sah.');
      }
    } else {
      throw new Exception('Nama Pengguna ini tidak berdaftar.');
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
