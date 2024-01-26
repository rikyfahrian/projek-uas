<?php 

include "koneksi.php";

$nama = $_POST["nama"];
$username= $_POST["username"];
$password = md5($_POST["password"]);
$alamat = $_POST["alamat"];
$email = $_POST["email"];
$perusahaan = $_POST["perusahaan"];
$no_hp = $_POST["no_hp"];
$bank = $_POST["bank"];
$foto = "https://i.pinimg.com/564x/6c/71/00/6c710071156101b4811d3c9c336defbf.jpg";
$no_rekening = $_POST["no_rekening"];

try {
    mysqli_autocommit($koneksi, FALSE);
    $idSaldo = mt_rand();

    $result1 =mysqli_query($koneksi,"INSERT INTO saldo VALUES ('$idSaldo','$bank','$no_rekening',0)");
 
    $idAdmin = mt_rand();
    
    $result2 = mysqli_query($koneksi,"INSERT INTO admin VALUES ('$idAdmin','$nama','$username','$password','$foto','$email','$no_hp','$idSaldo','$perusahaan','$alamat')");


    mysqli_commit($koneksi);

    echo "berhasil Regis";


}catch(Exception $e) {
    mysqli_rollback($koneksi);

    echo $e->getMessage();
}


?>