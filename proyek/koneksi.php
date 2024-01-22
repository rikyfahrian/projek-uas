<?php

$koneksi = mysqli_connect("localhost","root","","warif_db_fix");

if (mysqli_connect_errno()){
    echo "gagal koneksi ke database warif:".mysqli_connect_error();
}
?>
