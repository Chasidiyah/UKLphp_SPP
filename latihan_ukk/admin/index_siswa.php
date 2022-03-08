<?php
session_start();
require_once("koneksi.php");
// Jika sesi dari login belum dibuat maka akan kita kembalikan ke halaman login
if(!isset($_SESSION['nisn'])){
    header("location: login_siswa.php");
}else{
    // Jika sudah dibuatkan sesi maka akan kita masukkan kedalam variabel
    $nisn = $_SESSION['nisn'];
}
$siswa = mysqli_query($db, "SELECT * FROM siswa 
JOIN kelas ON siswa.id_kelas=kelas.id_kelas 
WHERE nisn='$nisn'");
$result = mysqli_fetch_assoc($siswa);
$pembayaran = mysqli_query($db, "SELECT * FROM pembayaran 
JOIN petugas ON pembayaran.id_petugas = petugas.id_petugas 
JOIN spp ON pembayaran.id_spp = spp.id_spp
WHERE nisn='$nisn'
ORDER BY tgl_bayar");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>HOME Siswa</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
    body {
        background-image: url(pics/bgpwg.jpg);
        background-size: cover;
        height : 20vh;
        width: 100%;
        font-family: 'poppins', 'sans-serif';
        float: center;
        color: white;
    }
    .header ul li{
     display: inline-block;
     color: lightcoral;
     margin-left: 50px;
     font-size: 20px;
    }
    h1 {
        text-align: center;
        color: white;
        font-size: 50px;
    }
    h2{
        color: black;
        
    }
    h4{
        margin-top: 50px;
        font-size: 20px:
    }
    .box {
        color: #7c5379;
        padding: 100px;
        margin-bottom: 40px;
        border:5px solid;
        width: 50%;
        float: center;
        margin-left: 375px;
        background: #ececec;
        border-radius: 25px;
        opacity: 0.5;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 2.5);
    }
    .box2 {
        color: #7c5379;
        padding: 100px;
        margin-bottom: 40px;
        border:5px solid;
        width: 100%;
        float: center;
        margin-left: 25px;
        background: #ececec;
        border-radius: 25px;
        opacity: 0.5;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 2.5);
    }
    tr {
        color: white;
        font-size: 20px;
    }
    td{
        color: black;
        
    }
    </style>
</head>
<body>
    <h1>Selamat datang di Aplikasi Pembayaran SPP</h1>
            <hr />
            <div class="header">
                <div class="container">
                    <ul>
                        <li><a href="#biodata">Biodata Kamu</a></li>  
                        <li><a href="#history">History Pembayaran</a></li>  
                        <li><a href="logout.php">Logout</a></li>
                </div>
            </div>
            <hr />
            <div class="index-container" id="index">
                <div class="box-index">
                    <div class="box">
                        <div class="index">
                            <h2>Hallo, <?= $result['nama']; ?></h2>
                            <h3>Biodata Kamu</h3>
                            <hr />
                            <table cellpadding="5" id="biodata">
                                <tr>
                                    <td>NISN</td>
                                    <td>:</td>
                                    <td><?= $result['nisn']; ?></td>
                                </tr>
                                <tr>
                                    <td>NIS</td>
                                    <td>:</td>
                                    <td><?= $result['nis']; ?></td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td><?= $result['nama']; ?></td>
                                </tr>
                                <tr>
                                    <td>Kelas</td>
                                    <td>:</td>
                                    <td><?= $result['nama_kelas'] . " | " . $result['kompetensi_keahlian']; ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td><?= $result['alamat']; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
            <div class="container mt-3">
                <div class="index-container" id="index">
                    <div class="box-index">
                        <div class="box2">
                            <div class="index">
                                <p><h4>History Pembayaran Kamu</p></h4>
                                <table id="history" cellpadding="5" cellspacing="0" border="1">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <td>No. </td>
                                                <td>Dibayarkan kepada</td>
                                                <td>Tgl. Pembayaran</td>
                                                <td>Tahun | Nominal yang harus dibayar</td>
                                                <td>Jumlah yang dibayarkan</td>
                                                <td>Status</td>
                                            </tr>
                                        </thead>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php
$no = 1;
while($r = mysqli_fetch_assoc($pembayaran)){ ?>
        <tr>
            <td><?= $no; ?></td>
            <td><?= $r['nama_petugas']; ?></td>
            <td><?= $r['tgl_bayar'] . "/" . $r['bulan_dibayar'] . "/" . $r['tahun_dibayar']; ?></td>
            <td><?= $r['tahun'] . " | Rp. " . $r['nominal']; ?></td>
            <td><?= $r['jumlah_bayar']; ?></td>
            <td>
<?php
// Jika jumlah bayar sesuai dengan yang harus dibayar maka Status LUNAS
    if($r['jumlah_bayar'] == $r['nominal']){ ?>
                <font style="color: darkgreen; font-weight: bold;">LUNAS</font>
<?php 
    }else{ ?>BELUM LUNAS <?php } ?> </td>
        </tr>
    <?php $no++; } ?>
    </table>
            <hr />
    <?php require_once("footer.php"); ?>
</body>
</html>