    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade" style="background-image: url(<?= base_url() ?>assets/front/img/blog-page-title-bg.jpg);">
        <div class="container">
            <h1><?= isset($title2) ? $title2 : $title ?></h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="<?= base_url() ?>">Beranda</a></li>
                    <li class="current"><?= isset($title2) ? $title2 : $title ?></li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->