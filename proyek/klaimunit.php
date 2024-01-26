<?php
include 'koneksi.php';
session_start();

$buyId = $_GET["buyid"];
$trukid = $_GET["trukid"];


// Mulai transaksi
mysqli_autocommit($koneksi, FALSE);

try {
    $result = mysqli_query($koneksi, "SELECT total_bayar FROM pembelian WHERE id = '$buyId'");

    if ($result) {
        $idasset = mt_rand();
        $row = mysqli_fetch_assoc($result);

        $truk = mysqli_query($koneksi, "SELECT harga FROM truk WHERE id = '$trukid'");
        $rowTruck = mysqli_fetch_assoc($truk);
        $hargajual = $rowTruck["harga"] * 2;

        // Langkah 1: Insert data ke dalam tabel 'aset'
        mysqli_query($koneksi, "INSERT INTO aset VALUES('$idasset', $hargajual, '$buyId')");

        // Langkah 2: Update data di dalam tabel 'pembelian'
        mysqli_query($koneksi, "UPDATE pembelian SET klaim = true WHERE id = '$buyId'");

        if($_SESSION["currentsaldo"] < $row["total_bayar"]) {
            mysqli_rollback($koneksi);
            header("Location: tableunit.php?status=error");
            exit();
        }

        mysqli_query($koneksi, "UPDATE saldo SET nominal = nominal - '". $row['total_bayar'] ."' WHERE id = '".$_SESSION['idsaldo']."' ");

        
        
        // Commit transaksi
        mysqli_commit($koneksi);
        
        header("Location: tableunit.php?status=success");
        exit();
    } else {
        header("Location: tableunit.php?status=error");
        exit();
    }
} catch (Exception $e) {
    // Rollback transaksi jika terjadi kesalahan
    mysqli_rollback($koneksi);
    
    echo "Transaksi gagal: " . $e->getMessage();
}finally{

mysqli_close($koneksi);
}
?>
