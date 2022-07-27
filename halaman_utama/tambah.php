<?php
require 'config.php';
//koneksi ke DBMS
// $conn = mysqli_connect("localhost","root","","biodata_diri");
//cek apakah tombol tambah sudah ditekan atau belum
if (isset($_POST['tambah'])) {
  if (tambah($_POST) > 0) {
  //   echo "<script>
  //       alert('data berhasil ditambahkan!');
  //       document.location.href = 'coba.php';
  //       </script>";
  // } else {
  //   echo "<script>
  //       alert('data gagal ditambahkan!');
  //       document.location.href = 'coba.php';
  //       </script>";
  }
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
  <link rel="stylesheet" href="../CSS/tambah.css">
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
        <h1 class="Japan" contenteditable="true"><a href="coba.php">Tambah Data</a></h1>
        <div class="social-links mt-3 text-center">
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="youtube"><i class="bx bxl-youtube"></i></a>
        </div>
      </div>

      <nav id="navbar" class="nav-menu navbar" style="font-weight:900;">
        <ul>
          <li><a href="coba.php" class="nav-link"><i class="fa fa-reply" aria-hidden="true" style="font-size: 20px;"></i><span>Kembali</span></a></li>
        </ul>
      </nav>
      <!-- .nav-menu -->
    </div>
  </header>
  <!-- End Header -->



  <main id="main">


    <!-- Ukuran tabel -->
    <div class="col-xl-12">
      <!-- End ukuran tabel -->

      <!-- Account details card-->
      <div class="card mb-4" id="1" style="box-shadow: 1px 2px 5px black; margin:0; padding:0;">
        <div class="card-header bg-info" style="color:#fff ; font-weight: 900; padding-left:41%;">Data-Diri</div>
        <div class="card-body" style="background-color:#34495e;">
          <form class="row g-3" action="" method="POST">
            <div class="row gx-3 mb-3">
              <div class="row">
                <div class="col" style="padding-left: 50px;">
                  <label class="small mb-1" style="font-weight: 900;">Masukkan Nama :</label>
                  <input class="form-control" style="background-color: #bdc3c7;" name="Nama" value="" required>
                </div>
                <div class="col" style="padding-left: 50px;">
                  <label class="small mb-1" style="font-weight: 900;">Tempat :</label>
                  <input class="form-control" style="background-color: #bdc3c7;" name="Tempat" value="" required>
                </div>
              </div>
              <div class="row">
                <div class="col" style="padding-left: 50px;">
                  <label class="small mb-1" style="font-weight: 900;">Tanggal lahir :</label>
                  <input type="date" class="form-control" style="background-color: #bdc3c7;" name="Tgl_lahir" value="" required>
                </div>
                <div class="col" style="padding-left: 50px;">
                  <label class="small mb-1" style="font-weight: 900;">Jenis Kelamin :</label>
                  <select class="form-select" style="background-color: #bdc3c7; padding:8px;" name="Jenis_Kelamin" required>
                    <option selected disabled value="" style="font-size:12px;">Pilih</option>
                    <option style="font-size: 12px;">Laki-laki</option>
                    <option style="font-size: 12px;">Perempuan</option>
                  </select>

                </div>
              </div>
              <div class="row">
                <div class="col" style="padding-left: 50px;">
                  <label class="small mb-1" style="font-weight: 900;">Gol Darah :</label>
                  <input class="form-control" style="background-color: #bdc3c7;" name="Gol_Darah" value="">
                </div>
                <div class="col" style="padding-left: 50px;">
                  <label class="small mb-1" style="font-weight: 900;">Alamat :</label>
                  <input class="form-control" style="background-color: #bdc3c7;" name="Alamat" value="" required>
                </div>
              </div>
              <div class="row">
                <div class="col" style="padding-left: 50px;">
                  <label class="small mb-1" style="font-weight: 900;">RT/RW :</label>
                  <input class="form-control" style="background-color: #bdc3c7;" name="RT_RW" value="" required>
                </div>
                <div class="col" style="padding-left: 50px;">
                  <label class="small mb-1" style="font-weight: 900;">Kel/Desa :</label>
                  <input class="form-control" style="background-color: #bdc3c7;" name="Kel_Desa" value="" required>
                </div>
              </div>
              <div class="row">
                <div class="col" style="padding-left: 50px;">
                  <label class="small mb-1" style="font-weight: 900;">Kecamatan :</label>
                  <input class="form-control" style="background-color: #bdc3c7;" name="Kecamatan" value="" required></input>
                </div>
                <div class="col" style="padding-left: 50px;">
                  <label class="small mb-1" style="font-weight: 900;">Agama :</label>
                  <input class="form-control" style="background-color: #bdc3c7;" name="Agama" value="" required>
                </div>
              </div>
              <div class="row">
                <div class="col" style="padding-left: 50px;">
                  <label class="small mb-1" style="font-weight: 900;">Status Perkawinan :</label>
                  <select class="form-select" style="background-color: #bdc3c7; padding:8px;" name="Status_Perkawinan" required>
                    <option selected disabled value="">Pilih</option>
                    <option style="font-size: 12px;">Nikah</option>
                    <option style="font-size: 12px;">Belum Nikah</option>
                  </select>
                </div>
                <div class="col" style="padding-left: 50px;">
                  <label class="small mb-1" style="font-weight: 900;">Pekerjaan :</label>
                  <input class="form-control" style="background-color: #bdc3c7;" name="Pekerjaan" value="" required>
                </div>
              </div>
              <div class="row">
                <div class="col-6" style="padding-left: 50px;">
                  <label class="small mb-1" style="font-weight: 900;">Kewarganegaraan :</label>
                  <input class="form-control" style="background-color: #bdc3c7;" name="Kewarganegaraan" value="" required>
                </div>
                <div class="col" style="padding-left: 50px;">
                  <label class="small mb-1" style="font-weight: 900;">Divisi :</label>
                  <select class="form-select" style="background-color: #bdc3c7; padding:8px;" name="Divisi" required>
                    <option selected disabled value="">Pilih</option>
                    <option style="font-size: 12px;">P1</option>
                    <option style="font-size: 12px;">P2</option>
                    <option style="font-size: 12px;">Particle Board</option>
                    <option style="font-size: 12px;">HR GA</option>
                    <option style="font-size: 12px;">Accounting</option>
                    <option style="font-size: 12px;">IT</option>
                    <option style="font-size: 12px;">Shipping</option>
                    <option style="font-size: 12px;">Logistik</option>
                    <option style="font-size: 12px;">Logpond</option>
                    <option style="font-size: 12px;">Plantation</option>
                    <option style="font-size: 12px;">Marketing</option>
                    <option style="font-size: 12px;">PLJ</option>
                    <option style="font-size: 12px;">R&D</option>
                    <option style="font-size: 12px;">TPM</option>
                    <option style="font-size: 12px;">Sawmill</option>
                    <option style="font-size: 12px;">KL</option>
                    <option style="font-size: 12px;">Engineering</option>
                    <option style="font-size: 12px;">QA</option>
                  </select>
                </div>
              </div>
              <br><br><br><br><br><br><br><br><br><br>

              <!-- Tabel keahlian -->
              <!-- Ukuran tabel -->

              <!-- End ukuran tabel -->

              <!-- Account card-->

              <div class="card-header bg-info" style="color:#fff ; font-weight: 900; padding-left:47%;" style="margin-right: 0;">Keahlian</div>

              <div class="row">
                <div class="col" style="padding-left: 50px;">
                  <label class="small mb-1" style="font-weight: 900;">Nama Keahlian :</label>
                  <input class="form-control" style="background-color: #bdc3c7;" name="nama_keahlian1" value="" required></input>
                </div>
                <div class="col" style="padding-left: 50px;">
                  <label class="small mb-1" style="font-weight: 900;">keterangan :</label>
                  <input class="form-control" style="background-color: #bdc3c7;" name="keterangan1" value="" required></input>
                </div>
              </div>
              <div class="row">
                <div class="col" style="padding-left: 50px;">
                  <label class="small mb-1" style="font-weight: 900;"></label>
                  <input class="form-control" style="background-color: #bdc3c7;" name="nama_keahlian2" value="" required></input>
                </div>
                <div class="col" style="padding-left: 50px;">
                  <label class="small mb-1" style="font-weight: 900;"></label>
                  <input class="form-control" style="background-color: #bdc3c7;" name="keterangan2" value="" required></input>
                </div>
              </div>
              <div class="row">
                <div class="col" style="padding-left: 50px;">
                  <label class="small mb-1" style="font-weight: 900;"></label>
                  <input class="form-control" style="background-color: #bdc3c7;" name="nama_keahlian3" value="" required></input>
                </div>
                <div class="col" style="padding-left: 50px;">
                  <label class="small mb-1" style="font-weight: 900;"></label>
                  <input class="form-control" style="background-color: #bdc3c7;" name="keterangan3" value="" required></input>
                </div>
              </div>
              <div class="row">
                <div class="col" style="padding-left: 50px;">
                  <label class="small mb-1" style="font-weight: 900;"></label>
                  <input class="form-control" style="background-color: #bdc3c7;" name="nama_keahlian4" value="" required></input>
                </div>
                <div class="col" style="padding-left: 50px;">
                  <label class="small mb-1" style="font-weight: 900;"></label>
                  <input class="form-control" style="background-color: #bdc3c7;" name="keterangan4" value="" required></input>
                </div>
              </div>
              <div class="row">
                <div class="col" style="padding-left: 50px;">
                  <label class="small mb-1" style="font-weight: 900;"></label>
                  <input class="form-control" style="background-color: #bdc3c7;" name="nama_keahlian5" value="" required></input>
                </div>
                <div class="col" style="padding-left: 50px;">
                  <label class="small mb-1" style="font-weight: 900;"></label>
                  <input class="form-control" style="background-color: #bdc3c7;" name="keterangan5" value="" required></input>
                </div>
              </div>


              <!--Tabel Pendidikan -->
              <br><br><br><br><br><br><br><br>
              <!-- Ukuran tabel -->
              <!-- End ukuran tabel -->

              <!-- Account details card-->

              <div class="card-header bg-info" style="color:#fff ; font-weight: 900; padding-left:47%;" style="margin-right: 0;">Pendidikan</div>

              <div class="row">
                <div class="col" style="padding-left: 50px;">
                  <label class="small mb-1" style="font-weight: 900;">Riwayat Pendidikan :</label>
                  <input class="form-control" style="background-color: #bdc3c7;" name="riwayat_pendidikan1"></input>
                </div>
                <div class="col" style="padding-left: 50px;">
                  <label class="small mb-1" style="font-weight: 900;">Nama Pendidikan :</label>
                  <input class="form-control" style="background-color: #bdc3c7;" name="nama_pendidikan1"></input>
                </div>
              </div>
              <div class="row">
                <div class="col" style="padding-left: 50px;">
                  <label class="small mb-1" style="font-weight: 900;"></label>
                  <input class="form-control" style="background-color: #bdc3c7;" name="riwayat_pendidikan2"></input>
                </div>
                <div class="col" style="padding-left: 50px;">
                  <label class="small mb-1" style="font-weight: 900;"></label>
                  <input class="form-control" style="background-color: #bdc3c7;" name="nama_pendidikan2"></input>
                </div>
              </div>
              <div class="row">
                <div class="col" style="padding-left: 50px;">
                  <label class="small mb-1" style="font-weight: 900;"></label>
                  <input class="form-control" style="background-color: #bdc3c7;" name="riwayat_pendidikan3"></input>
                </div>
                <div class="col" style="padding-left: 50px;">
                  <label class="small mb-1" style="font-weight: 900;"></label>
                  <input class="form-control" style="background-color: #bdc3c7;" name="nama_pendidikan3"></input>
                </div>
              </div>
              <div class="row">
                <div class="col" style="padding-left: 50px;">
                  <label class="small mb-1" style="font-weight: 900;"></label>
                  <input class="form-control" style="background-color: #bdc3c7;" name="riwayat_pendidikan4"></input>
                </div>
                <div class="col" style="padding-left: 50px;">
                  <label class="small mb-1" style="font-weight: 900;"></label>
                  <input class="form-control" style="background-color: #bdc3c7;" name="nama_pendidikan4"></input>
                </div>
              </div>
              <div class="row">
                <div class="col" style="padding-left: 50px;">
                  <label class="small mb-1" style="font-weight: 900;"></label>
                  <input class="form-control" style="background-color: #bdc3c7;" name="riwayat_pendidikan5"></input>
                </div>
                <div class="col" style="padding-left: 50px;">
                  <label class="small mb-1" style="font-weight: 900;"></label>
                  <input class="form-control" style="background-color: #bdc3c7;" name="nama_pendidikan5"></input>
                </div>
              </div>

              <div class="col-12" style="margin-left: 35px; margin-top:20px;">
                <button class="btn btn-primary" type="submit" name="tambah"><a href="stokbarang.php">Tambah Data</a></button>
              </div>


              <!-- End Tabel pendidikan -->
            </div>
          </form>
        </div>
      </div>
    </div>
    </div>

    <!-- End Tabel Data Diri -->



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