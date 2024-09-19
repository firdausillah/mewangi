<?php $this->load->view('components/front_title') ?>

<section>
    <div class="container">
        <div class="card w-100 mb-3 border-0 shadow">
            <div class="card-body p-3">
                <form class="row g-3" onsubmit="return false">
                    <div class="col-md-6">
                        <label for="nama" class="form-label">Nama Siswa</label>
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

                <div class="table-responsive text-nowrap mt-2" data-aos="fade-up" data-aos-delay="200" id="table_container">
                    <table id="table_data_siswa" class="table table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>NISN</th>
                                <th>Tempat, Tanggal Lahir</th>
                                <th>Kelas</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

    </div>

</section>

<script>
    $(document).ready(function() {
        $('#table_container').hide();
        table_data_siswa = $('#table_data_siswa').DataTable({
            url: '<?= base_url('siswa/getSiswa') ?>',
            responsive: true,
            order: [
                [0, 'desc']
            ],
            columns: [{
                    data: 'id',
                    visible: false
                },
                {
                    data: 'nama'
                },
                {
                    data: 'nisn'
                },
                {
                    data: 'ttl'
                },
                {
                    data: 'kelas'
                }
            ],
            columnDefs: [{
                orderable: false,
                className: 'select-checkbox',
                targets: 0
            }]
        });
    });

    function action_search_siswa() {
        // Loading.fire({})
        var nama = $('#nama').val();
        var kelas = $('#kelas').val();

        table_data_siswa.ajax.url('<?= base_url('siswa/getSiswa?nama=') ?>' + nama + '&kelas=' + kelas).load(function() {
            // Swal.close()
            $('#table_container').show(1000);
        });
    }
</script>