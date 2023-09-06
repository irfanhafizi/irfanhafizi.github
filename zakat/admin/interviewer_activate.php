<?php
include '../connection.php';

if (isset($_POST['active'])) {
  mysqli_begin_transaction($conn);

  try {
    $inters = $_POST['inter'];
    $execute = false;
    $i = 0;

    foreach ($inters as $inter) {
      $checkstatus = "SELECT * FROM interviewer WHERE inter_status = true AND inter_no_pekerja = '$inter'";
      $check = mysqli_fetch_assoc($conn->query($checkstatus));
      if($check['inter_status']== true){
        $query = "UPDATE interviewer SET
        inter_status = false WHERE inter_no_pekerja = '$inter'";
      }else{
        $query = "UPDATE interviewer SET
        inter_status = true WHERE inter_no_pekerja = '$inter'";
      }
      
      mysqli_query($conn, $query);

      if ($query) {
        $i++;
      }

      $execute = true;
    }
    if ($execute) {
      mysqli_commit($conn);
      $reload = basename($_SERVER['REQUEST_URI']);

      echo '<div class="modal1">
      <div class="modal-content1">
      <div class="modal-body1">
        <p class="">Seramai ' . $i . ' orang penemuduga telah berjaya diaktifkan.</p>
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

if (isset($_POST['inactive'])) {
  mysqli_begin_transaction($conn);

  try {
    $inters = $_POST['inter'];
    $execute = false;
    $i = 0;

    foreach ($inters as $inter) {
      $query = "UPDATE interviewer SET
        inter_status = false WHERE inter_no_pekerja = '$inter'";
      mysqli_query($conn, $query);

      if ($query) {
        $i++;
      }

      $execute = true;
    }
    if ($execute) {
      mysqli_commit($conn);
      $reload = basename($_SERVER['REQUEST_URI']);

      echo '<div class="modal1">
      <div class="modal-content1">
      <div class="modal-body1">
        <p class="">Seramai ' . $i . ' orang penemuduga telah berjaya diaktifkan.</p>
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