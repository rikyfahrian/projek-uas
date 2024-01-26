<?php
include "warifheader.php";

?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container mt-4 mb-5">
        <div class="row">
            <div class="col">
                <div class="card ">
                    <div class="card-header bg-warning text-dark fw-semibold fs-4">
                        Baca Dahulu
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Ganti Informasi Akun</h5>
                        <p class="card-text mb-3">Selamat datang di halaman pengaturan akun! Di sini, Anda dapat mengelola dan memperbarui informasi akun Anda sesuai kebutuhan. Kami ingin memberitahukan kepada Anda tentang suatu kebijakan keamanan yang kami terapkan untuk melindungi akun Anda.</p>
                        <h5 class="card-title">Perubahan Password:</h5>
                        <p class="card-text mb-3">Jika Anda baru saja mengganti kata sandi akun Anda, harap diingat bahwa perubahan ini akan berlaku segera. Namun, sebagai langkah keamanan tambahan, Anda tidak dapat mengganti kata sandi kembali dalam waktu 24 jam setelah perubahan terakhir. Hal ini bertujuan untuk melindungi akun Anda dari potensi tindakan yang tidak diinginkan dan memastikan keamanan yang lebih tinggi.</p>
                    </div>
                    <div class="card-footer text-warning fw-semibold ">
                        WARIF CORPORATION
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-header bg-info text-dark fw-semibold fs-4">
                        Ganti Password
                    </div>
                    <div class="card-body">
                        <form method="post" action="updateakun.php">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Password lama</label>
                                <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="passwordlama">

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password Baru</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="passwordbaru">
                            </div>
                        
                            <button type="submit" class="btn btn-info">Ganti Password</button>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>

    </div>
</main>