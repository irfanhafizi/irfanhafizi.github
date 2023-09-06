<?php
include 'authenticate.php';
include '../connection.php';
include 'latest_sesi.php';

if(isset($_GET['filter'])){
  $filter = $_GET['filter'];
  $get_interviewer = "SELECT * FROM interviewer
  LEFT JOIN faculty ON fac_id = inter_faculty
  WHERE inter_faculty = $filter";
}else{
  $get_interviewer = "SELECT * FROM interviewer
  LEFT JOIN faculty ON fac_id = inter_faculty";
}
$get_inter_result = mysqli_query($conn, $get_interviewer);
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
            <h5 class="c-title">DAFTAR TEMUDUGA PEMOHON</h5>
            <h5 class="c-title1">SENARAI PENEMUDUGA BERDAFTAR</h5>
            <div class="filter">
          <a class="filter-refresh" href="<?= basename($_SERVER['PHP_SELF']); ?>" title="Set Semula"><i class="ri-refresh-line"></i></a>
            <a class="filter-title" href="" data-bs-toggle="dropdown">Pilihan Fakulti <i class="bi bi-chevron-down ms-auto"></i></a>
            <ul class="dropdown-menu dropdown-menu-arrow" >
              <a href="<?= basename($_SERVER['PHP_SELF']); ?>"><li class="dropdown-header text-start">Papar Semua</li></a>
              <?php
              $filter_query = $conn->query("SELECT * FROM faculty");
              while($row = mysqli_fetch_assoc($filter_query)){
              ?>
              <a href="<?= basename($_SERVER['PHP_SELF']).'?filter='.$row['fac_id']; ?>"><li class="dropdown-item"><?= $row['fac_name'] ?></li></a>
              <?php } ?>
            </ul>

          <div class="searchtableinput">
            <input type="text" id="searchtableinput" onkeyup="searchtable()" placeholder="Search"></input>
            </div>
          </div>

            <table id="table" class="table table-borderless datatable1">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>No Pekerja</th>
                  <th>Name</th>
                  <th>Faculty</th>
                  <th>Bilangan Pemohon Berdaftar Semasa</th>
                  <th>Status Pengguna</th>
                </tr>
              </thead>
              <tbody>
                <form>
                <?php
                if (mysqli_num_rows($get_inter_result) > 0){
                $i = 1;
                while($row = mysqli_fetch_assoc($get_inter_result)){
                  $inter_id=$row['inter_no_pekerja'];
                  $bilquery = $conn->query("SELECT * FROM interview WHERE interview_interviewer = '$inter_id' AND interview_sesi = '$latest_sesi'");
                  $bilcount = $bilquery->num_rows;
                  ?>
                <tr>
                  <th><?php echo $i ?></th>
                  <td><?php echo $row['inter_no_pekerja'] ?></td>
                  <td><?php echo $row['inter_name'] ?></td>
                  <td><?php echo $row['fac_name'] ?></td>
                  <td><?= $bilcount ?></td>
                  <td class="<?= $row['inter_status'] ? 'text-success' : 'text-danger' ; ?>"><strong><?= $row['inter_status'] ? 'Aktif' : 'Tidak Aktif' ; ?></strong></td>
                  <td class="text-end"><button type="button" onclick="location.href='assign_pemohon1.php?id=<?php echo $row['inter_no_pekerja'] ?>'" class="btn btn-primary btn-sm rounded-pill">Pilih Pemohon</button></td>
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

</body>

</html>