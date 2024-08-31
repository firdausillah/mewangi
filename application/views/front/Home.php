    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

        <img src="<?= base_url() ?>assets/front/img/hero-bg.jpg" alt="" data-aos="fade-in">

        <div class="container">
            <div class="row">
                <div class="col-xl-4">
                    <h1 data-aos="fade-up">Focus On What Matters</h1>
                    <blockquote data-aos="fade-up" data-aos-delay="100">
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perspiciatis cum recusandae eum laboriosam voluptatem repudiandae odio, vel exercitationem officiis provident minima. </p>
                    </blockquote>
                    <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                        <a href="#about" class="btn-get-started">Get Started</a>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /Hero Section -->

    <!-- Recent Posts Section -->
    <section id="recent-posts" class="recent-posts section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Recent Blog Posts</h2>

        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-5 d-flex justify-content-center">

                <?php for ($i=0; $i < 4; $i++) : ?>
                    <div class="col-xl-3 col-md-6" data-aos="fade-up">
                        <div class="post-box">
                            <div class="post-img"><img src="<?= base_url('uploads/img/post/' . $global_post[$i]->foto) ?>" class="img-fluid" alt=""></div>
                            <div class="meta">
                                <span class="post-date"><?= date_format(date_create($global_post[$i]->created_on), 'd M Y'); ?></span>
                                <span class="post-author"> / <?= $global_post[$i]->author ?></span>
                            </div>
                            <h3 class="post-title"><?= $global_post[$i]->nama ?></h3>
                            <small class="badge <?= $global_post[$i]->post_type == 'artikel' ? 'text-bg-warning' : ($global_post[$i]->post_type == 'berita' ? 'text-bg-info' : 'text-bg-success') ?> mt-1" style="width: fit-content; font-size: xx-small;"><?= $global_post[$i]->post_type ?></small>
                            <p><?= substr($global_post[$i]->content, 0, 90) . '...' ?></p>
                            <a href="<?= base_url('read/' . date_format(date_create($global_post[$i]->created_on), 'Y/m/d').'/'. $global_post[$i]->slug) ?>" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                <?php endfor; ?>

            </div>

        </div>

    </section><!-- /Recent Posts Section -->