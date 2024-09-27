<?php $this->load->view('components/front_title') ?>

<div class="container">
    <div class="row">

        <div class="col-lg-8">

            <!-- Blog Details Section -->
            <section id="blog-details" class="blog-details section">
                <div class="container">

                    <article class="article">

                        <div class="post-img">
                            <img src="<?= base_url('uploads/img/post/' . $post->foto) ?>" alt="" class="img-fluid">
                        </div>

                        <h2 class="title"><?= $post->nama ?></h2>

                        <div class="meta-top">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-details.html"><?= $post->author ?></a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details.html"><time datetime="2020-01-01"><?= date_format(date_create($post->created_on), 'd M Y'); ?></time></a></li>
                                <!-- <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-details.html">12 Comments</a></li> -->
                            </ul>
                        </div><!-- End meta top -->

                        <div class="content">
                            <?= $post->content ?>

                        </div><!-- End post content -->

                        <div class="meta-bottom">
                            <div>
                                <i class="bi bi-folder"></i>
                                <ul class="cats">
                                    <li><a href="<?= base_url('post?category=' . $post->category_nama) ?>"><?= $post->category_nama ?></a></li>
                                </ul>

                                <i class="bi bi-tags"></i>
                                <ul class="tags">
                                    <?php foreach (explode(', ', $post->tags_t_nama) as $value) : ?>
                                        <li><a href="<?= base_url('post?tag=' . $value) ?>"><?= $value ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <div class="d-flex text-secondary mt-1">
                                <h7>Share : </h7>
                                <ul class="share-buttons d-flex gap-2">
                                    <li class="share-list">
                                        <a href="https://www.facebook.com/sharer.php?u=<?= base_url(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) ?>" target="_blank">
                                            <i class="bi bi-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="share-list">
                                        <a href="https://twitter.com/intent/tweet?text=<?= $post->nama ?>&url=<?= base_url(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) ?>" target="_blank">
                                            <i class="bi bi-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="share-list">
                                        <a href="https://api.whatsapp.com/send?text=<?= $post->nama ?>%20<?= base_url(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) ?>" target="_blank">
                                            <i class="bi bi-whatsapp"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- End meta bottom -->

                    </article>

                </div>
            </section><!-- /Blog Details Section -->


        </div>

        <?php $this->load->view('components/front_right_sidebar') ?>

    </div>
</div>