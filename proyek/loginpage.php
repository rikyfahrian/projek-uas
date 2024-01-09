<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="../kelompok/css/bootstrap.min.css" rel="stylesheet" />

    <title>Login Page</title>
  </head>

 <style>
    .custom-mt {
        margin-top: 130px;
    }

    .custom-w {
        width: 65vh;
    }

    .form-control:focus {
        border-color: #ffc107; 
        box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.25); 
    }

    .bg-custom {
        position: relative;
        background-image: url('../image/bg-image2.jpg');
        background-size: cover;
        background-position: center;
        height: 100vh;
       
    }

    .overlay {
        position: absolute;
      
        width: 100%;
        height: 100%; /* Memastikan tinggi overlay mencakup tinggi gambar latar belakang */
        background-color: rgba(0, 0, 0, 0.6); 
    }
 </style>

</head>
<body class="bg-custom">
    <div class="overlay">
    <div class="container d-flex justify-content-center align-content-center custom-mt">
        <div class="card text-bg-dark mb-3 custom-w">
            <div class="card-header ">Header</div>
            <div class="card-body">
                <form action="aksilogin.php" method="post">
                    <div class="mb-3 w-auto">
                        <label for="username" class="form-label">Username </label>
                        <input type="text" class="form-control" name="username" aria-describedby="emailHelp">
                        
                    </div>
                    <div class="mb-4 w-auto">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    

                    <div class="d-grid gap-2">
                       
                        <button class="btn btn-warning mb-2" type="submit">Login</button>
                        <div id="emailHelp" class="form-text mx-2">Belum Memili akun ? daftar terlebih dahulu</div>
                        <a href="register.php" ><button type="button" class="btn btn-dark">Daftar</button></a>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
    <script src="kelompok/js/bootstrap.bundle.min.js"></script>
</body>
</html>
