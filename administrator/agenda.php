<?php 
session_start();

if (!isset($_SESSION['data'])) {
  header('Location:login');
}

$titlePage = "Agenda";
require 'functions.php';

$dataLogin = $_SESSION['data'];
$dataAgenda = query("SELECT * FROM agenda");

if (isset($_POST['hapusAgenda'])) {
  hapusAgenda($_POST['hapusAgenda']);
}

if (isset($_POST['tambahAgenda'])) {
  tambahAgenda($_POST);
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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Agenda Kegiatan</h4>

              <div class="col-lg-4 col-md-3">
                      <div class="mt-3 mb-4">
                        <!-- Button trigger modal -->
                        <button
                          type="button"
                          class="btn btn-primary"
                          data-bs-toggle="modal"
                          data-bs-target="#backDropModal"
                        >
                          Tambah Agenda
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
                          <div class="modal-dialog">
                            <form class="modal-content" method="POST" enctype="multipart/form-data">
                              <div class="modal-header">
                                <h5 class="modal-title" id="backDropModalTitle">Tambah Agenda</h5>
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
                                    <label for="nameBackdrop" class="form-label">Nama Kegiatan</label>
                                    <input
                                      type="text"
                                      id="nameBackdrop"
                                      class="form-control"
                                      name="nama_kegiatan"
                                      placeholder="Masukkan Judul"
                                      required
                                    />
                                  </div>
                                </div>
                                <div class="row g-2">
                                  <div class="col mb-0">
                                    <label for="emailBackdrop" class="form-label">tanggal</label>
                                    <input
                                      type="date"
                                      id="emailBackdrop"
                                      class="form-control"
                                      name="tanggal"
                                      placeholder="14:00 WIB"
                                    />
                                  </div>
                                  <div class="col mb-0">
                                    <label for="dobBackdrop" class="form-label">Waktu</label>
                                    <input
                                      type="text"
                                      id="dobBackdrop"
                                      class="form-control"
                                      name="waktu"
                                      placeholder="14:00 WIB"
                                    />
                                  </div>
                                </div>
                                <div class="row g-2">
                                  <div class="col mb-0">
                                    <label for="emailBackdrop" class="form-label">Penanggung Jawab</label>
                                    <input
                                      type="text"
                                      id="emailBackdrop"
                                      class="form-control"
                                      name="koordinator"
                                      placeholder="Masukkan Penanggung Jawab"
                                    />
                                  </div>
                                  <div class="col mb-0">
                                    <label for="dobBackdrop" class="form-label">Lokasi</label>
                                    <input
                                      type="text"
                                      id="dobBackdrop"
                                      class="form-control"
                                      name="lokasi"
                                      placeholder="Masukkan Tempat"
                                      required
                                    />
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-0">
                                    <label for="emailBackdrop" class="form-label">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control"></textarea>
                                  </div>
                                </div>
                                <div class="col mb-0">
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
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                <button type="submit" name="tambahAgenda" class="btn btn-primary">Save</button>
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
                        <th>judul</th>
                        <th>tanggal</th>
                        <th>koordinator</th>
                        <th>Status</th>
                        <th>Lokasi</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php foreach ($dataAgenda as $row) : ?>
                        <tr>
                          <td><i class="fa-regular fa-hashtag me-3"></i><strong><?= substr($row['nama_kegiatan'], 0, 20 ) . '...'; ?></strong></td>
                          <td><?= $row['tgl_kegiatan']; ?></td>
                          <td><?= $row['penanggung_jawab']; ?></td>
                          <td>
                            
                              <?php if (strtotime($row['tgl_kegiatan']) < strtotime('today')) : ?>
                                <span class="badge bg-label-danger me-1">Berakhir</span>
                              <?php elseif (strtotime($row['tgl_kegiatan']) == strtotime('today')) : ?>
                                <span class="badge bg-label-success me-1">Saat Ini</span>
                              <?php else : ?>
                                <span class="badge bg-label-warning me-1">Segera</span>
                              <?php endif; ?>
                            
                          </td>
                          <td><span class="me-1"><?= substr($row['lokasi'], 0, 18 ) . '...'; ?></span></td>
                          <td>
                            <a class="nav-item" href="detailAgenda?id=<?= $row['id_agenda']?>">
                              <span class="badge badge-pill bg-primary"><i class="fa-sharp fa-regular fa-eye"></i></span>
                            </a>
                            <a class="nav-item" href="hapusAgenda?id=<?= $row['id_agenda']?>">
                              <span class="badge badge-pill bg-danger"><i class="fa-regular fa-trash"></i></span>
                            </a>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                  <?php if (empty($dataAgenda)) : ?>
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
