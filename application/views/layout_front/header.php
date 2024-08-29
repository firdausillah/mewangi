  <header id="header" class="header d-flex align-items-center fixed-top">
      <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

          <a href="index.html" class="logo d-flex align-items-center">
              <!-- Uncomment the line below if you also wish to use an image logo -->
              <!-- <img src="<?= base_url('uploads/img/profile/' . $profile->foto); ?>" alt=""> -->
              <h1><?= $profile->nama_sekolah ?></h1>
          </a>

          <nav id="navmenu" class="navmenu">
              <ul>
                  <li><a href="index.html" class="active">Beranda<br></a></li>
                  <li><a href="blog.html">Berita & Artikel</a></li>
                  <li><a href="blog.html">Opini</a></li>
                  <li><a href="about.html">About</a></li>
                  <li><a href="contact.html" class="btn">PPDB</a></li>
              </ul>
              <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
          </nav>

      </div>
  </header>