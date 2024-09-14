<?php $this->load->view('components/front_title') ?>

<section id="portfolio" class="">

    <div class="container">

        <div class="layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

            <div class="row gy-4 row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4" data-aos="fade-up" data-aos-delay="200" id="galeri-container">


            </div><!-- End Portfolio Container -->

        </div>

        <!-- Blog Pagination Section -->
        <section id="blog-pagination" class="blog-pagination section mt-4">

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

</section>
<script>
    $(document).ready(function() {
        var keterangan
        filter_url_based()

        const lightbox = GLightbox({
            selector: '.glightbox'
        });
    });


    function filter_url_based() {
        var url = '<?= base_url('galeri/getGaleri') ?>' + location.search;

        $.ajax({
            url: url,
            dataType: 'json',
            success: function(json) {
                if (json.data.length != 0) {
                    let htmlContent = ''; // Buat variabel untuk menyimpan HTML yang akan dibentuk

                    for (let i = 0; i < json.data.length; i++) {
                        const element = json.data[i]; // Ambil data dari JSON
                        judul = truncateContent(element.nama, 20);
                        keterangan = truncateContent(element.keterangan, 50);

                        // Bangun HTML untuk setiap elemen
                        htmlContent += `
                            <div class="col">
                                <a href="${element.link}" class="card h-100 border-0 shadow" target="_blank">
                                    <img src="<?= base_url('uploads/img/galeri/') ?>${element.foto}" class="card-img-top" alt="<?= base_url('uploads/img/galeri/') ?>${element.foto}">
                                    <div class="card-body">
                                        <h5 class="card-title">${judul}</h5>
                                        <p class="card-text">${keterangan}</p>
                                    </div>
                                </a>
                            </div>
                        `;
                    }

                    $('#galeri-container').html(htmlContent);
                    
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

    function truncateContent(content, maxLength) {
        if (content.length > maxLength) {
            return content.substring(0, maxLength) + '...';
        } else {
            return content;
        }
    }
</script>