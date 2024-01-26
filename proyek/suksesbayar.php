<?php
include 'koneksi.php';
session_start();

$idPenjualan = $_GET["idpenjualan"];
$idSaldo = $_SESSION["idsaldo"];


mysqli_autocommit($koneksi, FALSE);


try {
    $query = mysqli_query($koneksi,"SELECT total_harga from penjualan WHERE id = $idPenjualan") ;

    $row = mysqli_fetch_assoc($query);
    $total_harga = $row["total_harga"];

    mysqli_query($koneksi,"UPDATE penjualan SET status_bayar = true WHERE id = $idPenjualan");
   
    mysqli_query($koneksi,"UPDATE saldo SET nominal = nominal + $total_harga WHERE id = '$idSaldo'");


        mysqli_commit($koneksi);

        header("Location: transaksi.php");
        exit();

} catch (Exception $e) {
    // Rollback transaksi jika terjadi kesalahan
    mysqli_rollback($koneksi);
    
    echo "Transaksi gagal: " . $e->getMessage();
}

// Tutup koneksi
mysqli_close($koneksi);
?>
