<?php
include 'authenticate.php';
include '../connection.php';


$query = "SELECT * FROM admin
  WHERE admin_no_pekerja = '$admin_id'";
  $view = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($view);
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

  <?php include 'header-top.php';
  include 'header-side.php';
  include 'profile_update.php';
  include 'password.php';
  ?>

<main id="main" class="main">

<section class="section profile">
  <div class="row">
    <div class="col-xl-4">

      <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
          <?php $pathprofile = !empty($row['admin_profile']) ? $row['admin_profile'] :'../upload/applicant/profile/profile.png'; ?>
          <img src="<?= $pathprofile ?>" alt="Profile" class="profile1 rounded-circle">
          <h2><?= $row['admin_no_pekerja'] ?></h2>
          <h3 class="text-center"><?= $row['admin_fullname'] ?></h3>
        </div>
      </div>

    </div>

    <div class="col-xl-8">

      <div class="card">
        <div class="card-body pt-3">
          <!-- Bordered Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered">

            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Maklumat</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Tukar Kata Laluan</button>
            </li>

          </ul>
          <div class="tab-content pt-2">

            <div class="tab-pane fade show active profile-overview" id="profile-overview">
              <h5 class="c-title">Maklumat Koordinator</h5>

              <div class="row">
                <div class="col-lg-3 col-md-4 label ">Nama</div>
                <div class="col-lg-9 col-md-8"><?= ucwords(strtolower($row['admin_fullname'])) ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">No Pekerja</div>
                <div class="col-lg-9 col-md-8"><?= $row['admin_no_pekerja'] ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">No Kad Pengenalan</div>
                <div class="col-lg-9 col-md-8"><?= $row['admin_icno'] ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">No Telefon</div>
                <div class="col-lg-9 col-md-8"><?= $row['admin_tel'] ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Emel</div>
                <div class="col-lg-9 col-md-8"><?= $row['admin_email'] ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Tarikh daftar</div>
                <div class="col-lg-9 col-md-8"><?= date('d/m/Y', strtotime($row['admin_created_at'])); ?></div>
              </div>
            </div>

            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

              <!-- Profile Edit Form -->
              <form method="POST" enctype="multipart/form-data">
                <div class="row mb-3">
                  <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Gambar Profile</label>
                  <div class="col-md-8 col-lg-9">
                    <img src="<?= $pathprofile ?>" alt="Profile" class="profile1">
                    <div class="pt-2">
                      <input name="profile" type="file" class="form-control" accept="image/png, image/jpeg">
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama Penuh</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="name" type="text" class="form-control" id="fullName" value="<?= $row['admin_fullname'] ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="company" class="col-md-4 col-lg-3 col-form-label">No Telefon</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="tel" type="text" class="form-control" value="<?= $row['admin_tel'] ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="company" class="col-md-4 col-lg-3 col-form-label">Emel</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="email" type="email" class="form-control" value="<?= $row['admin_email'] ?>">
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" name="profile_submit" class="btn btn-primary">Simpan</button>
                </div>
              </form><!-- End Profile Edit Form -->

            </div>

            <div class="tab-pane fade pt-3" id="profile-change-password">
              <!-- Change Password Form -->
              <form class=" needs-validation" method="POST" novalidate>

                <div class="row mb-3">
                  <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Kata Laluan Sekarang</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="password" type="password" class="form-control" id="currentPassword" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Kata Laluan Baru</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="newpassword" type="password" class="form-control" id="newPassword" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter Kata Laluan Baru</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="renewpassword" type="password" class="form-control" id="renewPassword" required>
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="pass">Change Password</button>
                </div>
              </form><!-- End Change Password Form -->

            </div>

          </div><!-- End Bordered Tabs -->

        </div>
      </div>

    </div>
  </div>
</section>

</main>

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

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>