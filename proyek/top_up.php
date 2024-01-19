<?php
include "koneksi.php";

// Pastikan $_POST['top_up'] memiliki nilai dan merupakan angka yang valid
if (isset($_POST['top_up']) && is_numeric($_POST['top_up'])) {
    $a = $_POST['top_up'];
    $b = $_POST['nominal'];
    $c = $a + $b;

    // Sesuaikan query UPDATE dengan WHERE yang sesuai
    $query = mysqli_query($koneksi, "UPDATE saldo SET nominal='$c' WHERE id_saldo ");
    
    if ($query) {
        header("Location: atursaldo.php?status=topup_berhasil");
    } else {
        echo "Top-up gagal";
    }
} else {
    echo "Jumlah top-up tidak valid";
}
?>
