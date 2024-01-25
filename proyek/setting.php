<?php
include "warifheader.php";

?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm-8">
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
                        <form>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Password lama</label>
                                <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password Baru</label>
                                <input type="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Saya Telah Membaca Ketentuan dan Kebijakan</label>
                            </div>
                            <button type="submit" class="btn btn-info">Ganti Password</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mt-4 mt-md-0">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="">
                            
                            <img src="../image/alif.jpg" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title text-success">Informasi Pengguna</h5>
                                <?php
                               
                                include "koneksi.php";

                                $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_admin");
                                $cek = mysqli_num_rows($query);

                                   
                                  
                                                              
                                while ($_SESSION= mysqli_fetch_array($query)) {
                                ?>
                                    <p class="card-text">Username: <?php echo $_SESSION['username']; ?></p>
                                    <p class="card-text">Email: <?php echo $_SESSION['email']; ?></p>
                                    
                                    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                                <?php
                                }  
                                
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>