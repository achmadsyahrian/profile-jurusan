<?php 
session_start();

if (!isset($_SESSION['data'])) {
  header('Location:login');
}

$titlePage = "Berita";
require 'functions.php';

$dataLogin = $_SESSION['data'];
$id = $_GET['id'];
$dataBerita = query("SELECT * FROM berita WHERE id_berita = $id")[0];

if (isset($_POST['simpan'])) {
  updateBerita($_POST);
}

?>

<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-template="vertical-menu-template-free"
>
  <head>
    <?php include('inc/head.php') ?>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        <?php include('inc/sidebar.php') ?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          <?php include('inc/navbar.php') ?>
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Berita Detail</h4>

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Form Update</h5>
                      <small class="text-muted float-end">Berita</small>
                    </div>
                    <div class="card-body">
                      <form method="POST" enctype="multipart/form-data">
                        <div class="row mb-4">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">foto</label>
                          <div class="col-sm-10">
                            <img src="../assets/assets/img/berita/<?= $dataBerita['foto']?>" style="max-width: 900px; max-height:300px; object-fit:cover;" class="img-fluid rounded" alt="">
                            <input
                                      type="file"
                                      id="dobBackdrop"
                                      class="form-control mt-4"
                                      name="foto"
                                      placeholder="Masukkan Tempat"
                                    />
                            <div class="form-text">Kosongkan jika tidak ingin mengubahnya</div>
                          </div>
                          
                        </div>
                        
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Judul</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="judul" value="<?= $dataBerita['judul']?>" id="basic-default-name" placeholder="Masukkan Judul" />
                            <input type="hidden" class="form-control" name="id" value="<?= $dataBerita['id_berita']?>" id="basic-default-name"/>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">tanggal post</label>
                          <div class="col-sm-10">
                            <input type="date" readonly class="form-control" name="tgl_post" value="<?= $dataBerita['tgl_post']?>" id="basic-default-company" placeholder=""
                            />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="isi_berita">Isi Berita</label>
                          <div class="col-sm-10">
                            <textarea id="isi_berita" name="isi_berita" value="asdasd" class="form-control" placeholder="Masukkan Isi" aria-label="Hi, Do you have a moment to talk Joe?" aria-describedby="basic-icon-default-message2"
                            ></textarea>
                            <script>
                              var textarea = document.getElementById("isi_berita");
                              textarea.value = "<?= $dataBerita['isi_berita']?>";
                            </script>
                          </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <?php include('inc/footer.php') ?>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <?php include('inc/script.php') ?>
  </body>
</html>
