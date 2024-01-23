<?php
include 'koneksi.php';
session_start();

// Mendapatkan data pembelian dari form
$idadmin = $_SESSION["idadmin"];
$id_truk = $_GET['id_truk'];
$jumlah_beli = $_POST['jumlah_beli'];
$total_bayar = 0;


$result = mysqli_query($koneksi, "SELECT harga FROM truk WHERE id = '".$id_truk."'"); 
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $total_bayar = $row["harga"] * $jumlah_beli;
 
}


if ($_SESSION["currentsaldo"] >= $total_bayar) {
   $idpembelian = mt_rand();
    // Simpan data pembelian ke tabel pembelian
   
   $test = mysqli_query($koneksi, "INSERT INTO pembelian (id, jumlah_beli, total_bayar, truk, owner) VALUES ('$idpembelian', $jumlah_beli, $total_bayar, '$id_truk', '$idadmin')");

   if ($test) {
    header("Location: beli_unit.php?id_truk=$id_truk&status=success");
    exit();
   } else {
       echo "Error: " . mysqli_error($koneksi);
   }
 
} else {
    // Jika saldo tidak mencukupi.
    header("Location: beli_unit.php?id_truk=$id_truk&status=error");
    exit();
}
// ?>
