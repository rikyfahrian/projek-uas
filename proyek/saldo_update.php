<?php
include 'koneksi.php';

$id = $_POST['id_saldo'];
$nama_lengkap = $_POST['nama_lengkap'];
$perusahaan = $_POST['perusahaan'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$hp = $_POST['no_hp'];
$bank = $_POST['bank'];
$rekening = $_POST['rekening'];
$no_rekening = $_POST['no_rekening'];
$nominal = $_POST['nominal'];

$query = "UPDATE saldo SET 
    nama_lengkap = '$nama_lengkap',
    perusahaan = '$perusahaan',
    alamat = '$alamat',
    no_hp = '$hp',
    bank = '$bank',
    rekening = '$rekening',
    no_rekening = '$no_rekening',
    nominal = '$nominal',
    email = '$email'
    WHERE id_saldo = '$id'";

mysqli_query($koneksi, $query);

header("location: atursaldo.php");
?>
