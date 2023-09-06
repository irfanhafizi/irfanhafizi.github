<?php
include '../connection.php';

if (isset($_POST['apply_submit'])) {
  // insert apply
  if (isset($_GET['id'])) {
    mysqli_begin_transaction($conn);

    try {
      if ($_FILES['document']['name']) {
        $file = $_FILES['document'];
        $file_name = $file['name'];
        $file_temp = $file['tmp_name'];
        $file_size = $file['size'];
        $file_new_name = $row_mohon['apply_matric'] . '_' . $row_mohon['sem_name'] . '_' . $file_name;
        $path = '../upload/apply/';
        $file_path = $path.$file_new_name;
        move_uploaded_file($file_temp, $file_path);
      } else {
        $file_path = $row_mohon['apply_document'];
      }
      $pengakuan = $_POST['pengakuan'];

      $check_sem = "SELECT * FROM apply WHERE apply_id = '$decrypted_id' AND apply_matric = '$key'";
      $check = mysqli_query($conn, $check_sem);

      if (mysqli_num_rows($check) == 1) {
        $query = "UPDATE apply SET
        apply_document='$file_path',
        apply_pengakuan='$pengakuan',
        apply_status='2'
        
        WHERE apply_id = '$decrypted_id' AND apply_matric = '$key'";

        if (mysqli_query($conn, $query)) {
          mysqli_commit($conn);

          $encoded_id = $_GET["id"];
          $current_page = basename($_SERVER['PHP_SELF']);
          $url = 'view_apply.php?id=' .$encoded_id;

          echo '<div class="modal1">
            <div class="modal-content1">
            <div class="modal-body1">
              <p class=""><i class="bi bi-check-circle me-1"></i>Permohonanan Telah Dihantar!</p>
            </div>
            <div class="modal-footer1">
              <a class="btn btn-primary" href="'.$url.'">Teruskan</a>
            </div>
          </div>
          </div>';
        } else {
          throw new Exception('(Unknown Error)');
        }
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
}

if (isset($_POST['back'])) {
  if (isset($_GET['id'])) {
    mysqli_begin_transaction($conn);

    try {
      if ($_FILES['document']['name']) {
        $file = $_FILES['document'];
        $file_name = $file['name'];
        $file_temp = $file['tmp_name'];
        $file_size = $file['size'];
        $file_new_name = $row_mohon['apply_matric'] . '_' . $row_mohon['sem_name'] . '_' . $file_name;
        $path = '../upload/apply/';
        $file_path = $path.$file_new_name;
        move_uploaded_file($file_temp, $file_path);
      } else {
        $file_path = $row_mohon['apply_document'];
      }
      $pengakuan = $_POST['pengakuan'];

      $check_sem = "SELECT * FROM apply WHERE apply_id = '$decrypted_id' AND apply_matric = '$key'";
      $check = mysqli_query($conn, $check_sem);

      if (mysqli_num_rows($check) == 1) {
        $query = "UPDATE apply SET
        apply_document='$file_path',
        apply_pengakuan='$pengakuan'
        
        WHERE apply_id = '$decrypted_id' AND apply_matric = '$key'";

        if (mysqli_query($conn, $query)) {
          mysqli_commit($conn);

          $encoded_id = $_GET["id"];
          $current_page = basename($_SERVER['PHP_SELF']);
          preg_match('/mohon_bahagian(\d+)\.php/', $current_page, $matches);
          $page_number = $matches[1];
          $new_page_number = $page_number - 1;
          $new_page_name = 'mohon_bahagian' . $new_page_number . '.php';
          $url = $new_page_name.'?id=' .$encoded_id;

          echo '<div class="modal1">
            <div class="modal-content1">
            <div class="modal-body1">
              <p class=""><i class="bi bi-check-circle me-1"></i>Permohonanan Telah Disimpan!</p>
            </div>
            <div class="modal-footer1">
              <a class="btn btn-primary" href="'.$url.'">Teruskan</a>
            </div>
          </div>
          </div>';
        } else {
          throw new Exception('(Unknown Error)');
        }
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
}

if (isset($_POST['next'])) {
  if (isset($_GET['id'])) {
    mysqli_begin_transaction($conn);

    try {
      if ($_FILES['document']['name']) {
        $file = $_FILES['document'];
        $file_name = $file['name'];
        $file_temp = $file['tmp_name'];
        $file_size = $file['size'];
        $file_new_name = $row_mohon['apply_matric'] . '_' . $row_mohon['sem_name'] . '_' . $file_name;
        $path = '../upload/apply/';
        $file_path = $path.$file_new_name;
        move_uploaded_file($file_temp, $file_path);
      } else {
        $file_path = $row_mohon['apply_document'];
      }
      $pengakuan = $_POST['pengakuan'];

      $check_sem = "SELECT * FROM apply WHERE apply_id = '$decrypted_id' AND apply_matric = '$key'";
      $check = mysqli_query($conn, $check_sem);

      if (mysqli_num_rows($check) == 1) {
        $query = "UPDATE apply SET
        apply_document='$file_path',
        apply_pengakuan='$pengakuan'
        
        WHERE apply_id = '$decrypted_id' AND apply_matric = '$key'";

        if (mysqli_query($conn, $query)) {
          mysqli_commit($conn);

          $encoded_id = $_GET["id"];
          $url = 'apply_submit.php?id=' .$encoded_id;

          echo '<div class="modal1">
            <div class="modal-content1">
            <div class="modal-body1">
              <p class=""><i class="bi bi-check-circle me-1"></i>Permohonanan Telah Disimpan!</p>
            </div>
            <div class="modal-footer1">
              <a class="btn btn-primary" href="'.$url.'">Teruskan</a>
            </div>
          </div>
          </div>';
        } else {
          throw new Exception('(Unknown Error)');
        }
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
}
?>