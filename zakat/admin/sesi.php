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
  <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="style">
  <link href="../assets/vendor/datatable/style.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

</head>

<body>

  <?php include 'header-top.php';
  include 'header-side.php';
  include 'edit_sesi.php';
  ?>

  <main id="main" class="main">

    <section class="section dashboard">
      <div class="col-12">
        <div class="card overflow-auto">
          <div class="card-body">
            <h5 class="c-title1">Sesi Semasa: <?= $row_sesi['sesi_name'] ?></h5>
            <h5 class="c-title">SENARAI SESI</h5>

            <div class="filter">
              <div class="searchtableinput">
            <input type="text" id="searchtableinput" onkeyup="searchtable()" placeholder="Search"></input>
            </div>
          </div>
            <table class="table table-borderless datatable1" id="table">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Sesi</th>
                  <th>Tarikh Mula</th>
                  <th>Tarikh Tamat</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $sesi = $conn->query("SELECT * FROM sesi");
                $i = 1;
                while($row = mysqli_fetch_assoc($sesi)){
                  ?>
                <tr>
                  <th><?= $i ?></th>
                  <td><?= $row['sesi_name'] ?></td>
                  <td><?= $row['sesi_date_start'] ?></td>
                  <td><?= $row['sesi_date_end'] ?></td>
                  <td class="text-end">
                    <a class="btn btn-danger btn-sm rounded-pill" href="<?= basename($_SERVER['PHP_SELF']).'?delete='.$row['sesi_id'] ?>">Hapus</a>
                  </td>
                </tr>
                
                <?php
                $i ++;
                }
                ?>
              </tbody>
            </table>


            <form method="POST">
            <div class="row">
              <div class="col-sm-3 mb-2 d-flex space-between">
                <label class="col-sm-8 col-5 col-form-label"><strong>Tambah sesi baharu :</strong></label>
                <div class="col-sm-4 col-7">
                <input class="form-control mt-auto" type="text" name="sesi_name" value="" required>
                </div>
              </div>
              <div class="col-sm-3 mb-2 d-flex space-between">
                <label class="col-sm-5 col-5 col-form-label">Tarikh Mula :</label>
                <div class="col-sm-7 col-7">
                <input class="form-control mt-auto" type="date" name="sesi_start" value="" required>
                </div>
              </div>
              <div class="col-sm-3 mb-2 d-flex space-between">
                <label class="col-sm-5 col-5 col-form-label">Tarikh Tamat :</label>
                <div class="col-sm-7 col-7">
                <input class="form-control mt-auto" type="date" name="sesi_end" value="" required>
                </div>
              </div>
              <div class="col-sm-3 mb-2 d-flex">
                <button class="btn btn-primary mt-auto" type="submit" name="add_sesi">Tambah</button>
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