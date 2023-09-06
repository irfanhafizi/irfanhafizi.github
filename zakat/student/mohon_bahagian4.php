<?php
include 'authenticate.php';
include 'get_utils.php';
include 'check_form.php';

if(isset($_GET['id'])){
  $query_get = "SELECT * FROM apply
  LEFT JOIN applicant ON app_matric = apply_matric
  LEFT JOIN faculty ON fac_id = app_faculty
  WHERE apply_id = '$decrypted_id' AND apply_matric = '$key'";
    $save_mohon = mysqli_query($conn, $query_get);
    $row_mohon = mysqli_fetch_assoc($save_mohon);
  }
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

  <?php 
  include 'header-top.php';
  include 'header-side.php';
  include 'app_mohon4.php';
  ?>

  <main id="main" class="main">

    <section class="section dashboard">

          <div class="col-12">
          <div class="card">
          <div class="card-body">
          <h4 class="c-title2">BORANG PERMOHONAN ZAKAT UiTM CAWANGAN PERLIS</h4>
          <?php
              $query = $conn->query("SELECT * FROM form WHERE form_id = 1");
              $row_form = mysqli_fetch_assoc($query);
              if(($row_form['form_open'] && $check_form)){
              ?>
              <h5 class="c-title">BAHAGIAN 4 (MAKLUMAT BANTUAN KEWANGAN)</h5>
              <form class="row g-3 needs-validation" action="" method="POST" novalidate>

              <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">TAJAAN KEWANGAN SEPANJANG PENGAJIAN?<label class="form-label1">*</label></label>
                  <div class="col-sm-5">
                  <?php
                  $tajaan = $conn->query("SELECT * FROM tajaan");
                  while($row = mysqli_fetch_assoc($tajaan)){
                  ?>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="tajaan" value="<?= $row['taja_id'] ?>" <?php if($row_mohon['apply_tajaan'] == $row['taja_id']){echo 'checked';} ?> required>
                    <label class="form-check-label"><?= $row['taja_name'] ?></label>
                  </div>
                  <?php
                  }
                  ?>
                  </div>
                </div>

                <div class="row mb-3 input-group">
                  <label class="col-sm-2 col-form-label">JUMLAH TAJAAN YANG DITERIMA (RM) PADA SEMESTER TERKINI.<label class="form-label1">*</label></label>
                  <div class="col-sm-5">
                    <input class="form-control mt-auto" name="jumlah" type="number" step="0.01" min="0" value="<?php echo $row_mohon['apply_jumlah_tajaan'] ?>" required>
                    <label class="form-label1">Contoh: Pada semester ini saya menerima RM1500 dari PTPTN. Sila masukkan 1500 pada ruangan jawapan.</label>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">PERNAH MENERIMA BANTUAN ZAKAT UiTM<label class="form-label1">*</label></label>
                  <div class="col-sm-5">
                  <select class="form-select mt-auto" name="terima" required>
                    <option disabled selected value>---</option>
                    <option value="Ya" <?php if(isset($_GET['id']) && $row_mohon['apply_terima_zakat'] == 'YA'){ echo 'selected';} ?>>YA</option>
                    <option value="Tidak" <?php if(isset($_GET['id']) && $row_mohon['apply_terima_zakat'] == 'TIDAK'){ echo 'selected';} ?>>TIDAK</option>
                  </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">SAYA MEMERLUKAN ZAKAT (BANTUAN YURAN PENGAJIAN) INI KERANA...<label class="form-label1">*</label></label>
                  <div class="col-sm-10">
                  <textarea class="form-control mt-auto w-100" style="height:150px" name="sebab" required><?php echo $row_mohon['apply_sebab'] ?></textarea>
                  </div>
                </div>
                  <div class="button_mohon d-flex justify-content-end">
                  <button class="btn btn-dark " type="reset">Set Semula</button>
                  <button class="btn btn-dark " name="back" type="submit">Kembali</button>
                  <button class="btn btn-dark " name="next" type="submit">Lihat Kelayakan Permohonan</button>
                  </div>
              </form>
              <?php
              }else{
                echo "<script>window.location.href='mohon_bahagian1.php';</script>";
              }
              ?>

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
  <script src="../assets/vendor/jquery/jquery-3.6.4.min.js"></script>
  <script src="../assets/vendor/jquery/hideshowdiv.js"></script>
  <script src="../assets/vendor/jquery/ajax-3.6.0.min.js"></script>
  
  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>