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
        margin-top: 100px;
    }

    .custom-w {
        width: 80vh;
    }

    .form-control:focus {
        border-color: #ffc107; 
        box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.25); 
    }

    .bg-custom {
        position: relative;
        background-image: url('image/bg-iamge3.jpg');
        background-size: cover;
        background-position: center;
        height: 100vh;
       
    }

    .overlay {
        position: absolute;
      
        width: 100%;
        height: 100%; /* Memastikan tinggi overlay mencakup tinggi gambar latar belakang */
        background-color: rgba(0, 0, 0, 0.8); 
    }
 </style>

</head>
<body class="bg-custom">
    <div class="overlay">
    <div class="container d-flex justify-content-center align-content-center custom-mt">
        <div class="card text-bg-dark mb-3 custom-w">
            <div class="card-header ">Header</div>
            <div class="card-body">
               
                <form>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" id="inputEmail3">
                        </div>
                      </div>
                     
                    <div class="row mb-3">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-12">
                        <input type="email" class="form-control" id="inputEmail3">
                      </div>
                    </div>
                    <div class="row mb-4">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
                      <div class="col-sm-12">
                        <input type="password" class="form-control" id="inputPassword3">
                      </div>
                    </div>
                   
                   <a href="loginpage.php"><button type="button" class="btn btn-warning">Buat Akun</button></a> 
                  </form>
            </div>
            </div>
        </div>
    </div>
    <script src="../kelompok/js/bootstrap.bundle.min.js"></script>
</body>
</html>
