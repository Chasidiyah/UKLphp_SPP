 <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title> </title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
 body{
     text-align: center;
     color: white;
     margin: 10px;
     font: 'poppins';
 }
 .header ul li{
     display: inline-block;
     color: white;
     margin-left: 50px;
 }
 header{

 }
</style>
</head>
<body>
<h1>Selamat datang di Aplikasi Pembayaran SPP</h1>
            <hr />
<!-- Logika kita, Jika Level Admin Maka Fitur apa saja yang dapat diakses -->
<?php
$panggil = mysqli_query($db, "SELECT * FROM petugas WHERE username='$username'");
$hasil = mysqli_fetch_assoc($panggil);
    if($hasil['level'] == "Admin"){ ?>
    <div class="header">
        <div class="container">
            <ul>
                <li><a href="siswa.php">Data Siswa</a></li> 
                <li><a href="petugas.php">Data Petugas</a></li> 
                <li><a href="kelas.php">Data Kelas</a></li> 
                <li><a href="spp.php">Data SPP</a></li> 
                <li><a href="transaksi.php">Transaksi</a></li>  
                <li><a href="history.php">History Pembayaran</a></li>  
                <li><a href="logout.php">Log Out</a></li></ul>
        </div>
    </div>
<?php
    }else{ ?>
    <div class="header">
        <div class="container">
            <ul>
                <li><a href="transaksi.php">Transaksi</a></li>  
                <li><a href="history.php">History Pembayaran</a></li>  
                <li><a href="logout.php">Log Out</a></li></ul>
        </div>
    </div>

<?php } ?>
            <hr />

</body>
</html>
