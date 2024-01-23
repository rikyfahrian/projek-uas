<?php

$koneksi = mysqli_connect("localhost","root","secret","staginguas");

if (mysqli_connect_errno()){
    echo "gagal koneksi ke database warif:".mysqli_connect_error();
}
?>
