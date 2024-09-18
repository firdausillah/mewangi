<?php $this->load->view('components/front_title') ?>

<section>
    <div class="container">
        <div class="card w-100 mb-3 border-0 shadow">
            <div class="card-body p-3">
                <form class="row g-3" onsubmit="return false">
                    <div class="col-md-6">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" id="nama">
                    </div>
                    <div class="col-md-6">
                        <label for="kelas" class="form-label">Kelas</label>
                        <select name="kelas" class="form-control" id="kelas">
                            <option value="">--Pilih--</option>
                            <?php foreach ($kelas as $value) : ?>
                                <option value="<?= $value->kelas ?>"><?= $value->kelas ?></option>
                            <?php endforeach;  ?>
                        </select>
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary px-5" onclick="action_search_siswa()"><i class="bi bi-search"></i> Cari</button>
                    </div>
                </form>

                <div class="table-responsive text-nowrap mt-2" data-aos="fade-up" data-aos-delay="200">
                    <table id="table_data_siswa" class="table table-hover">
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

    </div>

</section>
