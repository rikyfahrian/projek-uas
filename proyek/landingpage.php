<?php
include "warifheader.php";
?>
<!--conten utama-->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

  <!--chart bar diagam-->
  <div class="container-fluid mt-5">
    <div class="card chart-container">
      <canvas id="chart"></canvas>
    </div>
  </div>

  <!--carousel/gambar dengan slide-->
  <div class="container mt-4">
    <div class="row row-cols-2">
      <div class="col-7">
        <div class="card text-bg-dark ">
          <img src="../image/bg-gudang2.jpg" class="card-img" alt="...">
          <div class="card-img-overlay">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><small>Last updated 3 mins ago</small></p>
          </div>
        </div>
      </div>
      <div class="col-5">
        <div id="carouselExampleCaptions" class="carousel slide ">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="../image/bg-gudang.jpg" class="d-block rounded-4 w-100" alt="..." height="375">
              <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Some representative placeholder content for the first slide.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="../image/bg-gudang2.jpg" class="d-block rounded-4 w-100" alt="..." height="375">
              <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="../image/bg-gudang3.jpg" class="d-block rounded-4 w-100  " alt="..." height="375">
              <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Some representative placeholder content for the third slide.</p>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </div>

  <!--card utama-->
  <div class="container-fluid mt-5 ">
    <div class="row">
      <div class="col-lg-6 col-md-7 col-sm-8 col-9 mb-3">
        <div class="card border border-success">
          <div class="card-body">
            <p class="text-success text-xl-start">
              Selamat Datang di Dashboard Pintar WARIF
            </p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit.
            Facere natus praesentium.

          </div>
        </div>
        <div class="card mt-3 border border-info">
          <div class="card-body">
            <p class="text-info text-xl-start">
              Selamat Datang di Dashboard Pintar WARIF
            </p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit.
            Facere natus prae sentium. Lorem ipsum dolor sit, amet consectetur adipisicing elit.
            Facere natus praesentium

          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-7 col-sm-8 col-9">
        <div class="card text-center border border-warning">
          <div class="card-header text-warning-emphasis">
            Featured
          </div>
          <div class="card-body">
            <h5 class="card-title text-warning">Manajemen Aset Unit WARIF</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional . Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nemo id mollitia nisi cumque soluta odit at quibusdam eos amet accusamus dolor repudiandae, hic tempora unde voluptatem excepturi saepe? At, vel.</p>
            <a href="#" class="btn btn-warning mb-1">Lihat Detail Unit</a>
          </div>

        </div>
      </div>


      <!--gambar-->
      <div class="container mb-4 d-grid mt-4">
        <div class="row row-cols-3 row-cols-md-3 g-4">
          <div class="col ">
            <div class="card text-bg-dark mb-2">
              <img src="../image/bg-truk3.jpg" class="card-img" alt="..." height="200" />
              <div class="card-img-overlay">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">
                  This is a wider card with supporting text below as a natural lead-in
                  to additional content. This content is a little bit longer.
                </p>
                <p class="card-text"><small>Last updated 3 mins ago</small></p>
              </div>
            </div>
            <div class="card text-bg-dark">
              <img src="../image/bg-truck.jpg" class="card-img" alt="..." height="199" />
              <div class="card-img-overlay">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">
                  This is a wider card with supporting text below as a natural lead-in
                  to additional content. This content is a little bit longer.
                </p>

              </div>

            </div>
          </div>

          <div class="">
            <div class="col">
              <div class="card mb-3">
                <img src="../image/bg-dashboard2.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card mb-3">
              <img src="../image/bg-dashboard3.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--table unit-->
  <div class="container mb-4">
    <div class="row">
      <div class="col">
        <table class="table table-striped table-hover border border-dark-subtle">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">First</th>
              <th scope="col">Last</th>
              <th scope="col">Handle</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>@fat</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td colspan="2">Larry the Bird</td>
              <td>@twitter</td>
            </tr>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>@fat</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td colspan="2">Larry the Bird</td>
              <td>@twitter</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!--foto teams-->
  <div class="container-fluid mb-5">
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <div class="col">
        <div class="card h-100">
          <img src="../image/alif.jpg" class="card-img-top" alt="..." />
          <div class="card-body">
            <h5 class="card-title">Alif Haikal</h5>
            <p class="card-text">
              This is a longer card with supporting text below as a
              natural lead-in to additional content. This content is
              a little bit longer.
            </p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100">
          <img src="../image/riky.png" class="card-img-top" alt="..." />
          <div class="card-body">
            <h5 class="card-title">MOHAMAD RIKI FAHRIAN
            </h5>
            <p class="card-text">This is a short card.</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100">
          <img src="../image/ferdian.jpg" class="card-img-top" alt="..." />
          <div class="card-body">
            <h5 class="card-title">FERDIAN

            </h5>
            <p class="card-text">
              This is a longer card with supporting text below as a
              natural lead-in to additional content.
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4 mt-2 justify-content-center align-content-center">
      <div class="col">
        <div class="card h-100">
          <img src="../image/iky.jpg" class="card-img-top" alt="..." />
          <div class="card-body">
            <h5 class="card-title">MUHAMAD RIZKI LUTFIANSYAH

            </h5>
            <p class="card-text">
              This is a longer card with supporting text below as
              a natural lead-in to additional content.
            </p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100">
          <img src="../image/widi.jpg" class="card-img-top" alt="..." />
          <div class="card-body">
            <h5 class="card-title">WIDI INDRA CAHYANA
            </h5>
            <p class="card-text">
              This is a longer card with supporting text below as
              a natural lead-in to additional content.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  </div>
</main>
<!--cdn untuk chart-->
<script src="@@path/vendor/chartist/dist/chartist.min.js"></script>
<script src="@@path/vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
<!--mengambil js untuk chart-->
<script src="../js/chart.js"></script>
<script src="../kelompok/js/dashboard.js"></script>