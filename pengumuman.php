<?php 
session_start();
$titlePage = "Pengumuman";

require 'functions.php';
$resultProfilePk = query("SELECT * FROM profile_jurusan")[0];
$resultBerita = query("SELECT * FROM pengumuman");


// pagination
  // Jumlah data yang ingin ditampilkan pada setiap halaman
  $data_per_halaman = 5;

  // Hitung jumlah total data yang ada pada tabel berita
  $query_total_data = mysqli_query($connect, "SELECT COUNT(*) AS total_data FROM pengumuman");
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
  $query = "SELECT * FROM pengumuman LIMIT $index_data_awal, $data_per_halaman";
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
                <h3 class="breadcrumb__title">Announcement</h3>
                <div class="breadcrumb__list">
                    <span><a href="#">Home</a></span>
                    <span class="dvdr"><i class="fa-regular fa-angle-right"></i></span>
                    <span>Announcement</span>
                </div>
              </div>
          </div>
        </div>
    </div>
    </div>
    <!-- breadcrumb area end -->

        <!-- counter start  -->
    <div class="postbox__area pt-120 pb-120">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="postbox__wrapper pr-30">
              <?php 
              if ($num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
              ?>
                <article class="postbox__item format-image mb-50 transition-3">
                  <div class="postbox__thumb w-img">
                      <a href="pengumuman-detail?id_pengumuman=<?= $row['id_pengumuman']?>">
                        <img src="assets/assets/img/pengumuman/<?= $row['foto']?>" style="max-width:700px; height:400px; object-fit:cover;" alt="news-img">
                      </a>
                  </div>
                  <div class="postbox__content">  
                      <div class="postbox__meta">
                        <span><i class="far fa-calendar-check"></i> <?= $row['tgl_pengumuman']; ?> </span>
                        <span><i class="fa-solid fa-location-dot"></i><?= $row['tempat']?></span>
                        <?php if (strtotime($row['tgl_pengumuman']) < strtotime('today')) : ?>
                          <span><i class="text-success fa-solid fa-calendar-check"></i> Pengumuman Berakhir</span>
                        <?php elseif (strtotime($row['tgl_pengumuman']) == strtotime('today')) : ?>
                          <span><i class="text-success fa-solid fa-clock"></i> Saat ini</span>
                        <?php else : ?>
                          <span><i class="text-warning fa-solid fa-clock"></i> segera</span>
                        <?php endif; ?>
                      <h3 class="postbox__title">
                        <a href="pengumuman-detail?id_pengumuman=<?= $row['id_pengumuman']?>"><?= $row['judul']; ?></a>
                      </h3>
                      <div class="postbox__text">
                        <p><?= substr($row['isi_pengumuman'], 0, 400) . '...'; ?></p>
                      </div>
                      <div class="postbox__read-more">
                        <a href="pengumuman-detail?id_pengumuman=<?= $row['id_pengumuman']?>" class="tp-btn"> <span>Read More</span>
                            <div class="transition"></div>
                        </a>
                      </div>
                  </div>
                </article>
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
          <div class="col-lg-4 col-12">
            <div class="sidebar__wrapper pl-20">
                <div class="sidebar__widget mb-40">
                  <div class="sidebar__widget-content">
                      <div class="sidebar__search">
                        <form action="#">
                            <div class="sidebar__search-input-2">
                              <input type="text" placeholder="Search">
                              <button type="submit"><i class="far fa-search"></i></button>
                            </div>
                        </form>
                      </div>
                  </div>
                </div>
                <div class="sidebar__widget mb-40">
                  <h3 class="sidebar__widget-title">Pengumuman Terbaru</h3>
                  <div class="sidebar__widget-content">
                      <div class="sidebar__post rc__post">
                        <?php 
                        $resultPengumumanAll = query("SELECT * FROM pengumuman ORDER BY tgl_pengumuman DESC LIMIT 4");
                        foreach ($resultPengumumanAll as $rowPengumuman) :
                        ?>
                        <div class="rc__post mb-20 d-flex align-items-center">
                            <div class="rc__post-thumb mr-20">
                              <a href="pengumuman?id_pengumuman=<?= $rowPengumuman['id_pengumuman']?>"><img src="assets/assets/img/pengumuman/<?= $rowPengumuman['foto']?>" alt=""></a>
                            </div>
                            <div class="rc__post-content">
                              <div class="rc__meta">
                                  <span><?= $rowPengumuman['tgl_pengumuman']?></span>
                              </div>
                              <h3 class="rc__post-title">
                                  <a href="pengumuman?id_pengumuman=<?= $rowPengumuman['id_pengumuman']?>"><?= $rowPengumuman['judul']?></a>
                              </h3>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <a href="berita" class="tp-btn br-0">
                          <span>See More <i class="fa-solid fa-arrow-right"></i></span>
                          <div class="transition"></div>
                        </a>
                      </div>
                  </div>
                </div>
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