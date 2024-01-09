<?php

$koneksi = mysqli_connect("localhost","root","","uas");

if (mysqli_connect_errno()){
    echo "gagal koneksi ke database aplikasi:".mysqli_connect_error();
}
?>
