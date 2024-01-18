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

try {
    mysqli_query($koneksi, "INSERT INTO pembelian (atas_nama, email_pembeli, lokasi_gudang, jumlah_beli, total_harga, no_hp, id_unit) 
    VALUES ('$nama_pembeli', '$email_pembeli', '$lokasi_gudang', $jumlah_beli,$total_bayar, '$no_hp', $id_truk)");
    // header("location: beli_unit.php");
    echo "success inserted";
} catch (mysqli_sql_exception $x) {
    echo "Error: " . $x->getMessage();
}
?>
