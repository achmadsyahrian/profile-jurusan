<?php 
session_start();

if (!isset($_SESSION['data'])) {
  header('Location:login');
}

$titlePage = "Verifikasi";
require 'functions.php';

$dataLogin = $_SESSION['data'];

$dataMember = mysqli_query($connect, "SELECT * FROM users WHERE level = 'member' AND status = 'N'");

if ($dataMember) {
  $jumlahMember = mysqli_num_rows($dataMember);
} 


if (isset($_POST['hapusMember'])) {
  hapusMember($_POST['hapusBerita']);
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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Member</h4>

              <div class="card">
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Verifikasi</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      
                      <?php $i = 1; ?>
                      <?php foreach ($dataMember as $row) : ?>
                        <tr>
                          <td><?= $i++; ?></td>
                          <td><i class="fa-regular fa-hashtag me-3"></i><strong><?= $row['nama'] ?></strong></td>
                          <td><?= $row['username']; ?></td>
                          <td>
                            <a class="nav-item" href="verifMember?id=<?= $row['id_user']?>">
                              <span class="badge badge-pill bg-success"><i class="fas fa-check"></i></span>
                            </a>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                  <?php if ($jumlahMember == 0) : ?>
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
