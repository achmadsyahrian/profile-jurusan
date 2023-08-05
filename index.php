<?php 
session_start();
$titlePage = "Dashboard";

require 'functions.php';
$resultProfilePk = query("SELECT * FROM profile_jurusan")[0];
$resultBerita = query("SELECT * FROM berita ORDER BY tgl_post DESC LIMIT 4");
$resultPengumuman = query("SELECT * FROM pengumuman ORDER BY tgl_pengumuman DESC LIMIT 4");
$resultAgenda = query("SELECT * FROM agenda ORDER BY tgl_kegiatan DESC LIMIT 4");

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
    
    <!-- hero section  -->
    <div class="tp-hero__section pt-130 theme-bg p-relative fix">
        <div class="container">
          <div class="row">
              <div class="col-lg-7">
                <div class="tp-hero__content pt-200">
                    <span class="tp-hero__subtitle text-white mb-10">Program Keahlian</span>
                    <h4 class="tp-hero__title text-white mb-15">Produksi Siaran Program Televisi</h4>
                    <p class="text-white mb-45">SMK NEGERI 1 PERCUT SEI TUAN</p>
                    <div class="tp-hero__btn-wrappper d-md-flex align-items-center">
                      <div class="hero-btn-1 mr-20 p-relative z-index-1">
                          <a href="about" class="tp-btn br-0">
                            <span>About Us <i class="fa-solid fa-arrow-right"></i></span>
                            <div class="transition"></div>
                          </a>
                      </div>
                    </div>
                </div>
              </div>
              <div class="col-lg-5">
                <div class="tp-hero__img">
                    <img src="assets/assets/img/profile-jurusan/bg-index.png" style="width:800px;" alt="hero">
                </div>
              </div>
          </div>
        </div>
        <div class="tp-hero__shapes">
          <div class="tp-hero__shapes-1">
              <img src="assets/assets/img/icons/book-shape.png" alt="">
          </div>
          <div class="tp-hero__shapes-2">
              <img src="assets/assets/img/icons/circle-shape.png" alt="">
          </div>
          <div class="tp-hero__shapes-3">
              <img src="assets/assets/img/icons/dots-shapes.png" alt="">
          </div>
          <div class="tp-hero__shapes-4">
              <img src="assets/assets/img/icons/line-shape.png" alt="">
          </div>
          <div class="tp-hero__shapes-5">
              <img src="assets/assets/img/icons/lines-shape.png" alt="">
          </div>
          <div class="tp-hero__shapes-6">
              <img src="assets/assets/img/icons/role-shape.png" alt="">
          </div>
        </div>
    </div>
    <!-- hero section end  -->


    <!-- brnad section start  -->
    <div class="tp-brand__section">
        <div class="container">
          <div class="row justify-content-center">
              <div class="col-lg-12">
                <div class="tp-brand__box white-bg pt-40 text-primary">
                  <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="tp-counter__item mb-30 has-border">
                          <span><b class="counter"><?= $resultProfilePk['jlh_siswa']; ?></b>Siswa</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="tp-counter__item has-border mb-30">
                            <span><b class="counter"><?= $resultProfilePk['jlh_guru']; ?></b>Guru</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="tp-counter__item  has-border mb-30">
                            <span><b class="counter"><?= $resultProfilePk['jlh_mapel']; ?></b>Mata Pelajaran</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="tp-counter__item mb-30">
                          <span><b class="counter">123</b>Isi Nanti</span>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
    </div>
    <!-- brnad section end  -->

    <!-- event start-->
    <div class="tp-event__section pt-120 pb-90 p-relative">
      <div class="tp-event__shape">
        <div class="event-1">
            <img src="assets/assets/img/icons/event-line-1.png" alt="">
        </div>
        <div class="event-2">
            <img src="assets/assets/img/icons/event-circle.png" alt="">
        </div>
      </div>
      <div class="container">
        <div class="row">
            <div class="col-lg-12">
              <div class="tp-section__title-wrapper mb-40 text-center">
                  <h3 class="tp-section__title mb-15">BERITA TERBARU</h3>
                  <p>Berita kami memberikan informasi terbaru dan faktual</p>
              </div>
            </div>
        </div>
        <div class="tp-event__wrapper">
            <div class="row">
              <?php if (empty($resultBerita)) : ?>
                <div class="col-12">
                  <p class="text-dark text-center">Berita tidak tersedia..</p>
                </div>
              <?php else : ?>
              <?php foreach ($resultBerita as $row) : ?>
              <div class="col-lg-3 col-md-6">
                  <div class="tp-event__item mb-30">
                    <div class="tp-event__thumb w-img fix">
                        <img src="assets/assets/img/berita/<?= $row['foto']; ?>" alt="">
                    </div>
                    <div class="tp-event__content">
                        <div class="tp-event__meta mb-10">
                          <span class="event-date"><i class="fa-solid fa-circle-small"></i> <?= $row['tgl_post']; ?></span>
                        </div>
                        <h3 class="tp-event__title mb-30"><a href="berita-detail?id_berita=<?= $row['id_berita']; ?>"><?= $row['judul']; ?></a></h3>
                        <a href="berita-detail?id_berita=<?= $row['id_berita']; ?>" class="more-btn">Read More <i class="fa-regular fa-arrow-right"></i></a>
                    </div>
                  </div>
              </div>
              <?php endforeach; ?>
              <?php endif; ?>
              <div class="tp-hero__btn-wrappper d-md-flex align-items-center justify-content-center">
                <div class="hero-btn-1 mr-20 p-relative z-index-1">
                    <a href="berita" class="tp-btn br-0">
                      <span>SEE MORE <i class="fa-solid fa-arrow-right"></i></span>
                      <div class="transition"></div>
                    </a>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
      <!-- evant end -->

    <!-- Pengumuman start  -->
    <div class="tp-courses__section grey-bg-2 pt-120 pb-90">
        <div class="container">
          <div class="row align-items-center">
              <div class="col-lg-6">
                <div class="tp-section__title-wrapper mb-40">
                    <h3 class="tp-section__title mb-15">PENGUMUMAN TEBARU</h3>
                    <p>Pengumuman kami bertujuan untuk memberikan informasi penting kepada semua pihak yang terkait.</p>
                </div>
              </div>
          </div>
          <div class="tp-courses__tab-content">
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
                    <div class="row">
                      <?php if (empty($resultPengumuman)) : ?>
                        <div class="col-12">
                          <p class="text-dark text-center">Pengumuman tidak tersedia..</p>
                        </div>
                      <?php else : ?>
                      <?php foreach ($resultPengumuman as $row) : ?>
                        <div class="col-lg-4 col-md-6" style="max-height:600px;">
                            <div class="tp-courses__item mb-30" >
                              <div class="tp-courses__thumb w-img fix p-relative">
                                  <img src="assets/assets/img/pengumuman/<?= $row['foto']?>" alt="">
                                  <span class="tp-courses__cat cat-color-3">
                                    <?php if (strtotime($row['tgl_pengumuman']) < strtotime('today')) : ?>
                                      <a class="text-light bg-danger">Berakhir</a>
                                    <?php elseif (strtotime($row['tgl_pengumuman']) == strtotime('today')) : ?>
                                      <a class="text-light bg-success">Hari Ini</a>
                                    <?php else : ?>
                                      <a class="text-light bg-warning">Segera</a>
                                    <?php endif; ?>
                                  </span>
                              </div>
                              <div class="tp-courses__content pb-20">
                                  <div class="tp-courses__meta">
                                    <span class="tp-ratting"><i class="fa-solid fa-calendar text-primary"></i> <?= $row['tgl_pengumuman']; ?></span>
                                    <span><i class="fa-solid fa-location-dot text-primary"></i><?= substr($row['tempat'], 0, 15) . '...'; ?></span>
                                  </div>
                                  <h3 class="tp-courses__title"><a href="pengumuman-detail?id_pengumuman=<?= $row['id_pengumuman']?>"><?= substr($row['judul'], 0, 50) . '...'; ?></a>
                                  </h3>
                              </div>
                            </div>
                        </div>
                      <?php endforeach; ?>
                      <?php endif; ?>
                      <div class="tp-hero__btn-wrappper d-md-flex align-items-center justify-content-center">
                        <div class="hero-btn-1 mr-20 p-relative z-index-1">
                            <a href="pengumuman" class="tp-btn br-0">
                              <span>SEE MORE <i class="fa-solid fa-arrow-right"></i></span>
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
    <!-- Pengumuman end  -->

    <!-- event start-->
    <div class="tp-event-2__section pt-120 pb-90 p-relative fix z-index-1">
        <div class="container">
          <div class="row align-items-end">
              <div class="col-lg-8">
                <div class="tp-section__title-wrapper mb-40">
                    <h3 class="tp-section__title mb-15">AGENDA</h3>
                    <p>Kami ingin memberi informasi bahwa semua kegiatan yang kami adakan di jurusan ini diadakan dengan tujuan untuk meningkatkan kualitas pendidikan dan pengalaman siswa kami. </p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="tp-cta__btn-wrappper d-flex justify-content-lg-end mb-40 p-relative z-index-1">
                    <a href="agenda" class="tp-border-btn-white">
                      <span>Lihat semua<i class="fa-regular fa-arrow-right"></i></span>
                      <div class="transition"></div>
                    </a>
                </div>
              </div>
          </div>
          <div class="tp-event-2__wrapper">
            <?php if (empty($resultAgenda)) : ?>
              <div class="col-12">
                <p class="text-dark text-center">Agenda tidak tersedia..</p>
              </div>
            <?php else : ?>
            <?php foreach ($resultAgenda as $row) : ?>
              <div class="tp-event-2__item mb-10">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                      <div class="tp-event-2__content d-md-flex align-items-center">
                          <div class="tp-event-2__info">
                            <span><i class="fa-light fa-location-dot"></i> <?= $row['lokasi']; ?></span>
                            <h3 class="tp-event-2__title"><a href="event-details.html"><?= substr($row['nama_kegiatan'], 0, 40) . '...'; ?></a>
                            </h3>
                            <div class="tp-event-2__meta">
                                <span><i class="fa-solid fa-calendar"></i> <?= $row['tgl_kegiatan']; ?></span>
                            </div>
                          </div>
                      </div>
                    </div>
                    <div class="col-lg-5">
                      <div class="tp-event-2__right d-sm-flex align-items-center justify-content-lg-end">
                          <div class="tp-event-2__time color-4 mr-30">
                            <span class="text-primary"><i class="fal fa-clock text-primary"></i> <?= $row['waktu']; ?></span>
                          </div>
                          <div class="tp-evnet-2__btn  p-relative z-index-11">
                            <a href="agenda-detail?id_agenda=<?= $row['id_agenda']?>" class="tp-border-btn" tabindex="-1">
                                <span>Detail</span>
                                <div class="transition"></div>
                            </a>
                          </div>
                      </div>
                    </div>
                </div>
              </div>
            <?php endforeach;endif; ?>
          </div>
        </div>
        <div class="tp-event-2__shapes">
          <div class="tp-event-2__shapes-1">
              <img src="assets/img/icons/book-shape.png" alt="">
          </div>
          <div class="tp-event-2__shapes-2">
              <img src="assets/img/icons/dots-shapes.png" alt="">
          </div>

          <div class="tp-event-2__shapes-3">
              <img src="assets/img/icons/lines-shape.png" alt="">
          </div>
        </div>
    </div>
    <!-- evant end -->

  </main>

  <!-- footer area start -->
  <?php include('inc/footer.php') ?>
  <!-- footer area end -->


  <!-- JS here -->
  <?php include('inc/script.php') ?>
</body>


<!-- Mirrored from data.themeim.com/html/tutorgo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Mar 2023 07:13:10 GMT -->
</html>