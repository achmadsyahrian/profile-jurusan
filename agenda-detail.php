<?php 
session_start();
$titlePage = "Agenda";

require 'functions.php';
$resultProfilePk = query("SELECT * FROM profile_jurusan")[0];
$idAgenda = $_GET['id_agenda'];
$resultAgenda = query("SELECT * FROM agenda WHERE id_agenda = $idAgenda")[0];

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

        <!-- counter start  -->
    <div class="course-details pt-60">
      <div class="container">

        <div class="course-details__header">
            <div class="container">
              <div class="row">
                  <div class="col-lg-8">
                    <div class="page__title-content mb-25">
                        <h1 class="page__title"><?= $resultAgenda['nama_kegiatan']; ?></h1>
                    </div>
                    <div class="course-details__content">
                        <div class="course__img w-img mb-30">
                          <img src="assets/assets/img/kegiatan/<?= $resultAgenda['foto']?>" alt="">
                        </div>
                    </div>
                    <div class="course__tab-content mb-95">
                        <div class="tab-content" id="courseTabContent">
                          <div class="tab-pane fade active show" id="description" role="tabpanel" aria-labelledby="description-tab">
                              <div class="course__description">
                                <h3>Deskripsi</h3>
                                <p><?= $resultAgenda['deskripsi']; ?></p>
                              </div>
                          </div>
                        </div>
                    </div>
                  </div>
                  <div class="col-xxl-4 col-xl-4 col-lg-4">
                    <div class="course__sidebar pl-70 p-relative">
                        <div class="course__sidebar-widget-2 white-bg mb-50">
                          <div class="course__video">
                              <div class="course__video-content mb-20 mt-20">
                                <ul>
                                    <li class="d-flex align-items-center">
                                      <div class="course__video-icon">
                                          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 16 16" style="enable-background:new 0 0 16 16;" xml:space="preserve">
                                            <path class="st0" d="M2,6l6-4.7L14,6v7.3c0,0.7-0.6,1.3-1.3,1.3H3.3c-0.7,0-1.3-0.6-1.3-1.3V6z"/>
                                            <polyline class="st0" points="6,14.7 6,8 10,8 10,14.7 "/>
                                          </svg>
                                      </div>
                                      <div class="course__video-info">
                                          <h5><span>Koordinator:</span> <?= $resultAgenda['penanggung_jawab']; ?></h5>
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
                                          <h5><span>Lokasi :</span><?= $resultAgenda['lokasi']; ?></h5>
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
                                          <h5><span>Tanggal :</span><?= $resultAgenda['tgl_kegiatan']; ?></h5>
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
                                          <h5><span>Jam :</span><?= $resultAgenda['waktu']; ?></h5>
                                      </div>
                                    </li>
                                </ul>
                              </div>
                          </div>
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