<?php
require './koneksi/config.php';
// $biodata = query("SELECT * FROM data_diri");

//tombol cari ditekan
//pagination
//konfigurasi
$jumlahDataPerHalaman = 5;
$jumlahData = count(query("SELECT * FROM data_diri"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanaktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
// halaman = 2 awal data = 3
$awaldata = ($jumlahDataPerHalaman * $halamanaktif) - $jumlahDataPerHalaman;
$biodata = query("SELECT * FROM data_diri LIMIT $awaldata, $jumlahDataPerHalaman");
if (isset($_POST["Search"])) {
  $biodata = Search2($_POST["keyword"]);
}
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
  <link rel="stylesheet" href="../CSS/coba.css">
  <!-- End Of My CSS -->

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="stylesheet" href="../assets/font-awesome-4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
  <!-- Link font dashboard -->
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/litepicker/dist/css/litepicker.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>




</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="../assets/img/profile-img.jpg" alt="" class="img-fluid rounded-circle" style="height: 120px;">
        <h1 contenteditable="true" class="Japan" style="font-size: 20px;"><a href="coba.php">Halaman Utama</a></h1>
        <div class="social-links mt-3 text-center">
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="youtube"><i class="bx bxl-youtube"></i></a>
          <a href="#" class="github"><i class="fa fa-github" aria-hidden="true"></i></a>
        </div>
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="#dashboard" class="nav-link scrollto active"><i class="bx bxs-dashboard"></i> <span>Dashboard</span></a></li>
          <li><a href="#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>Daftar Karyawan</span></a></li>

          <!-- <li><a href="#services" class="nav-link scrollto"><i class="bx bx-server"></i> <span>Services</span></a></li> -->
          <li><a href="login.php" class="nav-link"><i class="bx bx-exit"></i> <span>LogOut</span></a></li>

        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->


  <main id="main" style="background-color: #060c21;">

    <!-- ======= Hero Section ======= -->
    <div id="hero" class="d-flex flex-column justify-content-center align-items-center bg-info" data-aos="fade-in" style="height: 720px ; color:#fff;">
      <h1>Hallo,Selamat Datang</h1>

      <p><span class="typed" data-typed-items="di Website ini,Silahkan lihat-lihat"></span></p>
    </div>
    <!-- End Hero -->

    <!-- Dashboard -->
    <section id="dashboard" class="dashboard">
      <div class="col-3 mt-4" style="margin-left: 12px; text-shadow:2px 2px 2px red;">
        <h1 class="page-header-title text-light" style="padding-left: 12px;">
          <div class="page-header-icon"><i data-feather="activity"></i></div>
          Dashboard
        </h1>
      </div>
      <div class="row" style="margin:10px;">
        <div class="col-lg-6 col-xl-3 mb-4 mt-5">
          <div class="card bg-primary text-white h-100">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center">
                <div class="me-3">
                  <div class="text-white-75 small">Jumlah karyawan<i class="bx bx-news" style="margin-left: 20px; font-size:30px;"></i></div>
                  <div class="text-lg fw-bold">
                    <?php

                    require './koneksi/dbconfig.php';
                    $query = "SELECT  id_utama FROM data_diri ORDER BY id_utama";
                    $query_run = mysqli_query($conn, $query);

                    $row = mysqli_num_rows($query_run);

                    echo '<h2> ' . $row . '</h2>';

                    ?>
                  </div>
                </div>
                <i class="feather-xl text-white-50" data-feather="calendar"></i>
              </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between small">
              <a class="text-white stretched-link" href="#">View Report</a>
              <div class="text-white"><i class="fa fa-arrow-right" aria-hidden="true"></i></div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-xl-3 mb-4 mt-5">
          <div class="card bg-warning text-white h-100">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center">
                <div class="me-3">
                  <div class="text-white-75 small">Laki-laki<i class="bx bx-male" style="margin-left: 20px; font-size:30px;"></i></div>
                  <div class="text-lg fw-bold">
                    <?php

                    require './koneksi/dbconfig.php';
                    $query = "SELECT Jenis_Kelamin FROM data_diri WHERE Jenis_Kelamin = 'Laki-laki'";
                    $query_run = mysqli_query($conn, $query);

                    $row = mysqli_num_rows($query_run);

                    echo '<h2> ' . $row . '</h2>';

                    ?>
                  </div>
                </div>
                <i class="feather-xl text-white-50" data-feather="dollar-sign"></i>
              </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between small">
              <a class="text-white stretched-link" href="#">View Report</a>
              <div class="text-white"><i class="fa fa-arrow-right" aria-hidden="true"></i></div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-xl-3 mb-4 mt-5">
          <div class="card bg-success text-white h-100">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center">
                <div class="me-3">
                  <div class="text-white-75 small">Perempuan<i class="bx bx-female" style="margin-left: 20px; font-size:30px;"></i></div>
                  <div class="text-lg fw-bold">
                    <?php

                    require './koneksi/dbconfig.php';
                    $query = "SELECT Jenis_kelamin FROM data_diri WHERE Jenis_Kelamin = 'Perempuan'";
                    $query_run = mysqli_query($conn, $query);

                    $row = mysqli_num_rows($query_run);

                    echo '<h2> ' . $row . '</h2>';

                    ?>


                  </div>
                </div>
                <i class="feather-xl text-white-50" data-feather="check-square"></i>
              </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between small">
              <a class="text-white stretched-link" href="#">View Tasks</a>
              <div class="text-white"><i class="fa fa-arrow-right" aria-hidden="true"></i></div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-xl-3 mb-4 mt-5">
          <div class="card bg-danger text-white h-100">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center">
                <div class="me-3">
                  <div class="text-white-75 small">Karyawan WNI<i class="fa fa-home" aria-hidden="true" style="margin-left: 20px; font-size:30px;"></i></div>
                  <div class="text-lg fw-bold">
                    <?php

                    require './koneksi/dbconfig.php';
                    $query = "SELECT Kewarganegaraan FROM data_diri WHERE Kewarganegaraan = 'WNI'";
                    $query_run = mysqli_query($conn, $query);

                    $row = mysqli_num_rows($query_run);

                    echo '<h2> ' . $row . '</h2>';

                    ?>


                  </div>
                </div>
                <i class="feather-xl text-white-50" data-feather="check-square"></i>
              </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between small">
              <a class="text-white stretched-link" href="#">View Tasks</a>
              <div class="text-white"><i class="fa fa-arrow-right" aria-hidden="true"></i></div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-xl-3 mb-4 mt-5">
          <div class="card bg-secondary text-white h-100">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center">
                <div class="me-3">
                  <div class="text-white-75 small">Karyawan WNA<i class="fa fa-home" aria-hidden="true" style="margin-left: 20px; font-size:30px;"></i></div>
                  <div class="text-lg fw-bold">
                    <?php

                    require './koneksi/dbconfig.php';
                    $query = "SELECT Kewarganegaraan FROM data_diri WHERE Kewarganegaraan = 'WNA'";
                    $query_run = mysqli_query($conn, $query);

                    $row = mysqli_num_rows($query_run);

                    echo '<h2> ' . $row . '</h2>';

                    ?>


                  </div>
                </div>
                <i class="feather-xl text-white-50" data-feather="check-square"></i>
              </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between small">
              <a class="text-white stretched-link" href="#">View Tasks</a>
              <div class="text-white"><i class="fa fa-arrow-right" aria-hidden="true"></i></div>
            </div>
          </div>
        </div>
              </div>
    </section>
    <!-- End Dashbourd -->
    <br><br><br><br><br><br><br>

    <!-- ======= Daftar Karyawan Section ======= -->
    <section class="about">
      <div class="container" style="margin-top: 20px;">
        <div class="row">
          <div class="col-md-12">
            <h2  id="about" class="Japan" style="text-align: center; margin-bottom: 30px; font-weight:900; font-size:30px; color:#D7CD12; text-shadow: 2px 2px 2px #fff;">BIO<span>DATA</span> <strong>DIRI</strong></h2>
            <!-- tombol tambah data -->
            <!-- <button id="button" class="custom-btn-2 btn-9-2"><i class="bx bxs-user-plus"></i><a href="tambah.php">Tambah</a></button> -->
            <div id="Tombol">
              <a href="tambah.php" style="--clr:#ff1867" class="tambah"><span>Tambah</span><i></i></a>
            </div>
            <div class="export">
            <a href="export.php"><i class="fa fa-print" aria-hidden="true" title="Print Daftar Karyawan"></i></a>
            </div>
            <!-- end tombol tambah data -->
            <form class="d-flex" action="" method="POST" style="width: 30%;">
              <input class="form-control me-2" type="search" name="keyword" placeholder="Search" autofocus autocomplete="off">
              <button class="btn btn-outline-danger" type="submit" name="Search">Search</button>
            </form>
            <br>
            <table class="table table-striped table-bordered" cellspacing="0" width="100%" style="margin:auto;">
              <thead>
                <tr style="background-color: #3498db;">
                  <th style="text-align:center ;">No</th>
                  <!-- <th style="text-align:center ;">id</th> -->
                  <th style="text-align:center ;">Nama</th>
                  <th style="text-align:center ;">Tempat</th>
                  <th style="text-align:center ;">Tgl_lahir</th>




                  <th colspan="2" style="text-align:center ;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1;

                foreach ($biodata as $m) : ?>
                  <tr align="center">
                    <td style="text-align:center ; color:black; font-weight:900;"><?= $i++; ?></td>

                    <td style="text-align:center ; color:black; font-weight:900;"><?= $m['Nama']; ?></td>
                    <td style="text-align:center ; color:black; font-weight:900;"><?= $m['Tempat']; ?></td>
                    <td style="text-align:center ; color:black; font-weight:900;"><?= $m['Tgl_lahir']; ?></td>



                    <td align="center">
                      <button type="button" class="btn btn-primary"><a href="ubah.php?id=<?= $m['id_utama']; ?>"><i class="bx bxs-calendar-edit" style="color: #fff;" title="Ubah Data"></i></a></button>
                      |
                      <button type="button" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?.')"><a href="delete.php?id=<?= $m['id_utama']; ?>"><i class="bx bxs-trash" style="color: #fff;" title="Hapus Data"></i></a></button>
                      |
                      <button type="button" class="btn btn-warning"><a href="Detail.php?id=<?= $m['id_utama']; ?>" style="color: #fff;" title="Detail Karyawan">Detail</a></button>
                    </td>
                  <?php endforeach; ?>
                  </tr>
              </tbody>

              <nav aria-label="Page navigation example">
                <ul class="pagination">
                  <?php for ($i  = 1; $i <= $jumlahHalaman; $i++) : ?>
                    <?php if ($i == $halamanaktif) : ?>
                      <li class="page-item active"> <a class="page-link" href="?halaman=<?= $i; ?>" style="font-weight:bold; text-decoration:none; color:white;"><?= $i; ?></a></li>
                    <?php else : ?>
                      <li class="page-item"><a class="page-link" href="?halaman=<?= $i; ?>" style="text-decoration:none; "><?= $i; ?></a></li>
                    <?php endif; ?>
                  <?php endfor; ?>
                </ul>
              </nav>
            </table>

          </div>

        </div>

      </div>


      </form>

      </div>
    </section><!-- End Daftar Karyawan Section -->
    <br><br><br><br><br>

  </main>
  <!-- End #main -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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