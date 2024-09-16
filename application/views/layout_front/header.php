  <header id="header" class="header d-flex align-items-center fixed-top">
      <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

          <a href="<?= base_url() ?>" class="logo d-flex align-items-center">
              <!-- Uncomment the line below if you also wish to use an image logo -->
              <img src="<?= base_url('assets/front/img/logo-kemenag-sm.png'); ?>" alt="">
              <img src="<?= base_url('uploads/img/profile/' . $profile->foto); ?>" alt="">
              <span class="line"></span>
              <h1 class="web-title p-2"><?= $profile->nama_sekolah ?></h1>
          </a>

          <nav id="navmenu" class="navmenu">
              <ul>
                  <li><a href="<?= base_url() ?>">Beranda<br></a></li>
                  <li><a href="<?= base_url('post') ?>">Post</a></li>
                  <li><a href="<?= base_url('galeri') ?>">Galeri</a></li>
                  <li><a href="<?= base_url('download') ?>">Download</a></li>
                  <li class="dropdown"><a href="#"><span>Akademik</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                      <ul>
                          <li><a href="https://simpletech.id/presensi_mobile/index.php?r=site/login">Absensi Digital</a></li>
                          <li><a href="#">Perpustakaan Digital</a></li>
                          <li><a href="#">E Learning</a></li>
                          <li><a href="#">CBT</a></li>
                      </ul>
                  </li>
                  <li class="dropdown"><a href="#"><span>Guru</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                      <ul>
                          <li><a href="https://pusaka.kemenag.go.id/public/login">Pusaka</a></li>
                          <li><a href="https://www.kemenagbanyuwangi.web.id/e-kinerja/">E Kinerja</a></li>
                          <li><a href="https://sso.kemenag.go.id/auth/signin?appid=42095eeec431ac23eb12d2b772c94be0">SSO</a></li>
                          <li><a href="https://kinerja.bkn.go.id/login">SKP</a></li>
                      </ul>
                  </li>
                  <li class="dropdown"><a href="#"><span>Kesiswaan</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                      <ul>
                          <li><a href="<?= base_url('siswa') ?>">Data Siswa</a></li>
                          <li><a href="#">Ekstra Kulikuler</a></li>
                          <li><a href="<?= base_url('post?category=prestasi siswa') ?>">Prestasi</a></li>
                      </ul>
                  </li>
                  <li><a href="<?= base_url('ppdb') ?>">PPDB</a></li>
              </ul>
              <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
          </nav>

      </div>
  </header>