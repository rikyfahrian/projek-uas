<?php
include 'koneksi.php';

$id_admin = $_POST['id_admin'];
$nama_lengkap = $_POST['nama_lengkap'];
$perusahaan = $_POST['perusahaan'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$hp = $_POST['no_hp'];
$bank = $_POST['bank'];
$rekening = $_POST['rekening'];
$no_rekening = $_POST['no_rekening'];
$nominal = $_POST['nominal'];

// Cek jika user sudah punya data saldo di database
$result = mysqli_query($koneksi, "SELECT * FROM saldo WHERE id_saldo");
if (mysqli_num_rows($result) > 0) {
    // jika sudah punya maka kirim pesan melalui url ke saldo.php
    header("location: saldo.php?message=Anda%20telah%20memiliki%20data%20saldo,%20tidak%20bisa%20membuat%20baru");

    exit();
} else {
    // Jika Belum maka form input bisa di isi
    mysqli_query($koneksi, "INSERT INTO saldo VALUES('', '$nama_lengkap', '$perusahaan', '$alamat', '$hp', '$bank', '$rekening', '$no_rekening', '$nominal', '$email','$id_admin')");
    
    // Memberi Pemberitahuan sukses insert data
    header("location: saldo.php?message=Saldo%20has%20been%20successfully%20created");
    exit();
}
?>
