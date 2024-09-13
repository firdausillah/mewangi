<?php $this->load->view('components/front_title') ?>

<section id="portfolio" class="portfolio section">

    <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

            <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200" id="galeri-container">

                <div class="col-lg-4 col-md-6 portfolio-item isotope-item">
                    <img src="<?= base_url() ?>assets/front/img/portfolio/app-1.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>App 1</h4>
                        <p>Lorem ipsum, dolor sit amet consectetur</p>
                        <a href="<?= base_url() ?>assets/front/img/portfolio/app-1.jpg" title="App 1" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                    </div>
                </div><!-- End Portfolio Item -->

            </div><!-- End Portfolio Container -->

        </div>

    </div>

</section>
<!-- Area Preview Gambar -->
<div class="preview-container" style="text-align:center; margin-top:20px;">
    <img id="imagePreview" src="" alt="Preview" style="max-width:100%; height:auto; display:none;">
</div>

<script>
    $(document).ready(function() {
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

                        // Bangun HTML untuk setiap elemen
                        htmlContent += `
                            <div class="col-lg-4 col-md-6 portfolio-item isotope-item">
                                <img src="<?= base_url('uploads/img/galeri/') ?>${element.foto}" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <h4>${element.nama}</h4>
                                    <p>${element.keterangan}</p>
                                    <a href="<?= base_url('uploads/img/galeri/') ?>${element.foto}" title="App 1" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                    <a href="${element.link}" title="More Details" target="_blank" class="details-link"><i class="bi bi-link-45deg"></i></a>
                                </div>
                            </div>
                        `;
                    }

                    // Setelah loop selesai, masukkan HTML yang sudah dibentuk ke dalam elemen #content
                    $('#galeri-container').html(htmlContent);
                    // console.log(htmlContent)
                    let totalPages = Math.ceil(json.total_rows / json.rows_per_page);
                    // console.log(json.current_page);
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

    function imgPreview(imgSrc) {

        // Ganti src dari image preview
        $('#imagePreview').attr('src', imgSrc).fadeIn();

    }
</script>