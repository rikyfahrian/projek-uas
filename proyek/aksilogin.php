<?php 
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);


try {
    $data = mysqli_query($koneksi,"SELECT * from admin WHERE username = '$username' and password='$password' ");

    $cek = mysqli_num_rows($data);
    $row = mysqli_fetch_assoc($data);

    if($cek > 0){
        $_SESSION['username'] = $username;
        $_SESSION['idadmin'] = $row["id"];
        $_SESSION['status'] = "berhasillogin";
    
        header("location:landingpage.php");
    }

    else {
        header("location:loginpage.php?pesan=gagallogin");
    }
}catch(Exception $e) {
    echo $e->getMessage();
}finally {
mysqli_close($koneksi);
}
?>