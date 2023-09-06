<?php
include 'authenticate.php';
include '../connection.php';

$faculty =$conn->query("SELECT * FROM faculty");
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
  <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="style">
  <link href="../assets/vendor/datatable/style.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

</head>

<body>

  <?php include 'header-top.php';
  include 'header-side.php';
  include 'interviewer_register.php';
  ?>

  <main id="main" class="main">
    
    <section class="section dashboard d-flex flex-column align-items-center justify-content-center">
      <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center">
      
        <div class="card overflow-auto">
          <div class="card-body">
            <div class="pb-2">
              <h5 class="card-title text-center pb-0 fs-4">DAFTAR PENEMUDUGA</h5>
              <p class="text-center small">Nombor kad pengenalan digunakan sebagai kata laluan.</p>
            </div>

            <form class="row g-3 needs-validation" action="" method="POST" novalidate>
            <div class="col-12">
                      <div class="user-box input-group">
                        <input type="text" name="name" class="form-control rounded-0 shadow-none" required>
                        <label  class="form-label">Nama Penuh</label>
                        <div class="invalid-feedback">Masukkan nama penuh</div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-12">
                      <div class="user-box input-group">
                        <input type="text" name="nopekerja" class="form-control rounded-0 shadow-none" pattern="[0-9]{1,10}" required>
                        <label  class="form-label">No Pekerja</label>
                        <div class="invalid-feedback">Sila masukkan nombor matric</div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-12">
                      <div class="user-box input-group">
                        <input type="text" name="noic" class="form-control rounded-0 shadow-none" required>
                        <label class="form-label">No Kad Pengenalan</label>
                        <div class="invalid-feedback">Sila masukkan nombor kad pengenalan</div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-12">
                      <div class="user-box input-group">
                        <input type="text" name="tel" class="form-control rounded-0 shadow-none" required>
                        <label class="form-label">No Telefon</label>
                        <div class="invalid-feedback">Sila masukkan nombor telefon bimbit</div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-12">
                      <div class="user-box input-group">
                        <input type="email" name="email" class="form-control rounded-0 shadow-none" placeholder="@" required>
                        <label class="form-label">Emel</label>
                        <div class="invalid-feedback">Sila masukkan Emel</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="user-box input-group">
                        <select class="form-select rounded-0 shadow-none" name="fakulti" required>
                          <option disabled selected value>---</option>
                          <?php
                          while ($row_fac = mysqli_fetch_assoc($faculty)){
                            $selected = ($row_fac['fac_name'] == $row_app['app_faculty']) ? "selected" : "";
                            echo "<option value='{$row_fac['fac_id']}' {$selected}>{$row_fac['fac_name']}</option>";
                          }
                          ?>
                        </select>
                        <label class="form-label">Fakulti</label>
                        <div class="invalid-feedback">Sila pilih fakulti</div>
                      </div>
                    </div>
                    <div class="user-box col-12">
                      <button class="btn btn-light w-100" name="inter_submit" type="submit"><span></span>
                        <span></span><span></span><span></span>Daftar</button>
                    </div>
            </form>

            
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
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>