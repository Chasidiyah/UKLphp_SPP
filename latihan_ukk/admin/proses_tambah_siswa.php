<?php
// Proses Simpan
include "koneksi.php";
if($_POST){
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
            header("siswa.php");
        }else{
            echo "<script>alert('Data sudah tersimpan');</script>";
        }
}
?>