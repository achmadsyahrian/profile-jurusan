<?php 
session_start();

if (!isset($_SESSION['data'])) {
  header('Location:login');
}

$titlePage = "Dashboard";
require 'functions.php';

$dataLogin = $_SESSION['data'];
$resultBerita = mysqli_query($connect, "SELECT * FROM berita");
$jumlahDataBerita = mysqli_num_rows($resultBerita);

$resultMember = mysqli_query($connect, "SELECT * FROM users WHERE level = 'member' ");
$jumlahDataMember = mysqli_num_rows($resultMember);

$dataMemberN = mysqli_query($connect, "SELECT * FROM users WHERE level = 'member' AND status = 'N'");

if ($dataMemberN) {
  $jumlahMemberN = mysqli_num_rows($dataMemberN);
} 

$resultAgenda = mysqli_query($connect, "SELECT * FROM agenda");
$jumlahDataAgenda = mysqli_num_rows($resultAgenda);

$resultGallery = mysqli_query($connect, "SELECT * FROM gallery");
$jumlahDataGallery = mysqli_num_rows($resultGallery);

$resultPengumuman = mysqli_query($connect, "SELECT * FROM pengumuman");
$jumlahDataPengumuman = mysqli_num_rows($resultPengumuman);




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
              <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        <div class="card-body">
                          <h5 class="card-title text-primary">Selamat Datang <?= ucfirst($dataLogin['level']); ?>!</h5>
                            <?php if ($dataLogin['level'] == "member") : ?>
                              <p class="mb-4">
                                Ayo buat sesuatu yg menarik hari ini. 
                              </p>
                            <?php else: ?>
                              <p class="mb-4">
                                Kamu memiliki <span class="fw-bold"><?= $jumlahMemberN; ?></span> akun member untuk diverifikasi. 
                              </p>
                              <a href="member" class="btn btn-sm btn-outline-primary">Lihat</a>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="assets/assets/img/illustrations/man-with-laptop-light.png"
                            height="140"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12 order-1">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <span class="avatar-initial rounded bg-label-primary">
                                <i class="fa-solid fa-users"></i>
                              </span>
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt3"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="members">View More</a>
                              </div>
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Members</span>
                          <h3 class="card-title mb-2"><?= $jumlahDataMember; ?></h3>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-lg-12 order-1">
                  <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <span class="avatar-initial rounded bg-label-warning">
                                <i class="fa-regular fa-newspaper"></i>
                              </span>
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt3"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="berita">View More</a>
                              </div>
                            </div>
                          </div>
                          <span>Berita</span>
                          <h3 class="card-title text-nowrap mb-1"><?= $jumlahDataBerita; ?></h3>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <span class="avatar-initial rounded bg-label-danger">
                                <i class="fa-regular fa-calendar-lines-pen"></i>
                              </span>
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt3"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="agenda">View More</a>
                              </div>
                            </div>
                          </div>
                          <span>Agenda</span>
                          <h3 class="card-title text-nowrap mb-1"><?= $jumlahDataAgenda; ?></h3>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <span class="avatar-initial rounded bg-label-success">
                                <i class="fa-regular fa-image"></i>
                              </span>
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt3"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="gallery">View More</a>
                              </div>
                            </div>
                          </div>
                          <span>Gallery</span>
                          <h3 class="card-title text-nowrap mb-1"><?= $jumlahDataGallery; ?></h3>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <span class="avatar-initial rounded bg-label-info">
                                <i class="fa-solid fa-bullhorn"></i>
                              </span>
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt3"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="pengumuman">View More</a>
                              </div>
                            </div>
                          </div>
                          <span>Pengumuman</span>
                          <h3 class="card-title text-nowrap mb-1"><?= $jumlahDataPengumuman; ?></h3>
                        </div>
                      </div>
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
