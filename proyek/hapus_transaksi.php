<?php
// delete_transaksi.php
include "koneksi.php";

if (isset($_GET['id'])) {
  $id_transaksi = $_GET['id'];

  // Check the status before deletion
  $query_check_status = mysqli_query($koneksi, "SELECT status_bayar FROM penjualan WHERE id = $id_transaksi");
  $status = mysqli_fetch_assoc($query_check_status)['status_bayar'];

  if ($status) {
    // Perform the deletion if the status is 'SUKSES'
    $query_delete_transaksi = mysqli_query($koneksi, "DELETE FROM penjualan WHERE id = $id_transaksi");

    // Redirect back to the table page or do any other necessary action
    header('Location: transaksi.php');
    exit();
  } else {
    // If the status is not 'SUKSES', handle accordingly (e.g., show an error message)
    echo "Cannot delete the transaction with status 'BLUM BAYAR'";
  }
  mysqli_close($koneksi);

}
?>
