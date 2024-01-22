<?php
include 'koneksi.php';

// Mendapatkan data pembelian dari form
$id_pembelian = $_POST['id_pembelian'];
$jumlah_beli = $_POST['jumlah_beli'];
$harga_truk = $_POST['harga_truk'];
$total_bayar = $_POST['total_harga'];
$email_pembeli = $_POST['email_pembeli'];

// Mendapatkan data admin (pembeli) untuk mendapatkan id_admin
$queryAdmin = mysqli_query($koneksi, "SELECT * FROM admin WHERE email = '$email_pembeli'");
$dataAdmin = mysqli_fetch_assoc($queryAdmin);
$id_admin = $dataAdmin['id_admin'];

// Mendapatkan data saldo dari tabel saldo
$querySaldo = mysqli_query($koneksi, "SELECT * FROM saldo WHERE id_admin = '$id_admin'");
$dataSaldo = mysqli_fetch_assoc($querySaldo);

// Memastikan saldo mencukupi untuk pembelian
if ($dataSaldo['nominal'] >= $total_bayar) {
    // Kurangkan saldo dengan total bayar
    $saldoBaru = $dataSaldo['nominal'] - $total_bayar;

    // Update nilai saldo di tabel saldo
    mysqli_query($koneksi, "UPDATE saldo SET nominal = '$saldoBaru' WHERE id_admin = '$id_admin'");

    // Mendapatkan data pembelian untuk mendapatkan informasi yang diperlukan
    $queryPembelian = mysqli_query($koneksi, "SELECT * FROM pembelian WHERE id_pembelian = '$id_pembelian'");
    $dataPembelian = mysqli_fetch_assoc($queryPembelian);

    // Mendapatkan tanggal bayar
    $tanggal_bayar = date("Y-m-d");

    // Menyusun query INSERT untuk memasukkan data pembayaran
    $queryInsertPembayaran = "INSERT INTO pembayaran (id_pembelian, tanggal_bayar, jumlah_bayar, atas_nama) VALUES ('$id_pembelian', '$tanggal_bayar', '$total_bayar', '{$dataPembelian['atas_nama']}')";

    // Menjalankan query INSERT
    mysqli_query($koneksi, $queryInsertPembayaran);

    // Redirect ke halaman dengan pesan sukses
    header("Location: tableunit.php?status=success");
    exit();
} else {
    // Jika saldo tidak mencukupi, Anda dapat menghandle sesuai kebutuhan Anda, misalnya memberi pesan kesalahan.
    header("Location: tableunit.php?status=error");
    exit();
}
?>
