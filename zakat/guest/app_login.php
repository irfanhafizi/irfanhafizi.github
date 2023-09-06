<?php
include '../connection.php';

mysqli_begin_transaction($conn);

try {
    if (isset($_POST['app_submit'])) {
        $matricnumber = $_POST['matricnumber'];

        $query = "SELECT * FROM applicant WHERE app_matric = '$matricnumber'";
        $sql = mysqli_query($conn, $query);

        if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
            if (password_verify($_POST['password'], $row['app_password'])) {
                session_start();
                $_SESSION['app_login'] = true;
                $_SESSION['app_id'] = $matricnumber;
                $_SESSION['iv'] = random_bytes(16);
                session_write_close();

                mysqli_commit($conn);
                echo "<script>window.location.href='../student/index.php';</script>";
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
              <p>Nombor Matrik ini tidak berdaftar.</p>
            </div>
            <div class="modal-footer1">
              <button class="btn btn-dark" onclick="closeModal()">Tutup</button>
            </div>
          </div>
          </div>';
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
mysqli_close($conn);
?>