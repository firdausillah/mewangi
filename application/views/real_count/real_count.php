    <div class="misc-wrapper container relative">
        <h1>Pilih Event</h1>
        <div class="row mb-2 d-flex justify-content-center">
            <?php foreach ($vote_data_h as $value) : ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card text-center mb-3">
                        <div class="card-body">
                            <h4 class="card-title"><?= $value->nama ?></h4>
                            <a href="<?= base_url('real_count/real_count_d/'.$value->id) ?>" class="btn btn-primary">Lihat Real Count</a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <a href="<?= base_url() ?>" class="btn btn-secondary"><i class='bx bx-arrow-back'></i> Kembali</a>
    </div>