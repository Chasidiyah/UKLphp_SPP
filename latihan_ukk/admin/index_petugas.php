<?php
session_start();
require_once("koneksi.php");
// Jika sesi dari login belum dibuat maka akan kita kembalikan ke halaman login
if(!isset($_SESSION['username'])){
    header("location: login.php");
}else{
    // Jika sudah dibuatkan sesi maka akan kita masukkan kedalam variabel
    $username = $_SESSION['username'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>HOME</title>
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
        font-family: 'poppins', sans-serif;
        float: center;
    }
    h3 {
        text-align: center;
        color: black;
        font-size: 50px;
    }
    .box {
        color: #7c5379;
        padding: 100px;
        margin-bottom: 40px;
        border:5px solid;
        width: 50%;
        float: center;
        margin-left: 325px;
        background: #ececec;
        border-radius: 25px;
        opacity: 0.5;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 2.5);
    }
</style>
    <head>
        <title>Aplikasi Pembayaran SPP</title>
    </head>
<body>
<!-- Kita akan panggil menu navigasi -->
<?php require_once("header.php"); ?>
    <div class="index-container" id="index">
        <div class="box-index">
            <div class="box">
                <div class="index">
                    <h3>Selamat datang, <?= $username; ?></h3>
                </div>
            </div>
        </div>
    </div>
            <br />

            <hr />
<?php require_once("footer.php"); ?>
</body>
</html>


