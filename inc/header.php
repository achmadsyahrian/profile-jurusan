<?php 

$resultProfilePk = query("SELECT * FROM profile_jurusan")[0];

?>

<header>
<div class="tp-header__area tp-header__transparent">
    <div class="tp-header__main" id="header-sticky">
        <div class="container">
            <div class="row align-items-center">
            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-6 col-6">
                <div class="d-flex align-items-center logo has-border">
                    <div class="me-2">
                        <a href="index-2.html">
                            <img src="assets/assets/img/profile-jurusan/<?= $resultProfilePk['foto']?>" alt="logo" style="width:50px;">
                        </a>
                    </div>
                    <h3 class="mb-0 text-light">PSPTV</h3>
                </div>
            </div>

            <div class="col-xxl-6 col-xl-6 col-lg-7 d-none d-lg-block">
                <div class="main-menu">
                    <nav id="mobile-menu">
                        <ul>
                        <li>
                            <a href="index">Home</a>
                        </li>
                        <li>
                            <a href="about">About</a>
                        </li>
                        <li class="has-dropdown">
                            <a>Media Informasi</a>
                            <ul class="submenu">
                                <li><a href="berita">Berita</a></li>
                                <li><a href="pengumuman">Pengumuman</a></li>
                                <li><a href="agenda">Agenda</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="gallery">Galery</a>
                        </li>
                        <?php if (isset($_SESSION['data'])) : ?>                            
                            <li>
                                <a href="profile">My Profile</a>
                            </li>
                        <?php endif; ?>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-xxl-4 col-xl-4 col-lg-3 col-md-6 col-6">
                <div class="tp-header__main-right d-flex justify-content-end align-items-center pl-30">
                    <div class="header-acttion-btns d-flex align-items-center d-none d-md-flex">
                        <a href="tel:+(443)003030266" class="tp-phone-btn d-none d-xl-block"><i class="fa-thin fa-phone"></i>0895423336075<span></span></a>
                        <?php if (isset($_SESSION['data'])) :?>
                            <a href="logout" class="tp-btn br-0">
                                <span>Logout<i class="fa-solid fa-user"></i></span>
                                <div class="transition"></div>
                            </a>
                        <?php else : ?>
                            <a href="login" class="tp-btn br-0">
                                <span>Login<i class="fa-solid fa-user"></i></span>
                                <div class="transition"></div>
                            </a>
                        <?php endif; ?>
                        
                    </div>
                    <div class="tp-header__hamburger ml-50 d-lg-none">
                        <button class="hamburger-btn offcanvas-open-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                        </button>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
</header>