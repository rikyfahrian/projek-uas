<?php
include "warifheader.php"
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="container mt-5 mb-5">
    <div class="row row-cols-1 row-cols-md-2 g-4">

      <?php
      include "koneksi.php";
      $no = 1;
      $query = mysqli_query($koneksi, "SELECT * FROM truk ");

      while ($d = mysqli_fetch_array($query)) {
      ?>
        <div class="col">
          <div class="card">
            <div class="card-header bg-info">
              <h5 class="card-title text-dark"><?php echo $d['nama']; ?></h5>
            </div>
        
            <img src="<?php echo $d["foto"]; ?>" style="height: 21rem;" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text fw-bold mb-1">Deskripsi Singkat</p>
              <p class="card-text"><?php echo $d['deskripsi']; ?></p>
              <p class="card-text text-md-start fw-semibold  mb-1">Spesifikasi : <?php echo $d['spek']; ?></p>
              <p class="card-text  text-md-start fw-semibold  mb-1">Jenis Truk : <?php echo $d['jenis']; ?></p>
              <p class="card-text  text-md-start fw-semibold  mb-1">Warna : <?php echo $d['warna']; ?></p>
              <p class="card-text  text-md-start fw-semibold  mb-2">Vendor : <?php echo $d['vendor']; ?></p>
              <p class="card-text  text-md-start fw-semibold  mb-2">Tahun Produksi : <?php echo $d['tahun_produksi']; ?></p>
              <p class="card-text text-info   text-lg fw-bold mb-1">Rp.<?php echo number_format($d['harga'], 0, ',', '.'); ?></p>
            </div>
            <div class="card-footer d-grid">
            <a href="beli_unit.php?id_truk=<?php echo $d['id']; ?>" class="btn btn-info btn-md">Tambah ke Aset</a>
            </div>
          </div>
        </div>
        
      <?php } 
        mysqli_close($koneksi);
        ?>

    </div>
</main>