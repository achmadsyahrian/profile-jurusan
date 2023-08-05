<?php 

$resultProfilePk = query("SELECT * FROM profile_jurusan")[0];

?>

<footer>
    <div class="footer__area grey-bg">
        <div class="container">
          <div class="footer__top ">
              <div class="row">
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6">
                    <div class="footer__widget mb-50 footer-col-1">
                      <div class="footer__widget-logo mb-30">
                        <div class="d-flex align-items-center logo has-border">
                          <div class="me-2">
                              <a href="index-2.html">
                                  <img src="assets/assets/img/profile-jurusan/<?= $resultProfilePk['foto']?>" alt="logo" style="width:50px;">
                              </a>
                          </div>
                          <h3 class="mb-0">PSPTV</h3>
                      </div>
                      </div>
                      <div class="footer__widget-content">
                          <ul>
                            <li><i class="fa-solid fa-location-dot"></i> Percut Sei Tuan, Medan</li>
                            <li><i class="fa-solid fa-phone"></i> <?= $resultProfilePk['telp_pk']; ?></li>
                            <li><i class="fa-solid fa-envelope"></i> <?= $resultProfilePk['email_pk']; ?></li>
                          </ul>
                          <div class="footer__social mt-4">
                            <span><a href="<?= $resultProfilePk['fb_pk']; ?>"><i class="fab fa-facebook-f"></i></a></span>
                            <span><a href="<?= $resultProfilePk['yt_pk']; ?>" class="yt"><i class="fab fa-youtube"></i></a></span>
                            <span><a href="<?= $resultProfilePk['ig_pk']; ?>" class="tw"><i class="fab fa-instagram"></i></a></span>
                          </div>
                      </div>
                    </div>
                </div>
                <div class="col-xxl-2 col-xl-2 col-lg-3 col-6">
                    <div class="footer__widget mb-50 footer-col-2">
                      <h3 class="footer__widget-title">Information</h3>
                      <div class="footer__widget-content">
                          <ul>
                            <li><a href="about">About Us</a></li>
                            <li><a href="berita">Berita</a></li>
                            <li><a href="pengumuman">Pengumuman</a></li>
                            <li><a href="agenda">Agenda</a></li>
                          </ul>
                      </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-6">
                    <div class="footer__widget mb-50 footer-col-3">
                      <h3 class="footer__widget-title">Authentication</h3>
                      <div class="footer__widget-content">
                          <ul>
                            <li><a href="login">Login</a></li>
                            <li><a href="register">Register</a></li>
                          </ul>
                      </div>
                    </div>
                </div>

                <div class="col-xxl-4 col-xl-4 col-lg-3 col-md-6">
                    <div class="footer__widget mb-50 footer-col-4">
                      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.941289640617!2d98.71852711408941!3d3.6009228512150164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303130f87eda05ef%3A0x36c82e54c5abdd9b!2sSMK%20Negeri%201%20Percut%20Sei%20Tuan!5e0!3m2!1sid!2sid!4v1678700666511!5m2!1sid!2sid" width="400" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
              </div>
          </div>
          <div class="footer__bottom">
              <div class="row">
                <div class="col-12">
                    <div class="footer__copyright text-center"> 
                      <p> © 2023 PSPTV, All Rights Reserved. Created By <a href="http://instagram.com/_achsyh_" target="_blank">Achmad Syahrian</a> <i class="fa-solid fa-heart"></i> XII RPL 1</p>
                    </div>
                </div>
              </div>
          </div>
        </div>
    </div>
  </footer>