<?php
include '../connection.php';


if(isset($_POST['next'])){
  //update
  $nama = strtoupper($_POST['name']);
  $pekerjaan = strtoupper($_POST['pekerjaan']);
  $hubungan = $_POST['hubungan'];
  $perkahwinan = strtoupper($_POST['perkahwinan']);
  $address1 = strtoupper($_POST['address1']);
  $address2 = strtoupper($_POST['address2']);
  $poskod = strtoupper($_POST['poskod']);
  $bandar = strtoupper($_POST['bandar']);
  $negeri = strtoupper($_POST['negeri']);
  $tel = $_POST['tel'];

  mysqli_begin_transaction($conn);

  try{
    
  if(isset($_GET['id'])){
    $check_sem = "SELECT * FROM apply WHERE apply_id = '$decrypted_id' AND apply_matric = '$key'";
    $check = mysqli_query($conn, $check_sem);

    if(mysqli_num_rows($check) == 1){
      $query = "UPDATE apply SET
      apply_nama_keluarga='$nama',
      apply_pekerjaan_keluarga='$pekerjaan',
      apply_hubungan_keluarga='$hubungan',
      apply_status_perkahwinan_keluarga='$perkahwinan',
      apply_alamat_keluarga='$address1',
      apply_alamat2_keluarga='$address2',
      apply_poskod_keluarga='$poskod',
      apply_bandar_keluarga='$bandar',
      apply_negeri_keluarga='$negeri',
      apply_tel_keluarga='$tel'
      
      WHERE apply_id = '$decrypted_id' AND apply_matric = '$key'";

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
      throw new Exception('(Unknown Error)');
    }
  }
  }catch(Exception $e){
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

if(isset($_POST['back'])){
  //update
  $nama = strtoupper($_POST['name']);
  $pekerjaan = strtoupper($_POST['pekerjaan']);
  $hubungan = $_POST['hubungan'];
  $perkahwinan = strtoupper($_POST['perkahwinan']);
  $address1 = strtoupper($_POST['address1']);
  $address2 = strtoupper($_POST['address2']);
  $poskod = strtoupper($_POST['poskod']);
  $bandar = strtoupper($_POST['bandar']);
  $negeri = strtoupper($_POST['negeri']);
  $tel = $_POST['tel'];

  mysqli_begin_transaction($conn);
  try{

    if(isset($_GET['id'])){
      $check_sem = "SELECT * FROM apply WHERE apply_id = '$decrypted_id' AND apply_matric = '$key'";
      $check = mysqli_query($conn, $check_sem);
  
      if(mysqli_num_rows($check) == 1){
        $query = "UPDATE apply SET
        apply_nama_keluarga='$nama',
        apply_pekerjaan_keluarga='$pekerjaan',
        apply_hubungan_keluarga='$hubungan',
        apply_status_perkahwinan_keluarga='$perkahwinan',
        apply_alamat_keluarga='$address1',
        apply_alamat2_keluarga='$address2',
        apply_poskod_keluarga='$poskod',
        apply_bandar_keluarga='$bandar',
        apply_negeri_keluarga='$negeri',
        apply_tel_keluarga='$tel'
        
        WHERE apply_id = '$decrypted_id' AND apply_matric = '$key'";
  
        if(mysqli_query($conn, $query)){
          $encoded_id = $_GET["id"];
          $current_page = basename($_SERVER['PHP_SELF']);
          preg_match('/mohon_bahagian(\d+)\.php/', $current_page, $matches);
          $page_number = $matches[1];
          $new_page_number = $page_number - 1;
          $new_page_name = 'mohon_bahagian' . $new_page_number . '.php';
          $url = $new_page_name.'?id=' .$encoded_id;
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
          throw new Exception('(Unknown Error)');}
      }else{
        throw new Exception('(Unknown Error)');
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