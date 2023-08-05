<?php 
session_start();
$titlePage = "About";

require 'functions.php';
$resultProfilePk = query("SELECT * FROM profile_jurusan")[0];

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
                  <h3 class="breadcrumb__title">About Us</h3>
                  <div class="breadcrumb__list">
                     <span><a href="#">Home</a></span>
                     <span class="dvdr"><i class="fa-regular fa-angle-right"></i></span>
                     <span>About-us</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
      <!-- breadcrumb area end -->

         <!-- counter start  -->
      <div class="tp-counter__section pt-40" data-background="assets/assets/img/bg/counter-bg-1.jpg">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-lg-8">
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="tp-section__title-wrapper mb-70 text-center">
                           <h3 class="tp-section__title text-white">Produksi Siaran & Program Televisi</h3>
                        </div>
                     </div>
                  </div>
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
      <!-- counter end  -->
      <div class="tp-about-3__section pt-120 p-relative fix">
         <div class="container">
            <div class="row">
               <div class="col-lg-7">
                  <div class="tp-about-3__img-wrapper p-relative mb-30">
                     <div class="tp-about-3__img w-img mb-30">
                        <img src="assets/assets/img/profile-jurusan/<?= $resultProfilePk['foto']?>" alt="">
                     </div>
                     <div class="tp-about-3__whitebox">
                        <span><i class="fa-regular fa-shield-check"></i></span>
                        <h4>100% Safe & Secured</h4>
                        <p>Build a course, build a brand, <br>
                           build a business.</p>
                     </div>

                     <div class="tp-about-3-shapes">
                        <div class="tp-about-3__shapes-1">
                           <img src="assets/assets/img/icons/reed-dot-shapes.png" alt="">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-5">
                  <div class="tp-about-3__right pt-60 mb-30">
                     <div class="tp-section__title-wrapper">
                        <h3 class="tp-section__title mb-15">Produksi Siaran & Program Televisi</h3>
                        <p class="mb-40">Welcome broadcast</p>
                        <div class="tp-about-3__feature-list">
                           <ul>
                              <li><span><i class="fa-light fa-pen-to-square"></i></span><?= $resultProfilePk['jlh_siswa']?>+ Siswa</li>
                              <li><span><i class="fa-light fa-circle-video"></i></span><?= $resultProfilePk['jlh_guru']?>+ Guru</li>
                              <li><span><i class="fa-light fa-book-copy"></i></span><?= $resultProfilePk['jlh_mapel']?>+ Mapel</li>
                              <li><span><i class="fa-light fa-award"></i></span>Quality teachers</li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>

            </div>

         </div>
         <div class="tp-about-3__shapes d-none">
            <div class="tp-about-3__shapes-3">
               <img src="assets/assets/img/icons/role-shape-2.png" alt="">
            </div>
            <div class="tp-about-3__shapes-4 ">
               <img src="assets/assets/img/icons/book-blue.png" alt="">
            </div>
         </div>
      </div>

      <section class="contact__area pb-100">
         <div class="container">
            <div class="row">
               <div class="col-xxl-7 col-xl-7 col-lg-8">
                  <div class="events__wrapper">
                     <div class="events__thumb mb-35 w-img">
                        <img src="assets/img/event/event-detials.jpg" alt="">
                     </div>
                     <div class="events__details mb-35">
                        <h3>Deskripsi</h3>
                        <p><?= $resultProfilePk['deskripsi']?></p>
                     </div>
                     <div class="events__allow mb-40">
                        <h3>Berikut jenis layanan yang dihasilkan di jurusan kami:</h3>
                        <ul>
                           <li><i class="fal fa-check"></i> Dokumentasi Kegiatan Pernikahan  </li>
                           <li><i class="fal fa-check"></i> Jasa pembuatan company profile </li>
                           <li><i class="fal fa-check"></i> Jasa photography  </li>
                           <li><i class="fal fa-check"></i> Pembuatan video pembelajaran   </li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-xxl-4 offset-xxl-1 col-xl-4 offset-xl-1 col-lg-5 offset-lg-1">
                  <div class="contact__info white-bg p-relative z-index-1">
                     <div class="contact__shape">
                        <img class="contact-shape-1" src="assets/img/contact/contact-shape-1.html" alt="">
                        <img class="contact-shape-2" src="assets/img/contact/contact-shape-2.html" alt="">
                        <img class="contact-shape-3" src="assets/img/contact/contact-shape-3.html" alt="">
                     </div>
                     <div class="contact__info-inner white-bg">
                        <ul>
                           <li>
                              <div class="contact__info-item d-flex align-items-start mb-35">
                                 <div class="contact__info-icon mr-15">
                                    <svg class="map" viewBox="0 0 24 24">
                                       <path class="st0" d="M21,10c0,7-9,13-9,13s-9-6-9-13c0-5,4-9,9-9S21,5,21,10z"/>
                                       <circle class="st0" cx="12" cy="10" r="3"/>
                                    </svg>
                                 </div>
                                 <div class="contact__info-text">
                                    <h4>Program Keahlian</h4>
                                    <p><?= $resultProfilePk['nama_pk']?></p>
                                 </div>
                              </div>
                           </li>
                           <li>
                              <div class="contact__info-item d-flex align-items-start mb-35">
                                 <div class="contact__info-icon mr-15">
                                    <svg class="mail" viewBox="0 0 24 24">
                                       <path class="st0" d="M4,4h16c1.1,0,2,0.9,2,2v12c0,1.1-0.9,2-2,2H4c-1.1,0-2-0.9-2-2V6C2,4.9,2.9,4,4,4z"/>
                                       <polyline class="st0" points="22,6 12,13 2,6 "/>
                                    </svg>
                                 </div>
                                 <div class="contact__info-text">
                                    <h4>Kepala Jurusan</h4>
                                    <p><?= $resultProfilePk['kepala_pk']?></p>
                                 </div>
                              </div>
                           </li>
                           <li>
                              <div class="contact__info-item d-flex align-items-start mb-35">
                                 <div class="contact__info-icon mr-15">
                                    <svg class="call" viewBox="0 0 24 24">
                                       <path class="st0" d="M22,16.9v3c0,1.1-0.9,2-2,2c-0.1,0-0.1,0-0.2,0c-3.1-0.3-6-1.4-8.6-3.1c-2.4-1.5-4.5-3.6-6-6  c-1.7-2.6-2.7-5.6-3.1-8.7C2,3.1,2.8,2.1,3.9,2C4,2,4.1,2,4.1,2h3c1,0,1.9,0.7,2,1.7c0.1,1,0.4,1.9,0.7,2.8c0.3,0.7,0.1,1.6-0.4,2.1  L8.1,9.9c1.4,2.5,3.5,4.6,6,6l1.3-1.3c0.6-0.5,1.4-0.7,2.1-0.4c0.9,0.3,1.8,0.6,2.8,0.7C21.3,15,22,15.9,22,16.9z"/>
                                       </svg>
                                 </div>
                                 <div class="contact__info-text">
                                    <h4>Email</h4>
                                    <p><?= $resultProfilePk['email_pk']?></p>
                                 </div>
                              </div>
                           </li>
                           <li>
                              <div class="contact__info-item d-flex align-items-start mb-35">
                                 <div class="contact__info-icon mr-15">
                                    <svg class="call" viewBox="0 0 24 24">
                                       <path class="st0" d="M22,16.9v3c0,1.1-0.9,2-2,2c-0.1,0-0.1,0-0.2,0c-3.1-0.3-6-1.4-8.6-3.1c-2.4-1.5-4.5-3.6-6-6  c-1.7-2.6-2.7-5.6-3.1-8.7C2,3.1,2.8,2.1,3.9,2C4,2,4.1,2,4.1,2h3c1,0,1.9,0.7,2,1.7c0.1,1,0.4,1.9,0.7,2.8c0.3,0.7,0.1,1.6-0.4,2.1  L8.1,9.9c1.4,2.5,3.5,4.6,6,6l1.3-1.3c0.6-0.5,1.4-0.7,2.1-0.4c0.9,0.3,1.8,0.6,2.8,0.7C21.3,15,22,15.9,22,16.9z"/>
                                       </svg>
                                 </div>
                                 <div class="contact__info-text">
                                    <h4>Phone</h4>
                                    <p><?= $resultProfilePk['telp_pk']?></p>
                                 </div>
                              </div>
                           </li>
                        </ul>
                        <div class="contact__social pl-30">
                           <h4>Follow Us</h4>
                           <ul>
                              <li><a href="<?= $resultProfilePk['fb_pk']?>" class="fb" ><i class="social_facebook"></i></a></li>
                              <li><a href="<?= $resultProfilePk['yt_pk']?>" class="pin" ><i class="social_youtube"></i></a></li>
                              <li><a href="<?= $resultProfilePk['ig_pk']?>" class="tw" ><i class="social_instagram"></i></a></li>
                           </ul>
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