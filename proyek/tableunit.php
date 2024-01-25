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
        <div class="table-responsive">
          <table class="table align-middle table-bordered table-hover rounded ">
            <thead class="table-warning">

              <tr>
                <th scope="col">id</th>
                <th scope="col">Nama Unit</th>
                <th scope="col">Tanggal Beli</th>
                <th scope="col">Harga Beli</th>
                <th scope="col">Jumlah Unit</th>
                <th scope="col">Harga Jual 1 Unit</th>
                <th scope="col">Vendor</th>
                <th scope="col">Foto Unit</th>
                <th scope="col">Tahun Produksi</th>
                <th class="col-sm-3 col-md-2">Action</th>
              </tr>

            </thead>
            <tbody>
              <?php
              include "koneksi.php";

              $query = mysqli_query($koneksi, " SELECT aset.id,truk.nama,pembelian.jumlah_beli,pembelian.tanggal_beli,truk.harga, aset.harga_jual,truk.vendor,truk.foto,truk.tahun_produksi FROM aset JOIN pembelian ON aset.pembelian = pembelian.id JOIN truk ON pembelian.truk = truk.id JOIN admin ON pembelian.owner = admin.id WHERE admin.id = '".$_SESSION["idadmin"]."';");

              while ($d = mysqli_fetch_array($query)) {
               
              ?>
                  
                  <tr>
                    <th scope="row"><?php echo $d['id'] ?></th>
                    <td><?php echo $d['nama'] ?></td>
                    <td><?php echo $d['tanggal_beli'] ?></td>
                    <td>RP. <?php echo number_format($d['harga'], 0, ',', '.'); ?></td>
                    <td><?php echo $d["jumlah_beli"] ?></td>
                 

                    <td>RP. <?php echo number_format($d['harga_jual'], 0, ',', '.'); ?></td>
                    <td><?php echo $d['vendor'] ?></td>
                  
                   
                    <td><img src="<?php echo $d["foto"]; ?>" alt="Foto Unit" class="image-container " height="100px"></td>

                    <td><?php echo $d['tahun_produksi'] ?></td>

                    <td class="d-sm-inline-flex gap-sm-2 p-3" >
                     
                      <?php
                        if (isset($_GET['idaset']) && $_GET["idaset"] == $d["id"]) {
                          $idaset= $_GET["idaset"]
                          ?>
                
                        <form method="post" action="edit_harga.php?idaset=<?php echo $idaset ?>" >
                      
                            <div class="m-2">
                              <label for="harga_jual" class="form-label"></label>
                              <input type="number" class="form-control" name="harga_jual" id="harga_jual" required>
                              </div>
                            </div>

                            <div class="m-2">
                            <button type="submit" class="btn btn-primary ">Edit</button>
                            <button type="button" class="btn btn-danger " data-bs-dismiss="modal" onclick="window.location.href='tableunit.php'">Batal</button>
                            </div>
                           </div>

                        </form>
                 
                      <?php }else { ?>
                       <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"  onclick="window.location.href='tableunit.php?idaset=<?php echo $d['id']?>'">Edit Harga Jual</button>
                       <button type="button" class="btn btn-sm btn-info">Jual Unit</button>
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
        <h5 class="card-title text-success ">Order Ongoing</h5>
      </div>
      <div class="card-body d-flex justify-content-center flex-wrap gap-5">
          <?php
              include "koneksi.php";

              $query = mysqli_query($koneksi, " SELECT truk.foto, truk.nama, pembelian.jumlah_beli, pembelian.total_bayar,pembelian.id,truk.id AS idtruk
                from pembelian
                join truk on pembelian.truk = truk.id
                join admin on pembelian.owner = admin.id
                where admin.id = '".$_SESSION["idadmin"]."' AND pembelian.klaim = 0;
              
               ");

               if (mysqli_num_rows($query) != 0) {

                      while ($e = mysqli_fetch_array($query)) {
                      ?>
                    <div class="card" style="width: 18rem;">
                      <img src="<?php echo $e["foto"]; ?>" class="card-img-top" alt="truk foto">
                          <div class="card-body">
                            <h5 class="card-title"><?php echo $e["nama"]; ?></h5>
                            <p>Jumlah Beli <?php echo $e["jumlah_beli"] ;?></p>
                            <p class="card-text">RP. <?php echo number_format($e['total_bayar'], 0, ',', '.'); ?></p>
                            
                            <a href="klaimunit.php?buyid=<?php echo $e["id"]; ?>&trukid=<?php echo $e["idtruk"]; ?>" class="btn btn-primary">Klaim</a>
                            <a href="batalklaimunit.php?buyid=<?php echo $e["id"]; ?>" class="btn btn-danger">Batal</a>

                          </div>
                    </div>
              
            <?php 

              }
              }else {
               echo "<h1>Blum Ada Transaksi</h1>";
              }
              ?>
      
  
      </div>
      <div class="card-footer text-body-secondary">
        Warif Corporation
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
</script>