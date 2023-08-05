<?php 
session_start();
$titlePage = "Gallery";

require 'functions.php';
$resultProfilePk = query("SELECT * FROM profile_jurusan")[0];
$idGallery = $_GET['id_gallery'];
$resultGallery = query("SELECT * FROM gallery WHERE id_gallery = $idGallery")[0];

if (isset($_POST['kirim_komentar'])) {
  kirimKomentar($_POST, $titlePage);
}

?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">

<?php include('inc/head.php') ?>

<body>

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

    <!-- postbox area start -->
      <div class="postbox__area pt-120 pb-120">
        <div class="container">
          <div class="row">
              <div class="col-md-8">
                <div class="postbox__wrapper pr-30">
                    <article class="postbox__item format-image mb-50 transition-3">
                      <h3 class="postbox__title"><?= $resultGallery['judul']; ?></h3>
                      <div class="postbox__thumb m-img">
                            <img src="assets/assets/img/gallery/<?= $resultGallery['foto']?>" style="width:700px; height:400px; object-fit:cover;" alt="">
                      </div>
                      <div class="postbox__content">
                          <div class="postbox__meta">
                            <span><i class="far fa-calendar-check"></i> <?= $resultGallery['tgl']; ?> </span>
                            <?php 
                          // HITUNG JUMLAH KOMENTAR
                            $query = mysqli_query($connect, "SELECT COUNT(*) AS jumlah_komentar FROM komentar_gallery WHERE id_gallery = $idGallery");
                            $result = mysqli_fetch_assoc($query);
                            $jlh_komentar = $result['jumlah_komentar'];
                          ?>
                            <span><a href="#"><i class="far fa-comments"></i> <?= $jlh_komentar; ?> Comments</a></span>
                          </div>
                          
                      </div>
                    </article>
                    <div class="postbox__comment mb-65">
                      <h3 class="postbox__comment-title"><?= $jlh_komentar; ?> Comments</h3>
                      <ul>
                        <?php if ($jlh_komentar == 0 ) : ?>
                          <p>Tidak Ada Komentar</p>
                        <?php else : 
                          $resultKomentar = query("SELECT * FROM komentar_gallery WHERE id_gallery = $idGallery");
                          foreach ($resultKomentar as $rowKomentar) :
                        ?>
                          <li>
                            <div class="postbox__comment-box grey-bg-2 d-flex flex-row">
                              <div class="postbox__comment-avater mr-20">
                                <img src="assets/assets/img/profile-user/<?= $rowKomentar['foto']?>" alt="">
                              </div>
                              <div class="postbox__comment-info d-flex flex-column justify-content-between">
                                <div class="postbox__comment-name text-right">
                                  <h5><?= $rowKomentar['nama']; ?></h5>
                                  <span class="post-meta"><?= $rowKomentar['tgl_komentar']; ?></span>
                                </div>
                                <div class="postbox__comment-text">
                                  <p><?= $rowKomentar['isi_komentar']; ?></p>
                                </div>
                              </div>
                            </div>
                          </li>
                        <?php endforeach; endif; ?>
                      </ul>
                    </div>
                    <?php if(isset($_SESSION['data'])) :?>
                      <div class="postbox__comment-form">
                        <h3 class="postbox__comment-form-title">Beri Komentar</h3>
                        <form method="POST">
                            <div class="row">
                              <div class="col-xxl-12">
                                  <div class="postbox__comment-input">
                                    <textarea placeholder="Enter your comment ..." required pattern="[^\x22\x27]*" name="isi_komentar"></textarea>
                                    <input type="hidden" name="id_user" value="<?= $_SESSION['data']['id_user']?>">
                                    <input type="hidden" name="nama" value="<?= $_SESSION['data']['nama']?>">
                                    <input type="hidden" name="foto" value="<?= $_SESSION['data']['foto']?>">
                                    <input type="hidden" name="id_gallery" value="<?= $idGallery?>">
                                  </div>
                              </div>
                              <div class="col-xxl-12">
                                  <div class="postbox__comment-btn p-relative z-index-1">
                                    <button type="submit" name="kirim_komentar" class="tp-btn"><span>Kirim</span></button>
                                  </div>
                              </div>
                            </div>
                        </form>
                      </div>
                    <?php endif; ?>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="sidebar__wrapper pl-20">
                    <div class="sidebar__widget mb-40">
                      <h3 class="sidebar__widget-title">Berita Terbaru</h3>
                      <div class="sidebar__widget-content">
                          <div class="sidebar__post rc__post">
                            <?php 
                            $resultBeritaAll = query("SELECT * FROM berita ORDER BY tgl_post DESC LIMIT 4");
                            foreach ($resultBeritaAll as $rowBerita) :
                            ?>
                            <div class="rc__post mb-20 d-flex align-items-center">
                                <div class="rc__post-thumb mr-20">
                                  <a href="berita?id_berita=<?= $rowBerita['id_berita']?>"><img src="assets/assets/img/berita/<?= $rowBerita['foto']?>" alt=""></a>
                                </div>
                                <div class="rc__post-content">
                                  <div class="rc__meta">
                                      <span><?= $rowBerita['tgl_post']?></span>
                                  </div>
                                  <h3 class="rc__post-title">
                                      <a href="berita-detail?id_berita=<?= $rowBerita['id_berita']?>"><?= $rowBerita['judul']?></a>
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
      <!-- postbox area end -->
  </main>

  <!-- footer area start -->
  <?php include('inc/footer.php') ?>
  <!-- footer area end -->


  <!-- JS here -->
  <?php include('inc/script.php') ?>
</body>


<!-- Mirrored from data.themeim.com/html/tutorgo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Mar 2023 07:13:10 GMT -->
</html>