<?php 
session_start();

if (!isset($_SESSION['data'])) {
  header('Location:login');
}

$titlePage = "Gallery";
require 'functions.php';

$dataLogin = $_SESSION['data'];
$dataGallery = query("SELECT * FROM gallery");

if (isset($_POST['hapusGallery'])) {
  hapusGallery($_POST['hapusGallery']);
}

if (isset($_POST['tambahGallery'])) {
  tambahGallery($_POST);
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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Gallery</h4>

              <div class="col-lg-4 col-md-3">
                      <div class="mt-3 mb-4">
                        <!-- Button trigger modal -->
                        <button
                          type="button"
                          class="btn btn-primary"
                          data-bs-toggle="modal"
                          data-bs-target="#backDropModal"
                        >
                          Tambah Gallery
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
                          <div class="modal-dialog">
                            <form class="modal-content" method="POST" enctype="multipart/form-data">
                              <div class="modal-header">
                                <h5 class="modal-title" id="backDropModalTitle">Tambah Galler</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col mb-3">
                                    <label for="nameBackdrop" class="form-label">Judul Foto</label>
                                    <input
                                      type="text"
                                      id="nameBackdrop"
                                      class="form-control"
                                      name="judul"
                                      placeholder="Masukkan Judul"
                                      required
                                    />
                                  </div>
                                </div>
                                <div class="row g-2">
                                  <div class="col-12 mb-0">
                                    <label for="dobBackdrop" class="form-label">Foto</label>
                                    <input
                                      type="file"
                                      id="dobBackdrop"
                                      class="form-control"
                                      name="foto"
                                      placeholder="Masukkan Tempat"
                                      required
                                    />
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                <button type="submit" name="tambahGallery" class="btn btn-primary">Save</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
              
              <!-- Basic Bootstrap Table -->
              <div class="card">
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Foto</th>
                        <th>Judul</th>
                        <th>tanggal</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php foreach ($dataGallery as $row) : ?>
                        <tr>
                          <td>
                            <img src="../assets/assets/img/gallery/<?= $row['foto']?>" style="max-width:200px; height:100px; object-fit:cover;" alt="">
                          </td>
                          <td><strong><?= substr($row['judul'], 0, 50 ) . '...'; ?></strong></td>
                          <td><?= $row['tgl']; ?></td>
                          <td>
                            <a class="nav-item" href="detailGallery?id=<?= $row['id_gallery']?>">
                              <span class="badge badge-pill bg-primary"><i class="fa-sharp fa-regular fa-eye"></i></span>
                            </a>
                            <a class="nav-item" href="hapusGallery?id=<?= $row['id_gallery']?>">
                              <span class="badge badge-pill bg-danger"><i class="fa-regular fa-trash"></i></span>
                            </a>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                  <?php if (empty($dataGallery)) : ?>
                    <p class="text-center">Tidak ada data</p>
                  <?php endif; ?>
                </div>
              </div>
              <!--/ Basic Bootstrap Table -->
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
