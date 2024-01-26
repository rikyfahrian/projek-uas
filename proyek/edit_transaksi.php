<!--conten utama-->
<?php
include "warifheader.php";
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <div class="container mt-5">
        <h4 class="fw-semibold fs-3 text-success-emphasis mb-4">Form Edit Data Transaksi</h4>
        <div class="card ">
            <div class="card-header">
                Isi Form Untuk Update
            </div>
            <div class="card-body">
                <h5 class="card-title mb-4">Special title treatment</h5>

                <?php
                include "koneksi.php";

                $id = $_GET['id'];
                $query = mysqli_query($koneksi, "SELECT * FROM penjualan WHERE id='$id'");
                while ($d = mysqli_fetch_array($query)) {

                ?>
                    <form method="post" action="update_transaksi.php?">
                        <div class="row mb-4">
                            <div class="col">
                                <label class="form-label">Nama Customer</label>
                                <input type="hidden" class="form-control" name="id" value="<?php echo $d['id'] ?>">
                                <input type="text" class="form-control" name="nama_customer" value="<?php echo $d['nama_customer'] ?>">
                            </div>
                            <div class="col">
                                <label class="form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" value="<?php echo $d['alamat'] ?>">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <label class="form-label">No Telepon</label>
                                <input type="text" class="form-control" name="no_hp" value="<?php echo $d['no_hp'] ?>">
                            </div>
                            <div class="col">
                                <label class="form-label">Bank</label>
                                <input type="text" class="form-control" name="bank" value="<?php echo $d['bank'] ?>">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <label class="form-label">Tanggal Transaksi</label>
                                <input type="date" class="form-control" name="tanggal_transaksi" value="<?php echo $d['tanggal_transaksi'] ?>">
                            </div>
                            <div class="col">
                                <label class="form-label">No Rekeninh</label>
                                <input type="text" class="form-control" name="no_rek" value="<?php echo $d['no_rek'] ?>">
                            </div>
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-success" type="submit">Update </button>
                        </div>
                    </form>
                <?php
                } 
                mysqli_close($koneksi);
                ?>
            </div>
            <div class="card-footer text-body-secondary">
                Warif Corporation
            </div>
        </div>
        <div class="card mt-4 mb-4">
            <div class="card-body fw-semibold fs-4 text-success-emphasis ">
                Setelah Edit Data Akan Terupdate Secara Otomatis
            </div>
        </div>
    </div>

</main>