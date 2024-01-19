<?php
include 'koneksi.php';

$id_truk = $_POST['id_truk'];
$nama_pembeli = $_POST['nama_pembeli'];
$email_pembeli = $_POST['email_pembeli'];
$lokasi_gudang = $_POST['lokasi_gudang'];
$no_hp = $_POST['no_hp'];
$jumlah_beli = $_POST['jumlah_beli'];
$harga_truk = $_POST['harga_truk'];
$total_bayar = floatval($harga_truk) * floatval($jumlah_beli);

mysqli_begin_transaction($koneksi);

try {
    // Query 1: Insert into pembelian table using prepared statement
    $query1 = "INSERT INTO pembelian (atas_nama, email_pembeli, lokasi_gudang, jumlah_beli, total_harga, no_hp, id_unit) 
              VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    $stmt1 = mysqli_prepare($koneksi, $query1);
    mysqli_stmt_bind_param($stmt1, "sssisds", $nama_pembeli, $email_pembeli, $lokasi_gudang, $jumlah_beli, $total_bayar, $no_hp, $id_truk);
    mysqli_stmt_execute($stmt1);
    mysqli_stmt_close($stmt1);

    // Query 2: Update saldo table using prepared statement
    $query2 = "UPDATE saldo SET nominal = nominal - ? WHERE nama_lengkap = ?";
    $stmt2 = mysqli_prepare($koneksi, $query2);
    mysqli_stmt_bind_param($stmt2, "ds", $total_bayar, $nama_pembeli);
    mysqli_stmt_execute($stmt2);
    mysqli_stmt_close($stmt2);

    // If no exception occurred, commit the transaction
    mysqli_commit($koneksi);

    $id_truk = isset($_GET['id_truk']) ? $_GET['id_truk'] : 
    header("Location: beli_unit.php?id_truk=$id_truk&status=success");

} catch (mysqli_sql_exception $x) {
    mysqli_rollback($koneksi);
    echo "Error: " . $x->getMessage();
}
?>
