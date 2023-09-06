<?php
include '../connection.php';

if (isset($_POST['rubric'])) {
  $amt_fakir_diploma_0= $_POST['amt_fakir_diploma_0'];
  $amt_fakir_diploma_1= $_POST['amt_fakir_diploma_1'];
  $amt_fakir_ijazah_0= $_POST['amt_fakir_ijazah_0'];
  $amt_fakir_ijazah_1= $_POST['amt_fakir_ijazah_1'];
  $amt_fakir_master_0= $_POST['amt_fakir_master_0'];
  $amt_fakir_master_1= $_POST['amt_fakir_master_1'];
  
  $amt_miskin_diploma_1= $_POST['amt_miskin_diploma_1'];
  $amt_miskin_diploma_0= $_POST['amt_miskin_diploma_0'];
  $amt_miskin_ijazah_1= $_POST['amt_miskin_ijazah_1'];
  $amt_miskin_ijazah_0= $_POST['amt_miskin_ijazah_0'];
  $amt_miskin_master_1= $_POST['amt_miskin_master_1'];
  $amt_miskin_master_0= $_POST['amt_miskin_master_0'];

  mysqli_begin_transaction($conn);

  $query = "UPDATE zakatamt SET
    amt_fakir_diploma_0= '$amt_fakir_diploma_0',
    amt_fakir_diploma_1= '$amt_fakir_diploma_1',
    amt_fakir_ijazah_0= '$amt_fakir_ijazah_0',
    amt_fakir_ijazah_1= '$amt_fakir_ijazah_1',
    amt_fakir_master_0= '$amt_fakir_master_0',
    amt_fakir_master_1= '$amt_fakir_master_1',
    
    amt_miskin_diploma_1= '$amt_miskin_diploma_1',
    amt_miskin_diploma_0= '$amt_miskin_diploma_0',
    amt_miskin_ijazah_1= '$amt_miskin_ijazah_1',
    amt_miskin_ijazah_0= '$amt_miskin_ijazah_0',
    amt_miskin_master_1= '$amt_miskin_master_1',
    amt_miskin_master_0= '$amt_miskin_master_0'
    
    WHERE amt_id = 1 ";


  try {
    if ($conn->query($query)) {
      mysqli_commit($conn);
      echo '<div class="modal1">
      <div class="modal-content1">
      <div class="modal-body1">
        <p class=""><i class="bi bi-check-circle me-1"></i>Kemaskini Berjaya.</p>
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
if (isset($_POST['add_yatim'])){
  $amt_yatim= $_POST['yatim'];
  
  mysqli_begin_transaction($conn);
  $query = "UPDATE zakatamt SET
    amt_yatim = '$amt_yatim'
    
    WHERE amt_id = 1 ";
    try {
      if ($conn->query($query)) {
        mysqli_commit($conn);
        echo '<div class="modal1">
        <div class="modal-content1">
        <div class="modal-body1">
          <p class=""><i class="bi bi-check-circle me-1"></i>Kemaskini Berjaya.</p>
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