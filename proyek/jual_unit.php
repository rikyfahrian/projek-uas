<?php
include "warifheader.php";

?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container mt-3 mb-4">
        <h3 class="fw-semibold fs-5 text-info-emphasis mb-3">Form Penjualan Unit</h3>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header fs-5 fw-fw-semibold text-primary-emphasis ">
                        Isi Data Customer
                    </div>
                    <form method="post" action="jual_aksi.php?idaset=<?php echo $_GET['idaset']; ?>&idpembelian=<?php echo $_GET['idpembelian'] ?>">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Nama Customer" name="nama_customer" required>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Alamat" name="alamat" required>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <input type="number" class="form-control" placeholder="No Telepon" name="no_hp" required>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Pilih Bank Customer" name="bank" required>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <input type="number" class="form-control" placeholder="No Rekening Customer" name="no_rek" required>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <?php
                                include "koneksi.php";

                                $id = $_GET['idaset'];
                                $query = mysqli_query($koneksi, "SELECT aset.id, truk.nama, pembelian.jumlah_beli, pembelian.tanggal_beli, truk.harga, aset.harga_jual, truk.vendor, truk.foto, truk.tahun_produksi
                                FROM aset
                                JOIN pembelian ON aset.pembelian = pembelian.id
                                JOIN truk ON pembelian.truk = truk.id
                                JOIN admin ON pembelian.owner = admin.id
                                WHERE admin.id = '" . $_SESSION["idadmin"] . "'
                                AND aset.id = '$id';");

                                while ($d = mysqli_fetch_array($query)) {
                                    $maxQuantity = $d['jumlah_beli'];
                                ?>
                                    <div class="col">
                                        <label for="inputState" class="form-label mb-2">Masukan Jumlah Beli</label>
                                        <select id="inputState" class="form-select" onchange="calculateTotal()" name="jumlah_beli" required>
                                            <option selected disabled>Choose...</option>
                                            <?php
                                            for ($i = 1; $i <= $maxQuantity; $i++) {
                                                echo "<option value='$i'>$i</option>";
                                            }
                                            ?>
                                        </select>
                                        <!-- Add an element to display the harga_truk value -->
                                        <img src="<?php echo $d["foto"]; ?>" class="card-img-top mt-4" alt="truk foto" style="max-width: 18rem;">
                                        <p class="fw-light fs-5 text-warning-emphasis mt-3" id="harga_truk">Harga Jual Perunit : Rp.<?php echo number_format($d['harga_jual'], 0, ',', '.'); ?></p>
                                    </div>
                                <?php }
                    mysqli_close($koneksi);
                    ?>
                                <div class="d-grid">
                                    <p class="fw-light fs-5 text-warning-emphasis" name="total_harga">Total Bayar : <span id="totalBayar">Rp.0</span></p>
                                </div>
                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn btn-sm btn-info" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Jual Unit</button>

                            </div>
                        </div>

                        <!--modal konfirmasi-->
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Penjualan</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Yakin Submit Dan Jual
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-info">Ya</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="card-footer text-body-secondary">
                        Warif Corporation
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
<script>
    function calculateTotal() {
        var hargaTrukValue = document.getElementById('harga_truk').textContent;
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
</script>