<?php
include 'authenticate.php';
include 'get_utils.php';
include 'zakatscript.php';
$inter_id = $_SESSION['inter_id'];

if(isset($_GET['id'])){
  $query_get = "SELECT * FROM apply
  LEFT JOIN applicant ON app_matric = apply_matric 
  LEFT JOIN faculty ON fac_id = app_faculty
  LEFT JOIN semester ON sem_id = apply_sem
  LEFT JOIN kodprogram ON app_code = kod_id
  LEFT JOIN bank ON apply_nama_bank = bank_id
  LEFT JOIN sesi ON sesi_id = apply_sesi
  LEFT JOIN hubungan ON hubungan_id = apply_hubungan_keluarga
  LEFT JOIN tajaan ON taja_id = apply_tajaan
    WHERE apply_id = '$decrypted_id'
    GROUP BY apply_id";
    $view_pemohon = mysqli_query($conn, $query_get);
    $row_pemohon = mysqli_fetch_assoc($view_pemohon);
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
  include 'interviewupdate.php'
  ?>

  <main id="main" class="main">

    <section class="section dashboard">
      <div class="row">
        <div class="col-12">
        <div class="card overflow-auto">
          
          <div class="card-body">

            <h4 class="c-title2">KEPUTUSAN PENILAIAN TEMUDUGA</h4>
            <h1 class="c-title1">Sila semak maklumat pemohon dan masukkan keputusan</h1>
            <h5 class="c-title">MAKLUMAT PEMOHON</h5>
            <div class="row mb-3">
              <img src="<?= $row_pemohon['app_profile'] ?>" alt="Profile" style="width:200px">
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-5">NAMA</label>
              <strong class="col-sm-9 col-7">: <?php echo $row_pemohon['app_fullname'] ?></strong>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-5">JANTINA</label>
              <strong class="col-sm-9 col-7">: <?php echo $row_pemohon['app_gender'] ?></strong>
            </div>

            <div class="row mb-3">
              <label class="col-sm-3 col-5">NO MATRIK</label>
              <div class="col-sm-9 col-7 d-card">
                <strong class="">: <?php echo $row_pemohon['apply_matric'] ?></strong>
                <table>
                  <tr>
                    <th>Gambar Depan</th>
                    <th>Gambar Belakang</th>
                  </tr>
                  <tr>
                    <td><img src="<?= $row_pemohon['app_document_matric'] ?>"></td>
                    <td><img src="<?= $row_pemohon['app_document1_matric'] ?>" ></td>
                  </tr>
                </table>
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-3 col-5">NO KAD PENGENALAN</label>
              <div class="col-sm-9 col-7 d-card">
                <strong class="">: <?php echo $row_pemohon['app_ic'] ?></strong>
                <table>
                  <tr>
                    <th>Gambar Depan</th>
                    <th>Gambar Belakang</th>
                  </tr>
                  <tr>
                    <td><img src="<?= $row_pemohon['app_document_ic'] ?>"></td>
                    <td><img src="<?= $row_pemohon['app_document1_ic'] ?>" ></td>
                  </tr>
                </table>
              </div>
            </div>
            
            <div class="row mb-3">
              <label class="col-sm-3 col-5">SURAT TAWARAN</label>
              <strong class="col-sm-9 col-7">: <a class="btn btn-sm btn-primary rounded-pill" href="<?= $row_pemohon['app_document_tawaran'] ?>" target="_blank">Lihat Dokumen</a></strong>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-5">ALAMAT TETAP RUMAH</label>
              <strong class="col-sm-9 col-7">: <?php echo $row_pemohon['apply_address_line1'].' '.$row_pemohon['apply_address_line2'] ?></strong>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-5">POSKOD</label>
              <strong class="col-sm-9 col-7">: <?php echo $row_pemohon['apply_poskod'] ?></strong>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-5">BANDAR</label>
              <strong class="col-sm-9 col-7">: <?php echo $row_pemohon['apply_bandar'] ?></strong>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-5">NEGERI</label>
              <strong class="col-sm-9 col-7">: <?php echo $row_pemohon['apply_negeri'] ?></strong>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-5">NO TELEFON</label>
              <strong class="col-sm-9 col-7">: <?php echo $row_pemohon['apply_tel'] ?></strong>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-5">FAKULTI</label>
              <strong class="col-sm-9 col-7">: <?php echo $row_pemohon['fac_name'] ?></strong>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-5">KOD PROGRAM</label>
              <strong class="col-sm-9 col-7">: <span class="tel-alert"><?php echo $row_pemohon['kod_name'] ?></span></strong>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-5">SEMESTER</label>
              <strong class="col-sm-9 col-7">: <?php echo $row_pemohon['sem_name'] ?></strong>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-5">CGPA TERKINI</label>
              <strong class="col-sm-9 col-7">: <?php echo $row_pemohon['apply_cgpa'] ?></strong>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-5">NAMA PENASIHAT AKADEMIK</label>
              <strong class="col-sm-9 col-7">: <?php echo $row_pemohon['apply_nama_penasihat'] ?></strong>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-5">TARAF PERKAHWINAN</label>
              <strong class="col-sm-9 col-7">: <?php echo $row_pemohon['apply_taraf_perkahwinan'] ?></strong>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-5">SEORANG PEROKOK/VAPE</label>
              <strong class="col-sm-9 col-7">: <?php echo $row_pemohon['apply_perokok'] ?></strong>
            </div>
              <h5 class="c-title">LATAR BELAKANG KELUARGA</h5>
              <div class="row mb-3">
              <label class="col-sm-3 col-5">NAMA KETUA KELUARGA</label>
              <strong class="col-sm-9 col-7">: <?php echo $row_pemohon['apply_nama_keluarga'] ?></strong>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-5">PEKERJAAN</label>
              <strong class="col-sm-9 col-7">: <?php echo $row_pemohon['apply_pekerjaan_keluarga'] ?></strong>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-5">HUBUNGAN</label>
              <strong class="col-sm-9 col-7">: <?php echo $row_pemohon['hubungan_name'] ?></strong>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-5">STATUS PERKAHWINAN</label>
              <strong class="col-sm-9 col-7">: <?php echo $row_pemohon['apply_status_perkahwinan_keluarga'] ?></strong>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-5">alamat SURAT MENYURAT</label>
              <strong class="col-sm-9 col-7">: <?php echo $row_pemohon['apply_alamat_keluarga'].' '.$row_pemohon['apply_alamat2_keluarga'] ?></strong>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-5">POSKOD</label>
              <strong class="col-sm-9 col-7">: <?php echo $row_pemohon['apply_poskod_keluarga'] ?></strong>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-5">BANDAR</label>
              <strong class="col-sm-9 col-7">: <?php echo $row_pemohon['apply_bandar_keluarga'] ?></strong>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-5">NEGERI</label>
              <strong class="col-sm-9 col-7">: <?php echo $row_pemohon['apply_negeri_keluarga'] ?></strong>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-5">NO TELEFON KETUA KELUARGA</label>
              <strong class="col-sm-9 col-7">: <?php echo $row_pemohon['apply_tel_keluarga'] ?></strong>
            </div>
            
            <h5 class="c-title">PENDAPATAN KELUARGA</h5>
            <div class="row mb-3">
              <label class="col-sm-3 col-5">JUMLAH PENDAPATAN BAPA SEBULAN</label>
              <strong class="col-sm-9 col-7">: <?php echo $row_pemohon['apply_pendapatan_bapa_sebulan'] ?></strong>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-5">JUMLAH PENDAPATAN IBU SEBULAN</label>
              <strong class="col-sm-9 col-7">: <?php echo $row_pemohon['apply_pendapatan_ibu_sebulan'] ?></strong>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-5">LAIN-LAIN PENDAPATAN SEBULAN</label>
              <strong class="col-sm-9 col-7">: <?php echo $row_pemohon['apply_pendapatan_lain_sebulan'] ?></strong>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-5">JUMLAH TANGGUNGAN KETUA KELUARGA</label>
              <strong class="col-sm-9 col-7">: <?php echo $row_pemohon['apply_jumlah_tanggungan'] ?></strong>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-5">JUMLAH TANGGUNGAN (OKU)</label>
              <strong class="col-sm-9 col-7">: <?php echo $row_pemohon['apply_jumlah_tanggungan_oku'] ?></strong>
            </div>
            
            <h5 class="c-title">MAKLUMAT BANTUAN KEWANGAN</h5>
            <div class="row mb-3">
              <label class="col-sm-3 col-5">TAJAAN KEWANGAN SEPANJANG PENGAJIAN</label>
              <strong class="col-sm-9 col-7">: <span class="tel-alert"><?php echo $row_pemohon['taja_name'] ?></span></strong>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-5">JUMLAH TAJAAN YANG DITERIMA SETIAP SEMESTER.</label>
              <strong class="col-sm-9 col-7">: <?php echo $row_pemohon['apply_jumlah_tajaan'] ?></strong>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-5">PERNAH MENERIMA BANTUAN ZAKAT UiTM</label>
              <strong class="col-sm-9 col-7">: <?php echo $row_pemohon['apply_terima_zakat'] ?></strong>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-5">STATUS KELAYAKAN HAD KIFAYAH</label>
              <strong class="col-sm-9 col-7">: <span class="tel-alert"><?php echo $row_pemohon['apply_kifayah'] ?></span></strong>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-5">SEBAB MEMERLUKAN ZAKAT INI</label>
              <strong class="col-sm-9 col-7">: <?php echo $row_pemohon['apply_sebab'] ?></strong>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-5">DOKUMEN SOKONGAN</label>
              <strong class="col-sm-9 col-7">: <a class="btn btn-sm btn-primary rounded-pill" href="<?= $row_pemohon['apply_document'] ?>" target="_blank">Lihat Dokumen</a></strong>
            </div>
          </div>
          </div>
          </div>
          
          <div class="col-12 d-flex">
            <div class="card-1">
              <div class="card-body">
            
            <h5 class="c-title2">PENILAIAN TEMUDUGA</h5>
            <form method="POST">

            <div class="row mb-3">
              <label class="col-sm-3 col-5">PILIH KATEGORI ASNAF PEMOHON</label>
              <strong class="col-sm-9 col-7">: 
                <div class="form-check form-check-inline">
                  <input type="radio" class="form-check-input" name="asnaf" value="FAKIR" required>
                  <label class="form-check-label">FAKIR</label>
                </div>
                <div class="form-check form-check-inline">
                  <input type="radio" class="form-check-input" name="asnaf" value="MISKIN" required>
                  <label class="form-check-label">MISKIN</label>
                </div>
                <div class="form-check form-check-inline">
                  <input type="radio" class="form-check-input" name="asnaf" value="BUKAN ASNAF" required>
                  <label class="form-check-label">BUKAN ASNAF</label>
                </div>
              </strong>
            </div>

            <div class="row mb-3">
              <label class="col-sm-3 col-5">TAHAP PENGAJIAN PEMOHON</label>
              <strong class="col-sm-9 col-7">: 
                <div class="form-check form-check-inline">
                  <input type="radio" class="form-check-input" name="pengajian" value="DIPLOMA" required>
                  <label class="form-check-label">DIPLOMA</label>
                </div>
                <div class="form-check form-check-inline">
                  <input type="radio" class="form-check-input" name="pengajian" value="IJAZAH" required>
                  <label class="form-check-label">IJAZAH</label>
                </div>
                <div class="form-check form-check-inline">
                  <input type="radio" class="form-check-input" name="pengajian" value="MASTER/PHD" required>
                  <label class="form-check-label">MASTER/PHD</label>
                </div>
              </strong>
            </div>

            <div class="row mb-3">
              <label class="col-sm-3 col-5">ADAKAH PEMOHON DITAJA?</label>
              <strong class="col-sm-9 col-7">: 
                <div class="form-check form-check-inline">
                  <input type="checkbox" class="form-check-input" name="pinjaman" value="YA">
                  <label class="form-check-label">YA</label>
                </div>
              </strong>
            </div>

            <div class="row mb-3">
              <label class="col-sm-3 col-5">ADAKAH PEMOHON ANAK YATIM ATAU OKU?</label>
              <strong class="col-sm-9 col-7">: 
                <div class="form-check form-check-inline">
                  <input type="checkbox" class="form-check-input" name="yatim" value="YA">
                  <label class="form-check-label">YA</label>
                </div>
              </strong>
            </div>

            <div class="row mb-3">
                  <div class="col-sm-3 col-5">
                  <label class="form-label">SILA MASUKKAN JUSTIFIKASI :</label>
                  </div>
                  <div class="col-sm-9 col-7">
                    <div class="d-flex">
                    <strong>:</strong>
                  <textarea class="form-control mx-2" style="height:100px" name="nota"></textarea>
                    </div>
                  </div>
                </div>
                
                <div class="col-12 text-center my-5">
                  <strong id="totalPrice"></strong>
                </div>

                <div class="col-12 text-center my-5">
                  <button type="submit" class="btn btn-primary" name="submit_nilai">HANTAR</button>
                  <a id="calculateButton" class="btn btn-dark">Lihat Jumlah</a>
                </div>
            </form>

          </div>
          </div>
          </div>
            
          </div>
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