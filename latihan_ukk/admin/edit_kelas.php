<?php
require_once("require.php");
$id = $_GET['id'];
$kelas = mysqli_query($db, "SELECT * FROM kelas WHERE id_kelas='$id'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Data Kelas</title>
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
        margin-left: 550px;
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
                    <h3>Edit data Kelas</h3>
<?php
while($row = mysqli_fetch_assoc($kelas)){?>
    <form action="" method="POST">
        <table cellpadding="5">
            <input type="hidden" name="id" value="<?= $row['id_kelas']; ?>">
            <div class="form-floating mb-3 mt-3">
                <tr>
                    <td>Nama Kelas :</td>
                    <td><input type="text" name="nama" class="form-control" value="<?= $row['nama_kelas']; ?>"></td>
                </tr>
            </div>
            <div class="form-floating mb-3 mt-3">
                <tr>
                    <td>Kompetensi Keahlian :</td>
                    <td><input type="text" name="kk" class="form-control" value="<?= $row['kompetensi_keahlian']; ?>"></td>
                </tr>
            </div>
            <div class="form-floating mb-3 mt-3">    
                <tr>
                    <td colspan="2"><button type="submit" class="btn btn-primary" name="simpan">Simpan</button></td>
                </tr>
            </div>
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

<?php
// Proses update
if(isset($_POST['simpan'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $kk = $_POST['kk'];
    $update = mysqli_query($db, "UPDATE kelas SET nama_kelas='$nama', kompetensi_keahlian='$kk'
                                 WHERE kelas.id_kelas='$id'");
        if($update){
            header("location: kelas.php");
        }else{
            echo "<script>alert('Gagal'); </script>";
        }
}
?>