<?php 
$profile = $conn->query("SELECT * FROM admin WHERE admin_no_pekerja = '$admin_id'");
$row_profile = mysqli_fetch_assoc($profile);
?>
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="../assets/img/uitm1.png" alt="">
        <span class="d-none d-lg-block" style="color: whitesmoke;">e-ZAKAT</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <?php $headerprofile = !empty($row_profile['admin_profile']) ? $row_profile['admin_profile'] :'../upload/applicant/profile/profile.png'; ?>
          <img src="<?= $headerprofile ?>" class="profile2 rounded-circle mx-2">
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            
            <li>
              <a class="dropdown-item d-flex align-items-center" href="profile.php">
                <i class="bi bi-person"></i>
                <span>Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="../logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Keluar Sistem</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->
        <li class="nav-item dropdown pe-3">
        <?= ucwords(strtolower($row_profile['admin_fullname'])); ?>
        </li>

      </ul>
    </nav>
  </header><!-- End Header -->