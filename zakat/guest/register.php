<?php
?>
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
include 'app_register.php';
?>
  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            
            <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center">
            
              <div class="d-flex justify-content-center py-4">
                <a href="login.php" class="logo d-flex align-items-center w-auto">
                  <img src="../assets/img/uitm1.ico" alt="">
                  <span class="d-none d-lg-block">e-ZAKAT</span>
                </a>
              </div>

              <div class="card mb-3">

                <!--Student-->
                <div class="card-body" id="student-login">

                  <div class="pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Pendaftaran Pemohon</h5>
                  </div>

                  <form class="row g-3 needs-validation" action="" method="POST" enctype="multipart/form-data" novalidate>

                    <div class="col-12">
                      <div class="user-box input-group">
                        <input type="text" name="fullname" class="form-control rounded-0 shadow-none" required>
                        <label class="form-label">Nama Penuh</label>
                        <div class="invalid-feedback" >Sila masukkan nama penuh</div>
                      </div>
                    </div>

                    <div class="col-12 d-flex flex-column">
                    <div class="user-box input-group">
                      <input class="form-control rounded-0 shadow-none mt-auto" type="file" accept="image/png, image/jpeg" name="profile" for="notfocus" required>
                      <label class="form-label">Muat naik Gambar Profil</label>
                      <div class="invalid-feedback">Sila Muatnaik Gambar Profil</div>
                    </div>
                    </div>
                    

                    <div class="col-12 d-flex flex-column">
                    <div class="user-box input-group">
                      <input class="form-control rounded-0 shadow-none mt-auto" type="file" accept="application/pdf" name="documenttawaran" for="notfocus" required>
                      <label class="form-label">Muat naik Surat Tawaran UiTM (pdf)</label>
                      <div class="invalid-feedback">Sila Muatnaik Surat Tawaran</div>
                    </div>
                    </div>

                    <div class="col-12">
                      <label class="user-box form-label">Jantina</label>
                        <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="gender" value="Lelaki" required>
                        <label class="form-check-label">Lelaki</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="gender" value="Perempuan" required>
                        <label class="form-check-label">Perempuan</label>
                      </div>
                    </div>

                    <div class="col-12">
                      <div class="user-box input-group">
                        <input type="text" name="icnumber" class="form-control rounded-0 shadow-none"  required>
                        <label class="form-label">No Kad Pengenalan</label>
                        <div class="invalid-feedback">Sila masukkan nombor kad pengenalan</div>
                      </div>
                    </div>
                    
                    <div class="col-12 d-flex flex-column">
                    <div class="user-box input-group">
                      <input class="form-control rounded-0 shadow-none mt-auto" type="file" accept="image/png, image/jpeg" name="frontic" for="notfocus" required>
                      <label class="form-label">Muatnaik Gambar Depan Kad Pengenalan</label>
                      <div class="invalid-feedback">Sila Muatnaik Gambar Kad Pengenalan</div>
                    </div>
                    </div>

                    <div class="col-12 d-flex flex-column">
                    <div class="user-box input-group">
                      <input class="form-control rounded-0 shadow-none mt-auto" type="file" accept="image/png, image/jpeg" name="backic" for="notfocus" required>
                      <label class="form-label">Muatnaik Gambar Belakang Kad Pengenalan</label>
                      <div class="invalid-feedback">Sila Muatnaik Gambar Kad Pengenalan</div>
                    </div>
                    </div>

                    <div class="col-12">
                      <div class="user-box input-group">
                        <input type="text" name="matricnumber" class="form-control rounded-0 shadow-none" pattern="[0-9]{1,10}" placeholder="2023xxxxxx" for="notfocus" required>
                        <label  class="form-label">No Matrik</label>
                        <div class="invalid-feedback">Sila masukkan nombor matrik</div>
                      </div>
                    </div>

                    <div class="col-12 d-flex flex-column">
                    <div class="user-box input-group">
                      <input class="form-control rounded-0 shadow-none mt-auto" type="file" accept="image/png, image/jpeg" name="frontmatric" for="notfocus" required>
                      <label class="form-label">Muatnaik Gambar Depan Kad Matrik</label>
                      <div class="invalid-feedback">Sila Muatnaik Gambar Kad Pengenalan</div>
                    </div>
                    </div>

                    <div class="col-12 d-flex flex-column">
                    <div class="user-box input-group">
                      <input class="form-control rounded-0 shadow-none mt-auto" type="file" accept="image/png, image/jpeg" name="backmatric" for="notfocus" required>
                      <label class="form-label">Muatnaik Gambar Belakang Kad Matrik</label>
                      <div class="invalid-feedback">Sila Muatnaik Gambar Kad Matrik</div>
                    </div>
                    </div>
                    <div class="col-sm-6 col-12">
                      <div class="user-box input-group">
                        <input type="tel" name="phonenumber" class="form-control rounded-0 shadow-none" required>
                        <label  class="form-label">No Telefon</label>
                        <div class="invalid-feedback">Sila masukkan nombor telefon bimbit</div>
                      </div>
                    </div>

                    <div class="col-sm-6 col-12">
                      <div class="user-box input-group">
                      <input type="date" name="birthdate" class="form-control rounded-0 shadow-none" required>
                      <label class="form-label">Tarikh Lahir</label>
                      <div class="invalid-feedback">Sila masukkan tarikh lahir</div>
                      </div>
                    </div>

                    <div class="col-sm-6 col-12">
                      <div class="user-box input-group">
                      <input type="email" name="email" class="form-control rounded-0 shadow-none" placeholder="@" required>
                      <label class="form-label">Emel</label>
                      <div class="invalid-feedback">Sila masukkan emel</div>
                      </div>
                    </div>

                    <div class="col-sm-6 col-12">
                      <div class="user-box input-group">
                      <select class="form-select rounded-0 shadow-none" name="code" required>
                          <option disabled selected value>---</option>
                          <?php
                          $kodprogram = $conn->query("SELECT * FROM kodprogram");
                          while ($row = mysqli_fetch_assoc($kodprogram)){
                            $selected = ($row['kod_name'] == $row_app['appulty']) ? "selected" : "";
                            echo "<option value='{$row['kod_id']}' {$selected}>{$row['kod_name']}</option>";
                          }
                          ?>
                        </select>
                      <label class="form-label">Kod Program</label>
                      <div class="invalid-feedback">Sila pilih kod program</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <div class="user-box input-group">
                        <select class="form-select rounded-0 shadow-none" name="fakulti" required>
                          <option disabled selected value>---</option>
                          <?php
                          $faculty = $conn->query("SELECT * FROM faculty");
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

                    <div class="col-12">
                    <div class="user-box input-group">
                      <input class="form-control rounded-0 shadow-none mt-auto" type="text" name="alamat1" placeholder="Alamat Line 1" for="notfocus" required>
                      <label class="form-label">Alamat Tetap Rumah</label>
                      <div class="invalid-feedback">Sila masukkan alamat</div>
                    </div>
                    </div>
                    <div class="col-12">
                      <div class="user-box input-group">
                        <input class="form-control rounded-0 shadow-none mt-auto" type="text" name="alamat2" placeholder="Alamat Line 2">
                      </div>
                    </div>
                    <div class="col-sm-4 col-12">
                    <div class="user-box input-group">
                      <input class="form-control rounded-0 shadow-none mt-auto" type="text" name="poskod" required>
                      <label class="form-label">Poskod</label>
                      <div class="invalid-feedback">Sila masukkan poskod</div>
                    </div>
                    </div>
                    <div class="col-sm-4 col-12 d-flex flex-column">
                    <div class="user-box input-group">
                      <input class="form-control rounded-0 shadow-none mt-auto" type="text" name="bandar" required>
                      <label class="form-label">Bandar</label>
                      <div class="invalid-feedback">Sila masukkan bandar</div>
                    </div>
                    </div>
                    <div class="col-sm-4 col-12 d-flex flex-column">
                    <div class="user-box input-group">
                      <select class="form-select rounded-0 shadow-none" name="negeri" required>
                          <option disabled selected value>---</option>
                          <option value='JOHOR'>JOHOR</option>
                          <option value='KEDAH'>KEDAH</option>
                          <option value='KELANTAN'>KELANTAN</option>
                          <option value='MELAKA'>MELAKA</option>
                          <option value='NEGERI SEMBILAN'>NEGERI SEMBILAN</option>
                          <option value='PAHANG'>PAHANG</option>
                          <option value='PERAK'>PERAK</option>
                          <option value='PERLIS'>PERLIS</option>
                          <option value='PULAU PINANG'>PULAU PINANG</option>
                          <option value='SELANGOR'>SELANGOR</option>
                          <option value='TERENGGANU'>TERENGGANU</option>
                        </select>
                      <label class="form-label">Negeri</label>
                      <div class="invalid-feedback">Sila masukkan negeri</div>
                    </div>
                    </div>


                    <div class="col-sm-6 col-12">
                      <div class="user-box input-group">
                        <input type="password" name="password" class="form-control rounded-0 shadow-none" required>
                        <label class="form-label">Katalaluan</label>
                        <div class="invalid-feedback">Sila masukkan katalaluan</div>
                      </div>
                    </div>

                    <div class="col-sm-6 col-12">
                      <div class="user-box input-group">
                        <input type="password" name="confirmpassword" class="form-control rounded-0 shadow-none" required>
                        <label class="form-label">Ulang Katalaluan</label>
                        <div class="invalid-feedback">Katalaluan yang dimasukkan tidak sama</div>
                      </div>
                    </div>

                    <div class="user-box col-12">
                      <button class="btn btn-light w-100" name="app_submit" type="submit"><span></span>
                        <span></span><span></span><span></span>Daftar</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Telah daftar? <a href="login.php">Log Masuk</a></p>
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