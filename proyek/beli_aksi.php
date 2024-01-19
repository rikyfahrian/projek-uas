<?php
include 'koneksi.php';

$id_truk = $_POST['id_truk'];
$nama_pembeli = $_POST['nama_pembeli'];
$email_pembeli = $_POST['email_pembeli'];
$lokasi_gudang = $_POST['lokasi_gudang'];
$no_hp = $_POST['no_hp'];
$jumlah_beli = $_POST['jumlah_beli'];
$harga_truk = $_POST['harga_truk'];
$total_bayar = floatval($harga_truk) * floatval($jumlah_beli);

try {
    mysqli_query($koneksi, "INSERT INTO pembelian (atas_nama, email_pembeli, lokasi_gudang, jumlah_beli, total_harga, no_hp, id_unit,harga_truk) 
    VALUES ('$nama_pembeli', '$email_pembeli', '$lokasi_gudang', $jumlah_beli, $total_bayar, '$no_hp', $id_truk,'$harga_truk')");

   
    $id_truk = isset($_GET['id_truk']) ? $_GET['id_truk'] : 
   
    header("Location: beli_unit.php?id_truk=$id_truk&status=success");
exit();

    exit();
} catch (mysqli_sql_exception $x) {
    echo "Error: " . $x->getMessage();
}
