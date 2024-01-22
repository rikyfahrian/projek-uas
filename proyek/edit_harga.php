<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang dikirim melalui form
    $id_aset = $_POST["id_aset"];
    $harga_jual= $_POST["harga_jual"];

    // Update harga jual di database
    $query_update = mysqli_query($koneksi, "UPDATE aset SET harga_jual = '$harga_jual' WHERE id_aset = '$id_aset'");

    if ($query_update) {
        // Jika update berhasil, kembalikan ke halaman sebelumnya
        header("Location: tableunit.php");
        exit();
    } else {
        // Jika update gagal, tampilkan pesan error
        echo "Error updating record: " . mysqli_error($koneksi);
    }
}

?>

