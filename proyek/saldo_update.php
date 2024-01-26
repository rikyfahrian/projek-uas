<?php
include 'koneksi.php';

// Pastikan session sudah dimulai
session_start();

$nama_lengkap = $_POST['nama_lengkap'];
$perusahaan = $_POST['perusahaan'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$hp = $_POST['no_hp'];

$id = $_SESSION['idadmin'];

try {
// Persiapkan query dengan prepared statement
    $query = "UPDATE admin SET 
        nama = ?,
        perusahaan = ?,
        alamat = ?,
        no_hp = ?,
        email = ?
        WHERE id = ?";

    // Buat prepared statement
    $stmt = mysqli_prepare($koneksi, $query);

    // Bind parameter ke prepared statement
    mysqli_stmt_bind_param($stmt, "sssssi", $nama_lengkap, $perusahaan, $alamat, $hp, $email, $id);

    // Eksekusi prepared statement
    mysqli_stmt_execute($stmt);

    // Tutup prepared statement
    mysqli_stmt_close($stmt);

    // Redirect ke halaman saldo.php
    header("location: saldo.php");
}catch(Exception $e) {
    echo $e->getMessage();
}finally {
    mysqli_close($koneksi);

}

?>
