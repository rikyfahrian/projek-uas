<?php
include "warifheader.php";
?>
<?php
include 'koneksi.php';

$id_saldo = ''; // Set the default email value
$user_has_saldo = false; // Flag to check if the user has saldo

// Check if the user is logged in or get the user's email from the session, assuming you have a way to identify users
if (isset($_SESSION['id_saldo'])) {
  $email = $_SESSION['id_saldo'];

  // Check if the user already has a record in the database
  $result = mysqli_query($koneksi, "SELECT * FROM saldo WHERE id_saldo = '$id_saldo'");
  $user_has_saldo = (mysqli_num_rows($result) > 0);
}
?>

<!--conten utama-->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <!--pilihan tabs-->
  <div class="container-fluid col-md-11 mb-4 mt-4">
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link" aria-current="page" href="saldo.php">Pembuatan Saldo</a>
      </li>

      <li class="nav-item">
        <a class="nav-link " href="atursaldo.php">Informasi dan Pengaturan Saldo</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="container col-md-11 mb-4">
      <div class="d-flex justify-content-center ">
        <!--menampilkan pesan untuk memastikan user sudah memiliki data saldo atau belum-->
        <?php
        // Cek jika ada pesan yang di kirim melalui url dari saldo_aksi.php
        $message = isset($_GET['message']) ? urldecode($_GET['message']) : '';
        ?>
        <!-- Tampilkan pesan yang di kirim url -->
        <?php if ($message) : ?>
          <?php
          // cek sudah punya saldo atau tidak
          $isSuccess = strpos($message, 'successfully') !== false;
          $alertClass = $isSuccess ? 'alert-info' : 'alert-danger';
          ?>
          <div class="alert <?php echo $alertClass; ?> alert-dismissible fade show position-fixed z-3 " role="alert">
            <?php echo $message; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif; ?>
      </div>
      <div class="card mb-4">
        <div class="card-header py-3 border bg-card-header">
          <h5 class="mb-0 text-dark">Detail Pemilik Saldo</h5>
        </div>
        <div class="card-body mt-4">

          <!--form pengisian saldo-->
          <form method="post" action="saldo_aksi.php">
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" required />
                  <label class="form-label" for="nama_lengkap">Nama Lengkap</label>
                </div>
              </div>
              <div class="col">
                <div class="form-outline">
                  <input type="text" id="perusahaan" name="perusahaan" class="form-control" required />
                  <label class="form-label" for="perusahaan">Nama Perusahaan/Lembaga</label>
                </div>
              </div>
            </div>
            <div class="form-outline mb-4">
              <input type="text" id="alamat" name="alamat" class="form-control" required />
              <label class="form-label" for="alamat">Alamat</label>
            </div>

            <div class="form-outline mb-4">
              <input type="email" id="email" name="email" class="form-control" required />
              <label class="form-label" for="email">Email</label>
            </div>

            <div class="form-outline mb-4">
              <input type="number" id="no_hp" name="no_hp" class="form-control" required />
              <label class="form-label" for="no_hp">No Hp</label>
            </div>



            <div class="form-check mb-4">
              <input class="form-check-input" type="checkbox" value="" id="checkoutForm2" checked required />
              <label class="form-check-label" for="checkoutForm2">
                Save this information for next time
              </label>
            </div>

            <hr class="my-4" />

            <label class="mb-2">Bank</label>
            <div class="col-md-5 mb-4">
              <select class="form-select" aria-label="Default select example" id="bank" name="bank" required>
                <option value="" disabled selected>Pilih Bank</option>
                <option value="BCA">BCA</option>
                <option value="BRI">BRI</option>
                <option value="BSI">BSI</option>
              </select>
            </div>
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input type="text" id="rekening" name="rekening" class="form-control" required />
                  <label class="form-label" for="rekening">Nama Rekening</label>
                </div>
              </div>
              <div class="col">
                <div class="form-outline">
                  <input type="text" id="no_rekening" name="no_rekening" class="form-control" required />
                  <label class="form-label" for="no_rekening">No Rekening</label>
                </div>
              </div>
            </div>

            <div class="row mb-4">
              <div class="col-6">
                <div class="form-outline">
                  <input type="number" id="nominal" name="nominal" class="form-control" required />
                  <label class="form-label" for="nominal">Nominal Yang Ingin Di Masukan</label>
                </div>
              </div>
            </div>
            <div class="d-grid gap-2 col-12">
              <button class="btn btn-info" type="button" data-bs-toggle="modal" data-bs-target="#konfirmasi">Button</button>
            </div>
            <!--modal konfirmasi pembuatan saldo -->
            <div class="modal" tabindex="-1" id="konfirmasi" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Baca Sebelum Buat Saldo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <p>Saat ini, Anda hanya dapat memiliki satu saldo dalam aplikasi kami.</p>
                    <p>Jika Anda ingin menambahkan saldo atau melakukan perubahan pada data kepemilikan, Anda dapat menggunakan opsi berikut:</p>
                    <ul>
                      <li><strong>Top Up Saldo:</strong> Gunakan fitur top up untuk menambahkan saldo ke akun Anda.</li>
                      <li><strong>Edit Data Kepemilikan:</strong> Anda dapat mengedit informasi kepemilikan akun Anda, termasuk data yang terkait dengan saldo.</li>
                    </ul>
                    <p>Saldo ini akan digunakan untuk melakukan pembelian dan jual beli unit dalam aplikasi kami. Pastikan saldo Anda mencukupi untuk melakukan transaksi yang diinginkan.</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Urungkan </button>
                    <button type="submit" class="btn btn-warning">Buat Saldo</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</main>
</div>
</div>

<!--script lokal bawaaan bootsrap-->
<script src="../kelompok/js/bootstrap.bundle.min.js"></script>
<!--script khusus side dan navbar -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script>
<script src="../kelompok/js/dashboard.js"></script>
</body>

</html>