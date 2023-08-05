<?php 
session_start();
$titlePage = "Agenda";

require 'functions.php';
$resultProfilePk = query("SELECT * FROM profile_jurusan")[0];
$resultKegiatan = query("SELECT * FROM agenda");


// pagination
  // Jumlah data yang ingin ditampilkan pada setiap halaman
  $data_per_halaman = 6;

  // Hitung jumlah total data yang ada pada tabel berita
  $query_total_data = mysqli_query($connect, "SELECT COUNT(*) AS total_data FROM agenda");
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
  $query = "SELECT * FROM agenda LIMIT $index_data_awal, $data_per_halaman";
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
                <h3 class="breadcrumb__title">Agenda</h3>
                <div class="breadcrumb__list">
                    <span><a href="#">Home</a></span>
                    <span class="dvdr"><i class="fa-regular fa-angle-right"></i></span>
                    <span>Agenda</span>
                </div>
              </div>
          </div>
        </div>
    </div>
    </div>
    <!-- breadcrumb area end -->

    <div class="tp-event-3__section pt-120 pb-120 p-relative fix">
      <div class="container">
        <div class="row">
            <div class="col-lg-12">
              <div class="tp-section__title-wrapper text-center mb-60">
                  <h3 class="tp-section__title mb-15">Agenda Kegiatan</h3>
                  <p>Kami ingin memberi informasi bahwa semua kegiatan yang kami adakan di jurusan ini diadakan dengan tujuan untuk meningkatkan kualitas pendidikan dan pengalaman siswa kami.</p>
              </div>
            </div>
        </div>
        <div class="tp-event-3__wrapper">
            <div class="row align-items-center">
              <?php 
              if ($num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
              ?>
              <div class="col-lg-6">
                <div class="tp-event-3__item mb-30">
                  <div class="tp-event-3__content d-md-flex justify-content-between align-items-center" style="min-height:100px;">
                      <div class="tp-event-3__info">
                        <span><i class="fa-light fa-clock"></i> <?= $row['tgl_kegiatan']; ?></span>
                        <span><i class="fa-light fa-location-dot"></i> <?= $row['lokasi']; ?></span>
                        <h3 class="tp-event-3__title"><a href="agenda-detail?id_agenda=<?= $row['id_agenda']?>"><?= substr($row['nama_kegiatan'], 0, 40) . '...'; ?></a> </h3>
                      </div>
                      <div class="tp-evnet-2__btn p-relative z-index-11">
                        <a href="agenda-detail?id_agenda=<?= $row['id_agenda']?>" class="tp-border-btn">
                            <span>Detail</span>
                            <div class="transition"></div>
                        </a>
                      </div>
                  </div>
                </div>
              </div>
              <?php } } else { ?>
                <p align="center">No result found..</p>
              <?php } ?>
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
  </div>
  </main>

  <!-- footer area start -->
  <?php include('inc/footer.php') ?>
  <!-- footer area end -->


  <!-- JS here -->
  <?php include('inc/script.php') ?>
</body>


<!-- Mirrored from data.themeim.com/html/tutorgo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Mar 2023 07:13:10 GMT -->
</html>