<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/assets/js/vendor/jquery.js"></script>
  <script src="assets/assets/js/vendor/waypoints.js"></script>
  <script src="assets/assets/js/bootstrap-bundle.js"></script>
  <script src="assets/assets/js/meanmenu.js"></script>
  <script src="assets/assets/js/slick.js"></script>
  <script src="assets/assets/js/magnific-popup.js"></script>
  <script src="assets/assets/js/parallax.js"></script>
  <script src="assets/assets/js/nice-select.js"></script>
  <script src="assets/assets/js/counterup.js"></script>
  <script src="assets/assets/js/wow.js"></script>
  <script src="assets/assets/js/isotope-pkgd.js"></script>
  <script src="assets/assets/js/imagesloaded-pkgd.js"></script>
  <script src="assets/assets/js/ajax-form.js"></script> <script src="assets/assets/js/countdown.js"></script>
  <script src="assets/assets/js/main.js"></script>

  <!-- SweetAlert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="dist/sweetalert2.all.min.js"></script>

<script>
  // Username Sudah Terdaftar 
  <?php if (isset($_SESSION['userReady'])) : ?>
    Swal.fire({
    icon: 'error',
    title: 'Gagal',
    text: 'Username telah terdaftar!'
  })
  <?php unset($_SESSION['userReady']);endif;?>

  // Password Konfir Tidak Sesuai 
  <?php if (isset($_SESSION['passSame'])) : ?>
    Swal.fire({
    icon: 'error',
    title: 'Gagal',
    text: 'Konfirmasi password tidak sesuai!'
  })
  <?php unset($_SESSION['passSame']);endif;?>

  // Register Berhasil
  <?php if (isset($_SESSION['registerSucccess'])) : ?>
  Swal.fire({
    icon: 'success',
    title: 'Berhasil',
    text: 'Akun anda berhasil ditambah!'
  }).then(function() {
    window.location.href = 'login'; // ubah login.php dengan halaman login yang sesuai
  });
  <?php unset($_SESSION['registerSucccess']);endif;?>

  // Login Success
  <?php if (isset($_SESSION['login'])) : ?>
    Swal.fire({
      title: 'Anda Berhasil Login!',
      text: '',
      icon: 'success'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = 'index';
      }
    });
  <?php unset($_SESSION['login']);endif; ?>
  
  // Login gagal
  <?php if (isset($_SESSION['gagalLogin'])) : ?>
    Swal.fire({
      title: 'Gagal!',
      text: 'Username atau Password Salah',
      icon: 'error'
    });
  <?php unset($_SESSION['gagalLogin']);endif; ?>

  // LOGOUT
  <?php if (isset($_SESSION['logout'])) : ?>
    Swal.fire({
      title: 'Anda Berhasil Logout!',
      text: '',
      icon: 'success'
    }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = 'login';
    }
  });
  <?php unset($_SESSION['logout']);endif; ?>

  // Tambah Komentar
  <?php if (isset($_SESSION['tambahKomentar'])) : ?>
    Swal.fire({
      title: 'Berhasil!',
      text: 'Komentar berhasil dikirim',
      icon: 'success'
    });
  <?php unset($_SESSION['tambahKomentar']);endif; ?>
  
  // Edit Profile
  <?php if (isset($_SESSION['editProfile'])) : ?>
    Swal.fire({
      title: 'Berhasil!',
      text: 'Profile berhasil diubah',
      icon: 'success'
    }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = 'profile';
    }
  });
  <?php unset($_SESSION['editProfile']);endif; ?>
  
</script>