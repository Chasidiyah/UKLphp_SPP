<?php
require_once("require.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Data Petugas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
      body{
        background-image: url(pics/bgpwg.jpg);
        background-size: cover;
        height : 20vh;
        width: 100%;
        font-family: 'poppins', sans-serif;
      }
      tr{
          color: black;
      }
      .box {
        color: #7c5379;
        padding: 50px;
        margin-bottom: 40px;
        border:5px solid;
        width: 105%;
        float: center;
        background: #ececec;
        border-radius: 25px;
        opacity: 0.75;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 2.5);
    }
  </style>
</head>
<body>
    <!-- Panggil script header -->
    <?php require_once("header.php"); ?>
    <!-- Isi Konten -->
    <div class="container mt-3">
    <div class="container mt-3">
    <div class="index-container" id="index">
    <div class="box-index">
    <div class="box">
        <div class="index">
    <h3>Petugas</h3>
    <p><a href="tambah_petugas.php">Tambah Data</a></p>
    <table cellspacing="0" border="1" cellpadding="5">
    <table class="table table-striped">
    <thead>
        <tr>
            <td>No. </td>
            <td>Username</td>
            <td>Password</td>
            <td>Nama Petugas</td>
            <td>Level</td>
            <td>Aksi</td>
        </tr>
    </thead>
    </div>
    </div>
</div>
</div>
</div>
<?php
// Kita buat konfigurasi pagging
$jmlhDataHal = 5;
$data = mysqli_query($db, "SELECT * FROM petugas");
$jmlhData = mysqli_num_rows($data);
$jmlhHal = ceil($jmlhData / $jmlhDataHal);
$halAktif = (isset($_GET['hal'])) ? $_GET['hal'] : 1;
$dataAwal = ($jmlhData * $halAktif) - $jmlhData;
// Konfigurasi Selesai
// Kita panggil tabel petugas
$sql = mysqli_query($db, "SELECT * FROM petugas LIMIT $dataAwal, $jmlhDataHal");
$no = 1;
while($r = mysqli_fetch_assoc($sql)){ ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $r['username']; ?></td>
            <td><?= $r['password']; ?></td>
            <td><?= $r['nama_petugas']; ?></td>
            <td><?= $r['level']; ?></td>
            <td><a href="?hapus&id=<?= $r['id_petugas']; ?>" type="button" class="btn btn-danger">Hapus</a> | 
                <a href="edit_petugas.php?id=<?= $r['id_petugas']; ?>" type="button" class="btn btn-primary">Edit</a</td>
        </tr>
<?php $no++; } ?>
    </table>
<!-- Sekarang kita buat tombol halamannya -->
<?php for($i=1; $i <= $jmlhHal; $i++): ?>
        <a href="?hal=<?= $i; ?>"><?= $i; ?></a>
<?php endfor; ?>
<!-- Selesai -->
    <hr />
    <?php require_once("footer.php"); ?>
</body>
</html>
<?php
// Tombol Hapus ditekan
if(isset($_GET['hapus'])){
    $id = $_GET['id'];
    $hapus = mysqli_query($db, "DELETE FROM petugas WHERE id_petugas='$id'");
    if($hapus){
        echo "<script>alert('sukses hapus'); location.href='petugas.php';
        </script>";
    }else{
        echo "<script>alert('Maaf, data tersebut masih terhubung dengan data yang lain');
        </script>";
    }
}
?>