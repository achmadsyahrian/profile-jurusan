
<div class="offcanvas__area" >
    <div class="offcanvas__wrapper">
        <div class="offcanvas__content">
          <div class="offcanvas__close text-end">
              <button class="offcanvas__close-btn offcanvas-close-btn">
                <i class="fal fa-times"></i>
              </button>
          </div>
          <div class="offcanvas__top mb-40">
              <div class="offcanvas__subtitle">
                <span class="text-white d-inline-block mb-25 d-none d-lg-block">ELEVATE YOUR BUSINESS WITH</span>
              </div>
              <div class="offcanvas__logo mb-40">
                <div class="d-flex align-items-center logo has-border">
                    <div class="me-2">
                        <a href="index">
                            <img src="assets/assets/img/profile-jurusan/<?= $resultProfilePk['foto']?>" alt="logo" style="width:50px;">
                        </a>
                    </div>
                    <h3 class="mb-0">PSPTV</h3>
                </div>
              </div>
              <div class="offcanvas-info d-none d-lg-block">
                <p>Limitless customization options & Elementor compatibility let anyone create a beautiful website
                    with Valiance. </p>
              </div>
              <?php if (isset($_SESSION['data'])) :?>
                <a href="logout" class="tp-btn br-0" style="line-height:50%;">
                    <span>Logout<i class="fa-solid fa-user"></i></span>
                    <div class="transition"></div>
                </a>
              <?php else : ?>
                <a href="login" class="tp-btn br-0" style="line-height:50%;">
                    <span>Login<i class="fa-solid fa-user"></i></span>
                    <div class="transition"></div>
                </a>
              <?php endif; ?>
              <div class="offcanvas__btn d-none d-lg-block">
                <a href="contact.html" class="tp-btn">Contact us <span></span></a>
              </div>
          </div>
          <div class="mobile-menu fix mb-40"></div>
          <div class="offcamvas__bottom">
              <div class="offcanvas__cta mt-30 mb-20">
                <h3 class="offcanvas__cta-title">Contact info</h3>
                <span>Percut Sei Tuan, Medan</span>
                <span>0895423336075</span>
                <span>psptv@gmail.com</span>
              </div>
          </div>
        </div>
    </div>
  </div>

  <div class="body-overlay"></div>