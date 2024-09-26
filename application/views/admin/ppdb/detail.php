<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><?= $title ? $title : '' ?></h5>
    </div>
    <div class="card-body">
        <div class="row">
            <hr class="mt-3">
            <div class="col-12 col-md-2">
                <h6 class="fw-bold">Data Diri</h6>
            </div>
            <div class="col-12 col-md-10">
                <div class="row">
                    <div class="col-12 col-md-6 mt-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" value="<?= $siswa_baru->nama ?>" id="nama">
                    </div>
                    <div class="col-12 col-md-6 mt-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="number" class="form-control" name="nik" value="<?= $siswa_baru->nik ?>" id="nik">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 mt-3">
                        <label for="nisn" class="form-label">NISN</label>
                        <input type="number" class="form-control" name="nisn" value="<?= $siswa_baru->nisn ?>" id="nisn">
                    </div>
                    <div class="col-12 col-md-6 mt-3">
                        <label for="desa_siswa" class="form-label">Desa</label>
                        <input type="text" class="form-control" name="desa_siswa" value="<?= $siswa_baru->desa_siswa ?>" id="desa_siswa">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 mt-3">
                        <label for="kecamatan_siswa" class="form-label">Kecamatan</label>
                        <input type="text" class="form-control" name="kecamatan_siswa" value="<?= $siswa_baru->kecamatan_siswa ?>" id="kecamatan_siswa">
                    </div>
                    <div class="col-12 col-md-6 mt-3">
                        <label for="kabupaten_siswa" class="form-label">Kabupaten</label>
                        <input type="text" class="form-control" name="kabupaten_siswa" value="<?= $siswa_baru->kabupaten_siswa ?>" id="kabupaten_siswa">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 mt-3">
                        <label for="provinsi_siswa" class="form-label">Provinsi</label>
                        <input type="text" class="form-control" name="provinsi_siswa" value="<?= $siswa_baru->provinsi_siswa ?>" id="provinsi_siswa">
                    </div>
                    <div class="col-12 col-md-6 mt-3">
                        <label for="agama" class="form-label">Agama</label>
                        <input class="form-control" name="agama" value="<?= $siswa_baru->agama ?>" id="agama">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 mt-3">
                        <label for="prestasi" class="form-label">Prestasi</label>
                        <input type="text" class="form-control" name="prestasi" value="<?= $siswa_baru->prestasi ?>" id="prestasi">
                    </div>
                    <div class="col-12 col-md-6 mt-3">
                        <label for="no_hp" class="form-label">No Hp</label>
                        <input type="number" class="form-control" name="no_hp" value="<?= $siswa_baru->no_hp ?>" id="no_hp">
                    </div>

                </div>
                <div class="row">
                    <div class="col-12 col-md-6 mt-3">
                        <label for="is_tahfid" class="form-label">Tahfid</label>
                        <input class="form-control" name="is_tahfid" value="<?= $siswa_baru->is_tahfid == 1 ? 'Iya' : 'Tidak' ?>" id="is_tahfid">
                    </div>
                    <div class="col-12 col-md-6 mt-3" id="kolom_jumlah_hafalan">
                        <label for="jumlah_hafalan" class="form-label">Jumlah Hafalan</label>
                        <input class="form-control" name="jumlah_hafalan" value="<?= $siswa_baru->jumlah_hafalan ?>" id="jumlah_hafalan">
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <hr class="mt-3">
            <div class="col-12 col-md-2">
                <h6 class="fw-bold">Data Ayah</h6>
            </div>
            <div class="col-12 col-md-10">
                <div class="row">
                    <div class="col-12 col-md-6 mt-3">
                        <label for="nama_ayah" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama_ayah" value="<?= $siswa_baru->nama_ayah ?>" id="nama_ayah">
                    </div>
                    <div class="col-12 col-md-6 mt-3">
                        <label for="pekerjaan_ayah" class="form-label">Pekerjaan</label>
                        <input type="text" class="form-control" name="pekerjaan_ayah" value="<?= $siswa_baru->pekerjaan_ayah ?>" id="pekerjaan_ayah">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 mt-3">
                        <label for="no_hp_ayah" class="form-label">No Hp</label>
                        <input type="number" class="form-control" name="no_hp_ayah" value="<?= $siswa_baru->no_hp_ayah ?>" id="no_hp_ayah">
                    </div>
                    <div class="col-12 col-md-6 mt-3">
                        <label for="desa_ayah" class="form-label">Desa</label>
                        <input type="text" class="form-control" name="desa_ayah" value="<?= $siswa_baru->desa_ayah ?>" id="desa_ayah">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 mt-3">
                        <label for="kecamatan_ayah" class="form-label">Kecamatan</label>
                        <input type="text" class="form-control" name="kecamatan_ayah" value="<?= $siswa_baru->kecamatan_ayah ?>" id="kecamatan_ayah">
                    </div>
                    <div class="col-12 col-md-6 mt-3">
                        <label for="kabupaten_ayah" class="form-label">Kabupaten</label>
                        <input type="text" class="form-control" name="kabupaten_ayah" value="<?= $siswa_baru->kabupaten_ayah ?>" id="kabupaten_ayah">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 mt-3">
                        <label for="provinsi_ayah" class="form-label">Provinsi</label>
                        <input type="text" class="form-control" name="provinsi_ayah" value="<?= $siswa_baru->provinsi_ayah ?>" id="provinsi_ayah">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <hr class="mt-3">
            <div class="col-12 col-md-2">
                <h6 class="fw-bold">Data Ibu</h6>
            </div>
            <div class="col-12 col-md-10">
                <div class="row">
                    <div class="col-12 col-md-6 mt-3">
                        <label for="nama_ibu" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama_ibu" value="<?= $siswa_baru->nama_ibu ?>" id="nama_ibu">
                    </div>
                    <div class="col-12 col-md-6 mt-3">
                        <label for="pekerjaan_ibu" class="form-label">Pekerjaan</label>
                        <input type="text" class="form-control" name="pekerjaan_ibu" value="<?= $siswa_baru->pekerjaan_ibu ?>" id="pekerjaan_ibu">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 mt-3">
                        <label for="no_hp_ibu" class="form-label">Ho Hp</label>
                        <input type="number" class="form-control" name="no_hp_ibu" value="<?= $siswa_baru->no_hp_ibu ?>" id="no_hp_ibu">
                    </div>
                    <div class="col-12 col-md-6 mt-3">
                        <label for="desa_ibu" class="form-label">Desa</label>
                        <input type="text" class="form-control" name="desa_ibu" value="<?= $siswa_baru->desa_ibu ?>" id="desa_ibu">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 mt-3">
                        <label for="kecamatan_ibu" class="form-label">Kecamatan</label>
                        <input type="text" class="form-control" name="kecamatan_ibu" value="<?= $siswa_baru->kecamatan_ibu ?>" id="kecamatan_ibu">
                    </div>
                    <div class="col-12 col-md-6 mt-3">
                        <label for="kabupaten_ibu" class="form-label">Kabupaten</label>
                        <input type="text" class="form-control" name="kabupaten_ibu" value="<?= $siswa_baru->kabupaten_ibu ?>" id="kabupaten_ibu">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 mt-3">
                        <label for="provinsi_ibu" class="form-label">Provinsi</label>
                        <input type="text" class="form-control" name="provinsi_ibu" value="<?= $siswa_baru->provinsi_ibu ?>" id="provinsi_ibu">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <hr class="mt-3">
            <div class="col-12 col-md-2">
                <h6 class="fw-bold">Data Wali</h6>
            </div>
            <div class="col-12 col-md-10">
                <div class="row">
                    <div class="col-12 col-md-6 mt-3">
                        <label for="nama_wali" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama_wali" value="<?= $siswa_baru->nama_wali ?>" id="nama_wali">
                    </div>
                    <div class="col-12 col-md-6 mt-3">
                        <label for="pekerjaan_wali" class="form-label">Pekerjaan</label>
                        <input type="text" class="form-control" name="pekerjaan_wali" value="<?= $siswa_baru->pekerjaan_wali ?>" id="pekerjaan_wali">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 mt-3">
                        <label for="no_hp_wali" class="form-label">No Hp</label>
                        <input type="number" class="form-control" name="no_hp_wali" value="<?= $siswa_baru->no_hp_wali ?>" id="no_hp_wali">
                    </div>
                    <div class="col-12 col-md-6 mt-3">
                        <label for="desa_wali" class="form-label">Desa</label>
                        <input type="text" class="form-control" name="desa_wali" value="<?= $siswa_baru->desa_wali ?>" id="desa_wali">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 mt-3">
                        <label for="kecamatan_wali" class="form-label">Kecamatan</label>
                        <input type="text" class="form-control" name="kecamatan_wali" value="<?= $siswa_baru->kecamatan_wali ?>" id="kecamatan_wali">
                    </div>
                    <div class="col-12 col-md-6 mt-3">
                        <label for="kabupaten_wali" class="form-label">Kabupaten</label>
                        <input type="text" class="form-control" name="kabupaten_wali" value="<?= $siswa_baru->kabupaten_wali ?>" id="kabupaten_wali">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 mt-3">
                        <label for="provinsi_wali" class="form-label">Provinsi</label>
                        <input type="text" class="form-control" name="provinsi_wali" value="<?= $siswa_baru->provinsi_wali ?>" id="provinsi_wali">
                    </div>
                </div>
            </div>
        </div>
        <a href="<?= base_url('admin/ppdb') ?>" class="btn btn-secondary">Kembali</a>
    </div>
</div>

<script src="<?= base_url(); ?>assets/js/ckeditor.js"></script>

<script>
    $(document).ready(function() {
        var is_video = $('#is_video').val();
        if (is_video == 1) {
            $("#foto").hide();
        } else {
            $("#foto").show();
        }
    });
    $('#is_video').change(function() {
        var is_video = $(this).val();
        if (is_video == 1) {
            $("#foto").hide();
        } else {
            $("#foto").show();
        }
    });

    ClassicEditor
        .create(document.querySelector('#keterangan'), {
            // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
        })
        .then(editor => {
            window.editor = editor;
        })
        .catch(err => {
            console.error(err.stack);
        });
</script>