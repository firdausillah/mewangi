  <header id="header" class="header d-flex align-items-center fixed-top">
      <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

          <a href="<?= base_url() ?>" class="logo d-flex align-items-center">
              <!-- Uncomment the line below if you also wish to use an image logo -->
              <img src="<?= base_url('assets/front/img/logo-kemenag-sm.png'); ?>" alt="">
              <img src="<?= base_url('uploads/img/profile/' . $profile->foto); ?>" alt="">
              <h1 class="web-title border-start p-2"><?= $profile->nama_sekolah ?></h1>
          </a>

          <nav id="navmenu" class="navmenu">
              <ul>
                  <li><a href="<?= base_url() ?>">Beranda<br></a></li>
                  <li><a href="<?= base_url('post') ?>">Post</a></li>
                  <li><a href="<?= base_url('galeri') ?>">Galeri</a></li>
                  <li><a href="<?= base_url('ppdb') ?>">PPDB</a></li>
              </ul>
              <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
          </nav>

      </div>
  </header>