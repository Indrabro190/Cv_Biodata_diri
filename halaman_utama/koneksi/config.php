<?php
function koneksi()
{
  // Koneksi ke DB & Pilih Database
  return mysqli_connect('localhost', 'root', '', 'biodata_diri');
}
function query($query)
{
  $conn = koneksi();

  $result = mysqli_query($conn, $query);

  // jika hasilnya hanya 1 data
  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;


}

function tambah($data)
{
  $conn = koneksi();

  $Nama = htmlspecialchars($data['Nama']);
  $Tempat = htmlspecialchars($data['Tempat']);
  $Tgl_lahir = htmlspecialchars($data['Tgl_lahir']);
  $Jenis_Kelamin = htmlspecialchars($data['Jenis_Kelamin']);
  $Gol_Darah = htmlspecialchars($data['Gol_Darah']);
  $Alamat = htmlspecialchars($data['Alamat']);
  $RT_RW = htmlspecialchars($data['RT_RW']);
  $Kel_Desa = htmlspecialchars($data['Kel_Desa']);
  $Kecamatan = htmlspecialchars($data['Kecamatan']);
  $Agama = htmlspecialchars($data['Agama']);
  $Status_Perkawinan = htmlspecialchars($data['Status_Perkawinan']);
  $Pekerjaan = htmlspecialchars($data['Pekerjaan']);
  $Kewarganegaraan = htmlspecialchars($data['Kewarganegaraan']);
  $Divisi = htmlspecialchars($data['Divisi']);

  // $keahlian = htmlspecialchars($data['nama_keahlian']);
  // $keterangan = htmlspecialchars($data['keterangan']);
  // $riwayat_pendidikan = htmlspecialchars($data['riwayat_pendidikan']);
  // $nama_pendidikan = htmlspecialchars($data['nama_pendidikan']);

  $query1 = "INSERT INTO data_diri VALUES (null,'$Nama','$Tempat','$Tgl_lahir','$Jenis_Kelamin','$Gol_Darah','$Alamat',
  '$RT_RW','$Kel_Desa','$Kecamatan','$Agama','$Status_Perkawinan','$Pekerjaan','$Kewarganegaraan','$Divisi')";
// berhasil ubah
  if ($conn->query($query1) == true) {
    $last_id = $conn->insert_id;
    for ($i = 1; $i <= 5; $i++) {
      $keahlian = htmlspecialchars($data['nama_keahlian' . $i]);
      $keterangan = htmlspecialchars($data['keterangan' . $i]);
      $query2 = "INSERT INTO keahlian VALUES(null,'$last_id','$keahlian','$keterangan')";
      mysqli_query($conn, $query2);
    }
    for ($i = 1; $i <= 5; $i++) {
      $riwayat_pendidikan = htmlspecialchars($data['riwayat_pendidikan' . $i]);
      $nama_pendidikan = htmlspecialchars($data['nama_pendidikan' . $i]);
      $query3 = "INSERT INTO pendidikan VALUES(null,'$last_id','$riwayat_pendidikan','$nama_pendidikan')";
      mysqli_query($conn, $query3);
    }
  }
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
  $conn->close();
}




function hapus($id)
{
  $conn = koneksi();

  mysqli_query($conn, "DELETE data_diri,keahlian,pendidikan FROM data_diri 
  INNER JOIN keahlian ON data_diri.id_utama = keahlian.id_utama
  INNER JOIN pendidikan ON data_diri.id_utama = pendidikan.id_utama AND data_diri.id_utama = $id;")
    or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function ubah($data, $id)
{
  $conn = koneksi();
  // $id_utama = $data['id_utama'];
  $Nama = $data['Nama'];
  $Tempat = $data['Tempat'];
  $Tgl_lahir = $data['Tgl_lahir'];
  $Jenis_Kelamin = $data['Jenis_Kelamin'];
  $Gol_Darah = $data['Gol_Darah'];
  $Alamat = $data['Alamat'];
  $RT_RW = $data['RT_RW'];
  $Kel_Desa = $data['Kel_Desa'];
  $Kecamatan = $data['Kecamatan'];
  $Agama = $data['Agama'];
  $Status_Perkawinan = $data['Status_Perkawinan'];
  $Pekerjaan = $data['Pekerjaan'];
  $Kewarganegaraan = $data['Kewarganegaraan'];
  $Divisi = $data['Divisi'];
  $keahlian = $data['nama_keahlian1'];
  $keterangan = $data['keterangan1'];
  $riwayat_pendidikan = $data['riwayat_pendidikan1'];
  $nama_pendidikan = $data['nama_pendidikan1'];
  $id_keahlian = $data['id_keahlian'];
  $id_pendidikan = $data['id_pendidikan'];

  $query1 = "UPDATE data_diri SET 
              Nama = '$Nama',
              Tempat = '$Tempat',
              Tgl_lahir = '$Tgl_lahir',
              Jenis_Kelamin = '$Jenis_Kelamin',
              Gol_Darah = '$Gol_Darah',
              Alamat = '$Alamat',
              RT_RW = '$RT_RW',
              Kel_Desa = '$Kel_Desa',
              Kecamatan = '$Kecamatan',
              Agama = '$Agama',
              Status_Perkawinan = '$Status_Perkawinan',
              Pekerjaan = '$Pekerjaan',
              Kewarganegaraan = '$Kewarganegaraan',
              Divisi = '$Divisi'
            WHERE data_diri.id_utama = $id";

  if ($conn->query($query1) == true) {
    for ($i = 0; $i <sizeof($keahlian); $i++) {

      $query2 = "UPDATE keahlian SET
      nama_keahlian = '$keahlian[$i]',
      keterangan = '$keterangan[$i]'
       WHERE keahlian.id_keahlian = $id_keahlian[$i]";
      mysqli_query($conn, $query2);
    }
    for ($i = 0; $i <sizeof($riwayat_pendidikan); $i++) {
      $query3 = "UPDATE pendidikan SET
      riwayat_pendidikan = '$riwayat_pendidikan[$i]',
      nama_pendidikan = '$nama_pendidikan[$i]'
            WHERE pendidikan.id_pendidikan = $id_pendidikan[$i]";
      mysqli_query($conn, $query3);
    }
  }
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
  $conn->close();
  // mysqli_query($conn, $query);
  // echo mysqli_error($conn);
  // return mysqli_affected_rows($conn);
}

function Search2($keyword)
{
  $conn = koneksi();
  $query = "SELECT * FROM data_diri WHERE Nama like '%$keyword%'";
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}
