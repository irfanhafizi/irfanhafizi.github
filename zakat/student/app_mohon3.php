<?php
include '../connection.php';

if(isset($_POST['next'])){
  //update
  $bapa = $_POST['bapa'];
  $ibu = $_POST['ibu'];
  $lain = $_POST['lain'];
  $tanggungan = $_POST['tanggungan'];
  $oku = $_POST['oku'];

  mysqli_begin_transaction($conn);
  try{
    if(isset($_GET['id'])){
        $check_sem = "SELECT * FROM apply WHERE apply_id = '$decrypted_id' AND apply_matric = '$key'";
        $check = mysqli_query($conn, $check_sem);
        $query_kifayah = $conn->query("SELECT * FROM hadkifayah WHERE had_id=1");
        $rowkifayah = mysqli_fetch_assoc($query_kifayah);

        if(mysqli_num_rows($check) == 1){
          $row1=mysqli_fetch_assoc($check);
        $keperluan = $rowkifayah['had_jumlah'];
        $pendapatan = $bapa+$ibu+$lain+$row1['apply_jumlah_tajaan'];
        
        if ($pendapatan > $keperluan) {
            $kifayah = 'TAK LAYAK';
        } elseif ($pendapatan < $keperluan / 2) {
            $kifayah = 'FAKIR';
        } else {
            $kifayah = 'MISKIN';
        }
        
          $query = "UPDATE apply SET
          apply_pendapatan_bapa_sebulan='$bapa',
          apply_pendapatan_ibu_sebulan='$ibu',
          apply_pendapatan_lain_sebulan='$lain',
          apply_jumlah_tanggungan='$tanggungan',
          apply_jumlah_tanggungan_oku='$oku',
          apply_kifayah = '$kifayah'
          
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

if(isset($_POST['back'])){
  //update
  $bapa = $_POST['bapa'];
  $ibu = $_POST['ibu'];
  $lain = $_POST['lain'];
  $tanggungan = $_POST['tanggungan'];
  $oku = $_POST['oku'];

  mysqli_begin_transaction($conn);
  try{
    if(isset($_GET['id'])){
        $check_sem = "SELECT * FROM apply WHERE apply_id = '$decrypted_id' AND apply_matric = '$key'";
        $check = mysqli_query($conn, $check_sem);
        $query_kifayah = $conn->query("SELECT * FROM hadkifayah WHERE had_id=1");
        $rowkifayah = mysqli_fetch_assoc($query_kifayah);

        if(mysqli_num_rows($check) == 1){
          $row1=mysqli_fetch_assoc($check);
        $keperluan = $rowkifayah['had_jumlah'];
        $pendapatan = $bapa+$ibu+$lain+$row1['apply_jumlah_tajaan'];
        
        if ($pendapatan > $keperluan) {
            $kifayah = 'TAK LAYAK';
        } elseif ($pendapatan < $keperluan / 2) {
            $kifayah = 'FAKIR';
        } else {
            $kifayah = 'MISKIN';
        }
        
          $query = "UPDATE apply SET
          apply_pendapatan_bapa_sebulan='$bapa',
          apply_pendapatan_ibu_sebulan='$ibu',
          apply_pendapatan_lain_sebulan='$lain',
          apply_jumlah_tanggungan='$tanggungan',
          apply_jumlah_tanggungan_oku='$oku',
          apply_kifayah = '$kifayah'
          
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