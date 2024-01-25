<?php
include "koneksi.php";

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $nama_customer = $_POST['nama_customer'];
        $alamat = $_POST['alamat'];
        $no_hp = $_POST['no_hp'];
        $bank = $_POST['bank'];
        $no_rek = $_POST['no_rek'];
        $jumlah_beli = $_POST['jumlah_beli'];
        $status_bayar = 0; 
        $tanggal_transaksi = date('Y-m-d'); 

       
        $query = mysqli_query($koneksi, "SELECT aset.harga_jual
                                        FROM aset
                                        WHERE aset.id = '" . $_GET['idaset'] . "';");
        $harga_jual = mysqli_fetch_array($query)['harga_jual'];
        $total_harga = $harga_jual * $jumlah_beli;

        
        $insert_query = "INSERT INTO penjualan (aset, nama_customer, alamat, no_hp, jumlah_beli, status_bayar, tanggal_transaksi, bank, no_rek, total_harga)
                        VALUES ('" . $_GET['idaset'] . "', '$nama_customer', '$alamat', '$no_hp', '$jumlah_beli', '$status_bayar', '$tanggal_transaksi', '$bank', '$no_rek', '$total_harga')";

        if (mysqli_query($koneksi, $insert_query)) {
            
            echo "Data has been successfully inserted into the penjualan table.";
        } else {
            
            throw new Exception("Error inserting data into the penjualan table: " . mysqli_error($koneksi));
        }
    }
} catch (Exception $e) {
  
    echo "Caught exception: " . $e->getMessage();
} finally {
    mysqli_close($koneksi);
}
?>
