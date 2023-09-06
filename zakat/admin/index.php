<?php
include 'authenticate.php';
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

            <div class="col-sm-3 col-12">
              <div class="card info-card primary-card">

                <div class="card-body">
                  <h5 class="card-title">Permohonan Semasa <span>| <?= $row_sesi['sesi_name'] ?></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-collection-fill"></i>
                    </div>
                    <div class="ps-3">
                      <?php
                      $latest_sesi_id = $row_sesi['sesi_id'];
                      $query = mysqli_query($conn, "SELECT COUNT(*) FROM apply WHERE apply_sesi = '$latest_sesi_id'");
                      $total_permohonan = mysqli_fetch_array($query)[0];
                      ?>
                      <h6><?= number_format($total_permohonan) ?></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3 col-12">
              <div class="card info-card warning-card">

                <div class="card-body">
                  <h5 class="card-title">Permohonan Semasa Belum Selesai<span>| <?= $row_sesi['sesi_name'] ?></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-collection-fill"></i>
                    </div>
                    <div class="ps-3">
                      <?php
                      $latest_sesi_id = $row_sesi['sesi_id'];
                      $querybelum = mysqli_query($conn, "SELECT COUNT(*) FROM apply WHERE apply_status != 5 AND apply_status != 8 AND apply_status != 9 AND apply_sesi = '$latest_sesi_id'");
                      $total_belum = mysqli_fetch_array($querybelum)[0];
                      ?>
                      <h6><?= number_format($total_belum) ?></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3 col-12">
              <div class="card info-card success-card">

                <div class="card-body">
                  <h5 class="card-title">Permohonan Semasa Telah Berjaya<span>| <?= $row_sesi['sesi_name'] ?></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-collection-fill"></i>
                    </div>
                    <div class="ps-3">
                      <?php
                      $latest_sesi_id = $row_sesi['sesi_id'];
                      $queryberjaya = mysqli_query($conn, "SELECT COUNT(*) FROM apply WHERE apply_status = 8 AND apply_sesi = '$latest_sesi_id'");
                      $total_berjaya = mysqli_fetch_array($queryberjaya)[0];
                      ?>
                      <h6><?= number_format($total_berjaya) ?></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3 col-12">
              <div class="card info-card success-card">

                <div class="card-body">
                  <h5 class="card-title">Jumlah Semasa Zakat Diberi<span>| <?= $row_sesi['sesi_name'] ?></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <?php
                      $query_final = $conn->query("SELECT SUM(interview_amt_final) AS total_final FROM interview WHERE interview_sesi = '$latest_sesi_id'");
                      $total_final = mysqli_fetch_array($query_final)['total_final'];
                      ?>
                      <h6>RM <?= number_format($total_final) ?></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3 col-12">
              <div class="card info-card primary-card">

                <div class="card-body">
                  <h5 class="card-title">Jumlah Keseluruhan Permohonan</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-collection-fill"></i>
                    </div>
                    <div class="ps-3">
                      <?php
                      $latest_sesi_id = $row_sesi['sesi_id'];
                      $query = mysqli_query($conn, "SELECT COUNT(*) FROM apply");
                      $total_permohonan = mysqli_fetch_array($query)[0];
                      ?>
                      <h6><?= number_format($total_permohonan) ?></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3 col-12">
              <div class="card info-card success-card">

                <div class="card-body">
                  <h5 class="card-title">Jumlah Keseluruhan Permohonan Berjaya</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-collection-fill"></i>
                    </div>
                    <div class="ps-3">
                      <?php
                      $latest_sesi_id = $row_sesi['sesi_id'];
                      $queryberjaya = mysqli_query($conn, "SELECT COUNT(*) FROM apply WHERE apply_status = 8");
                      $total_berjaya = mysqli_fetch_array($queryberjaya)[0];
                      ?>
                      <h6><?= number_format($total_berjaya) ?></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3 col-12">
              <div class="card info-card success-card">

                <div class="card-body">
                  <h5 class="card-title">Jumlah Keseluruhan Zakat Diberi</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <?php
                      $query_final = $conn->query("SELECT SUM(interview_amt_final) AS total_final FROM interview");
                      $total_final = mysqli_fetch_array($query_final)['total_final'];
                      ?>
                      <h6>RM <?= number_format($total_final) ?></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12">
                <div class="card">
                <div class="card-body">
                  <h5 class="c-title">Pengaktifan Permohonan Zakat Sara Diri <span>| <?= $row_sesi['sesi_name'] ?></span></h5>
                  <div class="form-check switch-button">
                  <h5 class="form-check-label">Tutup Permohonan</h5>
                  <?php
                  $query = $conn->query("SELECT * FROM form WHERE form_id = 1");
                  $row_form = mysqli_fetch_assoc($query);
                  ?>
                  <form method="POST" action="form_update.php">
                  <input class="form-check-input text-center" style="cursor: pointer;" name="form_open" type="checkbox" <?= $row_form['form_open'] ? 'checked' : ''; ?> onchange="this.form.submit()">
                  </form>
                  <h5 class="form-check-label">Buka Permohonan</h5>
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