<?php
require_once("require.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tambah Siswa</title>
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
        padding: 100px;
        margin-bottom: 40px;
        border:5px solid;
        width: 40%;
        float: center;
        margin-left: 500px;
        background: #ececec;
        border-radius: 25px;
        opacity: 0.5;
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
    <h3>Tambah Siswa</h3>
    <form action="" method="POST">
        <table cellpadding="5">
        <div class="form-floating mb-3 mt-3">
            <tr>
                <td>NISN :</td>
                <td><input type="text" class="form-control" id="nisn" placeholder="Masukkan NISN" name="nisn"></td>
                </tr>
            </div>
        <div class="form-floating mb-3 mt-3">
            <tr>
                <td>NIS :</td>
                <td><input type="text" class="form-control" id="nis" placeholder="Masukkan NIS" name="nis"></td>
            </tr>
            </div>
            <div class="form-floating mb-3 mt-3">
            <tr>
                <td>Nama :</td>
                <td><input type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name="nama"></td>
            </tr>
        </div>
            <tr>
                <td>Kelas :</td>
                <td><select name="kelas">
    <?php
    $kelas = mysqli_query($db, "SELECT * FROM kelas");
    while($r = mysqli_fetch_assoc($kelas)){ ?>
                        <option value="<?= $r['id_kelas']; ?>"><?= $r['nama_kelas'] . " | "
                        . $r['kompetensi_keahlian']; ?></option>
    <?php }
     ?>      </select></td>
            </tr>

            <tr>
                <td>Alamat :</td>
                <td><input type="text" class="form-control" id="alamat" placeholder="Masukkan Alamat" name="alamat"></td>
            </tr>
            <tr>
                <td>No. Telp :</td>
                <td><input type="text" class="form-control" id="no_telp" placeholder="Masukkan No. Telp" name="no_telp"></td>
            </tr>
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
    $nisn = $_POST['nisn'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $level = "siswa";
    $simpan = mysqli_query($db, "INSERT INTO siswa VALUES
    ('$nisn', '$nis', '$nama', '$kelas', '$alamat', '$no_telp','$level')");
        if($simpan){
            echo "<script>alert('sukses tambah data siswa'); location.href='siswa.php';
        </script>";
        }else{
            echo "<script>alert('Data sudah tersimpan');</script>";
        }
}
?>
