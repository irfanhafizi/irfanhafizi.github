<?php

if (isset($_POST['submit_nilai'])) {
  mysqli_begin_transaction($conn);

  try {
    $asnaf = $_POST['asnaf'];
    $pengajian = $_POST['pengajian'];
    $pinjaman = isset($_POST['pinjaman']) ? $_POST['pinjaman'] : 'TIDAK';
    $yatim = isset($_POST['yatim']) ? $_POST['yatim'] : 'TIDAK';
    $nota = $_POST['nota'];
    $status = 7;
    $amt1 = 0;

    if ($asnaf == 'FAKIR') {
      if ($pengajian == 'DIPLOMA') {
        $amt1 = ($pinjaman == 'TIDAK') ? $amt_fakir_diploma_0 : $amt_fakir_diploma_1;
      } elseif ($pengajian == 'IJAZAH') {
        $amt1 = ($pinjaman == 'TIDAK') ? $amt_fakir_ijazah_0 : $amt_fakir_ijazah_1;
      } elseif ($pengajian == 'MASTER/PHD') {
        $amt1 = ($pinjaman == 'TIDAK') ? $amt_fakir_master_0 : $amt_fakir_master_1;
      }
    } elseif ($asnaf == 'MISKIN') {
      if ($pengajian == 'DIPLOMA') {
        $amt1 = ($pinjaman == 'TIDAK') ? $amt_miskin_diploma_0 : $amt_miskin_diploma_1;
      } elseif ($pengajian == 'IJAZAH') {
        $amt1 = ($pinjaman == 'TIDAK') ? $amt_miskin_ijazah_0 : $amt_miskin_ijazah_1;
      } elseif ($pengajian == 'MASTER/PHD') {
        $amt1 = ($pinjaman == 'TIDAK') ? $amt_miskin_master_0 : $amt_miskin_master_1;
      }
    }

    $amt = ($yatim == 'YA') ? $amt1 + $amt_yatim : $amt1;

    $query = "UPDATE interview
              SET interview_asnaf = '$asnaf',
                  interview_pengajian = '$pengajian',
                  interview_pinjaman = '$pinjaman',
                  interview_yatim = '$yatim',
                  interview_nota = '$nota',
                  interview_status = '$status',
                  interview_amt = '$amt'
              WHERE interview_apply = '$decrypted_id'";
    $query1 = "UPDATE apply SET apply_status = 7 WHERE apply_id = '$decrypted_id'";

    if (mysqli_query($conn, $query) && mysqli_query($conn, $query1)) {
      mysqli_commit($conn);
      
      echo '<div class="modal1">
      <div class="modal-content1">
      <div class="modal-body1">
        <p>Tetapkan Jumlah Zakat yang akan dihantar.</p>
      </div>
      <form method="POST">
      <div class="modal-footer1">
      <input class="w-100 form-control" name="zakat" type="number" value="'.number_format($amt,2).'"></input>
        <button class="btn btn-primary" name="submit_zakat">Teruskan</button>
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

if (isset($_POST['submit_zakat'])) {
  mysqli_begin_transaction($conn);

  try {
    $zakat = $_POST['zakat'];
    $query = "UPDATE interview SET interview_amt = '$zakat' WHERE interview_apply = '$decrypted_id'";

    if (mysqli_query($conn, $query)) {
      mysqli_commit($conn);
      echo "<script>window.location.href='interview.php';</script>";
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