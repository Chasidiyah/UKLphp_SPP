<?php
include "koneksi.php";
require_once("require.php");
$nisnSiswa = $_GET['nisn'];
$siswa = mysqli_query($db, "SELECT * FROM siswa WHERE nisn='$nisnSiswa'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Data Siswa</title>
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
        width: 40%;
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
                    <h3>Edit data Siswa</h3>
                    
                <?php
                include "koneksi.php";
                    while($row = mysqli_fetch_assoc($siswa)){?>
                    <form action="proses_edit_siswa.php" method="POST">
                        <table cellpadding="5">
                            <input type="hidden" name="nisn" value="<?= $row['nisn']; ?>">
                            <tr>
                                <td>Nama :</td>
                                <td><input type="text" name="nama" class="form-control" value="<?= $row['nama']; ?>"></td>
                            </tr>
                            <tr>
                                <td>Kelas :</td>
                                <td><select name="kelas" class="form-control">
                                    
                <?php
                    $kelas = mysqli_query($db, "SELECT * FROM kelas");
                    while($r = mysqli_fetch_assoc($kelas)){ ?>
                    <option value="<?= $r['id_kelas']; ?>"><?= $r['nama_kelas'] . " | " 
                    . $r['kompetensi_keahlian']; ?></option>
<?php } ?>          </select></td>
                            </tr>
                            <tr>
                                <td>Alamat :</td>
                                <td><input type="text" name="alamat" class="form-control" value="<?= $row['alamat']; ?>"></td>
                            </tr>
                            <tr>
                                <td>No. Telp :</td>
                                <td><input type="tel" name="no" class="form-control" value="<?= $row['no_telp']; ?>"></td>
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
<?php } ?>
<hr />
    <!-- Panggil footer -->
    <?php require("footer.php"); ?>
</body>
</html>

