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
  ?>

  <main id="main" class="main">

    <section class="section dashboard">

          <div class="col-12">
          <div class="card overflow-auto">
          <div class="card-body">
          <h4 class="c-title2">BORANG PERMOHONAN ZAKAT UiTM CAWANGAN PERLIS</h4>
          <?php
              $query = $conn->query("SELECT * FROM form WHERE form_id = 1");
              $row_form = mysqli_fetch_assoc($query);
              if(($row_form['form_open'] && $check_form)){
              ?>
              <h5 class="c-title">HAD KIFAYAH PELAJAR UiTM PERLIS</h5>

              <table class="table table-borderless datatable1 zakat" id="table">
              <thead>
                <tr>
                  <th class="text-center" colspan="2">Kos Sara Hidup (A)</th>
                  <th class="text-center" colspan="2">Kos Akademik (B)</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $query_kifayah = $conn->query("SELECT * FROM hadkifayah WHERE had_id=1");
                $row = mysqli_fetch_assoc($query_kifayah);
                  ?>
                <tr>
                  <th>Makan/Minum</th>
                  <td>RM <?= $row['had_minum'] ?></td>
                  <th>Yuran Pengajian</th>
                  <td>RM <?= $row['had_pengajian'] ?></td>
                </tr>
                <tr>
                  <th>Penginapan</th>
                  <td>RM <?= $row['had_penginapan'] ?></td>
                  <th>Yuran Persatuan</th>
                  <td>RM <?= $row['had_persatuan'] ?></td>
                </tr>
                <tr>
                  <th>Pakaian</th>
                  <td>RM <?= $row['had_pakaian'] ?></td>
                  <th>Buku Rujukan</th>
                  <td>RM <?= $row['had_buku'] ?></td>
                </tr>
                <tr>
                  <th>Perubatan</th>
                  <td>RM <?= $row['had_perubatan'] ?></td>
                  <th>Percetakan</th>
                  <td>RM <?= $row['had_percetakan'] ?></td>
                </tr>
                <tr>
                  <th>Komunikasi</th>
                  <td>RM <?= $row['had_komunikasi'] ?></td>
                  <th>Peralatan Utiliti</th>
                  <td>RM <?= $row['had_percetakan'] ?></td>
                </tr>
                <tr>
                  <th>Pengangkutan</th>
                  <td>RM <?= $row['had_pengankutan'] ?></td>
                  <th>Peralatan K/K</th>
                  <td>RM <?= $row['had_kk'] ?></td>
                </tr>
                <tr>
                  <th>Peralatan</th>
                  <td>RM <?= $row['had_peralatan'] ?></td>
                  <th>Kos Kerja</th>
                  <td>RM <?= $row['had_kerja'] ?></td>
                </tr>
                <tr>
                  <th class="text-center"  colspan="2">Jumlah Kos Sara Hidup (A)</th>
                  <th class="text-center"  colspan="2">RM <?= $row['had_jumlah_sara'] ?></th>
              </tr>
                <tr>
                  <th  class="text-center" colspan="2">Jumlah Kos Akademik (B)</th>
                  <th class="text-center"  colspan="2">RM <?= $row['had_jumlah_akademik'] ?></th>
              </tr>
                <tr>
                  <th class="text-center"  colspan="2">Jumlah Keseluruhan Perbelanjaan (HAD KIFAYAH ANDA) (C)</th>
                  <th class="text-center bg-warning"  colspan="2">RM <?= $row['had_jumlah'] ?></th>
              </tr>
              </tbody>
            </table>
            
            <h5 class="c-title">KALKULATOR HAD KIFAYAH</h5>

            <div class="row mb-3">
              <label class="col-sm-5 col-6">PENDAPATAN BAPA</label>
              <strong class="col-sm-7 col-6">: RM <span id="pendapatanBapa"><?php echo $row_mohon['apply_pendapatan_bapa_sebulan'] ?></span></strong>
            </div>
            <div class="row mb-3">
              <label class="col-sm-5 col-6">PENDAPATAN IBU</label>
              <strong class="col-sm-7 col-6">: RM <span id="pendapatanIbu"><?php echo $row_mohon['apply_pendapatan_ibu_sebulan'] ?></span></strong>
            </div>
            <div class="row mb-3">
              <label class="col-sm-5 col-6">LAIN-LAIN PENDAPATAN</label>
              <strong class="col-sm-7 col-6">: RM <span id="pendapatanLain"><?php echo $row_mohon['apply_pendapatan_lain_sebulan'] ?></span></strong>
            </div>
            <div class="row mb-3">
              <label class="col-sm-5 col-6">JUMLAH TAJAAN</label>
              <strong class="col-sm-7 col-6">: RM <span id="jumlahTajaan"><?php echo $row_mohon['apply_jumlah_tajaan'] ?></span></strong>
            </div>
            <div class="row mb-5">
              <label class="col-sm-5 col-6 c-title3">JUMLAH PENDAPATAN (D)</label>
              <strong class="col-sm-7 col-6 my-auto">: RM <span id="totalPendapatan"></span></strong>
            </div>
            <div class="row mb-3">
              <label class="col-sm-5 col-6">HAD KIFAYAH (C)</label>
              <strong class="col-sm-7 col-6">: RM <span id="hadKifayah" class="p-2 rounded bg-warning"><?php echo $row['had_jumlah'] ?></span></strong>
            </div>
            <div class="row mb-3">
              <label class="col-sm-5 col-6">BAKI: JUMLAH PENDAPATAN (D) - HAD KIFAYAH (C)</label>
              <strong class="col-sm-7 col-6">: RM <span id="baki" class="p-2 rounded bg-dark text-white"></span></strong>
            </div>
            <div class="row mb-5">
              <label class="col-sm-5 col-6 c-title3">STATUS MISKIN/ FAKIR/ TAK LAYAK</label>
              <strong class="col-sm-7 col-6 my-auto">: <?= $row_mohon['apply_kifayah'] ?></strong>
            </div>


                  <div class="button_mohon d-flex justify-content-end">
                    <a href="mohon_bahagian4.php?id=<?= $_GET["id"] ?>" class="btn btn-dark">Kembali</a>
                    <a href="mohon_bahagian6.php?id=<?= $_GET["id"] ?>" class="btn btn-dark">Seterusnya</a>
                  </div>
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
  <script>
    var pendapatanBapa = parseFloat(document.getElementById("pendapatanBapa").textContent);
    var pendapatanIbu = parseFloat(document.getElementById("pendapatanIbu").textContent);
    var pendapatanLain = parseFloat(document.getElementById("pendapatanLain").textContent);
    var jumlahTajaan = parseFloat(document.getElementById("jumlahTajaan").textContent);
    var hadKifayah = parseFloat(document.getElementById("hadKifayah").textContent);

    var totalPendapatan = pendapatanBapa + pendapatanIbu + pendapatanLain + jumlahTajaan;
    var baki = totalPendapatan - hadKifayah;

    document.getElementById("totalPendapatan").textContent = totalPendapatan.toFixed(2);
    document.getElementById("baki").textContent = baki.toFixed(2);
  </script>

</body>

</html>