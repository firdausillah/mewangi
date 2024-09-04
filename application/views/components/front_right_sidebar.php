            <div class="col-lg-4 sidebar">

                <div class="widgets-container">

                    <!-- Search Widget -->
                    <div class="search-widget widget-item">

                        <h3 class="widget-title">Search</h3>
                        <form onsubmit="button_search(); return false;">
                            <input type="text" id="q_search">
                            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                        </form>

                    </div><!--/Search Widget -->

                    <!-- Categories Widget -->
                    <div class="categories-widget widget-item">

                        <h3 class="widget-title">Categories</h3>
                        <ul class="mt-3">
                            <?php foreach ($global_categories as $value) : ?>
                                <li><a href="<?= base_url('post?category=' . $value->nama) ?>"><?= $value->nama ?> <span>(<?= $value->jumlah ?>)</span></a></li>
                            <?php endforeach; ?>
                        </ul>

                    </div><!--/Categories Widget -->

                    <!-- Recent Posts Widget -->
                    <div class="recent-posts-widget widget-item">

                        <h3 class="widget-title">Recent Posts</h3>

                        <?php for ($i = 0; $i < 5; $i++) : ?>
                            <div class="post-item">
                                <div class="" style="width: 100px; height: 100%;">
                                    <img src="<?= base_url('uploads/img/post/' . $global_post[$i]->foto) ?>" alt="" class="flex-shrink-0 .img-fluid">
                                </div>
                                <div>
                                    <h4><a href="<?= base_url('read/' . date_format(date_create($global_post[$i]->created_on), 'Y/m/d') . '/' . $global_post[$i]->slug) ?>"><?= $global_post[$i]->nama ?></a></h4>
                                    <time datetime="2020-01-01"><?= date_format(date_create($global_post[$i]->created_on), 'd M Y'); ?></time>
                                </div>
                            </div><!-- End recent post item-->
                        <?php endfor ?>
                    </div><!--/Recent Posts Widget -->

                    <!-- Tags Widget -->
                    <div class="tags-widget widget-item">

                        <h3 class="widget-title">Tags</h3>
                        <ul>
                            <?php foreach ($global_tags as $value) : ?>
                                <li><a href="<?= base_url('post?tag=' . $value->nama) ?>"><?= $value->nama ?></a></li>
                            <?php endforeach; ?>
                        </ul>

                    </div><!--/Tags Widget -->

                </div>

            </div>

            <script>

                // function button_page() {
                //     var q_search = $('#q_search').val();
                //     var newUrl = location.origin + location.pathname + '?q=' + q_search

                //     history.pushState(null, '', newUrl);

                //     filter_url_based()
                // }

                function button_search() {
                    var q_search = $('#q_search').val();
                    console.log('post?q=' + q_search);
                    window.location.replace('<?=base_url()?>post?q=' + q_search)
                    return false;
                }

                // function button_search() {
                //     var q_search = $('#q_search').val();
                //     console.log('<?= base_url('post') ?>' + '?q=' + q_search);
                //     window.location.href = "<?= base_url('post') ?>" + '?q=' + q_search; // Menggunakan base_url yang benar
                // }

                // function button_filter_url_based() {
                //     var q_search = $('#q_search').val();
                //     filter_url_based()

                //     var path = location.pathname.split('/');
                //     if (path[2] == 'post') {
                //         var newUrl = location.origin + location.pathname + '?q=' + q_search

                //         // Menggunakan pushState untuk mengubah URL tanpa reload
                //         history.pushState(null, '', newUrl);

                //         filter_url_based()
                //         return false;
                //     }
                // }

            </script>