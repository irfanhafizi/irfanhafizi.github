<?php
$link = $current_page = basename($_SERVER['PHP_SELF']);
?>
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link <?php if($link != 'index.php'){echo 'collapsed';} ?>" href="index.php">
          <i class="bi bi-grid"></i>
          <span>Halaman Utama</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= (($link != 'interview.php')AND($link != 'interviewnilai.php'))? 'collapsed':''; ?>" href="interview.php">
          <i class="bi bi-people"></i>
          <span>Senarai Pemohon</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= (($link != 'interviewdone.php') AND ($link != 'interviewnotdone.php')) ?'collapsed' : ''; ?>" data-bs-target="#daftar-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-card-list"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="daftar-nav" class="nav-content collapse <?= (($link != 'interviewdone.php') AND ($link != 'interviewnotdone.php')) ?'' : 'show'; ?>" data-bs-parent="#sidebar-nav">
        
        <li>
            <a href="interviewnotdone.php" class="<?= ($link != 'interviewnotdone.php')? '':'active'; ?>">
              <i class="bi bi-circle"></i><span>Senarai Temuduga Belum Selesai</span>
            </a>
          </li>
        <li>
            <a href="interviewdone.php" class="<?= ($link != 'interviewdone.php')? '':'active'; ?>">
              <i class="bi bi-circle"></i><span>Senarai Temuduga Selesai</span>
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
  </aside>