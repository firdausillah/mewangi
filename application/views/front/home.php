    <!-- Hero Section -->
    <section id="hero" class="pt-4 pb-0 container">
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item img-slider active pb-0">
                    <a href="<?= $banner->link ?>" id="link" target="_blank">
                        <img id="displayed-image" src="<?= base_url('uploads/img/banner/' . $banner->foto) ?>" class="d-block w-100" alt="<?= base_url('uploads/img/banner/' . $banner->foto) ?>">
                        <div class="carousel-caption d-none d-md-block pb-5">
                            <h2 class="text-white text-shadow" id="title"><?= $banner->is_tampil == 0 ? $banner->nama : $banner->nama2 ?></h2>
                            <span class="text-shadow" id="keterangan"><?= $banner->is_tampil == 0 ? $banner->keterangan : $banner->keterangan2 ?></span>
                        </div>
                    </a>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" id="prev-btn">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" id="next-btn">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div>
            <div class="my-carousel-caption d-block d-md-none p-2">
                <h6 class="text-white" id="title2"><?= $banner->is_tampil == 0 ? $banner->nama : $banner->nama2 ?></h6>
                <span class="pb-0 text-white" style="font-size: small;" id="keterangan2"><?= substr($banner->is_tampil == 0 ? $banner->keterangan : $banner->keterangan2, 0, 20) . '...' ?></span>
            </div>
        </div>
    </section>


    <!-- Recent Posts Section -->
    <section id="recent-posts" class="recent-posts section">

        <!-- Section Title -->
        <div class="container section-title pb-3" data-aos="fade-up">
            <h2>Berita Terbaru</h2>

        </div><!-- End Section Title -->

        <div class="container">

            <div class="d-none d-sm-block">
                <div class="row gy-5 d-flex justify-content-center">
                    <?php
                    $global_post_data = array_slice($global_post, 0, 8);
                    foreach ($global_post_data as $value) : ?>
                        <div class="col-xl-3 col-md-6" data-aos="fade-up">
                            <div class="post-box">
                                <div class="post-img"><img src="<?= base_url('uploads/img/post/' . $value->foto) ?>" class="img-fluid" alt=""></div>
                                <div class="meta overflow-hidden">
                                    <span class="post-date"><?= date_format(date_create($value->created_on), 'd M Y'); ?></span>
                                    <span class="post-author"> / <?= $value->author ?></span>
                                </div>
                                <h3 class="post-title"><?= $value->nama ?></h3>
                                <small class="badge <?= $value->post_type == 'artikel' ? 'text-bg-secondary' : ($value->post_type == 'berita' ? 'text-bg-primary' : 'text-bg-success') ?> mt-1" style="width: fit-content; font-size: xx-small;"><?= $value->post_type ?></small>
                                <p><?= substr($value->content, 0, 50) . '...' ?></p>
                                <a href="<?= base_url('read/' . date_format(date_create($value->created_on), 'Y/m/d') . '/' . $value->slug) ?>" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    <?php endforeach ?>

                </div>
            </div>
            <!-- Recent Posts Widget -->
            <div class="recent-posts-widget widget-item d-sm-none d-block">

                <?php foreach ($global_post_data as $value) : ?>
                    <div class="post-item" data-aos="fade-up">
                        <img src="<?= base_url('uploads/img/post/' . $value->foto) ?>" alt="" class="flex-shrink-0 .img-fluid" style="width: 130px; height: 100%;">
                        <div>
                            <h4><a href="<?= base_url('read/' . date_format(date_create($value->created_on), 'Y/m/d') . '/' . $value->slug) ?>"><?= $value->nama ?></a></h4>
                            <time datetime="2020-01-01"><?= date_format(date_create($value->created_on), 'd M Y'); ?></time>
                        </div>
                    </div><!-- End recent post item-->
                <?php endforeach ?>
            </div><!--/Recent Posts Widget -->

        </div>

    </section><!-- /Recent Posts Section -->

    <script>
        $(document).ready(function() {
            var images = [];
            var title = [];
            var keterangan = [];
            var title2 = [];
            var keterangan2 = [];
            var link = [];

            // Ambil data banner
            $.ajax({
                url: '<?= base_url('index/getBanner') ?>',
                type: 'POST',
                dataType: 'json',
                success: function(json) {
                    if (json != undefined) {
                        banner_data = json.data;

                        for (let i = 0; i < banner_data.length; i++) {
                            images.push(banner_data[i].foto);
                            title.push(banner_data[i].nama);
                            keterangan.push(banner_data[i].keterangan);
                            title2.push(banner_data[i].nama2);
                            keterangan2.push(banner_data[i].keterangan2);
                            link.push(banner_data[i].link);
                        }
                    }
                }
            });

            var currentIndex = 0;
            var intervalTime = 5000;
            var intervalID;
            
            function changeImage(index) {
                $('#displayed-image').fadeOut(300, function() {
                    $(this).attr('src', '<?= base_url() ?>uploads/img/banner/' + images[index]).fadeIn(300);
                });

                $('#title').html(title[index]);
                $('#keterangan').html(keterangan[index]);
                $('#title2').html(title2[index]);
                $('#keterangan2').html(keterangan2[index] !== "undefined" && keterangan2[index] !== null && keterangan2[index] !== "" ? truncateContent(keterangan2[index], 50) : " ");
                $('#link').attr('href', link[index]);
            }

            // Fungsi untuk memulai interval (otomatis geser gambar)
            function startInterval() {
                intervalID = setInterval(function() {
                    currentIndex = (currentIndex < images.length - 1) ? currentIndex + 1 : 0;
                    changeImage(currentIndex);
                }, intervalTime);
            }

            // Fungsi untuk mereset interval saat tombol diklik
            function resetInterval() {
                clearInterval(intervalID); // Hentikan interval yang berjalan
                startInterval(); // Mulai interval yang baru
            }

            // Event klik untuk tombol "Previous"
            $('#prev-btn').click(function() {
                currentIndex = (currentIndex > 0) ? currentIndex - 1 : images.length - 1;
                changeImage(currentIndex);
                resetInterval(); // Reset interval saat tombol diklik
            });

            // Event klik untuk tombol "Next"
            $('#next-btn').click(function() {
                currentIndex = (currentIndex < images.length - 1) ? currentIndex + 1 : 0;
                changeImage(currentIndex);
                resetInterval(); // Reset interval saat tombol diklik
            });

            // Memulai interval pertama kali saat halaman dimuat
            startInterval();


            function truncateContent(content, maxLength) {
                if (content) {
                    if (content.length > maxLength) {
                        return content.substring(0, maxLength) + '...';
                    } else {
                        return content;
                    }
                }
            }
        });
    </script>