<?php
include 'koneksi.php'; 

$id_truk = $_POST['id_truk'];
$nama_pembeli = $_POST['nama_pembeli'];
$email_pembeli = $_POST['email_pembeli'];
$lokasi_gudang = $_POST['lokasi_gudang'];
$no_hp = $_POST['no_hp'];
$jumlah_beli = $_POST['jumlah_beli'];
$harga_truk = $_POST['harga_truk'];
$total_bayar = $harga_truk * $jumlah_beli; 


mysqli_query($koneksi, "INSERT INTO pembelian VALUES('', '$nama_pembeli', '$email_pembeli', '$lokasi_gudang','$jumlah_beli','$totbay','$no_hp','$id_truk')");
header("location: beli_unit.php");
?>
