<?php include 'warifheader.php' ?>

<!--conten utama-->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <!--pilihan tabs-->
  <div class="container-fluid col-md-11 mb-4 mt-4">
    <?php
    $pesan = '';
    // Periksa status saldo dari parameter URL
    if (isset($_GET['status']) && $_GET['status'] === 'topup_berhasil') {
      echo '
     <div class="toast-container position-fixed end-0 p-3">
         <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
             <div class="toast-header bg-info">
                 <strong class="me-auto text-dark">WARIF CORPORATION</strong>
                 <small class="text-dark">Baru Saja</small>
                 <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
             </div>
             <div class="toast-body">
                 Hallo, Top-up Saldo Berhasil!
             </div>
             
         </div>
     </div>';
    } else {
      $pesan = 'Terjadi kesalahan dalam proses top-up saldo.';
    }
    ?>

    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link" aria-current="page" href="saldo.php">Pembuatan Saldo</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="atursaldo.html">Informasi dan Pengaturan Saldo</a>
      </li>
    </ul>
  </div>

  <div class="container col-md-11 mb-5 ">
    <!--tampilkan data saldo jika sudah membuat saldo -->
    <?php
    include "koneksi.php";
    $query = mysqli_query($koneksi, "SELECT * FROM saldo where id_saldo order by nama_lengkap asc");
    if (mysqli_num_rows($query) > 0) {
      // Jika ada data saldo
      while ($d = mysqli_fetch_array($query)) {
    ?>
    <!--top up saldo-->
        <div class="card text-center mb-5">
          <div class="card-header bg-success text-dark fw-bold fs-5">
            Top Up Saldo
          </div>
          <div class="card-body">
            <h5 class="card-title mb-3">Penambahan Saldo Minimal Sejumlah 10.000.000</h5>
            <form method="post" action="top_up.php">
              <div class="row mb-3">
                <div class="">
                  <input type="number" class="form-control" id="inputEmail3" name="top_up" required placeholder="masukan jumlah saldo di sini" >
                  <input type="hidden" class="form-control" id="inputEmail3" name="nominal" value="<?php echo $d['nominal']; ?>">
                </div>
              </div>
              <button type="submit" class="btn btn-success">Top Up Saldo</button>
            </form>
          </div>
          <div class="card-footer text-dark bg-success fw-bold fs-5">
            WARIF CORPORATION
          </div>
        </div>
        <div class="card">
          <div class="card-header bg-success">
            Informasi Kepemilikan Saldo
          </div>
          <div class="card-body">
            <div class="row mb-4">
              <div class="col">
                <label class="mb-2">Nama</label>
                <div class="form-outline">
                  <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" disabled value="<?php echo $d['nama_lengkap']; ?>" />
                </div>
              </div>

              <div class="col mb-4">
                <label class="mb-2">Perusahaan</label>
                <div class="form-outline">
                  <input type="text" id="perusahaan" name="perusahaan" class="form-control" disabled value="<?php echo $d['perusahaan']; ?>" />
                </div>
              </div>

              <div class="form-outline mb-4">
                <label class="mb-2">Alamat</label>
                <input type="text" id="alamat" name="alamat" class="form-control" disabled value="<?php echo $d['alamat']; ?>" />
              </div>

              <div class="form-outline mb-4">
                <label class="mb-2">Email</label>
                <input type="email" id="email" name="email" class="form-control" disabled value="<?php echo $d['email']; ?>" />
              </div>

              <div class="form-outline mb-4">
                <label class="mb-2">No Hp</label>
                <input type="number" id="no_hp" name="no_hp" class="form-control" disabled value="<?php echo $d['no_hp']; ?>" />
              </div>

              <hr class="my-4" />

              <div class="form-outline mb-4">
                <label class="mb-2">Bank</label>
                <input type="text" id="bank" name="bank" class="form-control" disabled value="<?php echo $d['bank']; ?>" />
              </div>

              <div class="form-outline">
                <button type="button" class="btn btn-warning btn-sm mb-1" data-bs-toggle="modal" data-bs-target="#tambahUnitModal" value="id_saldo=<?php echo $d['id_saldo']; ?>">
                  Edit Data Saldo
                </button>
              </div>

            <?php
          }
        } else {
          // Jika tidak ada data saldo (user belum membuat saldo)
            ?>
            <div class="card">
              <div class="card-header bg-success">
                Informasi Kepemilikan Saldo
              </div>
              <div class="card-body">

                <div class="row mb-4">

                  <div class="col">
                    <label class="mb-2">Nama</label>
                    <div class="form-outline">
                      <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" placeholder="Data akan tampil setelah membuat saldo" disabled />
                    </div>
                  </div>

                  <div class="col mb-4">
                    <label class="mb-2">Perusahaan</label>
                    <div class="form-outline">
                      <input type="text" id="perusahaan" name="perusahaan" class="form-control" placeholder="Data akan tampil setelah membuat saldo" disabled />
                    </div>
                  </div>

                  <div class="form-outline mb-4">
                    <label class="mb-2">Alamat</label>
                    <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Data akan tampil setelah membuat saldo" disabled />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="mb-2">Email</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Data akan tampil setelah membuat saldo" disabled />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="mb-2">No Hp</label>
                    <input type="number" id="no_hp" name="no_hp" class="form-control" placeholder="Data akan tampil setelah membuat saldo" disabled />
                  </div>

                  <hr class="my-4" />

                  <div class="form-outline mb-4">
                    <label class="mb-2">Bank</label>
                    <input type="text" id="bank" name="bank" class="form-control" placeholder="Data akan tampil setelah membuat saldo" disabled />
                  </div>
                </div>
              </div>
            </div>

          <?php
        }
          ?>
            </div>

            <!-- Modal edit data saldo -->
            <div class="modal fade" id="tambahUnitModal" tabindex="-1" aria-labelledby="tambahUnitModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header bg-success ">
                    <h5 class="modal-title" id="tambahUnitModalLabel">Update Data Saldo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body mt-4">
                    <!-- Form edit data saldo -->
                    <?php
                    include "koneksi.php";
                    $data = mysqli_query($koneksi, "SELECT * from saldo where id_saldo");
                    while ($d = mysqli_fetch_array($data)) {
                    ?>
                      <form method="post" action="saldo_update.php">
                        <div class="row">
                          <div class="col">
                            <div class="form-outline">
                              <input type="hidden" name="id_saldo" value="<?php echo $d['id_saldo']; ?>">
                              <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" required value="<?php echo $d['nama_lengkap']; ?>" />
                              <label class="form-label mt-2" for="nama_lengkap">Nama Lengkap</label>
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-outline">
                              <input type="text" id="perusahaan" name="perusahaan" class="form-control" required value="<?php echo $d['perusahaan']; ?>" />
                              <label class="form-label mt-2" for="perusahaan">Nama Perusahaan/Lembaga</label>
                            </div>
                          </div>
                        </div>

                        <div class="form-outline mb-4">
                          <input type="text" id="alamat" name="alamat" class="form-control" required value="<?php echo $d['alamat']; ?>" />
                          <label class="form-label mt-2" for="alamat">Alamat</label>
                        </div>

                        <div class="form-outline mb-4">
                          <input type="email" id="email" name="email" class="form-control" required value="<?php echo $d['email']; ?>" />
                          <label class="form-label mt-2" for="email">Email</label>
                        </div>

                        <div class="form-outline mb-4">
                          <input type="number" id="no_hp" name="no_hp" class="form-control" required value="<?php echo $d['no_hp']; ?>" />
                          <label class="form-label mt-2" for="no_hp">No Hp</label>
                        </div>

                        <p class="mb-3 text-warning text-center">Perubahan Yang Di lakukan Akan Di Tetapkan Sistem</p>
                        <div class="form-outline mb-4">
                          <input type="hidden" id="bank" name="bank" class="form-control" readonly value="<?php echo $d['bank']; ?>" />
                        </div>
                        <div class="row mb-4">
                          <div class="col">
                            <div class="form-outline">
                              <input type="hidden" id="rekening" name="rekening" class="form-control" readonly value="<?php echo $d['rekening']; ?>" />                 
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-outline">
                              <input type="hidden" id="no_rekening" name="no_rekening" class="form-control" readonly value="<?php echo $d['no_rekening']; ?>" />
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-6">
                            <div class="form-outline">
                              <input type="hidden" id="nominal" name="nominal" class="form-control" readonly value="<?php echo $d['nominal']; ?>" />
                            </div>
                          </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-info">Update</button>
                  </div>
                  </form>
                <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
  </div>
</main>
</div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const toastLiveExample = new bootstrap.Toast(document.getElementById('liveToast'), {
      delay: 5000
    });
    toastLiveExample.show();
  });
</script>