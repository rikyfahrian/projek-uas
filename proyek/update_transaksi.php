<?php
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $id = $_POST['id'];
    $namaCustomer =  $_POST['nama_customer'];
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $noHP = $_POST['no_hp'];
    $tanggalTransaksi =  $_POST['tanggal_transaksi'];
    $bank =  $_POST['bank'];
    $noRek =  $_POST['no_rek'];
    

    $updateQuery = mysqli_query($koneksi, "UPDATE penjualan SET
        nama_customer = '$namaCustomer',
        alamat = '$alamat',
        no_hp = '$noHP',
        tanggal_transaksi = '$tanggalTransaksi',
        bank = '$bank',
        no_rek = '$noRek'
        WHERE id = $id");

    if ($updateQuery) {
        header("Location: transaksi.php?status_edit=sukses_edit");;
    } else {
        echo "Error updating data";
    }
} else {
    echo "Invalid request";
}

mysqli_close($koneksi);

?>
