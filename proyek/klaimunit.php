<?php
include 'koneksi.php';
session_start();

$buyId = $_GET["buyid"];

// Mulai transaksi
mysqli_autocommit($koneksi, FALSE);

try {
    $result = mysqli_query($koneksi, "SELECT total_bayar FROM pembelian WHERE id = '$buyId'");

    if ($result) {
        $idasset = mt_rand();
        $row = mysqli_fetch_assoc($result);
        $hargajual = $row["total_bayar"] * 2;

        // Langkah 1: Insert data ke dalam tabel 'aset'
        mysqli_query($koneksi, "INSERT INTO aset VALUES('$idasset', $hargajual, '$buyId')");

        // Langkah 2: Update data di dalam tabel 'pembelian'
        mysqli_query($koneksi, "UPDATE pembelian SET klaim = true WHERE id = '$buyId'");
        
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
}

// Tutup koneksi
mysqli_close($koneksi);
?>
