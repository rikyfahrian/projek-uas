<?php
include "koneksi.php";
session_start();

$a = $_POST["top_up"];

try {
    // Buat prepared statement
    $stmt = mysqli_prepare($koneksi, "UPDATE saldo SET nominal = nominal + ? WHERE id = ?");

    // Jika terdapat kesalahan dalam membuat prepared statement
    if (!$stmt) {
        throw new Exception("Gagal membuat prepared statement: " . mysqli_error($koneksi));
    }

    // Bind parameter ke prepared statement
    mysqli_stmt_bind_param($stmt, "ii", $a, $_SESSION['idsaldo']);

    // Eksekusi prepared statement
    if (!mysqli_stmt_execute($stmt)) {
        throw new Exception("Gagal mengeksekusi prepared statement: " . mysqli_stmt_error($stmt));
    }

    // Tutup prepared statement
    mysqli_stmt_close($stmt);

    // Redirect atau lakukan tindakan lainnya setelah berhasil
    header("Location: saldo.php?status=topup_berhasil");
    exit();
} catch (Exception $e) {
    
    echo "Terjadi kesalahan: " . $e->getMessage();
}finally {
    mysqli_close($koneksi);

}

?>
