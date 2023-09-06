<?php
include '../connection.php';
include 'latest_sesi.php';

if(isset($_POST['next'])){
  //update
  $email = $_POST['email'];
  $tel = $_POST['tel'];
  $address1 = strtoupper($_POST['address1']);
  $address2 = strtoupper($_POST['address2']);
  $poskod = strtoupper($_POST['poskod']);
  $bandar = strtoupper($_POST['bandar']);
  $negeri = strtoupper($_POST['negeri']);
  $sem = $_POST['sem'];
  $cgpa = $_POST['cgpa'];
  $penasihat = strtoupper($_POST['penasihat']);
  $perkahwinan = strtoupper($_POST['perkahwinan']);
  $bank = $_POST['bank'];
  $bankpenerima = strtoupper($_POST['bankpenerima']);
  $namabank = strtoupper($_POST['namabank']);
  $perokok = strtoupper($_POST['perokok']);
  $status = 1;
  $sesi = $row_sesi['sesi_id'];

  mysqli_begin_transaction($conn);

  $check_sem = "SELECT * FROM apply WHERE apply_matric = '$app_id' AND apply_sem = '$sem' ";
  $check = mysqli_query($conn, $check_sem);
  try{
    if(isset($_GET['id'])){
      $query = "UPDATE apply SET
      apply_email='$email',
      apply_tel='$tel',
      apply_address_line1='$address1',
      apply_address_line2='$address2',
      apply_poskod='$poskod',
      apply_bandar='$bandar',
      apply_negeri='$negeri',
      apply_cgpa='$cgpa',
      apply_nama_penasihat='$penasihat',
      apply_taraf_perkahwinan='$perkahwinan',
      apply_bank='$bank',
      apply_bank_penerima='$bankpenerima',
      apply_nama_bank='$namabank',
      apply_perokok='$perokok'
      
      WHERE apply_id = '$decrypted_id'";
  
      if(mysqli_query($conn, $query)){
        $encoded_id = $_GET["id"];
        $current_page = basename($_SERVER['PHP_SELF']);
          $current_page_number = intval(substr($current_page, -5, 1)); // Extract the page number from the file name
          $next_page_number = $current_page_number + 1; // Calculate the next page number
          $next_page = str_replace($current_page_number, $next_page_number, $current_page); // Replace the page number in the file name
          $url = $next_page.'?id=' .$encoded_id;
          mysqli_commit($conn);

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
      }else{
        throw new Exception('(Unknown Error)');
      }
    }else{
      if(mysqli_num_rows($check) > 0){
        throw new Exception('Anda telah buat permohonan untuk semester ini');
      }else{
        $query = "INSERT INTO apply (apply_matric,apply_sesi,apply_email,apply_tel,apply_address_line1,apply_address_line2,apply_poskod,
        apply_bandar,apply_negeri,apply_sem,apply_cgpa,apply_nama_penasihat,apply_taraf_perkahwinan,apply_bank,apply_bank_penerima,apply_nama_bank,apply_perokok,apply_status)
        VALUES ('$app_id','$sesi','$email','$tel','$address1','$address2','$poskod','$bandar','$negeri','$sem','$cgpa','$penasihat',
        '$perkahwinan','$bank','$bankpenerima','$namabank','$perokok','$status')";
  
        if(mysqli_query($conn, $query)){
          $parameter_id = mysqli_insert_id($conn);
          
          include 'utils.php';
  
          $current_page = basename($_SERVER['PHP_SELF']);
          $current_page_number = intval(substr($current_page, -5, 1)); // Extract the page number from the file name
          $next_page_number = $current_page_number + 1; // Calculate the next page number
          $next_page = str_replace($current_page_number, $next_page_number, $current_page); // Replace the page number in the file name
          $url = $next_page.'?id=' .$encoded_id;
  
          mysqli_commit($conn);
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
        }else{
          throw new Exception('(Unknown Error)');
        }
      }
    }
  }catch (Exception $e){
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