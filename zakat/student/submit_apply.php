<?php 
include '../connection.php';
require '../assets/vendor/autoload.php';
include '../messages.php';

if (isset($_POST['apply_submit'])) {
  mysqli_begin_transaction($conn);

  try {
    if (isset($_GET['id'])) {
      $check_sem = "SELECT * FROM apply 
      JOIN applicant ON apply_matric = app_matric
      WHERE apply_id = '$decrypted_id' AND apply_matric = '$key'";
      $check = mysqli_query($conn, $check_sem);

      if (mysqli_num_rows($check) == 1) {
        $query = "UPDATE apply SET
          apply_status='2'
          
          WHERE apply_id = '$decrypted_id' AND apply_matric = '$key'";

        if (mysqli_query($conn, $query)) {
          mysqli_commit($conn);
          $row1 = mysqli_fetch_assoc($check);

          $chatid = $row1['app_chatid'];
          $message = $msg_submited;

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

          $encoded_id = $_GET["id"];
          $current_page = basename($_SERVER['PHP_SELF']);
          $url = 'apply_app.php?id=' . $encoded_id;

          echo '<div class="modal1">
            <div class="modal-content1">
            <div class="modal-body1">
              <p class=""><i class="bi bi-check-circle me-1"></i>Permohonanan Telah Dihantar!</p>
            </div>
            <div class="modal-footer1">
              <a class="btn btn-primary" href="' . $url . '">Teruskan</a>
            </div>
          </div>
          </div>';
        } else {
          throw new Exception('(Unknown Error)');
        }
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
?>