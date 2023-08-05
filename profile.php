<?php 
session_start();
if (!isset($_SESSION['data'])) {
  header('Location:login');
}

$titlePage = "Gallery";

require 'functions.php';
$resultProfilePk = query("SELECT * FROM profile_jurusan")[0];
$resultGallery = query("SELECT * FROM gallery");
$idUser = $_SESSION['data']['id_user'];
$resultUser = query("SELECT * FROM users WHERE id_user = $idUser")[0];

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

if (isset($_POST['ubahProfile'])) {
  editProfile($_POST);
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
                <h3 class="breadcrumb__title">My Profile</h3>
                <div class="breadcrumb__list">
                    <span><a href="#">Home</a></span>
                    <span class="dvdr"><i class="fa-regular fa-angle-right"></i></span>
                    <span>My Profile</span>
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
        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
          <div class="teacher__details-thumb p-relative w-img pr-30">
              <img src="assets/assets/img/profile-user/<?= $resultUser['foto']?>" style="width:350px; height:400px; object-fit:cover;" alt="">
          </div>
        </div>
        <div class="col-xxl-8 col-xl-8 col-lg-8">
          
          <div class="teacher__wrapper">
            <div class="teacher__top d-md-flex align-items-end justify-content-between">
              <div class="teacher__info">
                  <h4><?= $resultUser['nama'] ?></h4>
                  <span>User</span>
              </div>
            </div>
            <div class="profile__heading mt-40">
              <h3>Ubah Profil</h3>
              <p>Formulir ini digunakan untuk merubah data profil</p>
            </div>
            <div class="contact__form mb-30">
              <form method="POST" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-xxl-6 col-xl-6 col-md-6">
                        <div class="contact__form-input">
                          <input type="text" value="<?= $resultUser['nama']?>" placeholder="Your Name" name="nama">
                          <input type="hidden" value="<?= $resultUser['id_user']?>"name="id_user">
                          <input type="hidden" value="<?= $resultUser['password']?>"name="passwordLama">
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-md-6">
                        <div class="contact__form-input">
                          <input type="username" value="<?= $resultUser['username']?>" placeholder="username" name="username">
                        </div>
                    </div>
                    <div class="col-xxl-12">
                        <div class="contact__form-input">
                          <input type="password" placeholder="kosongkan jika tidak ingin merubahnya" name="password">
                        </div>
                    </div>
                    <div class="col-xxl-12">
                      <div class="contact__form-input">
                        <label for="foto"><i>Pilih File (kosongkan jika tidak ingin merubah data)</i></label>
                        <input type="file" name="foto" id="foto">
                      </div>
                    </div>
                    <div class="col-xxl-12">
                        <div class="contact__btn">
                          <button type="submit" name="ubahProfile" class="tp-btn"><span>Ubah Profile</span> </button>
                        </div>
                    </div>
                  </div>
              </form>
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