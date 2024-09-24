<?php $this->load->view('components/front_title') ?>

<div class="container">
    <div class="row">

        <div class="col-lg-8">

            <!-- Blog Details Section -->
            <section id="blog-details" class="blog-details section">
                <div class="container">

                    <article class="article">

                        <div class="accordion" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                        Brosur
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                                    <div class="accordion-body row d-flex justify-content-center">
                                        <a href="<?= base_url('uploads/img/ppdb_setting/' . $ppdb_setting->foto) ?>" target="_blank" class="col-md-8">
                                            <img src="<?= base_url('uploads/img/ppdb_setting/' . $ppdb_setting->foto) ?>" alt="<?= base_url('uploads/img/ppdb_setting/' . $ppdb_setting->foto) ?>" class="img-fluid img-thumbnail">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                        Petunjuk Teknis
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <?= $ppdb_setting->keterangan ?>
                                        <div class="row mt-3 d-flex gap-2">
                                            <div class="col-sm-6">
                                                <a class="d-flex flex-row gap-2" href="<?= $ppdb_setting->link ?>" target="_blank">
                                                    <div class="bg-info text-white p-1 rounded-circle d-flex" style="width: 25px; height: 25px;">
                                                        <i class="bi bi-cloud-download self-center m-auto" style="font-size: small;"></i>
                                                    </div>
                                                    Link Juknis
                                                </a>
                                            </div>
                                            <div class="col-sm-6">
                                                <a class="d-flex flex-row gap-2" href="<?= base_url('uploads/file/ppdb_setting/' . $ppdb_setting->file) ?>" target="_blank">
                                                    <div class="bg-info text-white p-1 rounded-circle d-flex" style="width: 25px; height: 25px;">
                                                        <i class="bi bi-cloud-download self-center m-auto" style="font-size: small;"></i>
                                                    </div>
                                                    File Juknis
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </article>

                </div>
            </section><!-- /Blog Details Section -->

            <!-- Button trigger modal -->
            <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Launch demo modal
            </button> -->

            <!-- Modal -->
            <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorum, illum.</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body"> -->
                            <!-- <iframe src="https://heyzine.com/flip-book/2c39e49975.html" width="100%" height="600px"></iframe> -->
                        <!-- </div>
                    </div>
                </div>
            </div> -->


        </div>

        <?php $this->load->view('components/front_right_sidebar') ?>

    </div>
</div>