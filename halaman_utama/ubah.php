<?php
require 'config.php';

//ambil id dari url
$id = $_GET['id'];

//m$m berdasarkan id
// $m = query("SELECT data_diri.*,keahlian.nama_keahlian,keahlian.keterangan,pendidikan.riwayat_pendidikan,pendidikan.nama_pendidikan
// FROM data_diri
// INNER JOIN keahlian ON data_diri.id_utama = keahlian.id_utama
// INNER JOIN pendidikan ON data_diri.id_utama = pendidikan.id_utama AND data_diri.id_utama = $id;");
$m = query("SELECT * FROM data_diri WHERE data_diri.id_utama = $id");
$keahlian = query("SELECT id_keahlian,nama_keahlian,keterangan FROM keahlian WHERE keahlian.id_utama = $id");
$pendidikan = query("SELECT id_pendidikan,riwayat_pendidikan,nama_pendidikan FROM pendidikan WHERE pendidikan.id_utama = $id");

//pastikan tombol ubah sudah ditekan
if (isset($_POST['ubah'])) {
  if (ubah($_POST, $id) > 0) {
    echo "<script>
             alert('data berhasil diubah1');
             document.location.href = 'coba.php';
            </script>";
  } else {
    echo "<script>
    alert('data berhasil diubah2');
    document.location.href = 'coba.php';
   </script>";
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
  <link rel="stylesheet" href="../CSS/coba.css">
  <!-- End Of My CSS -->

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">


  <!-- Google Fonts -->
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

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">


</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header =======-->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="../assets/img/profile-img.jpg" alt="" class="img-fluid rounded-circle" style="height: 120px;">
        <h1 class="Japan" contenteditable="true"><a href="coba.php">Ubah Data</a></h1>
        <div class="social-links mt-3 text-center">
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="youtube"><i class="bx bxl-youtube"></i></a>
        </div>
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>

          <li><a href="coba.php" class="nav-link"><i class="bx bx-arrow-back"></i> <span>Kembali</span></a></li>

        </ul>
      </nav>.
      <!--nav-menu -->
    </div>
  </header>
  <!-- End Header -->



  <main id="main">

    <body style="background-color:aquamarine;">
      <!-- Ukuran tabel -->
      <div class="col-xl-12">
        <!-- End ukuran tabel -->

        <!-- Account details card-->
        <div class="card mb-4" id="1" style="box-shadow: 1px 2px 5px black;">
          <div class="card-header" style="color:#fff ; background-color:#8E6AEB; font-weight: 900; padding-left:45%;">Data-Diri</div>
          <div class="card-body" style="background-color:#34495e;">
            <form class="row g-3" action="" method="POST">
              <div class="row gx-3 mb-3">
                <!-- Tabel Data Diri -->
                <div class="row">
                  <div class="col" style="padding-left: 50px;">
                    <label class="small mb-1" style="font-weight: 900;">Masukkan Nama :</label>
                    <input class="form-control" style="background-color: #bdc3c7; display:flex; justify-content:center; align-items:center;" name="Nama" required value="<?= $m['Nama']; ?>">
                  </div>
                  <div class="col" style="padding-left: 50px;">
                    <label class="small mb-1" style="font-weight: 900;">Tempat :</label>
                    <input class="form-control" style="background-color: #bdc3c7; display:flex; justify-content:center; align-items:center;" name="Tempat" required value="<?= $m['Tempat']; ?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col" style="padding-left: 50px;">
                    <label class="small mb-1" style="font-weight: 900;">Tanggal lahir</label>
                    <input type="date" class="form-control" style="background-color: #bdc3c7; display:flex; justify-content:center; align-items:center;" name="Tgl_lahir" required value="<?= $m['Tgl_lahir']; ?>">
                  </div>
                  <div class="col" style="padding-left: 50px;">
                    <label class="small mb-1" style="font-weight: 900;">Jenis Kelamin</label>
                    <select class="form-select" style="background-color: #bdc3c7; padding:8px;" name="Jenis_Kelamin" id="validationTooltip04" required>
                      <option selected disabled value="<?= $m['Jenis_Kelamin']; ?>">Pilih</option>
                      <option style="font-size: 12px;" <?= $m['Jenis_Kelamin'] == 'Laki-laki' ? 'selected' : ''; ?>>Laki-laki</option>
                      <option style="font-size: 12px;" <?= $m['Jenis_Kelamin'] == 'Perempuan' ?  'selected' : ''; ?>>Perempuan</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col" style="padding-left: 50px;">
                    <label class="small mb-1" style="font-weight: 900;">Gol Darah</label>
                    <input class="form-control" style="background-color: #bdc3c7; display:flex; justify-content:center; align-items:center;" name="Gol_Darah" required value="<?= $m['Gol_Darah']; ?>">
                  </div>
                  <div class="col" style="padding-left: 50px;">
                    <label class="small mb-1" style="font-weight: 900;">Alamat</label>
                    <input class="form-control" style="background-color: #bdc3c7; display:flex; justify-content:center; align-items:center;" name="Alamat" required value="<?= $m['Alamat']; ?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col" style="padding-left: 50px;">
                    <label class="small mb-1" style="font-weight: 900;">RT/RW</label>
                    <input class="form-control" style="background-color: #bdc3c7; display:flex; justify-content:center; align-items:center;" name="RT_RW" required value="<?= $m['RT_RW']; ?>">
                  </div>
                  <div class="col" style="padding-left: 50px;">
                    <label class="small mb-1" style="font-weight: 900;">Kel/Desa</label>
                    <input class="form-control" style="background-color: #bdc3c7; display:flex; justify-content:center; align-items:center;" name="Kel_Desa" required value="<?= $m['Kel_Desa']; ?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col" style="padding-left: 50px;">
                    <label class="small mb-1" style="font-weight: 900;">Kecamatan</label>
                    <input class="form-control" style="background-color: #bdc3c7; display:flex; justify-content:center; align-items:center;" name="Kecamatan" required value="<?= $m['Kecamatan']; ?>">
                  </div>
                  <div class="col" style="padding-left: 50px;">
                    <label class="small mb-1" style="font-weight: 900;">Agama</label>
                    <input class="form-control" style="background-color: #bdc3c7; display:flex; justify-content:center; align-items:center;" name="Agama" required value="<?= $m['Agama']; ?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col" style="padding-left: 50px;">
                    <label class="small mb-1" style="font-weight: 900;">Status_Perkawinan</label>
                    <select class="form-select" style="background-color: #bdc3c7; padding:8px;" name="Status_Perkawinan" id="validationTooltip04" required>
                      <option selected disabled value="<?= $m['Status_Perkawinan']; ?>">Pilih</option>
                      <option style="font-size: 12px;" <?= $m['Status_Perkawinan'] == 'Nikah' ? 'selected' : ''; ?>>Nikah</option>
                      <option style="font-size: 12px;" <?= $m['Status_Perkawinan'] == 'Belum Nikah' ? 'selected' : ''; ?>>Belum Nikah</option>
                    </select>

                  </div>
                  <div class="col" style="padding-left: 50px;">
                    <label class="small mb-1" style="font-weight: 900;">Pekerjaan</label>
                    <input class="form-control" style="background-color: #bdc3c7; display:flex; justify-content:center; align-items:center;" name="Pekerjaan" required value="<?= $m['Pekerjaan']; ?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-6" style="padding-left: 50px;">
                    <label class="small mb-1" style="font-weight: 900;">Kewarganegaraan</label>
                    <input class="form-control" style="background-color: #bdc3c7; display:flex; justify-content:center; align-items:center;" name="Kewarganegaraan" required value="<?= $m['Kewarganegaraan']; ?>">
                  </div>
                  <div class="col" style="padding-left: 50px;">
                    <label class="small mb-1" style="font-weight: 900;">Divisi</label>
                    <select class="form-select" style="background-color: #bdc3c7; padding:8px;" name="Divisi" id="validationTooltip04" required>
                      <option selected disabled value="<?= $m['Divisi']; ?>">Pilih</option>
                      <option style="font-size: 12px;" <?= $m['Divisi'] == 'P1' ? 'selected' : ''; ?>>P1</option>
                      <option style="font-size: 12px;" <?= $m['Divisi'] == 'P2' ? 'selected' : ''; ?>>P2</option>
                      <option style="font-size: 12px;" <?= $m['Divisi'] == 'Particle Board' ? 'selected' : ''; ?>>Particle Board</option>
                      <option style="font-size: 12px;" <?= $m['Divisi'] == 'HR GA' ? 'selected' : ''; ?>>HR GA</option>
                      <option style="font-size: 12px;" <?= $m['Divisi'] == 'Accounting' ? 'selected' : ''; ?>>Accounting</option>
                      <option style="font-size: 12px;" <?= $m['Divisi'] == 'IT' ? 'selected' : ''; ?>>IT</option>
                      <option style="font-size: 12px;" <?= $m['Divisi'] == 'Shipping' ? 'selected' : ''; ?>>Shipping</option>
                      <option style="font-size: 12px;" <?= $m['Divisi'] == 'Logistik' ? 'selected' : ''; ?>>Logistik</option>
                      <option style="font-size: 12px;" <?= $m['Divisi'] == 'Logpond' ? 'selected' : ''; ?>>Logpond</option>
                      <option style="font-size: 12px;" <?= $m['Divisi'] == 'Plantation' ? 'selected' : ''; ?>>Plantation</option>
                      <option style="font-size: 12px;" <?= $m['Divisi'] == 'Marketing' ? 'selected' : ''; ?>>Marketing</option>
                      <option style="font-size: 12px;" <?= $m['Divisi'] == 'PLJ' ? 'selected' : ''; ?>>PLJ</option>
                      <option style="font-size: 12px;" <?= $m['Divisi'] == 'R&D' ? 'selected' : ''; ?>>R&D</option>
                      <option style="font-size: 12px;" <?= $m['Divisi'] == 'TPM' ? 'selected' : ''; ?>>TPM</option>
                      <option style="font-size: 12px;" <?= $m['Divisi'] == 'Sawmill' ? 'selected' : ''; ?>>Sawmill</option>
                      <option style="font-size: 12px;" <?= $m['Divisi'] == 'KL' ? 'selected' : ''; ?>>KL</option>
                      <option style="font-size: 12px;" <?= $m['Divisi'] == 'Engineering' ? 'selected' : ''; ?>>Engineering</option>
                      <option style="font-size: 12px;" <?= $m['Divisi'] == 'QA' ? 'selected' : ''; ?>>QA</option>
                    </select>
                  </div>
                </div>





                <br><br><br><br><br><br>



                <!-- Tabel keahlian -->
                <!-- Ukuran tabel -->

                <!-- End ukuran tabel -->

                <!-- Account card-->

                <div class="card-header" style="color:#fff ; background-color:#8E6AEB; font-weight: 900; padding-left:47%; margin-left:15px;">Keahlian</div>
                <div class="row">
                  <div class="col" style="padding-left: 50px;">
                    <label class="small mb-1" style="font-weight: 900;">Nama Keahlian :</label>
                    <?php for ($i = 0; $i < sizeof($keahlian); $i++) { ?>
                      <p><input type="hidden" class="form-control" style="background-color: #bdc3c7;" name="id_keahlian[]" value="<?= $keahlian[$i]['id_keahlian']; ?>"></p>
                      <p><input class="form-control" style="background-color: #bdc3c7;" name="nama_keahlian1[]" value="<?= $keahlian[$i]['nama_keahlian']; ?>"></p>
                    <?php } ?>
                  </div>
                  <div class="col" style="padding-left: 50px;">
                    <label class="small mb-1" style="font-weight: 900;">Keterangan :</label>
                    <?php for ($i = 0; $i < sizeof($keahlian); $i++) { ?>
                      <p><input class="form-control" style="background-color: #bdc3c7;" name="keterangan1[]" value="<?= $keahlian[$i]['keterangan']; ?>"></p>
                    <?php } ?>
                  </div>
                </div>





                <br><br><br><br><br><br><br>


                <!-- Tabel Pendidikan -->
                <!-- Ukuran tabel -->

                <!-- End ukuran tabel -->

                <!-- Account details card-->

                <div class="card-header" style="color:#fff ; background-color:#8E6AEB; font-weight: 900; padding-left:46%; margin-top:50px; margin-left:15px;">Pendidikan</div>
                <div class="row">
                  <div class="col" style="padding-left: 50px;">
                    <label class="small mb-1" style="font-weight: 900;">Riwayat Pendidikan :</label>
                    <?php for ($i = 0; $i < sizeof($pendidikan); $i++) { ?>
                      <p><input type="hidden" class="form-control" style="background-color: #bdc3c7;" name="id_pendidikan[]" value="<?= $pendidikan[$i]['id_pendidikan']; ?>"></p>
                      <p><input class="form-control" style="background-color: #bdc3c7;" name="riwayat_pendidikan1[]" value="<?= $pendidikan[$i]['riwayat_pendidikan']; ?>"></p>
                    <?php } ?>

                  </div>
                  <div class="col" style="padding-left: 50px;">
                    <label class="small mb-1" style="font-weight: 900;">Nama Pendidikan :</label>
                    <?php for ($i = 0; $i < sizeof($pendidikan); $i++) { ?>

                      <p><input class="form-control" style="background-color: #bdc3c7;" name="nama_pendidikan1[]" value="<?= $pendidikan[$i]['nama_pendidikan']; ?>"></p>
                    <?php } ?>
                  </div>
                </div>



                <div class="col-12" style="margin-left: 30px;">
                  <button class="btn btn-primary" type="submit" name="ubah">ubah data</button>
                </div>





                <!-- End Tabel pendidikan -->

            </form>
          </div>
        </div>
      </div>

      <!-- End Tabel Data Diri -->
      <br><br><br><br><br><br>




      <!-- End Tabel keahlian -->

      <br><br><br><br><br><br><br>


      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      <script src="../assets/js/main.js"></script>
      <!-- fungsi javascript untuk menampilkan form dinamis  -->
      <!-- penjelasan :
saat tombol add-more ditekan, maka akan memunculkan div dengan class copy -->
      <script type="text/javascript">
        $(document).ready(function() {
          $(".add-more").click(function() {
            var html = $(".copy").html();
            $(".after-add-more").after(html);
          });

          // saat tombol remove dklik control group akan dihapus 
          $("body").on("click", ".remove", function() {
            $(this).parents(".control-group").remove();
          });
        });
      </script>
    </body>

</html>