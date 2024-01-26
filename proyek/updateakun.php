<?php
include "koneksi.php";
session_start();

$idAdmin = $_SESSION["idadmin"];
$passwordLama = md5($_POST["passwordlama"]);
$passwordBaru = md5($_POST["passwordbaru"]);


$cek = mysqli_query($koneksi,"SELECT password FROM admin WHERE id = '$idAdmin'");
$cekPassword = mysqli_fetch_assoc($cek)["password"];


if ($cekPassword == $passwordLama) {

    mysqli_query($koneksi,"UPDATE admin SET password = '$passwordBaru' WHERE id = '$idAdmin'");

    header("Location: setting.php");
            exit();
}else {
    header("Location: setting.php?password=salah");
    exit();
}

mysqli_close($koneksi);