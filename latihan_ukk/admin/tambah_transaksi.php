<?php
require_once("require.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tambah Data Transaksi</title>
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
      .box {
        color: #7c5379;
        padding: 50px;
        margin-bottom: 40px;
        border:5px solid;
        width: 50%;
        float: center;
        margin-left: 400px;
        background: #ececec;
        border-radius: 25px;
        opacity: 0.75;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 2.5);
    }
  </style>
</head>
<body>
    <?php require("header.php"); ?>
    <div class="index-container" id="index">
        <div class="box-index">
            <div class="box">
                <div class="index">
                    <h3>Tambah data transaksi</h3>
                    <form action="" method="POST">
                        <table cellpadding="5">
                            <div class="form-floating mb-3 mt-3">
                                <tr>
                                    <td>Petugas :</td>
                                    <td><select name="petugas" class="form-control">
<?php
// Kita akan ambil Nama Petugas yang ada pada tabel Petugas
$petugas = mysqli_query($db, "SELECT * FROM petugas");
while($r = mysqli_fetch_assoc($petugas)){ ?>
                        <option value="<?= $r['id_petugas']; ?>"><?= $r['nama_petugas']; ?></option>
<?php } ?>          </select></td>
            </tr>
            <tr>
                <td>NISN :</td>
                <td><select name="nisn" class="form-control">
<?php
// Sekarang kita ambil NISN Siswa 
$siswa = mysqli_query($db, "SELECT * FROM siswa");
while($r = mysqli_fetch_assoc($siswa)){ ?>
                        <option value="<?= $r['nisn']; ?>"><?= $r['nisn']; ?></option>
<?php } ?>          </select></td>
            </tr>   
            <tr>
                <td>Tgl. / Bulan / Tahun bayar :</td>
                <td><input type="text" name="tgl" size="5" placeholder="Tanggal." >
                    <input type="text" name="bulan" size="10" placeholder="Bulan.">
                    <input type="text" name="tahun" size="5" placeholder="Tahun."></td>
            </tr>
            <tr>
                <td>SPP / Nominal yang harus dibayar</td>
                <td><select name="spp" class="form-control">
                <?php
                // Ambil juga data SPP
                $spp = mysqli_query($db, "SELECT * FROM spp");
                while($r = mysqli_fetch_assoc($spp)){ ?>
                        <option value="<?= $r['id_spp']; ?>">
                        <?= $r['tahun'] . " | " . $r['nominal']; ?></option>
<?php } ?>          </select></td>
            </tr>
            <tr>
                <td>Jumlah bayar</td>
                <td><input type="text" name="jumlah" placeholder="1000000" class="form-control"></tdd>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" name="simpan" class="btn btn-primary">Simpan</button></td>
            </tr>
        </table>
<hr />
    <?php require("footer.php"); ?>
</body>
</html>
<?php
// Kita simpan proses simpan datanya disini
include "koneksi.php";
if(isset($_POST['simpan'])){
    $petugas = $_POST['petugas'];
    $nisn = $_POST['nisn'];
    $tgl = $_POST['tgl']; $bulan = $_POST['bulan']; $tahun = $_POST['tahun'];
    $spp = $_POST['spp'];
    $cek = mysqli_query($db, "SELECT * FROM pembayaran WHERE nisn='$nisn'");
    $ambil = mysqli_fetch_assoc($cek);
    $jumlah = $_POST['jumlah'];
    if($spp == $ambil['id_spp']){
        echo "<script>alert('Tahun spp tersebut sudah ada pada siswa');</script>";
    }else{
    $s = mysqli_query($db,"INSERT INTO pembayaran VALUES
                (NULL, '$petugas', '$nisn', '$tgl', '$bulan', '$tahun', '$spp', '$jumlah')");
    // Arahkan ke menu transaksi
    if($s){
        // header("location: transaksi.php"); 
        echo "<script>alert('Sukses menambahkan data transaksi');location.href='transaksi.php';</script>";
    }else{
        echo "<script>alert('gagal');</script>";
    }}}
?>