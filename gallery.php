<?php 
session_start();
$titlePage = "Gallery";

require 'functions.php';
$resultProfilePk = query("SELECT * FROM profile_jurusan")[0];
$resultGallery = query("SELECT * FROM gallery");


// pagination
  // Jumlah data yang ingin ditampilkan pada setiap halaman
  $data_per_halaman = 5;

  // Hitung jumlah total data yang ada pada tabel berita
  $query_total_data = mysqli_query($connect, "SELECT COUNT(*) AS total_data FROM gallery");
  $total_data = mysqli_fetch_assoc($query_total_data)['total_data'];

  // Hitung jumlah total halaman yang dibutuhkan
  $total_halaman = ceil($total_data / $data_per_halaman);

  // Tentukan halaman saat ini yang sedang ditampilkan
  if (isset($_GET['page'])) {
    $halaman_saat_ini = $_GET['page'];
  } else {
    $halaman_saat_ini = 1;
  }

  // Tentukan index data yang akan ditampilkan pada halaman saat ini
  $index_data_awal = ($halaman_saat_ini - 1) * $data_per_halaman;
  $query = "SELECT * FROM gallery LIMIT $index_data_awal, $data_per_halaman";
  $result = mysqli_query($connect, $query);
  $num_rows = mysqli_num_rows($result);



?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">

<?php include('inc/head.php') ?>

<body>

  <!-- pre loader area start -->
  <?php include('inc/loader.php') ?>
  <!-- pre loader area end -->

  <!-- back to top start -->
  <button class="tp-backtotop">
    <span><i class="fal fa-angle-double-up"></i></span>
  </button>
  <!-- back to top end -->


  <!-- header area start -->
  <?php include('inc/header.php') ?>
  <!-- header area end -->

  <!-- offcanvas area start -->
  <?php include('inc/sidemobile.php') ?>
  <!-- offcanvas area end -->

  <main>
    <!-- breadcrumb area start -->
    <div class="breadcrumb__area include-bg pt-200 pb-150 breadcrumb__overlay" data-background="assets/assets/img/profile-jurusan/bg-about.jpg">
    <div class="container">
        <div class="row">
          <div class="col-xxl-12">
              <div class="breadcrumb__content p-relative z-index-1">
                <h3 class="breadcrumb__title">Gallery</h3>
                <div class="breadcrumb__list">
                    <span><a href="#">Home</a></span>
                    <span class="dvdr"><i class="fa-regular fa-angle-right"></i></span>
                    <span>Gallery</span>
                </div>
              </div>
          </div>
        </div>
    </div>
    </div>
    <!-- breadcrumb area end -->

    <section class="teacher__area pt-100 pb-110 p-relative">
      <div class="container">
        <div class="row">
            <div class="col-xxl-12 col-xl-12 col-lg-12">
              <div class="teacher__wrapper">
                  <div class="teacher__courses ">
                    <div class="teacher__course-wrapper">
                        <div class="row">
                          <?php 
                            if ($num_rows > 0) {
                              while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                          <div class="col-lg-4 col-md-4">
                              <div class="tp-courses__item mb-30">
                                <div class="tp-courses__thumb w-img fix p-relative">
                                    <img src="assets/assets/img/gallery/<?= $row['foto']?>" style="width:350px;height:230px; object-fit:cover;" alt="">
                                </div>
                                <div class="tp-courses__content white-bg">
                                    <div class="tp-courses__meta">
                                      <?php 
                                      // HITUNG JUMLAH KOMENTAR
                                        $query = mysqli_query($connect, "SELECT COUNT(*) AS jumlah_komentar FROM komentar_gallery WHERE id_gallery = {$row['id_gallery']}");
                                        $resultKomen = mysqli_fetch_assoc($query);
                                        $jlh_komentar = $resultKomen['jumlah_komentar'];
                                      ?>
                                      <span><i class="fa-light fa-comment"></i><?= $jlh_komentar; ?> Comments</span>
                                    </div>
                                    <h3 class="tp-courses__title"><a href="gallery-detail?id_gallery=<?= $row['id_gallery']?>"><?= $row['judul']; ?></a></h3>
                                    <div class="tp-courses__price d-flex justify-content-between">
                                      <div class="tp-courses__time">
                                          <span><a href="gallery-detail?id_gallery=<?= $row['id_gallery']?>" class="more-btn">Read More <i class="fa-regular fa-arrow-right"></i></a></span>
                                      </div>
                                    </div>
                                </div>
                              </div>
                          </div>
                          <?php } } else { ?>
                            <p align="center">No result found..</p>
                          <?php } ?>
                        </div>
                    </div>
                  </div>
              </div>
              <div class="basic-pagination">
                  <nav>
                    <ul>
                      <?php if ($halaman_saat_ini > 1) { ?>
                        <li>
                          <a href="?page=<?= $halaman_saat_ini - 1 ?>">
                            <i class="far fa-angle-left"></i>
                          </a>
                        </li>
                      <?php } else { ?>
                        <li class="page-item disabled">
                          <a>
                            <i class="far fa-angle-left"></i>
                          </a>  
                        </li>
                      <?php } ?>

                      <?php for ($i = 1; $i <= $total_halaman; $i++) { ?>
                        <?php if ($i == $halaman_saat_ini) { ?>
                          <li>
                              <a class="current"><?= $i ?></a>
                          </li>
                        <?php } else { ?>
                          <li>
                            <a href="?page=<?= $i ?>"><?= $i ?></a>
                          </li>
                        <?php } ?>
                      <?php } ?>

                      <?php if ($halaman_saat_ini < $total_halaman) { ?>
                        <li><a href="?page=<?= $halaman_saat_ini + 1 ?>"><i class="far fa-chevron-right"></i></a></li>
                      <?php } else { ?>
                        <li><a><i class="far fa-chevron-right"></i></a></li>
                      <?php } ?>
                    </ul>
                    </nav>
                </div>
            </div>
        </div>
      </div>
    </section>
  </main>

  <!-- footer area start -->
  <?php include('inc/footer.php') ?>
  <!-- footer area end -->


  <!-- JS here -->
  <?php include('inc/script.php') ?>
</body>


<!-- Mirrored from data.themeim.com/html/tutorgo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Mar 2023 07:13:10 GMT -->
</html>