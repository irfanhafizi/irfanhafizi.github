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
        <a class="nav-link <?= (($link != 'latest_apply.php') AND ($link != 'validate_apply.php')) ?'collapsed' : ''; ?>" href="latest_apply.php">
          <i class="bi bi-clipboard-check"></i>
          <span>Pengesahan Permohonan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= (($link != 'assign_pemohon.php') AND ($link != 'assign_pemohon1.php')) ?'collapsed' : ''; ?>" href="assign_pemohon.php">
          <i class="bi bi-back"></i>
          <span>Daftar Temuduga Pemohon</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= (($link != 'interview_done.php') AND ($link != 'interview_final.php')) ?'collapsed' : ''; ?>" href="interview_done.php">
          <i class="bi bi-archive"></i>
          <span>Pengesahan Keputusan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= (($link != 'register_interviewer.php') AND ($link != 'register_admin.php')) ?'collapsed' : ''; ?>" data-bs-target="#daftar-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-box-arrow-in-right"></i><span>Lantikan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="daftar-nav" class="nav-content collapse <?= (($link != 'register_interviewer.php') AND ($link != 'register_admin.php')) ?'' : 'show'; ?>" data-bs-parent="#sidebar-nav">
          <li>
            <a href="register_interviewer.php" class="<?= ($link != 'register_interviewer.php')? '':'active'; ?>">
              <i class="bi bi-circle"></i><span>Penemuduga</span>
            </a>
          </li>
          <li>
            <a href="register_admin.php" class="<?= ($link != 'register_admin.php')? '':'active'; ?>">
              <i class="bi bi-circle"></i><span>Koordinator</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= (($link != 'report_interview_not_done.php')AND($link != 'report_applying.php')AND($link != 'report_submited.php')AND ($link != 'report_interview_success.php') AND ($link != 'apply_miskin.php')
         AND ($link != 'report_interview_failed.php') AND ($link != 'report_interview_reject.php')AND($link != 'report_validated.php') AND ($link != 'apply_fakir.php') AND ($link != 'apply_yatim.php')
         AND ($link != 'report_applicant.php') AND ($link != 'report_interviewer.php')AND($link != 'report_return.php')  AND ($link != 'report_admin.php')AND($link != 'report_interview_done.php') ) ?'collapsed' : ''; ?>" data-bs-target="#report-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-card-list"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="report-nav" class="nav-content collapse <?= (($link != 'report_interview_not_done.php')AND($link != 'report_applying.php')AND($link != 'report_submited.php') AND ($link != 'report_interview_success.php') AND ($link != 'apply_yatim.php')
         AND ($link != 'report_interview_failed.php') AND ($link != 'report_interview_reject.php')AND($link != 'report_validated.php')AND($link != 'report_return.php') AND ($link != 'apply_fakir.php') AND ($link != 'apply_miskin.php')
         AND ($link != 'report_applicant.php') AND ($link != 'report_interviewer.php') AND ($link != 'report_admin.php')AND($link != 'report_interview_done.php')) ? '' : 'show'; ?>" data-bs-parent="#sidebar-nav">
          
          <li>
            <a href="report_applying.php" class="<?= ($link != 'report_applying.php')? '':'active'; ?>">
              <i class="bi bi-circle"></i>
              <span>Senarai Permohonan Belum Dihantar</span>
            </a>
          </li>
          <li>
            <a href="report_submited.php" class="<?= ($link != 'report_submited.php')? '':'active'; ?>">
              <i class="bi bi-circle"></i>
              <span>Senarai Permohonan Telah Dihantar</span>
            </a>
          </li>
          <li>
            <a href="report_validated.php" class="<?= ($link != 'report_validated.php')? '':'active'; ?>">
              <i class="bi bi-circle"></i>
              <span>Senarai Semakan Diterima</span>
            </a>
          </li>
          <li>
            <a href="report_return.php" class="<?= ($link != 'report_return.php')? '':'active'; ?>">
              <i class="bi bi-circle"></i>
              <span>Senarai Semakan Perlu Pembetulan</span>
            </a>
          </li>
          <li>
            <a href="report_interview_reject.php" class="<?= ($link != 'report_interview_reject.php')? '':'active'; ?>">
              <i class="bi bi-circle"></i>
              <span>Senarai Semakan Ditolak</span>
            </a>
          </li>
          <li>
            <a href="report_interview_not_done.php" class="<?= ($link != 'report_interview_not_done.php')? '':'active'; ?>">
              <i class="bi bi-circle"></i>
              <span>Senarai Temuduga Belum Selesai</span>
            </a>
          </li>
          <li>
            <a href="report_interview_done.php" class="<?= ($link != 'report_interview_done.php')? '':'active'; ?>">
              <i class="bi bi-circle"></i>
              <span>Senarai Temuduga Telah Selesai</span>
            </a>
          </li>
          <li>
            <a href="report_interview_success.php" class="<?= ($link != 'report_interview_success.php')? '':'active'; ?>">
              <i class="bi bi-circle"></i>
              <span>Senarai Keputusan Berjaya</span>
            </a>
          </li>
          <li>
            <a href="report_interview_failed.php" class="<?= ($link != 'report_interview_failed.php')? '':'active'; ?>">
              <i class="bi bi-circle"></i>
              <span>Senarai Keputusan Gagal</span>
            </a>
          </li>
          <li>
            <a href="apply_fakir.php" class="<?= ($link != 'apply_fakir.php')? '':'active'; ?>">
              <i class="bi bi-circle"></i>
              <span>Senarai Permohonan Fakir</span>
            </a>
          </li>
          <li>
            <a href="apply_miskin.php" class="<?= ($link != 'apply_miskin.php')? '':'active'; ?>">
              <i class="bi bi-circle"></i>
              <span>Senarai Permohonan Miskin</span>
            </a>
          </li>
          <li>
            <a href="apply_yatim.php" class="<?= ($link != 'apply_yatim.php')? '':'active'; ?>">
              <i class="bi bi-circle"></i>
              <span>Senarai Permohonan Anak Yatim</span>
            </a>
          </li>
          <li>
            <a href="report_applicant.php" class="<?= ($link != 'report_applicant.php')? '':'active'; ?>">
              <i class="bi bi-circle"></i><span>Senarai Pemohon</span>
            </a>
          </li>
          <li>
            <a href="report_interviewer.php" class="<?= ($link != 'report_interviewer.php')? '':'active'; ?>">
              <i class="bi bi-circle"></i><span>Senarai Penemuduga</span>
            </a>
          </li>
          <li>
            <a href="report_admin.php" class="<?= ($link != 'report_admin.php')? '':'active'; ?>">
              <i class="bi bi-circle"></i><span>Senarai Koordinator</span>
            </a>
          </li>
        </ul>
      </li>
      
      <li class="nav-item">
        <a class="nav-link <?= (($link != 'sesi.php') AND ($link != 'semester.php') AND ($link != 'interviewer_active.php') AND ($link != 'kifayah.php')
         AND ($link != 'tajaan.php') AND ($link != 'fakulti.php') AND ($link != 'code.php')AND ($link != 'bank.php')AND ($link != 'zakat.php')
         AND ($link != 'hubungan.php') AND ($link != 'status.php')) ?'collapsed' : ''; ?>" data-bs-target="#borang-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-pencil"></i><span>Kemaskini Maklumat Sistem</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="borang-nav" class="nav-content collapse <?= (($link != 'sesi.php') AND ($link != 'semester.php') AND ($link != 'code.php') AND ($link != 'kifayah.php')
         AND ($link != 'tajaan.php') AND ($link != 'fakulti.php') AND ($link != 'interviewer_active.php')AND ($link != 'bank.php')AND ($link != 'zakat.php')
         AND ($link != 'hubungan.php') AND ($link != 'status.php')) ? '' : 'show'; ?>" data-bs-parent="#sidebar-nav">
         <li>
           <a href="interviewer_active.php" class="<?= ($link != 'interviewer_active.php')? '':'active'; ?>">
             <i class="bi bi-circle"></i><span>Penemuduga</span>
           </a>
         </li>
          <li>
            <a href="sesi.php" class="<?= ($link != 'sesi.php')? '':'active'; ?>">
              <i class="bi bi-circle"></i><span>Sesi</span>
            </a>
          </li>
          <li>
            <a href="semester.php" class="<?= ($link != 'semester.php')? '':'active'; ?>">
              <i class="bi bi-circle"></i><span>Semester</span>
            </a>
          </li>
          <li>
            <a href="tajaan.php" class="<?= ($link != 'tajaan.php')? '':'active'; ?>">
              <i class="bi bi-circle"></i><span>Tajaan</span>
            </a>
          </li>
          <li>
            <a href="fakulti.php" class="<?= ($link != 'fakulti.php')? '':'active'; ?>">
              <i class="bi bi-circle"></i><span>Fakulti</span>
            </a>
          </li>
          <li>
            <a href="code.php" class="<?= ($link != 'code.php')? '':'active'; ?>">
              <i class="bi bi-circle"></i><span>Kod Program</span>
            </a>
          </li>
          <li>
            <a href="hubungan.php" class="<?= ($link != 'hubungan.php')? '':'active'; ?>">
              <i class="bi bi-circle"></i><span>Hubungan Keluarga</span>
            </a>
          </li>
          <li>
            <a href="bank.php" class="<?= ($link != 'bank.php')? '':'active'; ?>">
              <i class="bi bi-circle"></i><span>Bank</span>
            </a>
          </li>
          <li>
            <a href="status.php" class="<?= ($link != 'status.php')? '':'active'; ?>">
              <i class="bi bi-circle"></i><span>Status Permohonan</span>
            </a>
          </li>
          <li>
            <a href="zakat.php" class="<?= ($link != 'zakat.php')? '':'active'; ?>">
              <i class="bi bi-circle"></i><span>Kadar Bantuan Zakat</span>
            </a>
          </li>
          <li>
            <a href="kifayah.php" class="<?= ($link != 'kifayah.php')? '':'active'; ?>">
              <i class="bi bi-circle"></i><span>Kalkulator Had Kifayah</span>
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