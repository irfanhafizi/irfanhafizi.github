<?php
include '../connection.php';
require '../assets/vendor/autoload.php';
include '../messages.php';

if (isset($_POST['sah'])) {
  $amt = $_POST['amt'];
  $query = "UPDATE interview JOIN apply ON apply_id = interview_apply 
  SET apply_status = 8, 
  interview_status = 8, 
  interview_amt_final = '$amt' 
  WHERE interview_apply = '$apply_id'";

  mysqli_begin_transaction($conn);

  try {
    if (mysqli_query($conn, $query)) {
      mysqli_commit($conn);

      $query_tel = "SELECT * FROM apply LEFT JOIN applicant ON app_matric = apply_matric WHERE apply_id = '$apply_id'";
      $check_tel = mysqli_query($conn, $query_tel);
      $row_tel = mysqli_fetch_assoc($check_tel);

      $chatid = $row_tel['app_chatid'];
      $message = $msg_success;

      $mgClient->messages()->send($domain, [
        'from' => $from,
        'to' => $to,
        'subject' => $subject,
        'text' => $message
      ]);

      $urlmsg = "https://api.telegram.org/bot{$botToken}/sendMessage?chat_id={$chatid}&text={$message}";

      $response = file_get_contents($urlmsg);
      
      if ($response === false) {
        throw new Exception('(Error sending message)');
      } else {
      }


      echo '<div class="modal1">
      <div class="modal-content1">
      <div class="modal-body1">
        <p>Pengesahan Permohonan Zakat Berjaya.</p>
      </div>
      <div class="modal-footer1">
        <a class="btn btn-primary" href="interview_done.php">Teruskan</a>
      </div>
    </div>
    </div>';
      //echo "<script>window.location.href='latest_apply.php';</script>";
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

if (isset($_POST['gagal'])) {
  $amt = $_POST['amt'];
  $query = "UPDATE interview JOIN apply ON apply_id = interview_apply 
  SET apply_status = 9, 
  interview_status = 9,
  interview_amt_final = '$amt' 
  WHERE interview_apply = '$apply_id'";

  mysqli_begin_transaction($conn);

  try {
    if (mysqli_query($conn, $query)) {
      mysqli_commit($conn);

      $query_tel = "SELECT * FROM apply LEFT JOIN applicant ON app_matric = apply_matric WHERE apply_id = '$apply_id'";
      $check_tel = mysqli_query($conn, $query_tel);
      $row_tel = mysqli_fetch_assoc($check_tel);

      $chatid = $row_tel['app_chatid'];
      $message = $msg_fail;

      $mgClient->messages()->send($domain, [
        'from' => $from,
        'to' => $to,
        'subject' => $subject,
        'text' => $message
      ]);

      $urlmsg = "https://api.telegram.org/bot{$botToken}/sendMessage?chat_id={$chatid}&text={$message}";

      $response = file_get_contents($urlmsg);
      
      if ($response === false) {
        throw new Exception('(Error sending message)');
    } else {
    }


      echo '<div class="modal1">
      <div class="modal-content1 bg-danger">
      <div class="modal-body1">
        <p class="text-white">Anda telah Menolak Permohonan Ini. Nyatakan sebab penolakan.</p>
      </div>
      <form method="POST">
      <div class="modal-footer1">
      <input class="w-100 form-control" name="sebab" type="text" placeholder="Sebab"></input>
        <button class="btn btn-light" name="submit_sebab">Teruskan</button>
      </div>
      </form>
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

if (isset($_POST['submit_sebab'])) {
  $sebab = $_POST['sebab'];
  $query = "UPDATE apply SET apply_status_sebab = '$sebab' WHERE apply_id = '$apply_id'";

  mysqli_begin_transaction($conn);

  try {
    if (mysqli_query($conn, $query)) {
      mysqli_commit($conn);
      echo "<script>window.location.href='interview_done.php';</script>";
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