<?php
include '../connection.php';
require '../assets/vendor/autoload.php';
include '../messages.php';

if (isset($_POST['assign'])) {
  mysqli_begin_transaction($conn);

  try {
    $interviewer = $_GET['id'];
    $applys = $_POST['applys'];
    $execute = false;
    $i = 0;

    $inter_id = $_GET['id'];
    $interquery = $conn->query("SELECT * FROM interviewer LEFT JOIN faculty ON fac_id = inter_faculty WHERE inter_no_pekerja = '$inter_id'");
    $row_inter = mysqli_fetch_assoc($interquery);

    if(!empty($applys)){
      foreach ($applys as $apply) {

        $existingQuery = "SELECT COUNT(*) FROM interview WHERE interview_apply = '$apply'";
        $result = mysqli_query($conn, $existingQuery);
        $check = mysqli_fetch_row($result)[0];
  
        if ($check > 0) {
          throw new Exception('(Duplicate entries.)');
        }else{
          $getsesi = $conn->query("SELECT apply_sesi FROM apply WHERE apply_id = '$apply'");
          $rowsesi = $getsesi->fetch_object();
          $sesi = $rowsesi->apply_sesi;
    
          $query = "INSERT INTO interview (interview_sesi, interview_interviewer, interview_apply, interview_status) VALUES ('$sesi', '$interviewer', '$apply', '6')";
          $query1 = "UPDATE apply SET apply_status = 6 WHERE apply_id = '$apply'";
          
          mysqli_query($conn, $query);
          mysqli_query($conn, $query1);
    
          if ($query && $query1) {
            $i++;
            
            $query_tel = "SELECT * FROM apply LEFT JOIN applicant ON app_matric = apply_matric WHERE apply_id = '$apply'";
            $check_tel = mysqli_query($conn, $query_tel);
            $row_tel = mysqli_fetch_assoc($check_tel);
  
            $chatid = $row_tel['app_chatid'];
            $message = $msg_app_assign;

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
          }
    
          $execute = true;
        }
      }
    }else{
      throw new Exception('(Pilih sekurang-kuranya 1 pemohon)');
    }
    
    if ($execute) {
      mysqli_commit($conn);
      $reload = basename($_SERVER['REQUEST_URI']);

      
      $query_tel1 = "SELECT * FROM interviewer WHERE inter_no_pekerja = '$interviewer'";
      $check_tel1 = mysqli_query($conn, $query_tel1);
      $row_tel1 = mysqli_fetch_assoc($check_tel1);

      $chatid = $row_tel1['inter_chatid'];
      $message1 = 'Seramai '.$i.$msg_inter_assign;

      $mgClient->messages()->send($domain, [
        'from' => $from,
        'to' => $to,
        'subject' => $subject,
        'text' => $message1
      ]);

      $urlmsg = "https://api.telegram.org/bot{$botToken}/sendMessage?chat_id={$chatid}&text={$message1}";

      $response = file_get_contents($urlmsg);
      
      if ($response === false) {
        throw new Exception('(Error sending message)');
    } else {
    }

      echo '<div class="modal1">
      <div class="modal-content1">
      <div class="modal-body1">
        <p class="">Seramai ' . $i . ' orang pemohon telah berjaya diberikan kepada penemuduga ' . $row_inter['inter_name'] . '.</p>
      </div>
      <div class="modal-footer1">
        <a class="btn btn-primary" href="' . $reload . '">Teruskan</a>
      </div>
    </div>
    </div>';
    }
  } catch (Exception $e) {
    mysqli_rollback($conn);

    echo '<div class="modal1">
    <div class="modal-content1 bg-warning">
    <div class="modal-body1">
      <p>Ralat berlaku.' . $e->getMessage() . '</p>
    </div>
    <div class="modal-footer1">
      <button class="btn btn-dark" onclick="closeModal()">Tutup</button>
    </div>
  </div>
  </div>';
  }
}


?>