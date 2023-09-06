<?php
include 'authenticate.php';
include '../connection.php';
include 'latest_sesi.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>e-ZAKAT</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/uitm1.ico" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

</head>

<body>

  <?php include 'header-top.php';
  include 'header-side.php';
  ?>

  <main id="main" class="main">

    <section class="section dashboard">
      
      <div class="row">

      <div class="col-sm-4 col-12">
          <div class="card info-card warning-card">

            <div class="card-body">
              <h5 class="card-title">Tarikh Permohonan Ditutup <span>| <?= $row_sesi['sesi_name'] ?></span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-calendar-event-fill"></i>
                </div>
                <div class="ps-3">
                  <?php
                  $query_tamat = $conn->query("SELECT * FROM sesi WHERE sesi_id = '$latest_sesi'");
                    $rowtamat = mysqli_fetch_assoc($query_tamat);
                    ?>
                  <h6><?= $query_tamat->num_rows > 0 ? $rowtamat['sesi_date_end'] : 'Tiada'; ?></h6>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-4 col-12">
          <div class="card info-card primary-card">

            <div class="card-body">
            <?php
            $query_latest = $conn->query("SELECT * FROM apply LEFT JOIN status ON status_id = apply_status LEFT JOIN sesi ON sesi_id = apply_sesi LEFT JOIN interview ON interview_apply = apply_id WHERE apply_matric = '$app_id' ORDER BY apply_id DESC LIMIT 1");
            $rowlatest = mysqli_fetch_assoc($query_latest);
            ?>
              <h5 class="card-title">Status Permohonan Terkini <span>| <?= !empty($rowlatest['sesi_name']) ? $rowlatest['sesi_name'] : $row_sesi['sesi_name'] ?></span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-collection-fill"></i>
                </div>
                <div class="ps-3">
                  <h6><?= $query_latest->num_rows > 0 ? $rowlatest['status_name'] : 'Tiada'; ?></h6>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-4 col-12">
          <div class="card info-card success-card">

            <div class="card-body">
              <h5 class="card-title">Jumlah Keseluruhan Zakat</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-currency-dollar"></i>
                </div>
                <div class="ps-3">
                <?php
                      $query_amount = $conn->query("SELECT SUM(interview_amt_final) AS total_final FROM interview LEFT JOIN apply ON apply_id = interview_apply WHERE apply_matric = '$app_id'");
                      $total_final = mysqli_fetch_array($query_amount)['total_final'];
                      ?>
                      <h6>RM <?= number_format($total_final) ?></h6>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-4 col-12">
          <div class="card info-card primary-card">

            <div class="card-body">
              <h5 class="card-title">Jumlah Permohonan Dibuat</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-collection-fill"></i>
                </div>
                <div class="ps-3">
                  <?php
                  $query_count = $conn->query("SELECT COUNT(*) FROM apply WHERE apply_matric = '$app_id'");
                    $rowcount = mysqli_fetch_array($query_count)[0];
                    ?>
                  <h6><?= number_format($rowcount) ?></h6>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-4 col-12">
          <div class="card info-card success-card">

            <div class="card-body">
              <h5 class="card-title">Jumlah Permohonan Berjaya</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-collection-fill"></i>
                </div>
                <div class="ps-3">
                  <?php
                  $query_count = $conn->query("SELECT COUNT(*) FROM apply WHERE apply_matric = '$app_id' AND apply_status = 8");
                    $rowcount = mysqli_fetch_array($query_count)[0];
                    ?>
                  <h6><?= number_format($rowcount) ?></h6>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-4 col-12">
          <div class="card info-card warning-card">

            <div class="card-body">
              <h5 class="card-title">Jumlah Permohonan Belum Selesai</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-collection-fill"></i>
                </div>
                <div class="ps-3">
                  <?php
                  $query_count = $conn->query("SELECT COUNT(*) FROM apply WHERE apply_matric = '$app_id' AND apply_status != 8 AND apply_status != 9 AND  apply_status != 5");
                    $rowcount = mysqli_fetch_array($query_count)[0];
                    ?>
                  <h6><?= number_format($rowcount) ?></h6>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Zakat</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="">Irfan Hafizi</a>
    </div>
  </footer><!-- End Footer -->

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../ssets/vendor/chart.js/chart.umd.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>