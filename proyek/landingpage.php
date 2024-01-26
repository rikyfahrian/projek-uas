<?php
include "warifheader.php";
?>
<!--conten utama-->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

<div class="container mt-4 mb-2">

    <div class="row">
      <h4 class="fw-semibold text-info-emphasis mb-4 sticky-md-top">Warif Dashboard</h4>
      <div class="col-sm-8 col-md-6">
        <div class="card mb-3 bg-info-subtle " style="max-width: 740px;">
          <div class="row g-0">
            <?php 
              include "koneksi.php";
              $idAdmin = $_SESSION["idadmin"];

              $query = mysqli_query($koneksi,"SELECT foto,nama FROM admin WHERE id = '$idAdmin'");
              while ($e = mysqli_fetch_array($query)) {
                echo "<img src='../image/".$e['foto']."' />";
              ?>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Halo <?php echo $e["nama"]?></h5>
                <p class="card-text">Selamat datang ,ini adalah halaman dashboard, dapatkan informasi dari aktivitas anda di halaman ini, untuk info lebih lanjut baca dokumentasi aplikasi.</p>
             <?php } 
                    mysqli_close($koneksi);
                    ?>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="col-sm-6 col-md-6">
        <div class="card mb-3 bg-info-subtle " style="max-width: 640px;">
          <div class="row g-0">
            <div class="col-md-8">
              <div class="card-body">
                <a class="icon-link icon-link-hover" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" href="saldo.php">
                  <h5 class="card-title">Informasi Saldo</h5>
                </a>
                <p class="card-text ">Kini anda juga bisa melakukan top up saldo dengan minimal deposit sebesar Rp.10.000.000, Dan beli unit lebih banyak pada aplikasi kami</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="container mt-3 mb-4">
      <h4 class="fw-semibold  text-warning-emphasis mb-4 sticky-md-top">Warif Statistik</h4>
      <div class="row">
        <div class="col-sm-6 mb-3 mb-sm-0">
          <div class="card">
            <div class="card-header bg-warning-subtle ">
              Penjualan
            </div>
            <div class="card-body">
              <h5 class="card-title">Total Penjualan</h5>
              <p class="card-text">Lihat Data Total Penjualan</p>
              <a href="laporan.php" class="btn  btn-sm btn-warning">Lihat Detail</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
        <div class="card">
            <div class="card-header bg-info-subtle  ">
              Keuangan
            </div>
            <div class="card-body">
              <h5 class="card-title">Profit</h5>
              <p class="card-text">Informasi Profit Anda Dalam Penggunaan Aplikasi.</p>
              <a href="laporan.php" class="btn  btn-sm btn-warning">Lihat Detail</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- chart bar diagam-->
    <div class="container mt-2 mb-4">
      <div class="row">
      <div class="col py-1">
        <div class="card bg-info-subtle ">
          <div class="card-body">
            <canvas id="chBar"></canvas>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>

    <div class="container text-center">
      <h4 class="fw-semibold text-success-emphasis text-start mb-4 sticky-md-top">Infromasi Unit</h4>
      <div class="row">
        <div class="col-sm-6">
          <div class="card mb-3">
            <img src="../image/bg-gudang2.jpg" class="card-img-top" alt="...">
            <div class="card-body bg-info-subtle ">
              <h5 class="card-title">Katalog Unit</h5>
              <p class="card-text">Cek Halaman Tambah Unit Untuk Melihat Merk Unit Yang Tersedia Di Aplikasi Kami, Cek Out dan Klaim Pembayaran Untuk Memiliki Unit.</p>
              <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body bg-info-subtle ">
              <h5 class="card-title">Beli Unit</h5>
              <p class="card-text">Aplikasi Kami Telah Melakukan Kerja Sama Dengan Beberapa Perusahaan Yang Memproduksi Unit Truk, Anda Bisa Membeli Nya Dengan Harga Pabrik.</p>
              <p class="card-text"><small class="text-body-secondary">Warif Corporation</small></p>
            </div>
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="../image/bg-gudang.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="../image/bg-gudang2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="../image/bg-dashboard2.jpg" class="d-block w-100" alt="...">
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container mt-2 mb-4">
      <div class="card text-bg-dark border-danger-subtle border-1">
        <img src="../image/bg-truk3.jpg" class="card-img" alt="...">
        <div class="card-img-overlay">
          <p class="card-title fs-3 "><a href="tableunit.php" class="link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Manajemen Unit</a></p>
          <p class="card-text fw-semibold fs-4">Manajemen Unit Yang Anda Beli Pada Halaman Aset, Anda bisa melakukan penjualan serta menentukan harga jual unit yang telah anda beli</p>

        </div>
      </div>
    </div>

    <div class="container mt-2 mb-4">
      <h4 class="fw-semibold text-primary-emphasis text-start mb-4 sticky-md-top">Our Teams</h4>
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
          <div class="card h-100">
            <img src="../image/riky.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Mohamad Riky Fahrian</h5>
              
            </div>
            <div class="card-footer bg-info-subtle">
              <small class="text-body-secondary">WARIF CORPORATION</small>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100">
            <img src="../image/alif.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Alif Haikal</h5>
              
            </div>
            <div class="card-footer bg-info-subtle">
              <small class="text-body-secondary">WARIF CORPORATION</small>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100">
            <img src="../image/widi.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Widi Indra Cahyana</h5>
             
            </div>
            <div class="card-footer bg-info-subtle">
              <small class="text-body-secondary">WARIF CORPORATION</small>
            </div>
          </div>
        </div>
      </div>
      <div class="row row-cols-1 row-cols-md-3 g-4 mt-1 d-flex justify-content-center ">
        <div class="col">
          <div class="card h-100">
            <img src="../image/iky.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Muhammad Risky</h5>
              
            </div>
            <div class="card-footer bg-info-subtle">
              <small class="text-body-secondary">WARIF CORPORATION</small>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100">
            <img src="../image/ferdian.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Ferdian</h5>
             
            </div>
            <div class="card-footer bg-info-subtle">
              <small class="text-body-secondary">WARIF CORPORATION</small>
            </div>
          </div>
        </div>
      </div>

    </div>
</main>
<!--script khusus untuk chart-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
<script>
 

// warna chart
var colors = ['#007bff','#28a745','#333333','#c3e6cb','#dc3545','#6c757d'];

/* line chart */
var chLine = document.getElementById("chLine");
var chartData = {
  labels: ["S", "M", "T", "W", "T", "F", "S"],
  datasets: [{
    data: [589, 445, 483, 503, 689, 692, 634],
    backgroundColor: 'transparent',
    borderColor: colors[0],
    borderWidth: 4,
    pointBackgroundColor: colors[0]
  }
// {
//     data: [639, 465, 493, 478, 589, 632, 674],
//     backgroundColor: colors[3],
//     borderColor: colors[1],
//     borderWidth: 4,
//     pointBackgroundColor: colors[1]
//   }
  ]
};
if (chLine) {
  new Chart(chLine, {
  type: 'line',
  data: chartData,
  options: {
    scales: {
      xAxes: [{
        ticks: {
          beginAtZero: false
        }
      }]
    },
    legend: {
      display: false
    },
    responsive: true
  }
  });
}


/*bar chart */
var chBar = document.getElementById("chBar");
if (chBar) {
  new Chart(chBar, {
  type: 'bar',
  data: {
    labels: ["Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu", "Minggu"],
    datasets: [{
      data: [589, 445, 483, 503, 689, 692, 634],
      backgroundColor: colors[0]
    },
    {
      data: [639, 465, 493, 478, 589, 632, 674],
      backgroundColor: colors[1]
    }]
  },
  options: {
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        barPercentage: 0.4,
        categoryPercentage: 0.5
      }]
    }
  }
  });
}




</script>



  