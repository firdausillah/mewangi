<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title><?= $title ? $title : '' ?> | <?= $profile ? $profile->nama_sekolah : 'Aruna Project' ?></title>
  <meta name="description" content="<?= $title ? $title : '' ?> | <?= $profile ? $profile->nama_sekolah : 'Aruna Project' ?>">
  <meta name="keywords" content="">
  <meta property="og:image" content="<?= base_url('uploads/img/profile/' . $profile->foto); ?>">

  <!-- Favicons -->
  <link href="<?= base_url('uploads/img/profile/' . $profile->foto); ?>" rel="icon">
  <!-- <link href="<?= base_url() ?>assets/front/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url() ?>assets/front/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/front/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/front/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/front/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/front/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <script src="<?= base_url() ?>assets/vendor/libs/jquery/jquery.js"></script>

  <!-- Datatables -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/css/datatables.min.css" />

  <!-- Main CSS File -->
  <link href="<?= base_url() ?>assets/front/css/main.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/front/css/myStyle.css" rel="stylesheet">

  <!-- Datatables -->
  <script src="<?= base_url() ?>assets/vendor/js/datatables.min.js"></script>

</head>

<body class="index-page">
  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message') ?>" data-fdstatus="<?= $this->session->flashdata('status') ?>"></div>

  <?php $this->load->view('layout_front/header') ?>

  <main class="main">

    <?php $this->load->view($content) ?>

  </main>

  <?php $this->load->view('layout_front/footer') ?>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="<?= base_url() ?>assets/front/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>assets/front/vendor/php-email-form/validate.js"></script>
  <script src="<?= base_url() ?>assets/front/vendor/aos/aos.js"></script>
  <script src="<?= base_url() ?>assets/front/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= base_url() ?>assets/front/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?= base_url() ?>assets/front/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="<?= base_url() ?>assets/front/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= base_url() ?>assets/js/sweetalert2.all.min.js"></script>


  <!-- Main JS File -->
  <script src="<?= base_url() ?>assets/front/js/main.js"></script>
  <script src="<?= base_url() ?>assets/front/js/myScript.js"></script>


  <script src="<?= base_url() ?>assets/front/js/fontawesome.js"></script>
</body>

</html>