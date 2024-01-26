<?php
include "warifheader.php"
?>

<!--conten utama-->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

  <!--mengambil pesan dari url untuk merespon sesuai apa yang di lakukan admin dalam halaman table uniti ini -->
  <?php
  // ...
  // Set pesan default
  $pesan = '';
  // Periksa status dari parameter URL
  if (isset($_GET['status'])) {
    if ($_GET['status'] === 'success') {
      echo '
                <div class="toast-container position-fixed end-0 p-3">
                  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header bg-success">
                     
                      <strong class="me-auto text-dark">WARIF CORPORATION</strong>
                      <small class="text-dark">Baru Saja</small>
                      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                      Pembayaran Sukses
                    </div>
                  </div>
                </div>';
    } else if ($_GET['status'] === 'error') {
      echo '<div class="toast-container position-fixed end-0 p-3">
                <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                  <div class="toast-header bg-danger">
                   
                    <strong class="me-auto text-dark">WARIF CORPORATION</strong>
                    <small class="text-dark">Baru Saja</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                  </div>
                  <div class="toast-body text-danger ">
                  Pembelian Gagal Saldo Anda Tidak Mencukupi Untuk Melakukan Pembelian Unit Ini
                   
                  </div>
                  
                </div>
              </div>';
    }
  }

  ?>
  <div class="container mt-4 ">
    <h4 class=" mb-3">WARIF UNIT MANAJEMEN</h4>
    <div class="card mb-4">
      <h5 class="card-header">Note</h5>
      <div class="card-body">
        <h5 class="card-title">Manajemen Aset Unit Anda</h5>
        <p class="card-text">Selamat datang di halaman Manajemen Unit Anda!
          Terima kasih telah melakukan pembelian unit di aplikasi kami. Sekarang, unit yang Anda beli akan ditampilkan di halaman ini, memberi Anda kontrol penuh untuk mengelolanya. Di sini, Anda dapat melakukan berbagai tindakan untuk mengoptimalkan kinerja dan pengalaman Anda. Selamat berjualan dan berinteraksi dalam komunitas kami! Jika ada pertanyaan lebih lanjut atau bantuan yang diperlukan, jangan ragu untuk menghubungi tim dukungan pelanggan kami.
        </p>
      </div>
    </div>
    <!--table unit-->
    <h4 class="mb-4">Table Unit</h4>
    <div class="card mb-5">
      <!-- Tombol Tambah Unit -->
      <div class="card-header bg-secondary d-sm-inline-flex  justify-content-between">
        <a href="tambah_unit.php"><button type="button" class="btn btn-warning btn-sm mb-1" data-bs-toggle="modal" data-bs-target="#tambahUnitModal">
            Tambah Unit
          </button></a>
        <div class="d-flex gap-2" role="search">
          <input class="form-control me-1 " type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-sm btn-warning" type="submit">Search</button>
        </div>
      </div>
      <!-- Tabel CRUD -->
      <div class="card-body">
        <div class="table-responsive text-center ">
          <table class="table align-middle table-bordered table-hover rounded ">
            <thead class="table-warning">
              <tr>
                <th scope="col-sm-3 col-md-2">Unit</th>
                <th scope="col-sm-3 col-md-2">Tanggal Beli</th>
                <th scope="col-sm-3 col-md-2">Harga Beli/unit</th>
                <th scope="col-sm-3 col-md-2">Jumlah</th>
                <th scope="col-sm-3 col-md-2">Harga Jual/unit</th>
                <th scope="col-sm-3 col-md-2">Vendor</th>
                <th scope="col-sm-3 col-md-2">Foto Unit</th>
                <th scope="col-sm-3 col-md-2">Produksi</th>
                <th scope="col-sm-3 col-md-2">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include "koneksi.php";

              $query = mysqli_query($koneksi, " SELECT aset.id,truk.nama,pembelian.jumlah_beli,pembelian.tanggal_beli,truk.harga, aset.harga_jual,truk.vendor,truk.foto,truk.tahun_produksi,pembelian.id AS idpembelian FROM aset JOIN pembelian ON aset.pembelian = pembelian.id JOIN truk ON pembelian.truk = truk.id JOIN admin ON pembelian.owner = admin.id WHERE admin.id = '" . $_SESSION["idadmin"] . "';");

              while ($d = mysqli_fetch_array($query)) {

              ?>
                <tr>
                  <p class="visually-hidden "><?php echo $d['id'] ?></p>
                  <td><?php echo $d['nama'] ?></td>
                  <td><?php echo $d['tanggal_beli'] ?></td>
                  <td>RP. <?php echo number_format($d['harga'], 0, ',', '.'); ?></td>
                  <td><?php echo $d["jumlah_beli"] ?></td>
                  <td>RP. <?php echo number_format($d['harga_jual'], 0, ',', '.'); ?></td>
                  <td><?php echo $d['vendor'] ?></td>
                  <td><img src="<?php echo $d["foto"]; ?>" alt="Foto Unit" class="image-container " height="100px" width="190px"></td>
                  <td><?php echo $d['tahun_produksi'] ?></td>
                  <td>
                    <?php
                    if (isset($_GET['idaset']) && $_GET["idaset"] == $d["id"]) {
                      $idaset = $_GET["idaset"]
                    ?>
                      <form method="post" action="edit_harga.php?idaset=<?php echo $idaset ?>">
                        <div class="m-2">
                          <label for="harga_jual" class="form-label"></label>
                          <input type="number" class="form-control" name="harga_jual" id="harga_jual" required>
                        </div>

                        <div class="m-2">
                          <button type="submit" class="btn btn-primary ">Edit</button>
                          <button type="button" class="btn btn-danger " data-bs-dismiss="modal" onclick="window.location.href='tableunit.php'">Batal</button>
                        </div>
                      </form>
        </div>
      <?php } else { ?>
        <div class="d-flex flex-column">
          <button type="button" class="btn btn-sm btn-warning" onclick="window.location.href='tableunit.php?idaset=<?php echo $d['id'] ?>'">Edit Harga</button>
          <a href="jual_unit.php?idaset=<?php echo $d['id'] ?>&idpembelian=<?php echo $d['idpembelian'] ?>"><button type="button" class="btn btn-sm btn-info mt-2 ">Jual Unit</button></a>
        </div>
      <?php } ?>
      </td>
      </tr>
    <?php } ?>
    </tbody>
    </table>
      </div>
    </div>
  </div>


  <!--klaim unit-->
  <div class="card text-center mb-5">
    <div class="card-header">
      <h5 class="card-title text-success ">Klaim Dan Bayar Unit</h5>
    </div>
    <div class="card-body d-flex justify-content-center flex-wrap gap-5">
      <?php
      include "koneksi.php";
      $query = mysqli_query($koneksi, " SELECT truk.foto, truk.nama, pembelian.jumlah_beli, pembelian.total_bayar,pembelian.id,truk.id AS idtruk
                from pembelian
                join truk on pembelian.truk = truk.id
                join admin on pembelian.owner = admin.id
                where admin.id = '" . $_SESSION["idadmin"] . "' AND pembelian.klaim = 0; 
               ");
      if (mysqli_num_rows($query) != 0) {
        while ($e = mysqli_fetch_array($query)) {
      ?>
          <div class="card" style="width: 38rem;">
            <img src="<?php echo $e["foto"]; ?>" class="card-img-top" alt="truk foto">
            <div class="card-body">
              <h5 class="card-title"><?php echo $e["nama"]; ?></h5>
              <p>Jumlah Beli <?php echo $e["jumlah_beli"]; ?></p>
              <p class="card-text">RP. <?php echo number_format($e['total_bayar'], 0, ',', '.'); ?></p>
              <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">Klaim Dan Bayar Unit</button>
             
              <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">Batal</button>
            </div>
          </div>

          <!--modal konfirmasi klaim-->
          <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header bg-info-subtle">
                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Unit DI Terima</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Saldo Anda Akan Di Tarik Sesuai Jumlah Total Bayar
                </div>
                <div class="modal-footer bg-info-subtle ">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                  <a href="klaimunit.php?buyid=<?php echo $e["id"]; ?>&trukid=<?php echo $e["idtruk"]; ?>" class="btn btn-outline-info">Klaim Unit</a>
                </div>
              </div>
            </div>
          </div>

          <!--modal batal klaim-->
          <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header bg-danger-subtle">
                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Batal Klaim Unit</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Pembelian Akan Di Batalkan 
                </div>
                <div class="modal-footer bg-danger-subtle ">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <a href="batalklaimunit.php?buyid=<?php echo $e["id"]; ?>" class="btn btn-outline-danger">Batal Klaim</a>
                </div>
              </div>
            </div>
          </div>
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
  
</main>


<script>
  //mengatur toast
  document.addEventListener('DOMContentLoaded', function() {
    const toastLiveExample = new bootstrap.Toast(document.getElementById('liveToast'), {
      delay: 8000
    });
    toastLiveExample.show();
  });
</script>