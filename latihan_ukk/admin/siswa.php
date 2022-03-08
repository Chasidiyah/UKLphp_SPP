<?php
require_once("require.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title> Data Siswa </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
    body{
        background-image: url(pics/bgpwg.jpg);
        background-size: cover;
        height : 20vh;
        width: 100%;
        color: ;
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
        <div class="index-container" id="index">
            <div class="box-index">
                <div class="box">
                    <div class="index">
                        <h3>Siswa</h3>
                        <p><a href="tambah_siswa.php">Tambah Data</a></p>
                        <table cellspacing="0" border="1" cellpadding="5">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <td>No. </td>
                                        <td>NISN</td>
                                        <td>NIS</td>
                                        <td>Nama Siswa</td>
                                        <td>Kelas</td>
                                        <td>Alamat</td>
                                        <td>No. Telp</td>
                                        <td>Aksi</td>
                                    </tr>
                                </thead> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php
// Kita Konfigurasi Pagging disini
$totalDataHalaman = 5;
$data = mysqli_query($db, "SELECT * FROM siswa");
$hitung = mysqli_num_rows($data);
$totalHalaman = ceil($hitung / $totalDataHalaman);
$halAktif = (isset($_GET['hal'])) ? $_GET['hal'] : 1;
$dataAwal = ($totalDataHalaman * $halAktif) - $totalDataHalaman;
// Konfigurasi Selesai
// Kita panggil tabel siswa
// Setelah kita panggil, JOIN tabel yang ter relasi ke tabel siswa
$sql = mysqli_query($db, "SELECT * FROM siswa
JOIN kelas ON siswa.id_kelas = kelas.id_kelas
ORDER BY nama LIMIT $dataAwal, $totalDataHalaman ");
$no = 1;
while($r = mysqli_fetch_assoc($sql)){ ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $r['nisn']; ?></td>
            <td><?= $r['nis']; ?></td>
            <td><?= $r['nama']; ?></td>
            <td><?= $r['nama_kelas'] . " | " . $r['kompetensi_keahlian']; ?></td>
            <td><?= $r['alamat']; ?></td>
            <td><?= $r['no_telp']; ?></td>
            <td><a href="?hapus&nisn=<?= $r['nisn']; ?>" type="button" class="btn btn-danger">Hapus</a> | 
                <a href="edit_siswa.php?nisn=<?= $r['nisn']; ?>" type="button" class="btn btn-primary">Edit</a</td>
        </tr>
<?php $no++; } ?>
    </table>
<!-- Tampilkan tombol halaman -->
<?php for($i=1; $i <= $totalHalaman; $i++): ?>
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
    $nisn = $_GET['nisn'];
    $hapus = mysqli_query($db, "DELETE FROM siswa WHERE nisn='$nisn'");
    if($hapus){
        echo "<script>alert('sukses hapus'); location.href='siswa.php';
        </script>";
    }else{
        echo "<script>alert('Maaf, data tersebut masih terhubung dengan data yang lain');
        </script>";
    }
}
?>




