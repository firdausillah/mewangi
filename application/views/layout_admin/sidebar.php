        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo">
                <a href="index.html" class="app-brand-link">
                    <span class="app-brand-logo demo">
                        <!-- <img src="<?= base_url() ?>/assets/img/aruna-logo-gram.png" width="25" alt=""> -->
                        <img src="<?= base_url('uploads/img/profile/' . $profile->foto); ?>" alt="Logo" height="35px">
                    </span>
                    <span class="app-brand-text demo menu-text fw-bolder ms-2"><?= $this->session->userdata('role') ?></span>
                </a>

                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                    <i class="bx bx-chevron-left bx-sm align-middle"></i>
                </a>
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">
                <!-- Dashboard -->
                <li class="menu-item">
                    <a href="<?= base_url() ?>admin/dashboard" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-home-circle"></i>
                        <div data-i18n="Analytics">Dashboard</div>
                    </a>
                </li>
                <!-- Posts -->
                <li class="menu-item">
                    <a href="javascript:void(0)" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-news"></i>
                        <div data-i18n="Posts">Posts</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="<?= base_url() ?>admin/post/news_article" class="menu-link">
                                <div data-i18n="news_article">Berita & Artikel</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="<?= base_url() ?>admin/post/opinion" class="menu-link">
                                <div data-i18n="opinion">Opini</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Post_category -->
                <li class="menu-item">
                    <a href="<?= base_url() ?>admin/post_category" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-category-alt"></i>
                        <div data-i18n="Analytics">Post Category</div>
                    </a>
                </li>
                <!-- Profile -->
                <li class="menu-item">
                    <a href="<?= base_url() ?>admin/profile" class="menu-link">
                        <i class="menu-icon tf-icons bx bxs-school"></i>
                        <div data-i18n="Analytics">Profile</div>
                    </a>
                </li>
                <!-- E-User -->
                <li class="menu-item">
                    <a href="<?= base_url() ?>admin/user" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-user"></i>
                        <div data-i18n="Users">Users</div>
                    </a>
                </li>
            </ul>
        </aside>