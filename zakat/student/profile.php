<?php
include 'authenticate.php';
include '../connection.php';


$query_app = "SELECT * FROM applicant
  LEFT JOIN faculty ON fac_id = app_faculty
  LEFT JOIN kodprogram ON app_code = kod_id
  WHERE app_matric = '$app_id'";
  $view_app = mysqli_query($conn, $query_app);
  $row_app = mysqli_fetch_assoc($view_app);
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
          <?php $pathprofile = !empty($row_app['app_profile']) ? $row_app['app_profile'] :'../upload/applicant/profile/profile.png'; ?>
          <img src="<?= $pathprofile ?>" alt="Profile" class="profile1 rounded-circle">
          <h2><?= $row_app['app_matric'] ?></h2>
          <h3><?= $row_app['fac_name'] ?></h3>
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
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profil</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Tukar Kata Laluan</button>
            </li>

          </ul>
          <div class="tab-content pt-2">

            <div class="tab-pane fade show active profile-overview" id="profile-overview">
              <h5 class="c-title">Maklumat Pelajar</h5>

              <div class="row">
                <div class="col-lg-3 col-md-4 label ">Nama</div>
                <div class="col-lg-9 col-md-8"><?= ucwords(strtolower($row_app['app_fullname'])) ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">No Matrik</div>
                <div class="col-lg-9 col-md-8"><?= $row_app['app_matric'] ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">No Kad Pengenalan</div>
                <div class="col-lg-9 col-md-8"><?= $row_app['app_ic'] ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Alamat</div>
                <div class="col-lg-9 col-md-8"><?= ucwords(strtolower($row_app['app_address_line1'])).' '.ucwords(strtolower($row_app['app_address_line2'])) ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">No Telefon</div>
                <div class="col-lg-9 col-md-8"><?= $row_app['app_tel'] ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Emel</div>
                <div class="col-lg-9 col-md-8"><?= $row_app['app_email'] ?></div>
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
                    <input name="name" type="text" class="form-control" id="fullName" value="<?= $row_app['app_fullname'] ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="company" class="col-lg-3 col-form-label">Alamat</label>
                  <div class="col-lg-9">
                    <input name="address1" type="text" class="form-control my-1" value="<?= $row_app['app_address_line1'] ?>">
                    <input name="address2" type="text" class="form-control my-1" value="<?= $row_app['app_address_line2'] ?>">
                    <div class="col-lg-12 d-flex my-1">
                      <input name="poskod" type="text" class="form-control" value="<?= $row_app['app_poskod'] ?>">
                      <input name="bandar" type="text" class="form-control mx-1" value="<?= $row_app['app_bandar'] ?>">
                      <input name="negeri" type="text" class="form-control" value="<?= $row_app['app_negeri'] ?>">
                  </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="company" class="col-md-4 col-lg-3 col-form-label">No Telefon</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="tel" type="text" class="form-control" value="<?= $row_app['app_tel'] ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="company" class="col-md-4 col-lg-3 col-form-label">Emel</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="email" type="email" class="form-control" value="<?= $row_app['app_email'] ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="company" class="col-md-4 col-lg-3 col-form-label">Kod Program</label>
                  <div class="col-md-8 col-lg-9">
                  <select class="form-select" name="kod" required>
                          <?php
                          $kodprogram = $conn->query("SELECT * FROM kodprogram");
                          while ($row = mysqli_fetch_assoc($kodprogram)){
                            $selected = ($row['kod_id'] == $row_app['app_code']) ? "selected" : "";
                            echo "<option value='{$row['kod_id']}' {$selected}>{$row['kod_name']}</option>";
                          }
                          ?>
                        </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="company" class="col-md-4 col-lg-3 col-form-label">Tarikh Lahir</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="birthdate" type="date" class="form-control" value="<?= $row_app['app_birthdate'] ?>">
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
                  <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Ulang Kata Laluan Baru</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="renewpassword" type="password" class="form-control" id="renewPassword" required>
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="pass">Tukar Kata Laluan</button>
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