<?php
$link = $current_page = basename($_SERVER['PHP_SELF']);
?>
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link <?= ($link != 'index.php')? 'collapsed':''; ?>" href="index.php">
          <i class="bi bi-grid"></i>
          <span>Halaman Utama</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link  <?= (($link != 'mohon_bahagian1.php')AND($link != 'mohon_bahagian2.php')AND($link != 'mohon_bahagian3.php')
        AND($link != 'mohon_bahagian4.php')AND($link != 'mohon_bahagian5.php')AND($link != 'apply_submit.php')) ? 'collapsed':''; ?>" href="mohon_bahagian1.php">
          <i class="bi bi-clipboard"></i>
          <span>Permohonan Baru</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= (($link != 'apply_app.php')AND($link != 'view_apply.php'))? 'collapsed':''; ?>" href="apply_app.php">
          <i class="bi bi-card-list"></i>
          <span>Senarai Permohonan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= (($link != 'report_apply.php') AND ($link != 'report_apply2.php')) ?'collapsed' : ''; ?>" data-bs-target="#daftar-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-card-list"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="daftar-nav" class="nav-content collapse <?= (($link != 'report_apply.php') AND ($link != 'report_apply2.php')) ?'' : 'show'; ?>" data-bs-parent="#sidebar-nav">
        
        <li>
            <a href="report_apply.php" class="<?= ($link != 'report_apply.php')? '':'active'; ?>">
              <i class="bi bi-circle"></i><span>Senarai Permohonan Selesai</span>
            </a>
          </li>  
        <li>
            <a href="report_apply2.php" class="<?= ($link != 'report_apply2.php')? '':'active'; ?>">
              <i class="bi bi-circle"></i><span>Senarai Permohonan Belum Selesai</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="../logout.php">
          <i class="bi bi-power"></i>
          <span>Keluar Sistem</span>
        </a>
      </li>

    </ul>

  </aside><!-- End Sidebar-->