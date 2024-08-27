    <div class="misc-wrapper container relative">
        <div class="row">
            <?php $data = [
                [
                    'title' => 'Event',
                    'img' => 'mulai-memilih.jpg',
                    'url' => 'event'
                ],
                [
                    'title' => 'Real Count Display',
                    'img' => 'real-count-display.jpg',
                    'url' => 'real_count'
                ],
                [
                    'title' => 'Login Admin',
                    'img' => 'login-admin.jpg',
                    'url' => 'login'
                ]
            ];
            foreach ($data as $key => $value) :
            ?>
                <div class="col my-2">
                    <div class="card h-100">
                        <img class="card-img-top" src="<?= base_url('assets/img/front/' . $value['img']) ?>" alt="<?= $value['title'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $value['title'] ?></h5>
                            <!-- <p class="card-text">
                            Some quick example text to build on the card title and make up the bulk of the card's content.
                        </p> -->
                            <a href="<?= base_url($value['url']) ?>" class="btn btn-outline-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>