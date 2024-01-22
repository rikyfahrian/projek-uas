<?php
include 'koneksi.php';

// Mendapatkan data pembelian dari form
$id_pembelian = $_POST['id_pembelian'];
$jumlah_beli = $_POST['jumlah_beli'];
$harga_truk = $_POST['harga_truk'];
$total_bayar = $_POST['total_harga'];
$email_pembeli = $_POST['email_pembeli'];
$vendor = $_POST['vendor'];
$tahun_produksi = $_POST['tahun_produksi'];
$foto_truk = $_POST['foto_truk'];

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
    $queryInsertPembayaran = "INSERT INTO pembayaran (id_pembelian, tanggal_bayar, jumlah_bayar, atas_nama,vendor,foto_truk,tahun_produksi) VALUES ('$id_pembelian', '$tanggal_bayar', '$total_bayar', '{$dataPembelian['atas_nama']}','$vendor','$foto_truk','$tahun_produksi')";

    // Menjalankan query INSERT
    mysqli_query($koneksi, $queryInsertPembayaran);

    // Mendapatkan ID pembayaran yang baru saja dimasukkan
    $id_pembayaran = mysqli_insert_id($koneksi);

    // Menyusun query INSERT untuk memasukkan data ke tabel aset
    $queryInsertAset = "INSERT INTO aset (id_aset, nama_unit, tanggal_beli,harga_beli,harga_jual, vendor, foto_truk, tahun_produksi, id_pembayaran) 
                        VALUES (NULL, '{$dataPembelian['nama_truk']}', '{$dataPembelian['tanggal_beli']}', '{$dataPembelian['harga_truk']}', '','{$vendor}', '{$foto_truk}', '{$tahun_produksi}', '$id_pembayaran')";

    // Menjalankan query INSERT untuk aset
    mysqli_query($koneksi, $queryInsertAset);

    // Redirect ke halaman dengan pesan sukses
    header("Location: tableunit.php?status=success");
    exit();
} else {
    // Jika saldo tidak mencukupi
    header("Location: tableunit.php?status=error");
    exit();
}
?>
