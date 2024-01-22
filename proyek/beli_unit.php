<?php
include "warifheader.php";
?>
<style>
    /*style untuk menampilkan foto truk pada form beli yang di hidden */
    .image-container {
        width: 450px; 
        height: 300px;
        background-size: cover; 
    }
</style>

<main class="col-md-10 ms-sm-auto col-lg-10 px-md-4">
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
                    <div class="toast-header bg-info">
                     
                      <strong class="me-auto text-dark">WARIF CORPORATION</strong>
                      <small class="text-dark">Baru Saja</small>
                      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                      Hallo, Pembelian Unit Berhasil Silahkan Cek Halaman Table Unit Untuk Melakukan Pembayaran Jika Unit Sudah Di Konfirmasi Di Terima.
                     
                    </div>
                    <a href="tableunit.php"><button type="button" class="btn btn-info btn-sm mb-2 mx-2">Lihat Aktivitas</button></a>
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
    <div class="container-fluid mt-5 mb-5">
        <div class="card mb-3">
            <div class="card-header">
                Note
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p>Lakukan Pengisian Form Pembelian Sebelum Melakukan Pembelian Unit Ini</p>
                    <p>Setelah submit dan yakin beli silahkan cek inbox/aktivitas pada halaman table unit untuk melakukan konfirmasi unit di terima serta melakukan pembayaran</p>
                </blockquote>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-2">
                <?php
                include "koneksi.php";
                $id = $_GET['id_truk'];
                $query = mysqli_query($koneksi, "SELECT * FROM truk where id_truk='$id'");

                while ($d = mysqli_fetch_array($query)) {
                ?>

                    <div class="card mb-3">
                        <?php
                        // Mendapatkan data blob dari database
                        $blobData = $d['foto_truk'];
                        // Mengonversi blob data ke base64
                        $imageData = base64_encode($blobData);
                        // Membuat URL gambar
                        $imageSrc = 'data:image/jpeg;base64,' . $imageData;
                        ?>
                        <img src="<?php echo $imageSrc; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $d['nama_truk'] ?></h4>
                            <h4 class="card-title text-info">Rp.<?php echo number_format($d['harga_truk'], 0, ',', '.'); ?></h4>
                            <p class="card-text fw-bold mb-1">Deskripsi Singkat</p>
                            <p class="card-text"><?php echo $d['deskripsi']; ?></p>
                            <p class="card-text text-md-start fw-semibold  mb-1">Spesifikasi : <?php echo $d['spek']; ?></p>
                            <p class="card-text  text-md-start fw-semibold  mb-1">Warna : <?php echo $d['warna']; ?></p>
                            <p class="card-text  text-md-start fw-semibold  mb-2">Vendor : <?php echo $d['vendor']; ?></p>
                            <p class="card-text  text-md-start fw-semibold  mb-2">Foto Unit : <?php echo $d['foto_unit']; ?></p>
                            <p class="card-text  text-md-start fw-semibold  mb-2">Tahun Produksi : <?php echo $d['tahun_produksi']; ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Form Pembelian
                    </div>
                    <div class="card-body">
                        <!--tampilkan data admin-->
                        <?php
                        include "koneksi.php";

                        $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_admin");

                        while ($d = mysqli_fetch_array($query)) {
                        ?>
                            <form class="row g-3" method="post" action="beli_aksi.php">
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email_pembeli" value="<?php echo $d['email']; ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="nama" class="form-label">Atas Nama</label>
                                    <input type="text" class="form-control" name="nama_pembeli" value="<?php echo $d['nama']; ?>">
                                </div>
                                <div class="col-12">
                                    <label for="gudang" class="form-label">lokasi Gudang</label>
                                    <input type="text" class="form-control" name="lokasi_gudang" value="<?php echo $d['lokasi_gudang']; ?>">
                                </div>
                                <div class="col-12">
                                    <label for="inputAddress2" class="form-label">No Telepon</label>
                                    <input type="number" class="form-control" name="no_hp" value="<?php echo $d['no_hp']; ?>">
                                </div>

                                <div class="col-12">
                                    <label for="inputState" class="form-label">Jumlah_Beli</label>
                                    <select id="inputState" class="form-select" oninput="calculateTotal()" name="jumlah_beli">
                                        <option value="" disabled selected>Pilih </option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                                <?php
                                include "koneksi.php";
                                $id_truk = $_GET['id_truk'];
                                //menampilkan harga truk beserta menghitung total bayar berdasarkan jumlah beli
                                $query = mysqli_query($koneksi, "SELECT * FROM truk WHERE id_truk ='$id_truk'");

                                while ($t = mysqli_fetch_array($query)) {
                                ?>
                                    <input type="hidden" name="id_truk" id="idTrukBeli" value="<?php echo $id_truk; ?>">
                                    <input type="hidden" class="form-control" name="nama_truk" value="<?php echo $t['nama_truk']; ?>">
                                    <input type="hidden" class="form-control" name="warna" value="<?php echo $t['warna']; ?>">
                                    <input type="hidden" class="text-warning fw-semibold form-control " name="harga_truk" id="harga_truk" value="<?php echo ($t['harga_truk']); ?>">
                                    <input type="hidden" class="text-warning fw-semibold form-control " name="vendor" value="<?php echo ($t['vendor']); ?>">
                                    <?php
                                    // Mendapatkan data blob dari database
                                    $blobData = $t['foto_truk'];
                                    // Mengonversi blob data ke base64
                                    $imageData = base64_encode($blobData);
                                    // Membuat URL gambar
                                    $imageSrc = 'data:image/jpeg;base64,' . $imageData;
                                    ?>
                                    <div class="image-container visually-hidden" style="background-image: url('<?php echo $imageSrc; ?>');"></div>
                                    <input type="hidden" value="<?php echo $imageSrc; ?>" name="foto_truk">
                                    <input type="hidden" class="text-warning fw-semibold form-control " name="tahun_produksi" value="<?php echo ($t['tahun_produksi']); ?>">
                                <?php } ?>
                                <div class="d-grid">
                                    <p class="fw-semibold text-warning" name="total_harga">Total Bayar : <span id="totalBayar">Rp.0</span></p>
                                </div>
                                <div class="d-grid">
                                    <button type="button" class="btn btn-warning" data-bs-target="#beli" data-bs-toggle="modal">Beli Sekarang</button>
                                </div>

                                <!-- Modal Konfirmasi-->
                                <div class="modal fade" id="beli" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-warning ">
                                                <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Konfirmasi Pemblian</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h5 class="fw-semibold">Anda Yakin Ingin Melakukan Pemblian Unit Ini</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-warning" data-bs-toggle="modal">Ya</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        <?php } ?>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-body">
                        Unit Akan Di Kirim Dan Sampai Ke Gudang Sesuai Waktu Pengiriman, Saldo Akan Otomatis Berkurang Jika Unit Sudah Di Konfirmasi Diterima
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    //menghitung harga truk 
    function calculateTotal() {
        var hargaTrukValue = document.getElementById('harga_truk').value;
        var numericValue = parseFloat(hargaTrukValue.replace(/[^0-9]/g, ''));
        var jumlahBeli = parseFloat(document.getElementById("inputState").value);
        var totalBayar = numericValue * jumlahBeli;

        // Format totalBayar 
        var formatter = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
        });
        document.getElementById("totalBayar").innerText = formatter.format(totalBayar);
    }


    //mengatur toast
    document.addEventListener('DOMContentLoaded', function() {
        const toastLiveExample = new bootstrap.Toast(document.getElementById('liveToast'), {
            delay: 6000
        });
        toastLiveExample.show();
    });
</script>