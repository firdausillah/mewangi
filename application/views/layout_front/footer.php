  <footer id="footer" class="footer light-background">

      <div class="footer-top">
          <div class="container">
              <div class="row gy-4 d-flex justify-content-between">
                  <div class="col-lg-5 col-md-12 footer-about">
                      <a href="<?= base_url() ?>" class="logo d-flex align-items-center">
                          <span class="sitename"><?= $profile ? $profile->nama_sekolah : 'Aruna Project' ?></span>
                      </a>
                      <?= substr($profile->sambutan_kepala_sekolah, 0, 150) . '...' ?>
                      <div class="social-links d-flex mt-4">
                          <?= $profile->twitter ? "<a href='" . $profile->twitter . "'><i class='bi bi-twitter-x'></i></a>" : "" ?>
                          <?= $profile->facebook ? "<a href='" . $profile->facebook . "'><i class='bi bi-facebook'></i></a>" : "" ?>
                          <?= $profile->instagram ? "<a href='" . $profile->instagram . "'><i class='bi bi-instagram'></i></a>" : "" ?>
                          <?= $profile->tiktok ? "<a href='" . $profile->tiktok . "'><i class='bi bi-tiktok'></i></a>" : "" ?>
                          <?= $profile->youtube ? "<a href='" . $profile->youtube . "'><i class='bi bi-youtube'></i></a>" : "" ?>
                      </div>
                  </div>

                  <div class="col-lg-2 col-6 footer-links">
                      <h4>Useful Links</h4>
                      <ul>
                          <li><a href="<?= base_url('login') ?>">Login</a></li>
                          <li><a href="#">Home</a></li>
                          <li><a href="#">About us</a></li>
                          <li><a href="#">Services</a></li>
                          <li><a href="#">Terms of service</a></li>
                          <li><a href="#">Privacy policy</a></li>
                      </ul>
                  </div>

                  <!-- <div class="col-lg-2 col-6 footer-links">
                      <h4>Our Services</h4>
                      <ul>
                          <li><a href="#">Web Design</a></li>
                          <li><a href="#">Web Development</a></li>
                          <li><a href="#">Product Management</a></li>
                          <li><a href="#">Marketing</a></li>
                          <li><a href="#">Graphic Design</a></li>
                      </ul>
                  </div> -->

                  <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                      <h4>Contact Us</h4>
                      <p><?= $profile->alamat ?></p>
                      <?= $profile->cp_1 ? "<p class='mt-4'><strong>Contact Person 1:</strong> <span>" . $profile->cp_1 . "</span></p>" : "" ?>
                      <?= $profile->cp_2 ? "<p class=''><strong>Contact Person 2:</strong> <span>" . $profile->cp_2 . "</span></p>" : "" ?>
                      <?= $profile->email ? "<p class=''><strong>Email:</strong> <span>" . $profile->email . "</span></p>" : "" ?>
                  </div>

              </div>
          </div>
      </div>

      <div class="container copyright text-center">
          <p>© <span>Copyright</span> <strong class="px-1 sitename"><?= $profile ? $profile->nama_sekolah : 'Aruna Project' ?></strong> <span>All Rights Reserved</span></p>
          <!-- <div class="credits">
              Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div> -->
      </div>

  </footer>