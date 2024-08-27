    <div class="misc-wrapper container relative">
        <h1>Halaman Mulai Memilih</h1>
        <div class="row d-flex justify-content-center mb-3">
            <?php foreach ($vote_data_d as $key => $value) : ?>
                <div class="col-4 my-2">
                    <div class="card h-100">
                        <img class="card-img-top" src="<?= base_url('uploads/img/vote_data_d/' . $value->foto) ?>" alt="<?= $value->nama ?>">
                        <div class="card-body">
                            <h4 class="card-title"><?= $value->nama ?></h4>
                            <p class="card-text">
                                <a href="<?= base_url('uploads/img/vote_data_d/' . $value->file) ?>" target="_blank">file Keterangan Pendukung</a>
                            </p>

                            <?php if ($c_sudah_memilih == 0) : ?>
                                <a href="#" class="btn btn-primary" onclick="vote(<?= $value->id ?>)">Pilih</a>
                            <?php else : ?>
                                <a href="#" class="btn btn-secondary" onclick='Swal.fire("Denied!", "Anda sudah memilih" , "error" )'>Pilih</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <a href="<?= base_url('logout') ?>" class="btn btn-secondary"><i class='bx bx-arrow-back'></i> Logout</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

    <script>
        function vote(id_vote_data_d) {
            $.ajax({
                url: '<?= base_url('mulai_memilih/getDataBy') ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    id_vote_data_d: id_vote_data_d
                },
                success: function(json) {
                    if (json != undefined) {
                        candidate_name = json.data.nama;
                        Swal.fire({
                            title: "Apakah anda yakin memilih " + candidate_name + "?",
                            showCancelButton: true,
                            icon: "question",
                            confirmButtonText: "IYA!",
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                $.ajax({
                                    url: '<?= base_url('mulai_memilih/save_vote') ?>',
                                    type: 'POST',
                                    dataType: 'json',
                                    data: {
                                        id_vote_data_d: id_vote_data_d
                                    },
                                    success: function(json) {
                                        if (json == 1) {
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Berhasil!',
                                                text: 'Pilihan anda berhasil disimpan!',
                                                timer: 3000,
                                                timerProgressBar: true,
                                                didClose: (toast) => {
                                                    location.reload();
                                                }
                                            });
                                        } else {
                                            Swal.fire("Saved!", "", "error");
                                        }
                                    }
                                });
                            }
                        });
                    }
                }
            });
        }
    </script>