<?php
session_start();
$conn = mysqli_connect('localhost','root','','spp2');

$username = $_POST['username'];
$password = md5($_POST['password']);
$query = "SELECT * FROM user where username='$username' AND password = '$password'";
$row = mysqli_query($conn,$query);
$data = mysqli_fetch_assoc($row);
$cek = mysqli_num_rows($row);


if($cek > 0){
    if($data['role'] == 'admin'){
        $_SESSION['role'] = 'admin';
        $_SESSION['username'] = $data['username'];
        $_SESSION['id_petugas'] = $data['id_petugas'];
        $_SESSION['nisn'] = $data['nisn'];
        header('location:petugas.php');
    }else if($data['role'] == 'petugas'){
        $_SESSION['role'] = 'petugas';
        $_SESSION['username'] = $data['username'];
        $_SESSION['id_petugas'] = $data['id_petugas'];
        $_SESSION['nisn'] = $data['nisn'];
        header('location:petugas.php');
    }else if($data['role'] == 'siswa'){
        $_SESSION['role'] = 'siswa';
        $_SESSION['username'] = $data['username'];
        $_SESSION['id_petugas'] = $data['id_petugas'];
        $_SESSION['nisn'] = $data['nisn'];
        header('location:siswa.php');
    }
}else{
    $msg = 'Username Atau Password Salah';
    header('location:index.php?msg='.$msg);
}
?>