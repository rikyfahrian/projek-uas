<?php
include "warifheader.php";
?>

<!--mengambil pesan dari url untuk merespon sesuai apa yang di lakukan admin dalam halaman table uniti ini -->
<?php
// ...
// Set pesan default
$pesan = '';
// Periksa status dari parameter URL
if (isset($_GET['status_bayar'])) {
  if ($_GET['status_bayar'] === 'telah_bayar') {
    echo '
                <div class="toast-container position-fixed end-0 p-3">
                  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header bg-success">
                     
                      <strong class="me-auto text-dark">WARIF CORPORATION</strong>
                      <small class="text-dark">Baru Saja</small>
                      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body text-success-emphasis fw-semibold fs-5">
                      Telah Konfrimasi Bayar, saldo telah bertambah
                    </div>
                  </div>
                </div>';
  }
}

?>

<!--mengambil pesan dari url untuk merespon sesuai apa yang di lakukan admin dalam halaman table uniti ini -->
<?php
// ...
// Set pesan default
$pesan = '';
// Periksa status dari parameter URL
if (isset($_GET['status_edit'])) {
  if ($_GET['status_edit'] === 'sukses_edit') {
    echo '
                <div class="toast-container position-fixed end-0 p-3">
                  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header bg-success">
                     
                      <strong class="me-auto text-dark">WARIF CORPORATION</strong>
                      <small class="text-dark">Baru Saja</small>
                      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                      Data Berhasil Di Edit
                    </div>
                  </div>
                </div>';
  }
}

?>

<!--conten utama-->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="container mt-4 mb-4">
    <p class="fw-semibold fs-3 text-info-emphasis ">Transaksi Customer</p>

    <div class="card bg-info-subtle ">
      <div class="card-header">
        Note
      </div>
      <div class="card-body">
        <h5 class="card-title">Fitur Transaksi Warif Corporation</h5>
        <p class="card-text">Data Transaksi akan muncul di sini jika ada customer yang membeli unit anda, anda bisa melihat status pembayaran customer dan melihat data detail customer di halaman ini, Konfirmasi Penemerimaan Uang Dari Customer Dan Saldo Akan Bertambah Sesuai Total Bayar Dari Customer</p>
      </div>
      <div class="card-footer text-body-secondary">
        Warif Corporation
      </div>
    </div>

    <!--table transaksi-->
    
    <div class="row mt-4 text-center ">
      <p class="fw-semibold fs-3 text-success-emphasis text-start ">Table Transaksi</p>
   
      <div class="col">
      <div class="card ">
      <div class="card-header bg-secondary-subtle  d-sm-inline-flex  justify-content-end">
          <p class="text-success-emphasis fs-6 fw-light ">Note: Data Tidak Bisa Di Hapus Sebelum Anda Menerima Pembayaran</p>
      </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table align-middle table-bordered table-hover rounded ">
              <thead class="table-success ">

                <tr>
                  <th scope="col">id</th>
                  <th scope="col">Nama Customer</th>
                  <th>Truk</th>
                  <th scope="col">Alamat</th>
                  <th scope="col">No HP</th>
                  <th scope="col">Jumlah Beli</th>
                  <th scope="col">tanggal_transaksi</th>
                  <th scope="col">Bank</th>
                  <th scope="col">NO REK</th>
                  <th class="col-sm-3 col-md-2">Total Bayar</th>
                  <th scope="col-sm-3 col-md-2">Status</th>
                  <th scope="col-sm-3 col-md-2">Action</th>
                </tr>

              </thead>
              <tbody>

                <?php
                include "koneksi.php";
                $query = mysqli_query($koneksi, " SELECT penjualan.id,penjualan.status_bayar, penjualan.nama_customer, truk.nama AS nama_truk, penjualan.alamat, penjualan.no_hp ,penjualan.jumlah_beli,penjualan.tanggal_transaksi, penjualan.bank, penjualan.no_rek, penjualan.total_harga
                from penjualan
                join truk on penjualan.truk = truk.id
                where penjualan.owner = '" . $_SESSION["idadmin"] . "'; 
               ");
                if (mysqli_num_rows($query) != 0) {
                  while ($e = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                      <input type="hidden" name="id_aset" value="">
                      <th scope="row"><?php echo $e["id"]; ?></th>
                      <td><?php echo $e["nama_customer"]; ?></td>
                      <td><?php echo $e["nama_truk"]; ?></td>
                      <td><?php echo $e["alamat"]; ?></td>
                      <td><?php echo $e["no_hp"]; ?></td>


                      <td> <?php echo $e["jumlah_beli"]; ?></td>
                      <td><?php echo $e["tanggal_transaksi"]; ?></td>
                      <td><?php echo $e["bank"]; ?></td>
                      <td><?php echo $e["no_rek"]; ?></td>
                      <td><?php echo number_format($e['total_harga'], 0, ',', '.') ?></td>
                      <td class="text-warning-emphasis "><?php echo ($e["status_bayar"]) ? "LUNAS" :  "BLUM BAYAR"; ?></td>
                      <td>
                        <div class="d-inline-flex gap-2 ms-auto  ">
                        <a href="invoice.php?id=<?php echo $e['id']; ?>" class="btn btn-sm btn-outline-warning">Invoice</a>
                          <a href="edit_transaksi.php?id=<?php echo $e['id']; ?>"><button class="btn btn-sm btn-outline-success" type="button">Edit</button></a>
                          <?php if ($e["status_bayar"]) { ?>
                            <button class="btn btn-sm btn-outline-danger" type="button" onclick="hapusdata(<?php echo $e['id']; ?>)">Hapus</button>
                          <?php } else { ?>
                            <button class="btn btn-sm btn-outline-danger" type="button" disabled>Hapus</button>
                          <?php } ?>
                        </div>
                      </td>
                    </tr>
                <?php }
                } 
        mysqli_close($koneksi);
        ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>



  <!--klaim Pembayaran-->
  <div class="container mb-4">
    <p class="fw-semibold fs-3 text-success-emphasis ">Klaim Uang</p>
    <div class="card text-center ">
      <div class="card-header">
        <h5 class="card-title text-success ">Klaim Pembayaran dan Terima Uang Dari Customer</h5>
      </div>
      <div class="card-body d-flex justify-content-center flex-wrap gap-5">

        <?php
        include "koneksi.php";
        $query = mysqli_query($koneksi, " SELECT truk.nama,penjualan.jumlah_beli,penjualan.nama_customer,penjualan.alamat,penjualan.bank,penjualan.no_rek,penjualan.total_harga,penjualan.id
          from penjualan
          join truk on penjualan.truk = truk.id
          where penjualan.owner = '" . $_SESSION["idadmin"] . "' AND penjualan.status_bayar = false ; 
         ");
        if (mysqli_num_rows($query) != 0) {
          while ($e = mysqli_fetch_array($query)) {
        ?>

            <div class="card" style="width: max-content;">
              <div class="card-body text-start">
                <h5 class="card-title"><?php echo $e["nama"]; ?></h5>
                <p><?php echo $e["jumlah_beli"]; ?> Unit</p>
                <p>Nama Pembeli : <?php echo $e["nama_customer"]; ?></p>
                <p>Alamat : <?php echo $e["alamat"]; ?></p>
                <p>Bank : <?php echo $e["bank"]; ?></p>
                <p>NO REK : <?php echo $e["no_rek"]; ?></p>
                <p class="card-text">RP. <?php echo number_format($e['total_harga'], 0, ',', '.'); ?></p>
                <button type="button" class="btn btn-outline-success " onclick="window.location.href='suksesbayar.php?idpenjualan=<?php echo $e['id'] ?>'">Konfirmasi Pembayaran</button>
                
              </div>
            </div>
        <?php

          }
        mysqli_close($koneksi);

        } else {
          echo "<h2 class='text-success-emphasis fw-light '>Data Akan Muncul Setelah Ada Customer Yang Membeli Unit</h2>";
        }
        ?>
      </div>
      <div class="card-footer text-body-secondary">
        Warif Corporation
      </div>
    </div>
  </div>
  </div>

  <!-- Add this modal at the end of your HTML body -->
  <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content bg-danger-subtle">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteConfirmationModalLabel">Konfirmasi Penghapusan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Apakah Anda yakin ingin menghapus transaksi ini?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-danger" id="confirmDeleteButton">Hapus</button>
        </div>
      </div>
    </div>
  </div>
</main>


<script>
  //mengatur toast
  document.addEventListener('DOMContentLoaded', function() {
    const toastLiveExample = new bootstrap.Toast(document.getElementById('liveToast'), {
      delay: 8000
    });
    toastLiveExample.show();
  });


  function hapusdata(id) {
    const confirmDeleteButton = document.getElementById('confirmDeleteButton');
    confirmDeleteButton.addEventListener('click', function() {

      window.location.href = 'hapus_transaksi.php?id=' + id;
    });

    const deleteConfirmationModal = new bootstrap.Modal(document.getElementById('deleteConfirmationModal'));
    deleteConfirmationModal.show();
  }

   // Fungsi untuk mendapatkan nilai parameter dari URL
   function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
  }

  // Fungsi untuk menampilkan pesan toast dengan keuntungan
  function showProfitToast() {
    // Dapatkan nilai keuntungan dari URL
    var keuntungan = getParameterByName('keuntungan');

    // Tampilkan pesan toast
    var toastLiveExample = new bootstrap.Toast(document.getElementById('liveToast'), {
      delay: 8000
    });
    toastLiveExample.show();

    // Ubah teks pesan toast dengan menambahkan keuntungan
    var toastBody = document.querySelector('#liveToast .toast-body');
    toastBody.innerHTML = 'Telah Konfirmasi Bayar, saldo telah bertambah sebesar : +RP. ' + keuntungan;
  }

  // Panggil fungsi showProfitToast saat halaman selesai dimuat
  document.addEventListener('DOMContentLoaded', function() {
    showProfitToast();
  });
</script>
