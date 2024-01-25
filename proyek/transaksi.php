<?php
include "warifheader.php";
?>

<!--conten utama-->

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="container mt-4 mb-4">
    <p class="fw-semibold fs-3 text-info-emphasis ">Transaksi Customer</p>
    <div class="card bg-info-subtle ">
      <div class="card-header">
        Note
      </div>
      <div class="card-body">
        <h5 class="card-title">Fitur Transaksi Warif Corporation</h5>
        <p class="card-text">Data Transaksi akan muncul di sini jika ada customer yang membeli unit anda, anda bisa melihat status pembayaran customer dan melihat data detail customer di halaman ini</p>
      </div>
      <div class="card-footer text-body-secondary">
        Warif Corporation
      </div>
    </div>

    <div class="row mt-4">
    <p class="fw-semibold fs-3 text-warning-emphasis ">Table Transaksi</p>
      <div class="col">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table align-middle table-bordered table-hover rounded ">
            <thead class="table-warning">

              <tr>
                <th scope="col">id</th>
                <th scope="col">Nama Unit</th>
                <th scope="col">Tanggal Beli</th>
                <th scope="col">Harga Beli</th>
                <th scope="col">Harga Jual</th>
                <th scope="col">Vendor</th>
                <th scope="col">Foto Unit</th>
                <th scope="col">Tahun Produksi</th>
                <th class="col-sm-3 col-md-2">Action</th>
              </tr>

            </thead>
            <tbody>
             
                <form method="post" action="#">
                  <tr>
                   <input type="hidden" name="id_aset" value="">
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>

                    <td></td>
                    <td></td>
                   
                    
                    </style>
                    <td></td>

                    <td></td>
                    <td class="d-sm-inline-flex gap-sm-2">
                      
                    </td>
                  </tr>
                  <!--modal-->
                </form>
            </tbody>
          </table>
        </div>
      </div>
    </div>
      </div>
    </div>
  </div>
  </div>
</main>