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
                  <li class="dropdown"><a href="#"><span>Post</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                      <ul>
                          <li><a href="<?= base_url('post') ?>">Berita & Artikel</a></li>
                          <li><a href="<?= base_url('mercure') ?>">Mercure Magazine</a></li>
                      </ul>
                  </li>
                  <li><a href="<?= base_url('galeri') ?>">Galeri</a></li>
                  <li><a href="<?= base_url('download') ?>">Download</a></li>
                  <li class="dropdown"><a href="#"><span>Akademik</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                      <ul>
                          <li class="dropdown"><a href="#"><span>Guru</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                              <ul>
                                  <li><a href="https://pusaka.kemenag.go.id/public/login" target="_blank">Pusaka</a></li>
                                  <li><a href="https://www.kemenagbanyuwangi.web.id/e-kinerja/" target="_blank">E-Kinerja</a></li>
                                  <li><a href="https://sso.kemenag.go.id/auth/signin?appid=42095eeec431ac23eb12d2b772c94be0" target="_blank">SSO</a></li>
                                  <li><a href="https://kinerja.bkn.go.id/login" target="_blank">SKP</a></li>
                                  <li><a href="https://rdmman4banyuwangi.my.id/" target="_blank">Raport Digital Madrasah</a></li>
                              </ul>
                          </li>
                          <li><a href="https://simpletech.id/presensi_mobile/index.php?r=site/login" target="_blank">Absensi Digital</a></li>
                          <li><a href="https://simpletech.id/aplikasi/perpus_manpawangi/">Perpustakaan Digital</a></li>
                          <li><a href="#">E-Learning</a></li>
                          <li><a href="#">CBT</a></li>
                      </ul>
                  </li>
                  <li class="dropdown"><a href="#"><span>Kesiswaan</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                      <ul>
                          <li><a href="<?= base_url('siswa') ?>">Data Siswa</a></li>
                          <li><a href="#">Ekstra Kulikuler</a></li>
                          <li><a href="<?= base_url('post?category=prestasi siswa') ?>">Prestasi</a></li>
                      </ul>
                  </li>
                  <li class="dropdown"><a href="#"><span>PPDB</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                      <ul>
                          <li><a href="<?= base_url('ppdb/informasi') ?>">Brosur & Juknis</a></li>
                          <li><a href="<?= base_url('ppdb') ?>">Daftar</a></li>
                      </ul>
                  </li>
              </ul>
              <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
          </nav>

      </div>
  </header>