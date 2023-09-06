<?php
include '../connection.php';

if (isset($_POST['rubric'])) {
  $minum= $_POST['minum'];
  $penginapan= $_POST['penginapan'];
  $pakaian= $_POST['pakaian'];
  $perubatan= $_POST['perubatan'];
  $komunikasi= $_POST['komunikasi'];
  $pengankutan= $_POST['pengankutan'];
  $peralatan= $_POST['peralatan'];
  
  $pengajian= $_POST['pengajian'];
  $persatuan= $_POST['persatuan'];
  $buku= $_POST['buku'];
  $percetakan= $_POST['percetakan'];
  $utiliti= $_POST['utiliti'];
  $kk= $_POST['kk'];
  $kerja= $_POST['kerja'];

  $jumlah_sara = $minum+$penginapan+$pakaian+$perubatan+$komunikasi+$pengankutan+$peralatan;
  $jumlah_akademik = $pengajian+$persatuan+$buku+$percetakan+$utiliti+$kk+$kerja;
  $jumlah = $jumlah_sara+$jumlah_akademik;

  $query = "UPDATE hadkifayah SET
    had_minum= '$minum',
    had_penginapan= '$penginapan',
    had_pakaian= '$pakaian',
    had_perubatan= '$perubatan',
    had_komunikasi= '$komunikasi',
    had_pengankutan= '$pengankutan',
    had_peralatan= '$peralatan',
    
    had_pengajian= '$pengajian',
    had_persatuan= '$persatuan',
    had_buku= '$buku',
    had_percetakan= '$percetakan',
    had_utiliti= '$utiliti',
    had_kerja= '$kerja',
    had_kk= '$kk',

    had_jumlah_sara = '$jumlah_sara',
    had_jumlah_akademik = '$jumlah_akademik',
    had_jumlah = '$jumlah'
    
    WHERE had_id = 1 ";

  mysqli_begin_transaction($conn);

  try {
    if ($conn->query($query)) {
      mysqli_commit($conn);
      echo '<div class="modal1">
      <div class="modal-content1">
      <div class="modal-body1">
        <p class=""><i class="bi bi-check-circle me-1"></i>Kemaskini Berjaya berjaya.</p>
      </div>
      <div class="modal-footer1">
      <a class="btn btn-primary" href="'.basename($_SERVER["PHP_SELF"]).'">Teruskan</a>
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
?>