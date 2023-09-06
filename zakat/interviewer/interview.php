<?php
include 'authenticate.php';
include '../connection.php';

$inter_id = $_SESSION['inter_id'];
$interview = $conn->query("SELECT * FROM interview
LEFT JOIN apply ON apply_id = interview_apply
LEFT JOIN applicant ON app_matric = apply_matric
LEFT JOIN sesi ON sesi_id = apply_sesi
WHERE interview_interviewer = '$inter_id' AND interview_status = 6");
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
            <h5 class="c-title">SENARAI PEMOHON YANG BELUM DITEMUDUGA</h5>
            <h5 class="c-desc">Penemuduga hendaklah menetapkan janjitemu sebelum memasukkan keputusan</h5>

            <div class="filter">
              <div class="searchtableinput">
            <input type="text" id="searchtableinput" onkeyup="searchtable()" placeholder="Search"></input>
            </div>
          </div>
            <table class="table table-borderless datatable1" id="table">
              <thead>
                <tr>
                  <th>Bil.</th>
                  <th>Sesi</th>
                  <th>No Matrik</th>
                  <th>Nama Pemohon</th>
                  <th>No Telefon</th>
                  <th>Emel</th>
                </tr>
              </thead>
              <tbody>
                <form>
                <?php
                if (mysqli_num_rows($interview) > 0){
                $i = 1;
                while($row = mysqli_fetch_assoc($interview)){
                  $parameter_id = $row['apply_id'];
                  include 'utils.php';
                  ?>
                <tr>
                  <th><?php echo $i ?></th>
                  <td><?= $row['sesi_name'] ?></td>
                  <td><?= $row['apply_matric'] ?></td>
                  <td><?= $row['app_fullname'] ?></td>
                  <td ><span class="tel-alert"><?= $row['apply_tel'] ?></span></td>
                  <td><?= $row['apply_email'] ?></td>
                  <td><a class="btn btn-primary btn-sm rounded-pill w-100" href="interviewnilai.php?id=<?= $encoded_id ?>">Masukkan Keputusan</a></td>
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