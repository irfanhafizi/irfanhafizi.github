<?php
include 'authenticate.php';
include 'get_utils.php';
include 'check_form.php';

if(isset($_GET['id'])){
$query_get = "SELECT * FROM apply
LEFT JOIN applicant ON app_matric = apply_matric
LEFT JOIN faculty ON fac_id = app_faculty
LEFT JOIN kodprogram ON kod_id = app_code
WHERE apply_id = '$decrypted_id' AND apply_matric = '$key'";
  $save_mohon = mysqli_query($conn, $query_get);
  $row_mohon = mysqli_fetch_assoc($save_mohon);
}else{
  $query_get = "SELECT * FROM applicant
  LEFT JOIN faculty ON fac_id = app_faculty
LEFT JOIN kodprogram ON kod_id = app_code
WHERE app_matric = '$app_id'";
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
  include 'latest_sesi.php';
  include 'app_mohon1.php';
  ?>

  <main id="main" class="main">

    <section class="section dashboard">

          <div class="col-12">
          <div class="card">
            <div class="card-body">
              
              <h4 class="c-title2">BORANG PERMOHONAN ZAKAT UiTM CAWANGAN PERLIS <?php echo $row_sesi['sesi_name'] ?></h4>
              <?php
              if(($row_form['form_open'] && $check_form)){
              ?>
              <h5 class="c-title">BAHAGIAN 1 (MAKLUMAT PELAJAR)</h5>
              
              <form class="row g-3 needs-validation" action="" method="POST" novalidate>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">NO MATRIK PELAJAR<label class="form-label1">*</label></label>
                  <div class="col-sm-5">
                  <input class="form-control mt-auto" type="text" value="<?php echo $row_mohon['app_matric'] ?>" disabled>
                  </div>
                </div>

                <div class="row mb-3 input-group">
                  <label class="col-sm-2 col-form-label">NAMA<label class="form-label1">*</label></label>
                  <div class="col-sm-5">
                    <input class="form-control mt-auto" name="name" type="text" value="<?php echo $row_mohon['app_fullname'] ?>" disabled required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">NO KAD PENGENALAN<label class="form-label1">*</label></label>
                  <div class="col-sm-5">
                  <input class="form-control mt-auto" type="text"  value="<?php echo $row_mohon['app_ic'] ?>" disabled>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">TARIKH LAHIR<label class="form-label1">*</label></label>
                  <div class="col-sm-5">
                  <input class="form-control mt-auto" type="date" value="<?php echo $row_mohon['app_birthdate'] ?>" disabled>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">JANTINA<label class="form-label1">*</label></label>
                  <div class="col-sm-5">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="Lelaki" <?php if($row_mohon['app_gender'] == 'LELAKI'){echo 'checked';} ?> disabled>
                    <label class="form-check-label">LELAKI</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="Perempuan" <?php if($row_mohon['app_gender'] == 'PEREMPUAN'){echo 'checked';} ?> disabled>
                    <label class="form-check-label">PEREMPUAN</label>
                  </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">FAKULTI<label class="form-label1">*</label></label>
                  <div class="col-sm-5">
                  <input class="form-control mt-auto" type="text" value="<?php echo $row_mohon['fac_name'] ?>" disabled>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">KOD PROGRAM<label class="form-label1">*</label></label>
                  <div class="col-sm-5">
                  <input class="form-control mt-auto" type="text" name="kodprogram" value="<?= $row_mohon['kod_name']; ?>" disabled>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">EMAIL<label class="form-label1">*</label></label>
                  <div class="col-sm-5">
                  <input type="email" class="form-control mt-auto" name="email" value="<?= (isset($_GET['id'])) ? $row_mohon['apply_email'] : $row_mohon['app_email']; ?>" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">NO. TELEFON PEMOHON<label class="form-label1">*</label></label>
                  <div class="col-sm-5">
                  <input class="form-control mt-auto" name="tel" type="tel" value="<?= (isset($_GET['id'])) ? $row_mohon['apply_tel'] : $row_mohon['app_tel']; ?>" required>
                  
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">ALAMAT TETAP RUMAH<label class="form-label1">*</label></label>
                  <div class="col-sm-5">
                  <input class="form-control mb-2" type="text" name="address1" placeholder="Alamat 1" value="<?= (isset($_GET['id'])) ? $row_mohon['apply_address_line1'] : $row_mohon['app_address_line1']; ?>" required>
                  <input class="form-control mb-2" type="text" name="address2" placeholder="Alamat 2" value="<?= (isset($_GET['id'])) ? $row_mohon['apply_address_line2'] : $row_mohon['app_address_line2']; ?>">
                  
                  
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">POSKOD<label class="form-label1">*</label></label>
                  <div class="col-sm-2">
                    <input class="form-control" type="text" name="poskod" placeholder="Poskod" value="<?= (isset($_GET['id'])) ? $row_mohon['apply_poskod'] : $row_mohon['app_poskod']; ?>" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">BANDAR<label class="form-label1">*</label></label>
                  <div class="col-sm-2">
                    <input class="form-control" type="text" name="bandar" placeholder="Bandar" value="<?= (isset($_GET['id'])) ? $row_mohon['apply_bandar'] : $row_mohon['app_bandar']; ?>" required>
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
                  <label class="col-sm-2 col-form-label">SEMESTER<label class="form-label1">*</label></label>
                  <div class="col-sm-5">
                  <select class="form-select mt-auto" name="sem" required>
                    <option disabled selected value>---</option>
                    <?php
                    $sem = $conn->query("SELECT * FROM semester");
                    while ($row_sem = mysqli_fetch_assoc($sem)){
                      if(isset($_GET['id']) && $row_sem['sem_id'] == $row_mohon['apply_sem']){
                        echo "<option value='{$row_sem['sem_id']}' selected>{$row_sem['sem_name']}</option>";
                      }else{
                        echo "<option value='{$row_sem['sem_id']}' >{$row_sem['sem_name']}</option>";
                      }
                    }
                    ?>
                  </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">CGPA TERKINI<label class="form-label1">*</label></label>
                  <div class="col-sm-5">
                  <input class="form-control mt-auto" type="number" name="cgpa" min="0.00" step="0.01" max="4.00" value="<?php if(isset($_GET['id'])){ echo $row_mohon['apply_cgpa'];} ?>" required>
                  <label class="form-label1">Untuk pelajar semester 1 diploma dan penerapan (ijazah sarjana muda), sila masukkan nilai "0.00".</label>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">NAMA PENASIHAT AKADEMIK<label class="form-label1">*</label></label>
                  <div class="col-sm-5">
                  <input class="form-control mt-auto" type="text" name="penasihat" value="<?php if(isset($_GET['id'])){ echo $row_mohon['apply_nama_penasihat'];} ?>" required>
                  <label class="form-label1">HURUF BESAR.</label>
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">TARAF PERKAHWINAN<label class="form-label1">*</label></label>
                  <div class="col-sm-5">
                  <select class="form-select mt-auto" name="perkahwinan" required>
                    <option disabled selected value>---</option>
                    <option value="Bujang" <?php if(isset($_GET['id']) && $row_mohon['apply_taraf_perkahwinan'] == 'BUJANG'){ echo 'selected';} ?>>BUJANG</option>
                    <option value="Berkahwin" <?php if(isset($_GET['id']) && $row_mohon['apply_taraf_perkahwinan'] == 'BERKAHWIN'){ echo 'selected';} ?>>BERKAHWIN</option>
                  </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">NO AKAUN BANK<label class="form-label1">*</label></label>
                  <div class="col-sm-5">
                  <input class="form-control mt-auto" type="text" name="bank" value="<?php if(isset($_GET['id'])){ echo $row_mohon['apply_bank'];} ?>" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">NAMA PENERIMA BANK<label class="form-label1">*</label></label>
                  <div class="col-sm-5">
                  <input class="form-control mt-auto" type="text" name="bankpenerima" value="<?php if(isset($_GET['id'])){ echo $row_mohon['apply_bank_penerima'];} ?>" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">NAMA BANK<label class="form-label1">*</label></label>
                  <div class="col-sm-5">
                  <select class="form-select mt-auto" name="namabank" required>
                    <option disabled selected value>---</option>
                    <?php
                    $bank = $conn->query("SELECT * FROM bank");
                    while ($row = mysqli_fetch_assoc($bank)){
                      if(isset($_GET['id']) && $row['bank_id'] == $row_mohon['apply_nama_bank']){
                        echo "<option value='{$row['bank_id']}' selected>{$row['bank_name']}</option>";
                      }else{
                        echo "<option value='{$row['bank_id']}' >{$row['bank_name']}</option>";
                      }
                    }
                    ?>
                  </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Saya seorang Perokok/Perokok Elektrik<label class="form-label1">*</label></label>
                  <div class="col-sm-5">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="perokok" value="YA" <?php if(isset($_GET['id']) && $row_mohon['apply_perokok'] == 'YA'){ echo 'checked';} ?> required>
                    <label class="form-check-label">YA</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="perokok" value="TIDAK" <?php if(isset($_GET['id']) && $row_mohon['apply_perokok'] == 'TIDAK'){ echo 'checked';} ?> required>
                    <label class="form-check-label">TIDAK</label>
                  </div>
                  </div>
                </div>
                <div class="button_mohon d-flex justify-content-end">
                  <button class="btn btn-dark " type="reset">Set Semula</button>
                  <button class="btn btn-dark " name="back" type="submit" disabled>Kembali</button>
                  <button class="btn btn-dark " name="next" type="submit">Seterusnya</button>
                </div>
              </form>
              <?php
              }else{
                echo '<h4 class="c-title1">Permohonan Ditutup</h4>';
              }
              ?>
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