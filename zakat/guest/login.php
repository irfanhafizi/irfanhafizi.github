<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login - Zakat</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/uitm1.ico" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="../https://fonts.gstatic.com" rel="preconnect">
  <link href="../https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

</head>

<body>

  <?php
  include 'app_login.php';
  include 'admin_login.php';
  include 'interviewer_login.php';
  ?>
  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="login-1">
              <a href="login.php"><img src="../assets/img/uitm.png"></a>
                  <a href="login.php" class="logo"><span class="">e-ZAKAT</span></a>
              </div>

              <div class="card mb-3">
                <div class="card-body pb-0 pt-4">
                  <form class="d-flex space-around col-12 p-2">
                    <div>
                      <input class="form-check-input" name="login-role" type="radio" id="student-login-radio" value="student" checked>
                      <label class="form-check-label">Pemohon</label>
                    </div>
                    <div>
                      <input class="form-check-input" name="login-role" type="radio" id="admin-login-radio" value="admin">
                      <label class="form-check-label">Koordinator</label>
                    </div>
                    <div>
                      <input class="form-check-input" name="login-role" type="radio" id="interview-login-radio" value="interview">
                      <label class="form-check-label">Penemuduga</label>
                    </div>
                  </form>
                </div>
                <!-- login student -->
                <div class="card-body" id="student-login">
                  <div class="pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Log Masuk Pemohon</h5>
                  </div>
                  
                  <form class="row g-3 needs-validation" action="" method="POST" novalidate>

                    <div class="col-12">
                      
                      <div class="user-box input-group">
                        <input type="text" name="matricnumber" class="form-control rounded-0 shadow-none" required>
                        <label class="form-label">Nombor Matrik</label>
                        <div class="invalid-feedback">Masukkan No Matrik anda.</div>
                      </div>
                      
                    </div>
                    <div class="col-12">
                      <div class="user-box input-group">
                      <input type="password" name="password" class="form-control rounded-0 shadow-none" required>
                      <label class="form-label">Kata Laluan</label>
                      <div class="invalid-feedback">Masukkan kata Laluan anda.</div>
                      </div>
                    </div>
                    <div class="user-box col-12">
                      <button class="btn btn-light w-100" name="app_submit" type="submit"><span></span>
                      <span></span><span></span><span></span>Log Masuk</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Untuk pemohon baharu, sila daftar. <a class="bg-danger text-white p-2 rounded" href="register.php">PENDAFTARAN</a></p>
                    </div>
                  </form>
                </div>
                <div class="card-body d-none" id="admin-login">

                  <div class="pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Log Masuk Koordinator</h5>
                  </div>

                  <form class="row g-3 needs-validation" action="" method="POST"  novalidate>

                    <div class="col-12">
                      
                      <div class="user-box input-group has-validation">
                        <input type="text" name="username" class="form-control rounded-0 shadow-none" id="yourUsername" required>
                        <label for="yourUsername" class="form-label">Nama Pengguna</label>
                        <div class="invalid-feedback">Masukkan Nama Pengguna anda.</div>
                      </div>
                      
                    </div>

                    <div class="col-12">
                      <div class="user-box input-group">
                      <input type="password" name="password" class="form-control rounded-0 shadow-none" required>
                      <label class="form-label">Kata Laluan</label>
                      <div class="invalid-feedback">Masukkan Kata Laluan anda.</div>
                      </div>
                    </div>

                    <div class="user-box col-12">
                      <button class="btn btn-light w-100" name="admin_submit" type="submit"><span></span>
                        <span></span><span></span><span></span>Log Masuk</button>
                    </div>
                  </form>

                </div>
                <div class="card-body d-none" id="interview-login">
                  <div class="pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Log Masuk Penemuduga</h5>
                  </div>

                  <form class="row g-3 needs-validation" action="" method="POST" novalidate>

                    <div class="col-12">
                      
                      <div class="user-box input-group has-validation">
                        <input type="text" name="username" class="form-control rounded-0 shadow-none" required>
                        <label class="form-label">Nama Pengguna</label>
                        <div class="invalid-feedback">Masukkan Nama Pengguna anda.</div>
                      </div>
                      
                    </div>

                    <div class="col-12">
                      <div class="user-box input-group">
                      <input type="password" name="password" class="form-control rounded-0 shadow-none" required>
                      <label class="form-label">Kata Laluan</label>
                      <div class="invalid-feedback">Masukkan Kata Laluan Anda</div>
                      </div>
                    </div>

                    <div class="user-box col-12">
                      <button class="btn btn-light w-100" name="inter_submit" type="submit"><span></span>
                      <span></span><span></span><span></span>Log Masuk</button>
                    </div>
                    
                  </form>
                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>

  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>