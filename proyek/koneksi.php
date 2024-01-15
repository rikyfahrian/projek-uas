<?php

$koneksi = mysqli_connect("localhost","root","","warif");

if (mysqli_connect_errno()){
    echo "gagal koneksi ke database warif:".mysqli_connect_error();
}
?>
