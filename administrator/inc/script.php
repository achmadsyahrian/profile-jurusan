    <!-- build:js assets/assets/vendor/js/core.js -->
    <script src="assets/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/assets/vendor/js/bootstrap.js"></script>
    <script src="assets/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="assets/assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="assets/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="assets/assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src=".assets/plugins/sweetalert2/dist/sweetalert2.all.min.js"></script>

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
        <?php if (isset($_GET['logout'])) : ?>
            Swal.fire({
            title: 'Anda Berhasil Logout!',
            text: '',
            icon: 'success'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'login';
                }
            });
        <?php unset($_GET['logout']);endif; ?>

        // Hapus Pengumuman
        <?php if (isset($_SESSION['hapusPengumuman'])) : ?>
            Swal.fire({
            title: 'Data berhasil dihapus!',
            text: '',
            icon: 'success'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'pengumuman';
                }
            });
        <?php unset($_SESSION['hapusPengumuman']);endif; ?>

        // Over Size
        <?php if (isset($_SESSION['overSize'])) : ?>
            Swal.fire({
            title: 'Gagal!',
            text: 'Ukuran foto terlalu besar!',
            icon: 'error'
            });
        <?php unset($_SESSION['overSize']);endif; ?>
        
        // TAMBAH PM
        <?php if (isset($_SESSION['tambahPengumuman'])) : ?>
            Swal.fire({
            title: 'Data berhasil ditambah!',
            text: '',
            icon: 'success'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'pengumuman';
            }
            });
        <?php unset($_SESSION['tambahPengumuman']);endif; ?>
        
        // Hapus Ag
        <?php if (isset($_SESSION['hapusAgenda'])) : ?>
            Swal.fire({
            title: 'Data berhasil dihapus!',
            text: '',
            icon: 'success'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'agenda';
                }
            });
        <?php unset($_SESSION['hapusAgenda']);endif; ?>
        
        
        // Ubah Pengumuman
        <?php if (isset($_SESSION['ubahBerhasil'])) : ?>
            Swal.fire({
            title: 'Data berhasil diubah!',
            text: '',
            icon: 'success'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'pengumuman';
            }
            });
        <?php unset($_SESSION['ubahBerhasil']);endif; ?>

        // Ubah Pengumuman
        <?php if (isset($_SESSION['ubahGallery'])) : ?>
            Swal.fire({
            title: 'Data berhasil diubah!',
            text: '',
            icon: 'success'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'gallery';
            }
            });
        <?php unset($_SESSION['ubahGallery']);endif; ?>
        
        // Hapus Berita
        <?php if (isset($_SESSION['hapusBerita'])) : ?>
            Swal.fire({
            title: 'Data berhasil dihapus!',
            text: '',
            icon: 'success'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'berita';
                }
            });
        <?php unset($_SESSION['hapusBerita']);endif; ?>

         // TAMBAH PM
        <?php if (isset($_SESSION['tambahBerita'])) : ?>
            Swal.fire({
            title: 'Data berhasil ditambah!',
            text: '',
            icon: 'success'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'berita';
            }
            });
        <?php unset($_SESSION['tambahBerita']);endif; ?>


        // Ubah Berita
        <?php if (isset($_SESSION['ubahBerita'])) : ?>
            Swal.fire({
            title: 'Data berhasil diubah!',
            text: '',
            icon: 'success'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'berita';
            }
            });
        <?php unset($_SESSION['ubahBerita']);endif; ?>
        
        // TAMBAH PM
        <?php if (isset($_SESSION['tambahGallery'])) : ?>
            Swal.fire({
            title: 'Data berhasil ditambah!',
            text: '',
            icon: 'success'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'gallery';
            }
            });
        <?php unset($_SESSION['tambahGallery']);endif; ?>
        

        // Hapus Berita
        <?php if (isset($_SESSION['hapusGallery'])) : ?>
            Swal.fire({
            title: 'Data berhasil dihapus!',
            text: '',
            icon: 'success'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'gallery';
                }
            });
        <?php unset($_SESSION['hapusGallery']);endif; ?>
        


        // TAMBAH AG
        <?php if (isset($_SESSION['tambahAgenda'])) : ?>
            Swal.fire({
            title: 'Data berhasil ditambah!',
            text: '',
            icon: 'success'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'agenda';
            }
            });
        <?php unset($_SESSION['tambahAgenda']);endif; ?>
        
        // Ubah Pengumuman
        <?php if (isset($_SESSION['ubahAgenda'])) : ?>
            Swal.fire({
            title: 'Data berhasil diubah!',
            text: '',
            icon: 'success'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'agenda';
            }
            });
        <?php unset($_SESSION['ubahAgenda']);endif; ?>

        // Ubah Pengumuman
        <?php if (isset($_SESSION['verifMember'])) : ?>
            Swal.fire({
            title: 'Member berhasil diverifikasi!',
            text: '',
            icon: 'success'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'member';
            }
            });
        <?php unset($_SESSION['verifMember']);endif; ?>
        
    </script>