<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="<?= base_url() ?>assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title><?= $title ? $title : '' ?> | <?= $profile->nama_sekolah ?></title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="<?= base_url('uploads/img/profile/' . $profile->foto); ?>" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/demo.css" />

  <!-- Cropper -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/cropper.css" />

  <script src="<?= base_url() ?>assets/vendor/libs/jquery/jquery.js"></script>

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/libs/apex-charts/apex-charts.css" />

  <!-- Page CSS -->

  <!-- Select2 -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <!-- Datatables -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/css/datatables.min.css" />

  <!-- Helpers -->
  <script src="<?= base_url() ?>assets/vendor/js/helpers.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="<?= base_url() ?>assets/js/config.js"></script>
</head>

<body>
  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message') ?>" data-fdstatus="<?= $this->session->flashdata('status') ?>"></div>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <?php $this->load->view('layout_admin/sidebar') ?>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->

        <?php $this->load->view('layout_admin/navbar') ?>

        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y">
            <!-- <h4 class="fw-bold py-3 mb-4"> -->
            <!-- <span class="text-muted fw-light">
                      Tables / Lorem, ipsum.
                  </span> 
                  Basic Tables -->

            <!-- <span id="breadcrump"></span> -->

            <!-- </h4> -->
            <!-- Responsive Table -->
            <?php $this->load->view($content) ?>
            <!--/ Responsive Table -->
          </div>

          <!-- / Content -->

          <!-- Footer -->
          <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
              <div class="mb-2 mb-md-0 fst-italic">
                ©
                <script>
                  document.write(new Date().getFullYear());
                </script>
                | Brewed with 🩷 by
                <a href="https://aruna-project.vercel.app" target="_blank" class="footer-link fw-bolder">Aruna-Project</a>
              </div>
            </div>
          </footer>
          <!-- / Footer -->

          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <!-- / Layout wrapper -->

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->

  <script src="<?= base_url() ?>assets/vendor/libs/popper/popper.js"></script>
  <script src="<?= base_url() ?>assets/vendor/js/bootstrap.js"></script>
  <script src="<?= base_url() ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <script src="<?= base_url() ?>assets/js/sweetalert2.all.min.js"></script>

  <script src="<?= base_url() ?>assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="<?= base_url() ?>assets/vendor/libs/apex-charts/apexcharts.js"></script>

  <!-- Main JS -->
  <script src="<?= base_url() ?>assets/js/main.js"></script>

  <!-- Page JS -->
  <script src="<?= base_url() ?>assets/js/dashboards-analytics.js"></script>

  <!-- Select2 -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <!-- Datatables -->
  <script src="<?= base_url() ?>assets/vendor/js/datatables.min.js"></script>

  <script src="<?= base_url() ?>assets/js/myScript.js"></script>
  <script src="<?= base_url() ?>assets/js/ui-modals.js"></script>

  <!-- Cropper -->
  <?php @$cropper ? $this->load->view($cropper) : "" ?>

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>