<?php
require_once("require.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tambah Petugas</title>
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
        width: 30%;
        float: center;
        margin-left: 500px;
        background: #ececec;
        border-radius: 25px;
        opacity: 0.75;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 2.5);
    }
  </style>
</head>
<body>
    <!-- Panggil header -->
    <?php require("header.php"); ?>
    <!-- Konten -->
    <div class="index-container" id="index">
    <div class="box-index">
    <div class="box">
        <div class="index">
    <h3>Tambah Petugas</h3>
    <form action="" method="POST">
        <table cellpadding="5">
        <div class="form-floating mb-3 mt-3"> 
            <tr>
                <td>Username :</td>
                <td><input type="text" class="form-control" id="user" placeholder="Masukkan Username" name="user"></td>
            </tr>
        </div>
        <div class="form-floating mb-3 mt-3">
            <tr>
                <td>Password :</td>
                <td><input type="text" class="form-control" id="pas" placeholder="Masukkan Password" name="pass"></td>
            </tr>
        </div>
        <div class="form-floating mb-3 mt-3">
            <tr>
                <td>Nama :</td>
                <td><input type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name="nama"></td>
            </tr>
        </div>
            <tr>
            <td colspan="2"><button type="submit" class="btn btn-primary" name="simpan">Simpan</button></td>
            </tr>
        </table>
    </form>
    </div>
</div>
</div>
</div>
<hr />
            <!-- Panggil footer -->
    <?php require("footer.php"); ?>
</body>
</html>
<?php
// Proses Simpan
include "koneksi.php";
if(isset($_POST['simpan'])){
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $nama = $_POST['nama'];
    $simpan = mysqli_query($db, "INSERT INTO petugas VALUES(NULL, '$user', '$pass', '$nama', 'Petugas')");
        if($simpan){
            header("location: petugas.php");
        }else{
            echo "<script>alert('Data sudah ada');</script>";
        }
}
?>