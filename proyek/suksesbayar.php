<?php
include "koneksi.php";
session_start();

$idPenjualan = $_GET["idpenjualan"];
$idSaldo = $_SESSION["idsaldo"];

mysqli_autocommit($koneksi, FALSE);

try {
    $query = mysqli_query($koneksi, "SELECT penjualan.id, penjualan.status_bayar, penjualan.nama_customer,
                                    truk.nama AS nama_truk, penjualan.alamat, penjualan.no_hp,
                                    penjualan.jumlah_beli, penjualan.tanggal_transaksi,
                                    penjualan.bank, penjualan.no_rek, penjualan.total_harga,
                                    truk.harga
                            FROM penjualan
                            JOIN truk ON penjualan.truk = truk.id
                            WHERE penjualan.id = $idPenjualan");

    $row = mysqli_fetch_assoc($query);
    $total_harga = $row["total_harga"];
    $harga_beli = $row["harga_beli"];
    $keuntungan = $total_harga - $harga_beli;


    $_SESSION['total_profit'] += $keuntungan;

    mysqli_commit($koneksi);
    
    mysqli_query($koneksi, "UPDATE penjualan SET status_bayar = true WHERE id = $idPenjualan");

    mysqli_query($koneksi, "UPDATE saldo SET nominal = nominal + $total_harga WHERE id = '$idSaldo'");

    mysqli_commit($koneksi);

    // Redirect ke halaman transaksi dengan pesan sukses
    header("Location: transaksi.php?status_bayar=telah_bayar&keuntungan=$keuntungan");
    exit();
} catch (Exception $e) {
    // Rollback transaksi jika terjadi kesalahan
    mysqli_rollback($koneksi);

    echo "Transaksi gagal: " . $e->getMessage();
}finally {

// Tutup koneksi
mysqli_close($koneksi);
}
?>
