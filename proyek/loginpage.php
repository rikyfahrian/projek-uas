
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="../kelompok/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .gradient-custom-2 {
      /* fallback for old browsers */
      background: #808080;
      /* Warna abu-abu yang diinginkan */

      /* Fallback jika warna abu-abu di atas tidak didukung */
      background: linear-gradient(to right, #808080, #808080);

    }

    @media (min-width: 10px) {
      .gradient-form {
        height: 50vh;
      }
    }

    @media (min-width: 10px) {
      .gradient-custom-2 {
        border-top-right-radius: .3rem;
        border-bottom-right-radius: .3rem;
      }
    }
  </style>
</head>

<body class="bg-dark">
  <section class="gradient-form" style="background-color: #eee;">
 
    <div class="container justify-content-center align-content-center  d-flex ">

           <?php
                  if (isset($_GET['pesan'])) {
                    if ($_GET['pesan'] == "gagallogin") {
                      echo '<div class="alert alert-danger position-absolute z-3 mt-3 " role="alert" >
                      password atau username tidak sesuai
                    </div>';
                 } else if ($_GET['pesan'] == "logout") {
                      echo '<div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                      <div class="flex">
                        <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                        <div>
                          <p class="font-bold">Telah Berhasil Log Out</p>
                          <p class="text-sm">Aktivitas akan terekam sistem.</p>
                        </div>
                      </div>
                    </div>';
                    }
                  }
                  ?>
      <div class="row d-flex justify-content-center align-items-center ">
      
        <div class="col-xl-10">
          <div class="card rounded-3 text-black mt-5">
            <div class="row g-0">
              <div class="col-lg-6">
                <div class="card-body p-md-5 mx-md-4">

                  <div class="text-center">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp" style="width: 185px;" alt="logo">
                    <h4 class="mt-1 mb-4 ">We are warif teams</h4>
                  </div>

                 

                  <form method="post" action="aksilogin.php">
                    <p>Please login to your account</p>

                    <div class="form-outline mb-4">
                      <input type="text" name="username" class="form-control" placeholder="masukan username" required />
                      <label class="form-label" for="form2Example11">Username</label>
                    </div>

                    <div class="form-outline mb-4">
                      <input type="password" name="password" class="form-control" required />
                      <label class="form-label" for="form2Example22">Password</label>
                    </div>

                    <div class="text-center pt-1  pb-1">
                      <button class="btn btn-info  btn-block fa-lg mb-3" type="submit">Log
                        in</button>
                      <a class="text-muted" href="#!">Forgot password?</a>
                    </div>

                    <div class="d-flex align-items-center justify-content-center ">
                      <p class="mb-0 me-2">Belum Punya Akun ?</p>
                      <button type="button" class="btn btn-warning ">Create new</button>
                    </div>

                  </form>

                </div>
              </div>
              <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                  <h4 class="mb-4">We are more than just a company</h4>
                  <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="../kelompok/js/bootstrap.min.js"></script>
</body>

</html>