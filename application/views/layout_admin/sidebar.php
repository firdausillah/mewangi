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
            <?php if ($this->session->userdata('role') == 'superadmin') : ?>
                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item">
                        <a href="<?= base_url() ?>admin/dashboard" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>
                    <!-- Siswa -->
                    <li class="menu-item">
                        <a href="<?= base_url() ?>admin/siswa" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-user-circle"></i>
                            <div data-i18n="Analytics">Siswa</div>
                        </a>
                    </li>
                    <!-- Post -->
                    <li class="menu-item">
                        <a href="javascript:void(0)" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-news"></i>
                            <div data-i18n="Post">Post</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="<?= base_url() ?>admin/posts" class="menu-link">
                                    <div data-i18n="posts">Post</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= base_url() ?>admin/magazine" class="menu-link">
                                    <div data-i18n="magazine">Mercure</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- Master -->
                    <li class="menu-item">
                        <a href="javascript:void(0)" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-news"></i>
                            <div data-i18n="Master">Master</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="<?= base_url() ?>admin/banner" class="menu-link">
                                    <div data-i18n="banner">Banner</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= base_url() ?>admin/galeri" class="menu-link">
                                    <div data-i18n="galeri">Galeri</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= base_url() ?>admin/post_category" class="menu-link">
                                    <div data-i18n="post_category">Post Category</div>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <!-- ppdb -->
                    <li class="menu-item">
                        <a href="<?= base_url() ?>admin/ppdb" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-file"></i>
                            <div data-i18n="Analytics">PPDB</div>
                        </a>
                    </li>
                    <!-- download -->
                    <li class="menu-item">
                        <a href="<?= base_url() ?>admin/download" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-download"></i>
                            <div data-i18n="Analytics">Download</div>
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
            <?php else : ?>
                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item">
                        <a href="<?= base_url() ?>admin/dashboard" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>
                    <!-- Post -->
                    <li class="menu-item">
                        <a href="<?= base_url() ?>admin/posts" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-news"></i>
                            <div data-i18n="Analytics">Post</div>
                        </a>
                    </li>
                </ul>
            <?php endif; ?>
        </aside>