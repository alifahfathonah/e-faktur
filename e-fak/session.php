<?php
session_start();
//cek apakah user sudah login
if(!isset($_SESSION['npwp'])){
    header('location:index.php');//jika belum login jangan lanjut..
}

//cek level user
if($_SESSION['level']!="wp"){
   header ('location:login.php');
}
?>
