<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
    <link href="../kelompok/css/bootstrap.min.css" rel="stylesheet" />

    <style>
      .custom-container {
        margin-top: 200px;
        display: flex;
        flex-direction: column;
        align-items: center;
      }
    </style>
  </head>
  <body class="bg-dark">
    <div class="custom-container">
      <h1 class="text-warning text-center fw-bold">
        selamat datang di web kelompok 6
      </h1>
      <p class="text-center fw-medium">
        web ini di buat untuk tugas akhir pelajaran web dasar
      </p>
      <p class="text-body-secondary text-center">
        silahkan login untuk akses aplikasi
      </p>
      <div class="d-grid gap-3">
        <button
          type="button"
          class="btn btn-warning rounded-5"
          data-bs-toggle="modal"
          data-bs-target="#deskripsi"
        >
          Deskripsi Singkat
        </button>
      </div>
    </div>

    <!-- Modal -->
    <div
      class="modal fade"
      id="deskripsi"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda,
            exercitationem saepe aperiam eaque ullam praesentium quidem nemo
            animi perspiciatis deleniti rem molestias, omnis ipsam consectetur
            enim! Maxime eveniet amet tempora. Lorem ipsum dolor sit amet
            consectetur adipisicing elit. Officia enim quae consequatur ut, amet
            sunt ullam expedita nihil distinctio et aspernatur porro ipsum,
            quia, quos animi aliquid reiciendis. Eum, tenetur. Lorem ipsum
            dolor, sit amet consectetur adipisicing elit. Cupiditate esse quae
            eius animi quos debitis repellendus? Fuga, asperiores, non enim, ad
            culpa perferendis aliquam natus necessitatibus consequatur cum eaque
            expedita.
          </div>
          <div class="modal-footer">
            <a href="loginpage.php">
              <button
                type="button"
                class="btn btn-warning btn-md rounded-2"
                data-bs-dismiss="modal"
              >
                Get Started
              </button>
            </a>
          </div>
        </div>
      </div>
    </div>
    <script src="../kelompok/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
