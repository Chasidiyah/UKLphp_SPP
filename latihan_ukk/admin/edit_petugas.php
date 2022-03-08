<?php
require_once("require.php");
$id = $_GET['id'];
$petugas = mysqli_query($db, "SELECT * FROM petugas WHERE id_petugas='$id'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title> Edit Data Petugas </title>
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
                    <h3>Edit data Petugas</h3>
<?php
while($row = mysqli_fetch_assoc($petugas)){?>
    <form action="" method="POST">
        <table cellpadding="5">
            <input type="hidden" name="id" value="<?= $row['id_petugas']; ?>">
                <div class="form-floating mb-3 mt-3">
                    <tr>
                        <td>Username :</td>
                        <td><input type="text" name="user" class="form-control" value="<?= $row['username']; ?>"></td>
                    </tr>
                 </div>
                <div class="form-floating mb-3 mt-3">
                    <tr>
                        <td>Password :</td>
                        <td><input type="text" name="pass" class="form-control" value="<?= $row['password']; ?>"></td>
                    </tr>
                </div>
                <div class="form-floating mb-3 mt-3">
                    <tr>
                        <td>Nama Petugas :</td>
                        <td><input type="text" name="nama" class="form-control" value="<?= $row['nama_petugas']; ?>"></td>
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
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $nama = $_POST['nama'];
    $update = mysqli_query($db, "UPDATE petugas SET username='$user',
                                 password='$pass', nama_petugas='$nama'
                                 WHERE petugas.id_petugas='$id'");
                                //  echo "UPDATE petugas SET username='$user',
                                //  password='$pass', nama_petugas='$nama'
                                //  WHERE petugas.id_petugas='$id'";
        if($update){
            // header("location: petugas.php");
            echo "<script>alert('sukses ubah data petugas'); location.href='petugas.php';
            </script>";
        }else{
            echo "<script>alert('Gagal'); </script>";
        }
}
?>