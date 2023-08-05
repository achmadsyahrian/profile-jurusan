<?php 
session_start();

if (isset($_SESSION['data'])) {
  header('Location:index');
}

if (isset($_GET['logout']) && $_GET['logout'] == 1) {
  $_SESSION['logout'] = true;
}

$titlePage = "Login";
require 'functions.php';

if (isset($_POST['login'])) {
  login($_POST);
}
?>

<!doctype html>
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
      <div class="breadcrumb__area include-bg pt-200 pb-150 breadcrumb__overlay"
          data-background="assets/assets/img/breadcrumb/breadcrumb-bg.jpg">
          <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                  <div class="breadcrumb__content p-relative z-index-1">
                      <h3 class="breadcrumb__title">Log In</h3>
                      <div class="breadcrumb__list">
                        <span><a href="#">Home</a></span>
                        <span class="dvdr"><i class="fa-regular fa-angle-right"></i></span>
                        <span>Log In</span>
                      </div>
                  </div>
                </div>
            </div>
          </div>
      </div>
      <!-- breadcrumb area end -->

      <!-- sign up area start -->
      <div class="signup__area po-rel-z1 pt-100 pb-145 p-relative">
          <div class="sign__shape">
            <img class="man-1" src="assets/assets/img/icons/about-shapes.png" style="width: 100%;height: 100%;object-fit: cover;" alt="">
            <img class="man-2" src="assets/assets/img/icons/book-shape.png" alt="">
            <img class="circle" src="assets/assets/img/icons/role-shape.png" alt="">
            <img class="zigzag" src="assets/assets/img/icons/lines-shape.png" alt="">
          </div>
          <div class="container">
            <div class="row">
                <div class="col-xxl-8 offset-xxl-2 col-xl-8 offset-xl-2">
                  <div class="tp-section__title-wrapper text-center mb-55">
                      <h2 class="tp-section__title">Please log in to  <br> your account</h2>
                      <p>it you don't have an account you can <a href="register">Register here!</a></p>
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-6 offset-xxl-3 col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                  <div class="sign__wrapper white-bg">
                      <div class="sign__header mb-35">
                        <div class="sign__in text-center">
                            <p> <span>........</span><a href="login">sign in</a> with your account<span>
                                  ........</span> </p>
                        </div>
                      </div>
                      <div class="sign__form">
                        <form method="POST">
                            <div class="sign__input-wrapper mb-25">
                              <h5>Username</h5>
                              <div class="sign__input">
                                  <input type="text" placeholder="username" pattern="[^\x22\x27]*" required name="username">
                                  <i class="fal fa-envelope"></i>
                              </div>
                            </div>
                            <div class="sign__input-wrapper mb-20">
                              <h5>Password</h5>
                              <div class="sign__input">
                                  <input type="password" placeholder="Password" pattern="[^\x22\x27]*" required name="password">
                                  <i class="fal fa-lock"></i>
                              </div>
                            </div>
                            <button type="submit" name="login" class="e-btn  w-100"> <span></span> Sign In</button>
                            <div class="sign__new text-center mt-20">
                              <p>Belum memiliki akun? <a href="register">Register</a></p>
                            </div>
                        </form>
                      </div>
                  </div>
                </div>
            </div>
          </div>
      </div>
      <!-- sign up area end -->
    </main>

    <!-- footer area start -->
    <?php include('inc/footer.php') ?>
    <!-- footer area end -->


    <!-- JS here -->
    <?php include('inc/script.php') ?>
  </body>


<!-- Mirrored from data.themeim.com/html/tutorgo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Mar 2023 07:13:10 GMT -->
</html>