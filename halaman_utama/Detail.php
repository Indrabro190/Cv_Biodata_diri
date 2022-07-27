<?php
require "config.php";
$id = $_GET['id'];

//m$m berdasarkan id
// $m = query("SELECT data_diri.*,keahlian.nama_keahlian,keahlian.keterangan FROM data_diri
// INNER JOIN keahlian ON data_diri.id_utama = keahlian.id_data_diri AND data_diri.id_utama = $id;");
// $m = query("SELECT data_diri.*,keahlian.nama_keahlian,keahlian.keterangan,pendidikan.riwayat_pendidikan,pendidikan.nama_pendidikan
// FROM data_diri INNER JOIN keahlian ON data_diri.id_utama = keahlian.id_utama
// INNER JOIN pendidikan ON data_diri.id_utama = pendidikan.id_utama AND data_diri.id_utama = $id;");
$m = query("SELECT * FROM data_diri WHERE data_diri.id_utama = $id");
$keahlian = query("SELECT nama_keahlian,keterangan FROM keahlian WHERE keahlian.id_utama = $id");
$pendidikan = query("SELECT riwayat_pendidikan,nama_pendidikan FROM pendidikan WHERE pendidikan.id_utama = $id");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>CV DataKaryawan</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- My CSS -->
  <link rel="stylesheet" href="../CSS/detail.css">
  <!-- End Of My CSS -->

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


  <!-- font awesome -->
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
  <!-- CSS bootstrap detail -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
  <!-- End CSS bootstrap detail -->

  <script src="jquery.min.js" type="text/javascript"></script>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script type="text/javascript" src="keahlian.js"></script>



</head>

<body style="background-color:#f1f2f6;">

  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="../assets/img/profile-img.jpg" alt="" class="img-fluid rounded-circle" style="height: 120px;">
        <h1 class="Japan" contenteditable="true"><a href="coba.php">Detail Data</a></h1>
        <div class="social-links mt-3 text-center">
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="youtube"><i class="bx bxl-youtube"></i></a>
        </div>
      </div>

      <nav id="navbar" class="nav-menu navbar" style="font-weight:900;">
        <ul>
          <li><a href="coba.php" class="nav-link"><i class="bx bx-arrow-back"></i>Kembali</a></li>
        </ul>
      </nav>
      <!-- .nav-menu -->
    </div>
  </header>
  <!-- End Header -->



  <main id="main">

    <br><br><br><br>
    <!-- Ukuran tabel -->
    <div class="col-xl-10" style="margin-left: 125px; margin:auto;">
      <!-- End ukuran tabel -->

      <!-- Account details card-->
      <div class="card mb-4" style="box-shadow: 1px 2px 5px black; ">
        <div class="card-header bg-info" style="color:#fff ; font-weight: 900; padding-left:10px;">Detail Data-Diri</div>
        <div class="card-body" style="background-color:#15262D;">
          <form class="row g-3 col-15" action="" method="POST">
            <div class="row gx-3 mb-3">
              <!-- Tabel Data Diri -->
              <div class="col-md-5" style="margin-left: 30px;">
                <label class="small mb-1" style="font-weight: 900;"><span>Nama :</span></label>
                <p><?= $m['Nama']; ?></p>

              </div>
              <div class="col-md-5" style="margin-left: 30px;">
                <label class="small mb-1" style="font-weight: 900; padding-left:80px;"><span>Tempat :</span></label>
                <p style="padding-left:80px;"><?= $m['Tempat']; ?></p>

              </div>
            </div>

            <div class="row gx-3 mb-3">
              <div class="col-md-5" style="margin-left: 30px;">
                <label class="small mb-1" style="font-weight: 900;"><span>Tgl lahir :</span></label>
                <p><?= $m['Tgl_lahir']; ?></p>

              </div>
              <div class="col-md-5" style="margin-left: 30px;">
                <label class="small mb-1" style="font-weight: 900; padding-left:80px;"><span>Jenis Kelamin :</span></label>
                <p style="padding-left:80px;"><?= $m['Jenis_Kelamin']; ?></p>

              </div>
            </div>

            <div class="row gx-3 mb-3">
              <div class="col-md-5" style="margin-left: 30px;">
                <label class="small mb-1" style="font-weight: 900;"><span>Gol Darah :</span></label>
                <p><?= $m['Gol_Darah']; ?></p>

              </div>
              <div class="col-md-5" style="margin-left: 30px;">
                <label class="small mb-1" style="font-weight: 900; padding-left:80px;"><span>Alamat :</span></label>
                <p style="padding-left:80px;"><?= $m['Alamat']; ?></p>

              </div>
            </div>

            <div class="row gx-3 mb-3">
              <div class="col-md-5" style="margin-left: 30px;">
                <label class="small mb-1" style="font-weight: 900;"><span>RT/RW :</span></label>
                <p><?= $m['RT_RW']; ?></p>

              </div>
              <div class="col-md-5" style="margin-left: 30px;">
                <label class="small mb-1" style="font-weight: 900; padding-left:80px;"><span>Kel/Desa :</span></label>
                <p style="padding-left:80px;"><?= $m['Kel_Desa']; ?></p>

              </div>
            </div>

            <div class="row gx-3 mb-3">
              <div class="col-md-5" style="margin-left: 30px;">
                <label class="small mb-1" style="font-weight: 900;"><span>Kecamatan :</span></label>
                <p><?= $m['Kecamatan']; ?></p>

              </div>
              <div class="col-md-5" style="margin-left: 30px;">
                <label class="small mb-1" style="font-weight: 900; padding-left:80px;"><span>Agama :</span></label>
                <p style="padding-left:80px;"><?= $m['Agama']; ?></p>
              </div>
            </div>

            <div class="row gx-3 mb-3">
              <div class="col-md-5" style="margin-left: 30px;">
                <label class="small mb-1" style="font-weight: 900;"><span>Status Perkawinan :</span></label>
                <p><?= $m['Status_Perkawinan']; ?></p>

              </div>
              <div class="col-md-5" style="margin-left: 30px;">
                <label class="small mb-1" style="font-weight: 900; padding-left:80px;"><span>Pekerjaan :</span></label>
                <p style="padding-left:80px;"><?= $m['Pekerjaan']; ?></p>

              </div>
            </div>

            <div class="row gx-3 mb-3">
              <div class="col-md-5" style="margin-left: 30px;">
                <label class="small mb-1" style="font-weight: 900;"><span>Kewarganegaraan :</span></label>
                <p><?= $m['Kewarganegaraan']; ?></p>

              </div>
              <div class="col-md-5" style="margin-left: 30px;">
                <label class="small mb-1" style="font-weight: 900; padding-left:80px;"><span>Divisi :</span></label>
                <p style="padding-left:80px;"><?= $m['Divisi']; ?></p>
              </div>

            </div>
            <br><br><br>

            <!-- Tabel keahlian -->
            <!-- Ukuran tabel -->

            <!-- End ukuran tabel -->

            <!-- Account card-->

            <!-- <div class="card-header bg-secondary" style="color:#fff ; font-weight: 900; padding-left:41%;">Keahlian</div> -->
            <hr>
            <div class="row gx-3 mb-3">
              <div class="col-md-5" style="margin-left: 30px;">
                <label class="small mb-1" style="font-weight: 900;"><span>Nama Keahlian :</span></label>
                <?php for ($i = 0; $i < sizeof($keahlian); $i++) { ?>
                  <p><?= $keahlian[$i]['nama_keahlian']; ?></p>
                <?php } ?>
              </div>
              <div class="col-md-5" style="margin-left: 30px;">
                <label class="small mb-1" style="font-weight: 900; padding-left:80px;"><span>keterangan :</span></label>
                <?php for ($i = 0; $i < sizeof($keahlian); $i++) { ?>
                  <p style="padding-left:80px;"><?= $keahlian[$i]['keterangan']; ?></p>
                <?php } ?>
              </div>
            </div>


            <br><br><br><br><br>
            <!-- Ukuran tabel -->
            <!-- End ukuran tabel -->

            <!-- Account details card-->

            <!-- <div class="card-header bg-info" style="color:#fff ; font-weight: 900; padding-left:41%;">Pendidikan</div> -->
            <hr>
            <div class="row gx-3 mb-3">
              <div class="col-md-5" style="margin-left: 30px;">
                <label class="small mb-1" style="font-weight: 900;"><span>Riwayat Pendidikan :</span></label>
                <?php for ($i = 0; $i < sizeof($pendidikan); $i++) { ?>
                  <p><?= $pendidikan[$i]['riwayat_pendidikan']; ?></p>
                <?php } ?>
              </div>
              <div class="col-md-5" style="margin-left: 30px;">
                <label class="small mb-1" style="font-weight: 900; padding-left:80px;"><span>Nama Pendidikan :</span></label>
                <?php for ($i = 0; $i < sizeof($pendidikan); $i++) { ?>
                  <p style="padding-left:80px;"><?= $pendidikan[$i]['nama_pendidikan']; ?></p>
                <?php } ?>
              </div>
            </div>
            <div class="ubah" style="margin-left: 30px;">
              <button type="button" class="btn btn-primary"><a href="ubah.php?id=<?= $m['id_utama']; ?>"><i class="bx bxs-calendar-edit" style="color: #fff;">Ubah Data</i></a></button>
            </div>

            <!-- End Tabel pendidikan -->

          </form>
        </div>
      </div>
    </div>

    <!-- End Tabel Data Diri -->
    <br><br><br><br><br><br>




    <!-- End Tabel keahlian -->





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Vendor JS Files -->
    <script src="../assets/vendor/purecounter/purecounter.js"></script>
    <script src="../assets/vendor/aos/aos.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../assets/vendor/typed.js/typed.min.js"></script>
    <script src="../assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>

</body>

</html>