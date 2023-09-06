<?php
include 'authenticate.php';
include '../connection.php';

if(isset($_GET['filter3'])){
  $filter = $_GET['filter3'];
  $apply = $conn->query("SELECT * FROM apply
  LEFT JOIN applicant ON app_matric = apply_matric
  LEFT JOIN sesi ON sesi_id = apply_sesi
  LEFT JOIN status ON apply_status = status_id
  LEFT JOIN semester ON sem_id = apply_sem
  WHERE apply_matric = '$app_id' AND apply_status != 1 AND apply_status != 2 
  AND apply_status != 3 AND apply_status != 4 AND apply_status != 6
  AND apply_status != 7 AND apply_sesi = '$filter'");
}else{
  $apply = $conn->query("SELECT * FROM apply
  LEFT JOIN applicant ON app_matric = apply_matric
  LEFT JOIN sesi ON sesi_id = apply_sesi
  LEFT JOIN status ON apply_status = status_id
  LEFT JOIN semester ON sem_id = apply_sem
  WHERE apply_matric = '$app_id' AND apply_status != 1 AND apply_status != 2 
  AND apply_status != 3 AND apply_status != 4 AND apply_status != 6 AND apply_status != 7");
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
  <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="style">
  <link href="../assets/vendor/datatable/style.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

</head>

<body>

  <?php include 'header-top.php';
  include 'header-side.php';
  ?>

  <main id="main" class="main">

    <section class="section dashboard">
      <div class="col-12">
        <div class="card overflow-auto">
          <div class="card-body">
            <h5 class="c-title">Senarai Permohonan Telah Selesai</h5>

            <div class="filter">
            <a class="filter-refresh" href="<?= basename($_SERVER['PHP_SELF']); ?>" title="Set Semula"><i class="ri-refresh-line"></i></a>

            <a class="filter-title" href="" data-bs-toggle="dropdown">Pilihan Sesi <i class="bi bi-chevron-down ms-auto"></i></a>
            <ul class="dropdown-menu dropdown-menu-arrow">
              <a href="<?= basename($_SERVER['PHP_SELF']); ?>"><li class="dropdown-header text-start">Papar Semua</li></a>
              <?php
              $filter_query3 = $conn->query("SELECT * FROM sesi");
              while($row = mysqli_fetch_assoc($filter_query3)){
              ?>
              <a href="<?= basename($_SERVER['PHP_SELF']).'?filter3='.$row['sesi_id']; ?>"><li class="dropdown-item"><?= $row['sesi_name'] ?></li></a>
              <?php } ?>
            </ul>
            
            <div class="searchtableinput">
            <input type="text" id="searchtableinput" onkeyup="searchtable()" placeholder="Search"></input>
            </div>
          </div>
          
          <div class="convert">
              <button onclick="exportToExcel()" class="btn btn-success">Export to Excel</button>
              <button onclick="printAsPDF()" class="btn btn-success">Generate PDF</button>
            </div>

            <table class="table datatable1" id="table">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Sesi</th>
                  <th>No Matric Pemohon</th>
                  <th>Nama Pemohon</th>
                  <th>Semester</th>
                  <th>Tarikh Memohon</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <form>
                <?php
                if (mysqli_num_rows($apply) > 0){
                $i = 1;
                while($row = mysqli_fetch_assoc($apply)){
                  $parameter_id = $row['apply_id'];
                  include 'utils.php';
                  ?>
                <tr>
                  <th><?php echo $i ?></th>
                  <td><?= $row['sesi_name'] ?></td>
                  <td><?= $row['apply_matric'] ?></td>
                  <td><?= $row['app_fullname'] ?></td>
                  <td><?= $row['sem_name'] ?></td>
                  <td><?= date('d F Y', strtotime($row['apply_created_at'])) ?></td>
                  <td><strong><?= $row['status_name'] ?></strong></td>
                </tr>
                
                <?php
                $i ++;
                }}else{
                  ?>
                  <tr>
                    <td class="text-center" colspan="100%">No entries found</td>
                  </tr>
                  <?php
                }
                ?>
                </form>
              </tbody>
            </table>
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
  <script>
   
    </script>

</body>

</html>