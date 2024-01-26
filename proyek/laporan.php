<?php

include "warifheader.php";


?>


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container py-4">
        <header class="pb-3 mb-4 border-bottom d-flex justify-content-between ">
            <a href="/" class="d-flex align-items-center text-body-emphasis text-decoration-none">
                <span class="fs-4 text-info-emphasis ">Warif Corporation Report</span>
            </a>
            <button class='btn btn-info' onclick='printInvoice()'>
                <i class='fas fa-print'></i> Cetak Laporan
            </button>
        </header>
        <?php
        include "koneksi.php";
        $data = mysqli_query($koneksi, "SELECT saldo.id,saldo.nominal 
         FROM saldo 
         join admin on saldo.id = admin.saldo
         where admin.id = '" . $_SESSION['idadmin'] . "'");

        $row = mysqli_fetch_assoc($data);

        $_SESSION["currentsaldo"] =  $row["nominal"];
        $_SESSION["idsaldo"] =  $row["id"];

        if ($row["nominal"] > 0) {
        ?>
            <div id='invoiceCard'>
                <div class="p-5 mb-4 bg-body-tertiary rounded-3 d-flex justify-content-between">
                    <div class="container-fluid py-5 ">
                        <h1 class="display-5 fw-bold text-info-emphasis ">Saldo Anda Saat Ini</h1>
                        <p class="col-md-8 fs-3  text-info-emphasis fw-semibold "> Rp. <?php echo number_format($row["nominal"], 0, ',', '.'); ?></p>
                    </div>
                    <div class="container-fluid py-5">
                        <?php
                            $idAdmin = $_SESSION["idadmin"];
                            $query = mysqli_query($koneksi,"SELECT SUM(total_harga) as total FROM penjualan WHERE owner = '$idAdmin' AND status_bayar = true");
                            $total = mysqli_fetch_assoc($query)["total"];

                        if ($total > 0) {
                   
                             echo "<h1 class='display-5 fw-bold text-success '>Total Profit Anda Saat Ini</h1>";
                           
                             echo  "<p class='col-md-8 fs-3 text-success fw-semibold '><strong>+</strong> Rp. ". number_format($total, 0, ',', '.') ."</p>";
                         } else {
                        ?>
                            <div class="container-fluid">
                                <h1 class="display-5 fw-bold text-success ">Belum Ada Profit</h1>
                            </div>
                        <?php } ?>
                    </div>
                </div>

            <?php } else {

            ?>
                <div class="p-5 mb-4 bg-body-tertiary rounded-3 d-flex justify-content-between">
                    <div class="container-fluid py-5 ">
                        <h1 class="display-5 fw-bold text-info-emphasis ">Saldo Anda Saat Ini</h1>
                        <p class="col-md-8 fs-3  text-info-emphasis fw-semibold "> Rp. 0</p>
                    </div>
                </div>

            <?php
        }
        mysqli_close($koneksi);

            ?>






            <div class="row align-items-md-stretch">
                <div class="col-md-6">
                    <div class="h-100 p-5 bg-body-tertiary rounded-3">
                        <h1 class="display-6 text-info-emphasis fw-bold ">Total Unit Yang Di Miliki </h1>
                        <?php 
                        include "koneksi.php";

                        $idAdmin = $_SESSION["idadmin"];
                        $query = mysqli_query($koneksi,"SELECT SUM(jumlah_beli) as total FROM pembelian WHERE owner = '$idAdmin' AND klaim = true");
                        $total = mysqli_fetch_assoc($query)["total"];
                        echo "<h1 class='display-6 fw-bold text-info-emphasis '>$total Unit</h1>";
                    mysqli_close($koneksi);

                        ?>
                        
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="h-100 p-5 bg-body-tertiary rounded-3">
                        <h1 class="display-6  fw-bold text-success ">Total Unit Yang Terjual </h1>
                        <?php 
                        include "koneksi.php";

                        $idAdmin = $_SESSION["idadmin"];
                        $query = mysqli_query($koneksi,"SELECT SUM(jumlah_beli) as total FROM penjualan WHERE owner = '$idAdmin'  AND status_bayar = true");
                        $total = mysqli_fetch_assoc($query)["total"];
                        echo "<h1 class='display-6 fw-bold text-info-emphasis '>$total Unit</h1>";
                    mysqli_close($koneksi);

                        ?>
                    </div>
                </div>
            </div>

            <div class="p-5 mb-4 bg-body-tertiary rounded-3 d-flex justify-content-between mt-4">
                <div class="container-fluid ">
                    <h1 class="fw-semibol text-center text-warning">Data Transaksi</h1>
                    <div class="table-responsive">
                        <table class="table align-middle table-bordered table-hover rounded mt-2">
                            <thead class="table-success ">

                                <tr>
                                    <th scope="col-sm-3 col-md-2">Customer</th>
                                    <th scope="col-sm-3 col-md-2">Truk</th>
                                    <th scope="col-sm-3 col-md-2">Alamat</th>
                                    <th scope="col-sm-3 col-md-2">No HP</th>
                                    <th scope="col-sm-3 col-md-2">Quantity</th>
                                    <th scope="col-sm-3 col-md-2">tanggal transaksi</th>
                                    <th scope="col-sm-3 col-md-2">Bank</th>
                                    <th scope="col-sm-3 col-md-2">NO REK</th>
                                    <th class="col-sm-3 col-md-2">Total Bayar</th>
                                    <th scope="col-sm-3 col-md-2">Status</th>
                                </tr>

                            </thead>
                            <tbody class="">

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
</main>

<script>
    function printInvoice() {
        // Dapatkan isi elemen invoiceCard
        var invoiceContent = document.getElementById('invoiceCard').innerHTML;

        // Buat dokumen baru dan tambahkan isi invoiceCard
        var newWindow = window.open('', '_blank');
        newWindow.document.open();
        newWindow.document.write('<html><head><title>Invoice</title></head><body>');
        newWindow.document.write(invoiceContent);
        newWindow.document.write('</body></html>');
        newWindow.document.close();

        // Panggil metode print pada dokumen baru
        newWindow.print();
        newWindow.close();
    }
</script>