<?php
include "koneksi.php";

    $harga_jual= $_POST["harga_jual"];
    $id_aset = $_GET["idaset"];
    echo $id_aset;
  
    try {
        $query_update = mysqli_query($koneksi, "UPDATE aset SET harga_jual = $harga_jual WHERE id = '$id_aset'");

        if ($query_update) {
            // Jika update berhasil, kembalikan ke halaman sebelumnya
            header("Location: tableunit.php");
            exit();
        } else {
            // Jika update gagal, tampilkan pesan error
            echo "Error updating record: " . mysqli_error($koneksi);
        }
    }catch(Exception $e) {
        echo $e->getMessage();
    }finally{
        mysqli_close($koneksi);

    }

?>

