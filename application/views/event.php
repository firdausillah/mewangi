    <div class="misc-wrapper container relative">
        <h1>Pilih Event</h1>
        <div class="row mb-2 d-flex justify-content-center">
            <?php foreach ($vote_data_h as $value) : ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card text-center mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><?= $value->nama ?></h5>
                            <p class="card-text">Periode pemilihan : </br> <?= $value->start_date . ' </br> s/d </br> ' . $value->end_date ?></p>
                            <a href="javascript:void(0)" class="btn btn-primary" onClick="modal_login_voters(<?= $value->id ?>)">Mulai Memilih</a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <a href="<?= base_url() ?>" class="btn btn-secondary"><i class='bx bx-arrow-back'></i> Kembali</a>
    </div>


    <div class="modal fade" id="modal_login_voters" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_login_votersTitle">Login Voters</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="identity_number" class="form-label">Nomor Identitas</label>
                            <input type="hidden" id="id_vote_data_h" name="id_vote_data_h" class="form-control">
                            <input type="text" id="identity_number" name="identity_number" class="form-control">
                            <small class="text-danger" id="msg_identity_number"></small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary" onClick="act_login_voters()">Login</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script>
        // $(document).ready(function() {
        //     var identity_number = '';
        //     $("#modal_login_voters").on('hide.bs.modal', function() {
        //         $('#identity_number').val('');
        //     });
        // });

        function modal_login_voters(id_vote_data_h) {
            $('#modal_login_voters input').val('');
            $('#msg_identity_number').html('');

            $('#id_vote_data_h').val(id_vote_data_h);
            $('#modal_login_voters').modal('show');
        }

        function act_login_voters() {
            id_vote_data_h = $('#id_vote_data_h').val();
            identity_number = $('#identity_number').val();
            $.ajax({
                url: '<?= base_url('event/login_voters') ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    id_vote_data_h: id_vote_data_h,
                    identity_number: identity_number
                },
                success: function(json) {
                    if (json != undefined) {
                        if (json == 1) {
                            window.location.replace('<?= base_url('mulai_memilih') ?>')
                        } else {
                            $('#msg_identity_number').html('nomor identitas yang ada masukan tidak terdaftar atau sudah digunakan!')
                        }
                    }
                }
            });
        }
    </script>