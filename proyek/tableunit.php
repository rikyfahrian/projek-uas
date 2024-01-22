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
                <th scope="col">Harga Jual</th>
                <th scope="col">Vendor</th>
                <th scope="col">Foto Unit</th>
                <th scope="col">Tahun Produksi</th>
                <th class="col-sm-3 col-md-2">Action</th>
              </tr>

            </thead>
            <tbody>
              <?php
              include "koneksi.php";

              $no = 1;
              $query = mysqli_query($koneksi, "SELECT * FROM aset where id_aset");

              while ($d = mysqli_fetch_array($query)) {
              ?>
                <form method="post" action="edit_harga.php">
                  <tr>
                   <input type="hidden" name="id_aset" value="<?php echo $d['id_aset']; ?>">
                    <th scope="row"><?php echo $d['id_aset'] ?></th>
                    <td><?php echo $d['nama_unit'] ?></td>
                    <td><?php echo $d['tanggal_beli'] ?></td>
                    <td><?php echo $d['harga_beli'] ?></td>

                    <td><?php echo $d['harga_jual'] ?></td>
                    <td><?php echo $d['vendor'] ?></td>
                    <?php
                    // Mendapatkan data blob dari database
                    $blobData = $d['foto_truk'];
                    // Mengonversi blob data ke base64
                    $imageData = base64_encode($blobData);
                    // Membuat URL gambar
                    $imageSrc = 'data:image/jpeg;base64,' . $imageData;

                    ?>
                    <style>
                      .image-container {
                        width: 200px;
                        height: 100px;
                        background-size: cover;
                        /* Set background gambar dengan menggunakan data base64 langsung */
                        background-image: url('<?php echo $imageSrc; ?>');
                      }
                    </style>
                    <td><img src="<?php echo $imageSrc; ?>" alt="Foto Unit" class="image-container "></td>

                    <td><?php echo $d['tahun_produksi'] ?></td>
                    <td class="d-sm-inline-flex gap-sm-2">
                      <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editharga">Edit Harga Jual</button>
                      <button type="button" class="btn btn-sm btn-info">Jual Unit</button>
                    </td>
                  </tr>

                  <!--modal-->
                  <div class="modal fade" id="editharga" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="staticBackdropLabel">Atur Harga Jual</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="">
                            <label for="validationDefault03" class="form-label">Masukan Harga Jual</label>
                            <input type="text" class="form-control" name="harga_jual" required>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-primary">Tetapkan Harga Jual</button>
                      </div>
                    </div>
                  </div>
                </form>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!--klaim unit-->
    <div class="card text-center mb-5">
      <div class="card-header">
        <h5 class="card-title text-success ">Klaim Dan Dan Bayar Unit</h5>
      </div>
      <div class="card-body">

        <?php
        include "koneksi.php";

        $query = mysqli_query($koneksi, "SELECT * FROM pembelian where id_pembelian");

        $sudahbayar = false;

        if (mysqli_num_rows($query) > 0) {

          while ($d = mysqli_fetch_array($query)) {

            $id_pembelian = $d['id_pembelian'];

            // Cek apakah unit dengan id_pembelian tertentu sudah dibayar
            $queryPembayaran = mysqli_query($koneksi, "SELECT * FROM pembayaran WHERE id_pembelian = '$id_pembelian'");
            $belumbayar = mysqli_num_rows($queryPembayaran) > 0;

            // Tampilkan formulir hanya jika belum dibayar
            if (!$belumbayar) {
        ?>
              <form method="post" action="klaimunit.php">
                <div class="container d-flex mb-4" id="formContainer">
                  <div class="card text-start " style="width: 88rem;">
                    <button type="button" class="btn-close mx-2" aria-label="Close"></button>
                    <ul class="list-group list-group-flush">

                      <li class="list-group-item visually-hidden"><?php echo $d['id_pembelian'] ?></li>
                      <li class="list-group-item">Pembelian Atas Nama : <?php echo $d['atas_nama'] ?></li>
                      <li class="list-group-item">Tanggal Beli : <?php echo $d['tanggal_beli'] ?></li>
                      <li class="list-group-item">Unit Yang Di Beli : <?php echo $d['nama_truk'] ?></li>
                      <li class="list-group-item">Jumlah beli : <?php echo $d['jumlah_beli'] ?></li>
                      <li class="list-group-item">Harga : Rp. <?php echo number_format($d['harga_truk'], 0, ',', '.') ?></li>
                      <li class="list-group-item">Total Harga : Rp. <?php echo number_format($d['total_harga'], 0, ',', '.') ?></li>
                      <li class="list-group-item">
                        <input type="hidden" class="form-control" name="id_pembelian" value="<?php echo $d['id_pembelian'] ?>">
                        <input type="hidden" class="form-control" name="jumlah_beli" value="<?php echo $d['jumlah_beli'] ?>">
                        <input type="hidden" class="form-control" name="harga_truk" value="<?php echo $d['harga_truk'] ?>">
                        <input type="hidden" class="form-control" name="total_harga" value="<?php echo $d['total_harga'] ?>">
                        <input type="hidden" class="form-control" name="email_pembeli" value="<?php echo $d['email_pembeli'] ?>">
                        <input type="hidden" class="form-control" name="vendor" value="<?php echo $d['vendor'] ?>">
                        <?php
                        // Mendapatkan data blob dari database
                        $blobData = $d['foto_truk'];
                        // Mengonversi blob data ke base64
                        $imageData = base64_encode($blobData);
                        // Membuat URL gambar
                        $imageSrc = 'data:image/jpeg;base64,' . $imageData;
                        ?>

                        <input type="hidden" value="<?php echo $imageSrc; ?>" name="foto_truk">

                        <input type="hidden" class="form-control" name="tahun_produksi" value="<?php echo $d['tahun_produksi'] ?>">
                        <div class="d-grid gap-2">
                          <button class="btn btn-info btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#konfirmasi">Unit Di Terima</button>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>

                <!-- Modal Konfirmasi-->
                <div class="modal fade" id="konfirmasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header bg-info-subtle ">
                        <h1 class="modal-title fs-5 " id="exampleModalLabel">Konfirmasi</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <p class="fw-semibold">Konfirmasi Masih Unit Di Terima Dan Bayar ? saldo akan di tarik sesuai total harga beli</p>
                      </div>
                      <div class="modal-footer bg-info-subtle">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-info">Ya </button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
          <?php
              $sudahbayar = true;
            }
          }
        }
        if (!$sudahbayar) {
          ?>
          <div class="card">
            <div class="card-body">
              data masih kosong, data pembelian akan muncul setelah melakukan pembelian unit.
            </div>
          </div>

        <?php  } ?>
      </div>
      <div class="card-footer text-body-secondary">
        Warif Corporation
      </div>
    </div>

  </div>

  <!-- Modal Tambah Unit -->
  <div class="modal fade" id="tambahUnitModal" tabindex="-1" aria-labelledby="tambahUnitModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahUnitModalLabel">Tambah Unit Kontainer</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Tambah</button>
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
</script>