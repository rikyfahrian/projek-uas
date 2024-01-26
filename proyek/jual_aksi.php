<?php
include "koneksi.php";
session_start();
$idAdmin = $_SESSION["idadmin"];
$idaset =  $_GET['idaset'];
$idpembelian = $_GET['idpembelian'];

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama_customer = $_POST['nama_customer'];
        $alamat = $_POST['alamat'];
        $no_hp = $_POST['no_hp'];
        $bank = $_POST['bank'];
        $no_rek = $_POST['no_rek'];
        $jumlah_beli = $_POST['jumlah_beli'];
        $status_bayar = 0;
        $tanggal_transaksi = date('Y-m-d');

        // Hitung total harga
        $query = mysqli_query($koneksi, "SELECT aset.harga_jual,truk.id 
                                          FROM aset
                                          join pembelian on aset.pembelian = pembelian.id
                                          join truk on pembelian.truk = truk.id
                                          WHERE aset.id = '$idaset';");
        $row = mysqli_fetch_array($query);
        $harga_jual = $row['harga_jual'];
        $idtruk = $row['id'];
        $total_harga = $harga_jual * $jumlah_beli;
        echo $idtruk;
        // Mulai transaksi
        mysqli_begin_transaction($koneksi);

        try {
            // Query pertama: INSERT ke tabel penjualan
            $insert_query = "INSERT INTO penjualan (truk, nama_customer, alamat, no_hp, jumlah_beli, status_bayar, tanggal_transaksi, bank, no_rek, total_harga,owner)
                             VALUES ('$idtruk', '$nama_customer', '$alamat', '$no_hp', '$jumlah_beli', '$status_bayar', '$tanggal_transaksi', '$bank', '$no_rek', '$total_harga','$idAdmin')";
            if (!mysqli_query($koneksi, $insert_query)) {
                throw new Exception("Error inserting data into the penjualan table: " . mysqli_error($koneksi));
            }

            // Query kedua: UPDATE pembelian
            $update_query = "UPDATE pembelian SET jumlah_beli = jumlah_beli - $jumlah_beli WHERE id = '$idpembelian'";
            if (!mysqli_query($koneksi, $update_query)) {
                throw new Exception("Error updating data in the pembelian table: " . mysqli_error($koneksi));
            }

            $cek = mysqli_query($koneksi, "SELECT jumlah_beli
                                          FROM pembelian
                                          WHERE id = '$idpembelian';");
            $isZero = mysqli_fetch_array($cek)['jumlah_beli'];

            if ($isZero == 0) {
                $update_query = "DELETE FROM aset WHERE id = '$idaset'";
                if (!mysqli_query($koneksi, $update_query)) {
                    throw new Exception("Error updating data in the pembelian table: " . mysqli_error($koneksi));
                }
            }

            //Hitung total units Terjual Untuk Di Tampilkan Pada Laporan
            $totaljual = isset($_SESSION['total_jual']) ? $_SESSION['total_jual'] : 0;
            $totaljual += $jumlah_beli;
            $_SESSION['total_jual'] = $totaljual;


            // Commit transaksi jika kedua query berhasil
            mysqli_commit($koneksi);

            header("Location: tableunit.php?status_jual=success_jual");

            exit();
        } catch (Exception $e) {
            // Rollback transaksi jika salah satu query gagal
            mysqli_rollback($koneksi);
            throw $e;
        }
    }
} catch (Exception $e) {
    // Tangani exception
    echo "Caught exception: " . $e->getMessage();
} finally {
    // Tutup koneksi
    mysqli_close($koneksi);
}
