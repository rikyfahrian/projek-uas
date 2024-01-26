<?php
include 'koneksi.php';
session_start();

$buyId = $_GET["buyid"];

try {
    $req = mysqli_query($koneksi,"DELETE FROM pembelian WHERE id = '$buyId'");

    if($req) {
        header("Location: tableunit.php");
        exit();

    }else {
    echo "error bang";
    }

}catch(Exception $e) {
    echo $e->getMessage();
}finally {
    mysqli_close($koneksi);
    }