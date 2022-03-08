<?php
    include 'koneksi.php';
    session_start();
    if(!isset($_SESSION['level'])!= 'Admin'){
        header('location: login.php');
    }
?>