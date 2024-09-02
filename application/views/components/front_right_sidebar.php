            <div class="col-lg-4 sidebar">

                <div class="widgets-container">

                    <!-- Search Widget -->
                    <div class="search-widget widget-item">

                        <h3 class="widget-title">Search</h3>
                        <form action="">
                            <input type="text">
                            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                        </form>

                    </div><!--/Search Widget -->

                    <!-- Categories Widget -->
                    <div class="categories-widget widget-item">

                        <h3 class="widget-title">Categories</h3>
                        <ul class="mt-3">
                            <?php foreach ($global_categories as $value) : ?>
                                <li><a href="#"><?= $value->nama ?> <span>(<?= $value->jumlah ?>)</span></a></li>
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
                            <li><a href="#">App</a></li>
                            <li><a href="#">IT</a></li>
                            <li><a href="#">Business</a></li>
                            <li><a href="#">Mac</a></li>
                            <li><a href="#">Design</a></li>
                            <li><a href="#">Office</a></li>
                            <li><a href="#">Creative</a></li>
                            <li><a href="#">Studio</a></li>
                            <li><a href="#">Smart</a></li>
                            <li><a href="#">Tips</a></li>
                            <li><a href="#">Marketing</a></li>
                        </ul>

                    </div><!--/Tags Widget -->

                </div>

            </div>