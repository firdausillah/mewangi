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
                        <?php foreach ($download as $index => $item) : ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= substr($item->nama, 0, 30) . '...' ?></td>
                                <td><?= substr($item->keterangan, 0, 30) . '...' ?></td>
                                <td>
                                    <?php if ($item->is_file) : ?>
                                        <a href="<?= base_url('uploads/file/download/' . $item->file) ?>" target="_blank" class="text-black"><span class="text-info">Download</span></a>
                                    <?php else : ?>
                                        <a href="<?= $item->link ?>" target="_blank" class="text-black"><span class="text-info">Link</span></a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>

        </div>

    </div>

</section>