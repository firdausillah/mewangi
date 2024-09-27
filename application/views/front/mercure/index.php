<?php $this->load->view('components/front_title') ?>

<div class="container">
    <div class="row">

        <div class="col-lg-12">

            <section id="team" class="team section">

                <div class="container">

                    <div class="row gy-4" id="content">

                    </div>


                </div>

            </section>

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


    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalBook" tabindex="-1" aria-labelledby="modalBookLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalBookLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <iframe src="" width="100%" height="600px" id="m_book_content"></iframe>

            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>

<script>
    $(document).ready(function() {
        filter_url_based()
    });


    function filter_url_based() {
        var url = '<?= base_url('mercure/getMagazine') ?>' + location.search;

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
                            <div class="col-lg-3 col-sm-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                                <div class="team-member">
                                    <div class="member-img">
                                        <img src="<?= base_url('uploads/img/magazine/') ?>${element.foto}" class="img-fluid" alt="">
                                    </div>
                                    <div class="member-info">
                                        <h5><a class="text-dark" href="#" onClick="getMagazineBy(${element.id})">${element.nama}</a></h5>
                                    </div>
                                </div>
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

    function getMagazineBy(id) {
        var url = '<?= base_url('mercure/getMagazineBy/') ?>' + id;

        $.ajax({
            url: url,
            dataType: 'json',
            success: function(json) {
                if (json.data.length != 0) {

                    var m_file_link = "https://docs.google.com/gview?url=<?= base_url('uploads/file/magazine/') ?>" + json.data.file + "&embedded=true";
                    $('#m_book_content').attr("src", m_file_link);
                    $('#modalBookLabel').html(json.data.nama);
                    $('#modalBook').modal('show');

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