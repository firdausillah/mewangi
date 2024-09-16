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

                <div class="responsive-table" id="table_data_siswa">
                    <table class="table mt-5">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</section>

<script>
    $(document).ready(function() {
        $('#table_data_siswa').hide();
    });

    function action_search_siswa() {
        var nama = $('#nama').val();
        var kelas = $('#kelas').val();
        $.ajax({
            url: '<?= base_url('siswa/getSiswa') ?>',
            type: 'GET',
            data: {
                nama: nama,
                kelas: kelas
            },
            dataType: 'json',
            success: function(json) {
                if (json.data != '') {
                    $('#table_data_siswa').show(1000);

                } else {
                    $('#table_data_siswa').hide(1000);
                }
                
                nama = '';
                kelas = '';
            }
        });
    }
</script>