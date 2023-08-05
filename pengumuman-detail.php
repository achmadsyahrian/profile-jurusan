<?php 
session_start();
$titlePage = "Pengumuman";

require 'functions.php';
$resultProfilePk = query("SELECT * FROM profile_jurusan")[0];
$idPengumuman = $_GET['id_pengumuman'];
$resultPengumuman = query("SELECT * FROM pengumuman WHERE id_pengumuman = $idPengumuman")[0];

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
                <h3 class="breadcrumb__title">News</h3>
                <div class="breadcrumb__list">
                    <span><a href="#">Home</a></span>
                    <span class="dvdr"><i class="fa-regular fa-angle-right"></i></span>
                    <span>News</span>
                </div>
              </div>
          </div>
        </div>
    </div>
    </div>
    <!-- breadcrumb area end -->

        <!-- counter start  -->
    <section class="event__inner pb-50 pt-110">
      <div class="container">
        <div class="row">
          <div class="col-xxl-8 col-xl-8 col-lg-8">
            <h1 class="inner-tiitle mb-25"><?= $resultPengumuman['judul']; ?></h1>

            <div class="events__wrapper">
                <div class="events__thumb mb-35 w-img">
                  <img src="assets/assets/img/pengumuman/<?= $resultPengumuman['foto']?>" alt="">
                </div>
                <div class="events__details mb-35">
                  <h3>Deskripsi</h3>
                  <p><?= $resultPengumuman['isi_pengumuman']; ?></p>
                </div>
            </div>
          </div>
          <div class="col-xxl-4 col-xl-4 col-lg-4">
            <div class="course__sidebar pl-70 p-relative">
                <div class="course__sidebar-widget-2 white-bg mb-20">
                  <div class="course__video">
                      <div class="course__video-content mb-35 mt-20">
                        <ul>
                            <li class="d-flex align-items-center">
                              <div class="course__video-icon">
                                  <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 16 16" style="enable-background:new 0 0 16 16;" xml:space="preserve">
                                    <path class="st0" d="M2,6l6-4.7L14,6v7.3c0,0.7-0.6,1.3-1.3,1.3H3.3c-0.7,0-1.3-0.6-1.3-1.3V6z"/>
                                    <polyline class="st0" points="6,14.7 6,8 10,8 10,14.7 "/>
                                  </svg>
                              </div>
                              <div class="course__video-info">
                                  <h5><span>Pengirim :</span> <?= $resultPengumuman['pengirim']; ?></h5>
                              </div>
                            </li>
                            <li class="d-flex align-items-center">
                              <div class="course__video-icon">
                                  <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve">
                                    <path class="st0" d="M4,19.5C4,18.1,5.1,17,6.5,17H20"/>
                                    <path class="st0" d="M6.5,2H20v20H6.5C5.1,22,4,20.9,4,19.5v-15C4,3.1,5.1,2,6.5,2z"/>
                                  </svg>
                              </div>
                              <div class="course__video-info">
                                  <h5><span>Lokasi :</span><?= $resultPengumuman['tempat']; ?></h5>
                              </div>
                            </li>
                            <li class="d-flex align-items-center">
                              <div class="course__video-icon">
                                  <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 16 16" style="enable-background:new 0 0 16 16;" xml:space="preserve">
                                    <circle class="st0" cx="8" cy="8" r="6.7"/>
                                    <polyline class="st0" points="8,4 8,8 10.7,9.3 "/>
                                  </svg>
                              </div>
                              <div class="course__video-info">
                                  <h5><span>Tanggal :</span><?= $resultPengumuman['tgl_pengumuman']; ?></h5>
                              </div>
                            </li>
                            <li class="d-flex align-items-center">
                              <div class="course__video-icon">
                                  <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 16 16" style="enable-background:new 0 0 16 16;" xml:space="preserve">
                                    <circle class="st0" cx="8" cy="8" r="6.7"/>
                                    <polyline class="st0" points="8,4 8,8 10.7,9.3 "/>
                                  </svg>
                              </div>
                              <div class="course__video-info">
                                  <h5><span>Jam :</span><?= $resultPengumuman['jam']; ?></h5>
                              </div>
                            </li>
                            <li class="d-flex align-items-center">
                              <div class="course__video-icon">
                                  <svg>
                                    <path class="st0" d="M13.3,14v-1.3c0-1.5-1.2-2.7-2.7-2.7H5.3c-1.5,0-2.7,1.2-2.7,2.7V14"/>
                                    <circle class="st0" cx="8" cy="4.7" r="2.7"/>
                                  </svg>
                              </div>
                              <div class="course__video-info">
                                  <h5><span>Status :</span>
                                <?php if (strtotime($resultPengumuman['tgl_pengumuman']) < strtotime('today')) : ?>
                                  Berakhir
                                <?php elseif (strtotime($resultPengumuman['tgl_pengumuman']) == strtotime('today')) : ?>
                                  Aktif
                                <?php else : ?>
                                  Segera
                                <?php endif; ?>
                                </h5>
                              </div>
                            </li>
                        </ul>
                      </div>
                  </div>
                </div>
            </div>
            <div class="sidebar__wrapper pl-20">
                <div class="sidebar__widget mb-40">
                  <h3 class="sidebar__widget-title">Pengumuman Terbaru</h3>
                  <div class="sidebar__widget-content">
                      <div class="sidebar__post rc__post">
                        <?php 
                        $resultPengumumanAll = query("SELECT * FROM pengumuman ORDER BY tgl_pengumuman DESC LIMIT 3");
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
                                  <a href="pengumuman-detail?id_pengumuman=<?= $rowPengumuman['id_pengumuman']?>"><?= $rowPengumuman['judul']?></a>
                              </h3>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <a href="pengumuman" class="tp-btn br-0">
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