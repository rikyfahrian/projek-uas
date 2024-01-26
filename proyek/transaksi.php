<?php
include "warifheader.php";
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
        <p class="card-text">Data Transaksi akan muncul di sini jika ada customer yang membeli unit anda, anda bisa melihat status pembayaran customer dan melihat data detail customer di halaman ini</p>
      </div>
      <div class="card-footer text-body-secondary">
        Warif Corporation
      </div>
    </div>

    <div class="row mt-4">
    <p class="fw-semibold fs-3 text-warning-emphasis ">Table Transaksi</p>
      <div class="col">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table align-middle table-bordered table-hover rounded ">
            <thead class="table-warning">

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
                <th>Status</th>
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
                    <td><?php echo ($e["status_bayar"]) ? "SUKSES" :  "BLUM BAYAR"; ?></td>
                  
                  </tr>
                  <?php }} ?>
                
            </tbody>
          </table>
        </div>
      </div>
    </div>
      </div>
    </div>



      <!--klaim unit-->
  <div class="card text-center container mb-4">
    <div class="card-header">
      <h5 class="card-title text-success ">Penjualan Ongoing</h5>
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
              <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#staticBackdrop1" onclick="window.location.href='suksesbayar.php?idpenjualan=<?php echo $e['id'] ?>'">Klaim Pembayaran</button>
              <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">Batalkan</button>
            </div>
          </div>

          <!--modal konfirmasi klaim-->
          <!-- <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header bg-info-subtle">
                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Pembayaran</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Saldo Anda Akan jadi banyak eak
                </div>
                <div class="modal-footer bg-info-subtle ">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                  <a href="suksesbayar.php?idpenjualan=<?php echo $e["id"]; ?>" class="btn btn-outline-info">Klaim Unit</a>
                </div>
              </div>
            </div>
          </div> -->

          <!--modal batal klaim-->
          <!-- <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header bg-danger-subtle">
                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Pembatalan</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Pembelian Akan Di Batalkan 
                </div>
                <div class="modal-footer bg-danger-subtle ">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <a href="" class="btn btn-outline-danger">Batal Klaim</a>
                </div>
              </div>
            </div>
          </div> -->
      <?php

        }
      } else { 
        echo "<h2 class='text-success-emphasis fw-light '>Data Pembelian Akan Tampil Setelah Anda Membeli Unit</h2>";
      }
      ?>
    </div>
    <div class="card-footer text-body-secondary">
      Warif Corporation
    </div>
  </div>
  </div>
  
</main>