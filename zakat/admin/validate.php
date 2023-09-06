<?php
include '../connection.php';
require '../assets/vendor/autoload.php';
include '../messages.php';

if (isset($_POST['sah'])) {
  mysqli_begin_transaction($conn);

  try {
    $query = "UPDATE apply SET apply_status = 3,apply_status_sebab = NULL WHERE apply_id = '$apply_id'";
    if (mysqli_query($conn, $query)) {
      mysqli_commit($conn);

      
      $query_tel = "SELECT * FROM apply LEFT JOIN applicant ON app_matric = apply_matric WHERE apply_id = '$apply_id'";
      $check_tel = mysqli_query($conn, $query_tel);
      $row_tel = mysqli_fetch_assoc($check_tel);

      $chatid = $row_tel['app_chatid'];
      $message = $msg_validated;

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
        <p>Pengesahan permohonan berjaya. Sila tetapkan penemuduga.</p>
      </div>
      <div class="modal-footer1">
        <a class="btn btn-primary" href="latest_apply.php">Teruskan</a>
      </div>
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

if (isset($_POST['gagal'])) {
  mysqli_begin_transaction($conn);

  try {
    $query = "UPDATE apply SET apply_status = 5 WHERE apply_id = '$apply_id'";
    if (mysqli_query($conn, $query)) {
      mysqli_commit($conn);

      $query_tel = "SELECT * FROM apply LEFT JOIN applicant ON app_matric = apply_matric WHERE apply_id = '$apply_id'";
      $check_tel = mysqli_query($conn, $query_tel);
      $row_tel = mysqli_fetch_assoc($check_tel);

      $chatid = $row_tel['app_chatid'];
      $message = $msg_reject;

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

if (isset($_POST['tidaklengkap'])) {
  mysqli_begin_transaction($conn);

  try {
    $query = "UPDATE apply SET apply_status = 4 WHERE apply_id = '$apply_id'";
    if (mysqli_query($conn, $query)) {
      mysqli_commit($conn);

      $query_tel = "SELECT * FROM apply LEFT JOIN applicant ON app_matric = apply_matric WHERE apply_id = '$apply_id'";
      $check_tel = mysqli_query($conn, $query_tel);
      $row_tel = mysqli_fetch_assoc($check_tel);

      $chatid = $row_tel['app_chatid'];
      $message = $msg_correction;

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
      <div class="modal-content1 bg-warning">
      <div class="modal-body1">
        <p class="text-white">Permohonan ini tidak lengkap. Nyatakan sebab untuk tindakan pemohon.</p>
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
  mysqli_begin_transaction($conn);

  try {
    $sebab = $_POST['sebab'];
    $query = "UPDATE apply SET apply_status_sebab = '$sebab' WHERE apply_id = '$apply_id'";

    if (mysqli_query($conn, $query)) {
      mysqli_commit($conn);
      echo "<script>window.location.href='latest_apply.php';</script>";
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