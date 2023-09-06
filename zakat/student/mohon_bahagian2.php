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
  include 'app_mohon2.php';
  ?>

  <main id="main" class="main">

    <section class="section dashboard">

          <div class="col-12">
          <div class="card">
          <div class="card-body">
          <h4 class="c-title2">BORANG PERMOHONAN ZAKAT UiTM CAWANGAN PERLIS</h4>
          <?php
              if(($row_form['form_open'] && $check_form)){
              ?>
              <h5 class="c-title">BAHAGIAN 2 (MAKLUMAT KETUA KELUARGA)</h5>
              <h5 class="c-desc">Sila isi maklumat berkenaan ketua keluarga</h5>
              
              <form class="row needs-validation" action="" method="POST" novalidate>

                <div class="row mb-3 input-group">
                  <label class="col-sm-2 col-form-label">NAMA KETUA KELUARGA<label class="form-label1">*</label></label>
                  <div class="col-sm-5">
                    <input class="form-control mt-auto" name="name" type="text" value="<?php echo $row_mohon['apply_nama_keluarga'] ?>" required>
                    <label class="form-label1">HURUF BESAR.</label>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">PEKERJAAN<label class="form-label1">*</label></label>
                  <div class="col-sm-5">
                  <input class="form-control mt-auto" type="text" name="pekerjaan" value="<?php echo $row_mohon['apply_pekerjaan_keluarga'] ?>" required>
                  <label class="form-label1">HURUF BESAR.</label>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">HUBUNGAN<label class="form-label1">*</label></label>
                  <div class="col-sm-5">
                  <select class="form-select mt-auto" name="hubungan" required>
                    <option disabled selected value>---</option>
                    <?php
                    $query_hubungan =  $conn->query("SELECT * FROM hubungan");
                    while ($row_hubungan = mysqli_fetch_assoc($query_hubungan)){
                      $selected = ($row_hubungan['hubungan_id'] == $row_mohon['apply_hubungan_keluarga']) ? "selected" : "";
                      echo "<option value='{$row_hubungan['hubungan_id']}' {$selected}>{$row_hubungan['hubungan_name']}</option>";
                    }
                    ?>
                  </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">STATUS PERKAHWINAN<label class="form-label1">*</label></label>
                  <div class="col-sm-5">
                  <select class="form-select mt-auto" name="perkahwinan" required>
                    <option disabled selected value>---</option>
                    <option value="Bujang" <?php if(isset($_GET['id']) && $row_mohon['apply_status_perkahwinan_keluarga'] == 'BUJANG'){ echo 'selected';} ?>>BUJANG</option>
                    <option value="Berkahwin" <?php if(isset($_GET['id']) && $row_mohon['apply_status_perkahwinan_keluarga'] == 'BERKAHWIN'){ echo 'selected';} ?>>BERKAHWIN</option>
                    <option value="Duda" <?php if(isset($_GET['id']) && $row_mohon['apply_status_perkahwinan_keluarga'] == 'DUDA'){ echo 'selected';} ?>>DUDA</option>
                    <option value="Janda" <?php if(isset($_GET['id']) && $row_mohon['apply_status_perkahwinan_keluarga'] == 'JANDA'){ echo 'selected';} ?>>JANDA</option>
                  </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">ALAMAT TETAP<label class="form-label1">*</label></label>
                  <div class="col-sm-5">
                  <input class="form-control mb-2" type="text" name="address1" placeholder="Alamat 1" value="<?= (isset($_GET['id'])) ? $row_mohon['apply_alamat_keluarga'] : $row_mohon['app_alamat_keluarga']; ?>" required>
                  <input class="form-control mb-2" type="text" name="address2" placeholder="Alamat 2" value="<?= (isset($_GET['id'])) ? $row_mohon['apply_alamat2_keluarga'] : $row_mohon['app_alamat2_keluarga']; ?>">
                  
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">POSKOD<label class="form-label1">*</label></label>
                  <div class="col-sm-2">
                    <input class="form-control" type="text" name="poskod" placeholder="Poskod" value="<?= (isset($_GET['id'])) ? $row_mohon['apply_poskod_keluarga'] : $row_mohon['app_poskod_keluarga']; ?>" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">BANDAR<label class="form-label1">*</label></label>
                  <div class="col-sm-2">
                    <input class="form-control" type="text" name="bandar" placeholder="Bandar" value="<?= (isset($_GET['id'])) ? $row_mohon['apply_bandar_keluarga'] : $row_mohon['app_bandar_keluarga']; ?>" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">NEGERI<label class="form-label1">*</label></label>
                  <div class="col-sm-2">
                  <select class="form-select" name="negeri" required>
                          <option disabled selected value>---</option>
                          <option value='JOHOR' <?= (isset($_GET['id']) && $row_mohon['apply_negeri_keluarga'] == 'JOHOR') ? 'selected' : ''; ?>>JOHOR</option>
                          <option value='KEDAH' <?= (isset($_GET['id']) && $row_mohon['apply_negeri_keluarga'] == 'KEDAH') ? 'selected' : ''; ?>>KEDAH</option>
                          <option value='KELANTAN' <?= (isset($_GET['id']) && $row_mohon['apply_negeri_keluarga'] == 'KELANTAN') ? 'selected' : ''; ?>>KELANTAN</option>
                          <option value='MELAKA' <?= (isset($_GET['id']) && $row_mohon['apply_negeri_keluarga'] == 'MELAKA') ? 'selected' : ''; ?>>MELAKA</option>
                          <option value='NEGERI SEMBILAN' <?= (isset($_GET['id']) && $row_mohon['apply_negeri_keluarga'] == 'NEGERI SEMBILAN') ? 'selected' : ''; ?>>NEGERI SEMBILAN</option>
                          <option value='PAHANG' <?= (isset($_GET['id']) && $row_mohon['apply_negeri_keluarga'] == 'PAHANG') ? 'selected' : ''; ?>>PAHANG</option>
                          <option value='PERAK' <?= (isset($_GET['id']) && $row_mohon['apply_negeri_keluarga'] == 'PERAK') ? 'selected' : ''; ?>>PERAK</option>
                          <option value='PERLIS' <?= (isset($_GET['id']) && $row_mohon['apply_negeri_keluarga'] == 'PERLIS') ? 'selected' : ''; ?>>PERLIS</option>
                          <option value='PULAU PINANG' <?= (isset($_GET['id']) && $row_mohon['apply_negeri_keluarga'] == 'PULAU PINANG') ? 'selected' : ''; ?>>PULAU PINANG</option>
                          <option value='SELANGOR' <?= (isset($_GET['id']) && $row_mohon['apply_negeri_keluarga'] == 'SELANGOR') ? 'selected' : ''; ?>>SELANGOR</option>
                          <option value='TERENGGANU' <?= (isset($_GET['id']) && $row_mohon['apply_negeri_keluarga'] == 'TERENGGANU') ? 'selected' : ''; ?>>TERENGGANU</option>
                        </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">NO TELEFON AKTIF<label class="form-label1">*</label></label>
                  <div class="col-sm-5">
                  <input class="form-control mt-auto" name="tel" type="tel" value="<?php echo $row_mohon['apply_tel_keluarga'] ?>" required>
                  </div>
                </div>

                  <div class="button_mohon d-flex justify-content-end">
                  <button class="btn btn-dark " type="reset">Set Semula</button>
                  <button class="btn btn-dark " name="back" type="submit">Kembali</button>
                  <button class="btn btn-dark " name="next" type="submit">Seterusnya</button>
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