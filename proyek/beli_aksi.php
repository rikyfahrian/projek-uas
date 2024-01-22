<?php
include 'koneksi.php';

// Mendapatkan data pembelian dari form
$id_truk = $_POST['id_truk'];
$nama_pembeli = $_POST['nama_pembeli'];
$email_pembeli = $_POST['email_pembeli'];
$lokasi_gudang = $_POST['lokasi_gudang'];
$no_hp = $_POST['no_hp'];
$jumlah_beli = $_POST['jumlah_beli'];
$harga_truk = $_POST['harga_truk'];
$total_bayar = floatval($harga_truk) * floatval($jumlah_beli);
$warna_truk = $_POST['warna'];
$nama_truk = $_POST['nama_truk'];
$taanggal_beli = Date('y-m-d');

// Mendapatkan data admin (pembeli) untuk mendapatkan id_admin
$queryAdmin = mysqli_query($koneksi, "SELECT * FROM admin WHERE email = '$email_pembeli'");
$dataAdmin = mysqli_fetch_assoc($queryAdmin);
$id_admin = $dataAdmin['id_admin'];

// Mendapatkan data saldo dari tabel saldo
$querySaldo = mysqli_query($koneksi, "SELECT * FROM saldo WHERE id_admin = '$id_admin'");
$dataSaldo = mysqli_fetch_assoc($querySaldo);

// Memastikan saldo mencukupi untuk pembelian
if ($dataSaldo['nominal'] >= $total_bayar) {
   
    // Simpan data pembelian ke tabel pembelian
    mysqli_query($koneksi, "INSERT INTO pembelian (atas_nama, email_pembeli, lokasi_gudang, jumlah_beli, total_harga, no_hp, harga_truk, id_truk,tanggal_beli,nama_truk,warna_truk) 
                            VALUES ('$nama_pembeli', '$email_pembeli', '$lokasi_gudang', $jumlah_beli, $total_bayar, '$no_hp', '$harga_truk',' $id_truk','$taanggal_beli','$nama_truk','$warna_truk')");

    // Redirect ke halaman dengan pesan sukses
    header("Location: beli_unit.php?id_truk=$id_truk&status=success");
    exit();
} else {
    // Jika saldo tidak mencukupi.
    header("Location: beli_unit.php?id_truk=$id_truk&status=error");
    exit();
}
?>
