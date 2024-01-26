<?php
// invoice.php

include "warifheader.php";
include "koneksi.php";

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $id_transaksi = $_GET['id'];

    // Fetch detailed information for the selected transaction
    $query_detail = mysqli_query($koneksi, "
        SELECT penjualan.id, penjualan.status_bayar, penjualan.nama_customer,
               truk.nama AS nama_truk, penjualan.alamat, penjualan.no_hp,
               penjualan.jumlah_beli, penjualan.tanggal_transaksi,
               penjualan.bank, penjualan.no_rek, penjualan.total_harga
        FROM penjualan
        JOIN truk ON penjualan.truk = truk.id
        WHERE penjualan.id = $id_transaksi
    ");

    $data_detail = mysqli_fetch_assoc($query_detail);

    // Display the detailed information on the page using a card layout
    if ($data_detail && isset($data_detail['nama_truk'])) {
        echo "
        <main class='col-md-9 ms-sm-auto col-lg-10 px-md-4'>
          <div class='container mt-4 mb-4 fw-semibold fs-5'>
            <p class='fw-semibold fs-3 text-warning-emphasis text-start '>Cetak Invoice Customer</p>
           <div class='d-flex gap-2 mb-3'>
            <button class='btn btn-warning' onclick='printInvoice()'>
                 <i class='fas fa-print'></i> Print Invoice
          </button>
          <a href='transaksi.php'><button class='btn btn-outline-success'>
               Kembali
            </button></a>
            </div>
            
            <div class='card' id='invoiceCard'>
              <div class='card-header'>
                <h3 class='card-title'>Invoice Detail for Transaction ID: {$data_detail['id']}</h3>
              </div>
              <div class='card-body'>
                <p class='card-text text-warning-emphasis fs-4 mb-2'>Warif Corporation</p>
                <p class='card-text'>Customer: {$data_detail['nama_customer']}</p>
                <p class='card-text'>Truk: {$data_detail['nama_truk']}</p>
                <p class='card-text'>Alamat: {$data_detail['alamat']}</p>
                <p class='card-text'>No HP: {$data_detail['no_hp']}</p>
                <p class='card-text'>Jumlah Beli: {$data_detail['jumlah_beli']}</p>
                <p class='card-text'>Tanggal Transaksi: {$data_detail['tanggal_transaksi']}</p>
                <p class='card-text'>Bank: {$data_detail['bank']}</p>
                <p class='card-text'>NO REK: {$data_detail['no_rek']}</p>
                <p class='card-text'>Total Bayar: RP. " . number_format($data_detail['total_harga'], 0, ',', '.') . "</p>
                <p class='card-text text-warning-emphasis  '>Status: " . ($data_detail['status_bayar'] ? 'SUKSES' : 'BELUM BAYAR') . "</p>
                
                <!-- Add more details as needed -->
              </div>
            </div>
          </div>
         
          <script>
        function printInvoice() {
            // Dapatkan isi elemen invoiceCard
            var invoiceContent = document.getElementById('invoiceCard').innerHTML;

            // Buat dokumen baru dan tambahkan isi invoiceCard
            var newWindow = window.open('', '_blank');
            newWindow.document.open();
            newWindow.document.write('<html><head><title>Invoice</title></head><body>');
            newWindow.document.write(invoiceContent);
            newWindow.document.write('</body></html>');
            newWindow.document.close();

            // Panggil metode print pada dokumen baru
            newWindow.print();
            newWindow.close();
        }
    </script>
        

        </main>
      ";
    } else {
        // Jika data tidak ditemukan atau kunci tidak ada, mungkin tampilkan pesan kesalahan atau redirect ke halaman lain
        echo "Data transaksi tidak ditemukan atau struktur data tidak sesuai.";
    }
} else {
    // Redirect to the main table page if 'id' is not set
    header("Location: table_uniti.php");
    exit();
}

mysqli_close($koneksi);
