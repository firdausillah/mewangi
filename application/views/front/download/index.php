<?php $this->load->view('components/front_title') ?>

<section id="portfolio" class="">

    <div class="container">

        <div class="layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

            <div class="table-responsive text-nowrap mt-2" data-aos="fade-up" data-aos-delay="200">
                <table id="datatables_table" class="table table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Judul</th>
                            <th>Keterangan</th>
                            <th>Link</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <!-- <?php foreach ($user as $index => $item) : ?> -->
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= $item->nama ?></td>
                            <td><?= $item->keterangan ?></td>
                            <td><a href="<?= $item->link ?>">Download</a></td>
                        </tr>
                        <!-- <?php endforeach ?> -->
                    </tbody>
                </table>
            </div>
            <!-- <div class="row gy-4 row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4" data-aos="fade-up" data-aos-delay="200">


            </div> -->

        </div>

    </div>

</section>