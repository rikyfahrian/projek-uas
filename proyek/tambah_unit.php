<?php
include "warifheader.php"
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

  <div class="container mt-5 mb-5">


    <div class="row row-cols-1 row-cols-md-2 g-4">

      <?php
      include "koneksi.php";
      $no = 1;
      $query = mysqli_query($koneksi, "SELECT * FROM truk where id_truk");

      while ($d = mysqli_fetch_array($query)) {
      ?>
        <div class="col">
          <div class="card">
            <div class="card-header bg-info">
              <h5 class="card-title text-dark"><?php echo $d['nama_truk']; ?></h5>
            </div>
            <?php
            // Mendapatkan data blob dari database
            $blobData = $d['foto_truk'];
            // Mengonversi blob data ke base64
            $imageData = base64_encode($blobData);
            // Membuat URL gambar
            $imageSrc = 'data:image/jpeg;base64,' . $imageData;
            ?>
            <img src="<?php echo $imageSrc; ?>" style="height: 21rem;" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text fw-bold mb-1">Deskripsi Singkat</p>
              <p class="card-text"><?php echo $d['deskripsi']; ?></p>
              <p class="card-text text-md-start fw-semibold  mb-1">Spesifikasi : <?php echo $d['spek']; ?></p>
              <p class="card-text  text-md-start fw-semibold  mb-1">Jenis Truk : <?php echo $d['jenis_truk']; ?></p>
              <p class="card-text  text-md-start fw-semibold  mb-1">Warna : <?php echo $d['warna']; ?></p>
              <p class="card-text  text-md-start fw-semibold  mb-2">Vendor : <?php echo $d['vendor']; ?></p>
              <p class="card-text  text-md-start fw-semibold  mb-2">Tahun Produksi : <?php echo $d['tahun_produksi']; ?></p>
              <p class="card-text text-info   text-lg fw-bold mb-1">Rp.<?php echo number_format($d['harga_truk'], 0, ',', '.'); ?></p>
            </div>
            <div class="card-footer d-grid">
              <button type="button" class="btn btn-info btn-md">Beli Unit</button>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>

</main>