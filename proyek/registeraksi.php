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
$no_rekening = $_POST["no_rekening"];

    $uploadDirectory = "../image/";

    $file = $_FILES["foto"];

    $fileName = $file["name"];
    $fileTmpName = $file["tmp_name"];
    $fileSize = $file["size"];
    $fileError = $file["error"];

    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $allowedExtensions = array("jpg", "jpeg", "png");

    if (in_array($fileExt, $allowedExtensions)) {
        if ($fileError === 0) {
            $newFileName = $fileName;
            $uploadPath = $uploadDirectory . $newFileName;

            move_uploaded_file($fileTmpName, $uploadPath);

            echo "File berhasil diupload!";
        } else {
            echo "Error saat upload file.";
        }
    } else {
        echo "Ekstensi file tidak diizinkan.";
    }


try {
    mysqli_autocommit($koneksi, FALSE);
    $idSaldo = mt_rand();

    $result1 =mysqli_query($koneksi,"INSERT INTO saldo VALUES ('$idSaldo','$bank','$no_rekening',0)");
 
    $idAdmin = mt_rand();
    
    $result2 = mysqli_query($koneksi,"INSERT INTO admin VALUES ('$idAdmin','$nama','$username','$password','$fileName','$email','$no_hp','$idSaldo','$perusahaan','$alamat')");


    mysqli_commit($koneksi);

    header("Location: register.php");
    exit();

}catch(Exception $e) {
    mysqli_rollback($koneksi);

    echo $e->getMessage();
}finally {
    mysqli_close($koneksi);

}


?>