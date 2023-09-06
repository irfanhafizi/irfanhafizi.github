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
  include 'edit_zakat.php'
  ?>

  <main id="main" class="main">

    <section class="section dashboard">
      <div class="col-12">
        <div class="card overflow-auto">
          <div class="card-body">
            <h5 class="c-title">KADAR BANTUAN ZAKAT</h5>

            <form method="POST">
            <table class="table table-borderless datatable1 zakat" id="table">
              <thead>
                <tr>
                  <th>Asnaf</th>
                  <th colspan="2">Diploma</th>
                  <th colspan="2">Ijazah</th>
                  <th colspan="2">Master/PHD</th>
                </tr>
                <tr>
                  <th></th>
                  <th>Tiada Pinjaman</th>
                  <th>Pinjaman/Biasiswa</th>
                  <th>Tiada Pinjaman</th>
                  <th>Pinjaman/Biasiswa</th>
                  <th>Tiada Pinjaman</th>
                  <th>Pinjaman/Biasiswa</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $query_amt = $conn->query("SELECT * FROM zakatamt WHERE amt_id=1");
                $i = 1;
                $rowamt = mysqli_fetch_assoc($query_amt);
                  ?>
                <tr>
                  <th>Fakir</th>
                  <td><input type="number" min="0" name="amt_fakir_diploma_0" class="form-control border-0" value="<?= $rowamt['amt_fakir_diploma_0'] ?>"></input></td>
                  <td><input type="number" min="0" name="amt_fakir_diploma_1" class="form-control border-0" value="<?= $rowamt['amt_fakir_diploma_1'] ?>"></input></td>
                  <td><input type="number" min="0" name="amt_fakir_ijazah_0" class="form-control border-0" value="<?= $rowamt['amt_fakir_ijazah_0'] ?>"></input></td>
                  <td><input type="number" min="0" name="amt_fakir_ijazah_1" class="form-control border-0" value="<?= $rowamt['amt_fakir_ijazah_1'] ?>"></input></td>
                  <td><input type="number" min="0" name="amt_fakir_master_0" class="form-control border-0" value="<?= $rowamt['amt_fakir_master_0'] ?>"></input></td>
                  <td><input type="number" min="0" name="amt_fakir_master_1" class="form-control border-0" value="<?= $rowamt['amt_fakir_master_1'] ?>"></input></td>
                </tr>
                <tr>
                  <th>Miskin</th>
                  <td><input type="number" min="0" name="amt_miskin_diploma_0" class="form-control border-0" value="<?= $rowamt['amt_miskin_diploma_0'] ?>"></input></td>
                  <td><input type="number" min="0" name="amt_miskin_diploma_1" class="form-control border-0" value="<?= $rowamt['amt_miskin_diploma_1'] ?>"></input></td>
                  <td><input type="number" min="0" name="amt_miskin_ijazah_0" class="form-control border-0" value="<?= $rowamt['amt_miskin_ijazah_0'] ?>"></input></td>
                  <td><input type="number" min="0" name="amt_miskin_ijazah_1" class="form-control border-0" value="<?= $rowamt['amt_miskin_ijazah_1'] ?>"></input></td>
                  <td><input type="number" min="0" name="amt_miskin_master_0" class="form-control border-0" value="<?= $rowamt['amt_miskin_master_0'] ?>"></input></td>
                  <td><input type="number" min="0" name="amt_miskin_master_1" class="form-control border-0" value="<?= $rowamt['amt_miskin_master_1'] ?>"></input></td>
                </tr>
                
              </tbody>
            </table>
            <div class="button_mohon d-flex justify-content-end">
              <button class="btn btn-primary" type="submit" name="rubric">Kemaskini</button>
            </div>
            </form>
            </form>
            <form method="POST">
            <div class="row mb-5">
                  <label class="col-sm-3 col-form-label"><strong>Tambahan kepada anak yatim/oku :</strong></label>
                  <div class="col-sm-2 mb-1">
                  <input class="form-control my-auto" type="number" min="0" name="yatim" value="<?= $rowamt['amt_yatim'] ?>" required>
                  </div>
                  <div class="col-sm-2 my-1">
                  <button class="btn btn-primary mt-auto" type="submit" name="add_yatim">Kemaskini</button>
                  </div>
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