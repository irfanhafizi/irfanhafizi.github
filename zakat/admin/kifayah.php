<?php
include 'authenticate.php';
include '../connection.php';

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
  include 'edit_kifayah.php'
  ?>

  <main id="main" class="main">

    <section class="section dashboard">
      <div class="col-12">
        <div class="card overflow-auto">
          <div class="card-body">
            <h5 class="c-title">HAD KIFAYAH PELAJAR UiTM PERLIS</h5>

            <form method="POST">
            <table class="table table-borderless datatable1 zakat" id="table">
              <thead>
                <tr>
                  <th class="text-center" colspan="2">Kos Sara Hidup (RM)</th>
                  <th class="text-center" colspan="2">Kos Akademik (RM)</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $query_kifayah = $conn->query("SELECT * FROM hadkifayah WHERE had_id=1");
                $row = mysqli_fetch_assoc($query_kifayah);
                  ?>
                <tr>
                  <th>Makan/Minum</th>
                  <td><input type="number" min="0" step="0.01" name="minum"class="form-control border-0" value="<?= $row['had_minum'] ?>"></input></td>
                  <th>Yuran Pengajian</th>
                  <td><input type="number" min="0" step="0.01" name="pengajian" class="form-control border-0" value="<?= $row['had_pengajian'] ?>"></input></td>
                </tr>
                <tr>
                  <th>Penginapan</th>
                  <td><input type="number" min="0" step="0.01" name="penginapan"class="form-control border-0" value="<?= $row['had_penginapan'] ?>"></input></td>
                  <th>Yuran Persatuan</th>
                  <td><input type="number" min="0" step="0.01" name="persatuan" class="form-control border-0" value="<?= $row['had_persatuan'] ?>"></input></td>
                </tr>
                <tr>
                  <th>Pakaian</th>
                  <td><input type="number" min="0" step="0.01" name="pakaian"class="form-control border-0" value="<?= $row['had_pakaian'] ?>"></input></td>
                  <th>Buku Rujukan</th>
                  <td><input type="number" min="0" step="0.01" name="buku" class="form-control border-0" value="<?= $row['had_buku'] ?>"></input></td>
                </tr>
                <tr>
                  <th>Perubatan</th>
                  <td><input type="number" min="0" step="0.01" name="perubatan"class="form-control border-0" value="<?= $row['had_perubatan'] ?>"></input></td>
                  <th>Percetakan</th>
                  <td><input type="number" min="0" step="0.01" name="percetakan" class="form-control border-0" value="<?= $row['had_percetakan'] ?>"></input></td>
                </tr>
                <tr>
                  <th>Komunikasi</th>
                  <td><input type="number" min="0" step="0.01" name="komunikasi"class="form-control border-0" value="<?= $row['had_komunikasi'] ?>"></input></td>
                  <th>Peralatan Utiliti</th>
                  <td><input type="number" min="0" step="0.01" name="utiliti" class="form-control border-0" value="<?= $row['had_percetakan'] ?>"></input></td>
                </tr>
                <tr>
                  <th>Pengangkutan</th>
                  <td><input type="number" min="0" step="0.01" name="pengankutan"class="form-control border-0" value="<?= $row['had_pengankutan'] ?>"></input></td>
                  <th>Peralatan K/K</th>
                  <td><input type="number" min="0" step="0.01" name="kk" class="form-control border-0" value="<?= $row['had_kk'] ?>"></input></td>
                </tr>
                <tr>
                  <th>Peralatan</th>
                  <td><input type="number" min="0" step="0.01"name="peralatan"class="form-control border-0" value="<?= $row['had_peralatan'] ?>"></input></td>
                  <th>Kos Kerja</th>
                  <td><input type="number" min="0" step="0.01" name="kerja" class="form-control border-0" value="<?= $row['had_kerja'] ?>"></input></td>
                </tr>
              </tbody>
            </table>
            <div class="button_mohon d-flex justify-content-end">
              <button class="btn btn-primary" type="submit" name="rubric">Kemaskini</button>
            </div>
            
            <div class="row mb-3">
              <label class="col-sm-3 col-5"><strong>JUMLAH KOS SARA HIDUP YANG TELAH DITETAPKAN</strong></label>
              <strong class="col-sm-9 col-7">: RM <?php echo $row['had_jumlah_sara'] ?></strong>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-5"><strong>JUMLAH KOS AKADEMIK YANG TELAH DITETAPKAN</strong></label>
              <strong class="col-sm-9 col-7">: RM <?php echo $row['had_jumlah_akademik'] ?></strong>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-5"><strong>JUMLAH KETETAPAN PERBELANJAAN HAD KIFAYAH</strong></label>
              <strong class="col-sm-9 col-7">: RM <?php echo $row['had_jumlah'] ?></strong>
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
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>