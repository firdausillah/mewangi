    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

        <img id="displayed-image" src="<?= base_url('uploads/img/banner/' . $banner->foto) ?>" alt="" data-aos="fade-in">

        <div class="container">
            <div class="row">
                <div class="col-xl-4">
                    <h1 data-aos="fade-up" id="title"><?= $banner->nama ?></h1>
                    <blockquote data-aos="fade-up" data-aos-delay="100" id="keterangan">
                        <?= $banner->keterangan ?>
                    </blockquote>
                    <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                        <a href="http://<?= $banner->link ?>" class="btn-get-started" id="link">Selengkapnya</a>
                    </div>
                    <div class="d-flex mt-4 justify-content-between m-auto" style="width: 100px;" data-aos="fade-up" data-aos-delay="300">
                        <a href="#" class="" id="prev-btn"><i class="fa fa-chevron-left"></i></a>
                        <a href="#" class="" id="next-btn"><i class="fa fa-chevron-right"></i></a>
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
                <?php
                $global_post_data = array_slice($global_post, 0, 4);
                foreach ($global_post_data as $value) : ?>
                    <div class="col-xl-3 col-md-6" data-aos="fade-up">
                        <div class="post-box">
                            <div class="post-img"><img src="<?= base_url('uploads/img/post/' . $value->foto) ?>" class="img-fluid" alt=""></div>
                            <div class="meta overflow-hidden">
                                <span class="post-date"><?= date_format(date_create($value->created_on), 'd M Y'); ?></span>
                                <span class="post-author"> / <?= $value->author ?></span>
                            </div>
                            <h3 class="post-title"><?= $value->nama ?></h3>
                            <small class="badge <?= $value->post_type == 'artikel' ? 'text-bg-warning' : ($value->post_type == 'berita' ? 'text-bg-info' : 'text-bg-success') ?> mt-1" style="width: fit-content; font-size: xx-small;"><?= $value->post_type ?></small>
                            <p><?= substr($value->content, 0, 90) . '...' ?></p>
                            <a href="<?= base_url('read/' . date_format(date_create($value->created_on), 'Y/m/d') . '/' . $value->slug) ?>" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                <?php endforeach ?>

            </div>

        </div>

    </section><!-- /Recent Posts Section -->

    <script>
        $(document).ready(function() {
            // var images;
            var images = []
            var title = []
            var keterangan = []
            var link = []
            $.ajax({
                url: '<?= base_url('index/getBanner') ?>',
                type: 'POST',
                dataType: 'json',
                data: {},
                success: function(json) {
                    if (json != undefined) {
                        banner_data = json.data;

                        for (let i = 0; i < banner_data.length; i++) {
                            images.push(banner_data[i].foto);
                            title.push(banner_data[i].nama);
                            keterangan.push(banner_data[i].keterangan);
                            link.push(banner_data[i].link);
                        }
                    }
                }
            });

            var currentIndex = 0;
            var intervalTime = 5000;

            // Fungsi untuk mengganti gambar dengan animasi fade
            function changeImage(index) {
                $('#displayed-image').addClass('flipped').fadeOut(300, function() {
                    $(this).attr('src', '<?= base_url() ?>uploads/img/banner/' + images[index]).removeClass('flipped').fadeIn(300);
                });

                $('#title').html(images[index]);
                $('#title').html(title[index]);
                $('#keterangan').html(keterangan[index]);
                $('#link').attr('href', link[index]);
            }


            // Event klik untuk tombol "Previous"
            $('#prev-btn').click(function() {
                currentIndex = (currentIndex > 0) ? currentIndex - 1 : images.length - 1;
                changeImage(currentIndex);
            });

            // Event klik untuk tombol "Next"
            $('#next-btn').click(function() {
                currentIndex = (currentIndex < images.length - 1) ? currentIndex + 1 : 0;
                changeImage(currentIndex);
            });

            setInterval(function() {
                currentIndex = (currentIndex < images.length - 1) ? currentIndex + 1 : 0;
                changeImage(currentIndex);
            }, intervalTime);


        });
    </script>