<?php $this->load->view('components/front_title') ?>

<div class="container">
    <div class="row">

        <div class="col-lg-8">

            <!-- Blog Posts Section -->
            <section id="blog-posts" class="blog-posts section">

                <div class="container">
                    <div class="row gy-4" id="content">

                    </div>
                </div>

            </section><!-- /Blog Posts Section -->

            <!-- Blog Pagination Section -->
            <section id="blog-pagination" class="blog-pagination section">

                <div class="container">
                    <div class="d-flex justify-content-center">
                        <a href="#" id="scrollLeft" class="d-flex align-items-center"><i class="bi bi-chevron-left"></i></a>
                        <ul class="pagination overflow-x-hidden mx-2" id="pagination" style="max-width:400px;">
                        </ul>
                        <a href="#" id="scrollRight" class="d-flex align-items-center"><i class="bi bi-chevron-right"></i></a>
                    </div>
                </div>

            </section><!-- /Blog Pagination Section -->

        </div>

        <?php $this->load->view('components/front_right_sidebar') ?>

    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>

<script>
    $(document).ready(function() {
        filter_url_based()
    });


    function filter_url_based() {
        var url = '<?= base_url('post/getPost') ?>' + location.search;

        $.ajax({
            url: url,
            dataType: 'json',
            success: function(json) {
                if (json.data.length != 0) {
                    let htmlContent = ''; // Buat variabel untuk menyimpan HTML yang akan dibentuk

                    for (let i = 0; i < json.data.length; i++) {
                        const element = json.data[i]; // Ambil data dari JSON

                        // Bangun HTML untuk setiap elemen
                        htmlContent += `
                            <div class="col-lg-6">
                                <article class="d-flex align-items-start flex-column">
                                    <div class="post-img">
                                        <img src="<?= base_url('uploads/img/post/') ?>${element.foto}" alt="" class="img-fluid">
                                    </div>

                                    <p class="post-category">${element.category_nama}</p>

                                    <h2 class="title">
                                        <a href="<?= base_url('read/') ?>${element.created_on}/${element.slug}">${element.nama}</a>
                                    </h2>

                                    <div class="d-flex align-items-center mt-auto">
                                        <img src="<?= base_url('assets/img/avatars/profile.png') ?>" alt="" class="img-fluid post-author-img flex-shrink-0">
                                        <div class="post-meta">
                                            <p class="post-author">${element.author}</p>
                                            <p class="post-date">
                                                <time datetime="${element.tanggal}">${element.tanggal}</time>
                                            </p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        `;
                    }

                    $('#content').html(htmlContent);

                    let totalPages = Math.ceil(json.total_rows / json.rows_per_page);
                    
                    $('#pagination').html('');
                    for (let i = 1; i <= totalPages; i++) {
                        $('#pagination').append(`
                            <li>
                                <a href="#" onClick="page(${i})" class="${json.current_page == i ? 'active' : ''}">${i}</a>
                            </li>
                        `);
                    }

                    $('#scrollLeft').on('click', function() {
                        // Scroll div to the right
                        $('#pagination').animate({
                            scrollLeft: '-=200' // Adjust the value to control the scroll amount
                        }, 400); // Duration of the scroll animation
                    });

                    $('#scrollRight').on('click', function() {
                        // Scroll div to the right
                        $('#pagination').animate({
                            scrollLeft: '+=200' // Adjust the value to control the scroll amount
                        }, 400); // Duration of the scroll animation
                    });

                }
            }
        });

    }

    function page(page) {
        // Dapatkan URL saat ini
        var currentUrl = new URL(window.location.href);

        // Perbarui atau tambahkan parameter 'page'
        currentUrl.searchParams.set('page', page);

        // Menggunakan pushState untuk mengubah URL tanpa reload
        history.pushState(null, '', currentUrl.toString());
        filter_url_based();
    }
</script>