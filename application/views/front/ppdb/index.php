<?php $this->load->view('components/front_title') ?>

<section>
    <div class="container">
        <div class="card w-100 mb-3 border-0 shadow">
            <div class="card-body p-3">
                <?php 
                    if(date('Y-m-d') >= $ppdb_setting->tanggal_buka && date('Y-m-d') <= $ppdb_setting->tanggal_tutup) :
                ?>
                <div class="text-center mb-4">
                    <h4>Formulir Pendaftaran</h4>
                </div>
                <form class="g-3" action="<?= base_url('ppdb/save') ?>" method="post">
                    <div class="row">
                        <hr class="mt-3">
                        <div class="col-12 col-md-2">
                            <h6 class="fw-bold">Data Diri</h6>
                        </div>
                        <div class="col-12 col-md-10">
                            <div class="row">
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="nomor_pendaftaran" class="form-label">Nomor Pendaftaran</label>
                                    <input type="text" class="form-control" name="nomor_pendaftaran" id="nomor_pendaftaran">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="nama" id="nama">
                                </div>
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input type="number" class="form-control" name="nik" id="nik">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="nisn" class="form-label">NISN</label>
                                    <input type="number" class="form-control" name="nisn" id="nisn">
                                </div>
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="desa_siswa" class="form-label">Desa</label>
                                    <input type="text" class="form-control" name="desa_siswa" id="desa_siswa">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="kecamatan_siswa" class="form-label">Kecamatan</label>
                                    <input type="text" class="form-control" name="kecamatan_siswa" id="kecamatan_siswa">
                                </div>
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="kabupaten_siswa" class="form-label">Kabupaten</label>
                                    <input type="text" class="form-control" name="kabupaten_siswa" id="kabupaten_siswa">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="provinsi_siswa" class="form-label">Provinsi</label>
                                    <input type="text" class="form-control" name="provinsi_siswa" id="provinsi_siswa">
                                </div>
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="agama" class="form-label">Agama</label>
                                    <select class="form-control" name="agama" id="agama">
                                        <option value="">----Pilih Di Sini----</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen/Protestan">Kristen/Protestan</option>
                                        <option value="Katholik">Katholik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Khong Hu Cu">Khong Hu Cu</option>
                                        <option value="Kepercayaan Kpd Tuhan YME">Kepercayaan Kpd Tuhan YME</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="prestasi" class="form-label">Prestasi</label>
                                    <input type="text" class="form-control" name="prestasi" id="prestasi">
                                </div>
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="no_hp" class="form-label">No Hp</label>
                                    <input type="number" class="form-control" name="no_hp" id="no_hp">
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="is_tahfid" class="form-label">Tahfid</label>
                                    <select class="form-control" name="is_tahfid" id="is_tahfid">
                                        <option value="">----Pilih Di Sini----</option>
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 mt-3" id="kolom_jumlah_hafalan">
                                    <label for="jumlah_hafalan" class="form-label">Jumlah Hafalan</label>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-check">
                                                <input class="form-check-input" name="jumlah_hafalan[]" value="1" type="checkbox" value="" id="juz_1">
                                                <label class="form-check-label" for="juz_1">
                                                    Juz 1
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="jumlah_hafalan[]" value="2" type="checkbox" value="" id="juz_2">
                                                <label class="form-check-label" for="juz_2">
                                                    Juz 2
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="jumlah_hafalan[]" value="3" type="checkbox" value="" id="juz_3">
                                                <label class="form-check-label" for="juz_3">
                                                    Juz 3
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="jumlah_hafalan[]" value="4" type="checkbox" value="" id="juz_4">
                                                <label class="form-check-label" for="juz_4">
                                                    Juz 4
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="jumlah_hafalan[]" value="5" type="checkbox" value="" id="juz_5">
                                                <label class="form-check-label" for="juz_5">
                                                    Juz 5
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="jumlah_hafalan[]" value="6" type="checkbox" value="" id="juz_6">
                                                <label class="form-check-label" for="juz_6">
                                                    Juz 6
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="jumlah_hafalan[]" value="7" type="checkbox" value="" id="juz_7">
                                                <label class="form-check-label" for="juz_7">
                                                    Juz 7
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="jumlah_hafalan[]" value="8" type="checkbox" value="" id="juz_8">
                                                <label class="form-check-label" for="juz_8">
                                                    Juz 8
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="jumlah_hafalan[]" value="9" type="checkbox" value="" id="juz_9">
                                                <label class="form-check-label" for="juz_9">
                                                    Juz 9
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="jumlah_hafalan[]" value="10" type="checkbox" value="" id="juz_10">
                                                <label class="form-check-label" for="juz_10">
                                                    Juz 10
                                                </label>
                                            </div>

                                        </div>
                                        <div class="col-4">
                                            <div class="form-check">
                                                <input class="form-check-input" name="jumlah_hafalan[]" value="11" type="checkbox" value="" id="juz_11">
                                                <label class="form-check-label" for="juz_11">
                                                    Juz 11
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="jumlah_hafalan[]" value="12" type="checkbox" value="" id="juz_12">
                                                <label class="form-check-label" for="juz_12">
                                                    Juz 12
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="jumlah_hafalan[]" value="13" type="checkbox" value="" id="juz_13">
                                                <label class="form-check-label" for="juz_13">
                                                    Juz 13
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="jumlah_hafalan[]" value="14" type="checkbox" value="" id="juz_14">
                                                <label class="form-check-label" for="juz_14">
                                                    Juz 14
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="jumlah_hafalan[]" value="15" type="checkbox" value="" id="juz_15">
                                                <label class="form-check-label" for="juz_15">
                                                    Juz 15
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="jumlah_hafalan[]" value="16" type="checkbox" value="" id="juz_16">
                                                <label class="form-check-label" for="juz_16">
                                                    Juz 16
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="jumlah_hafalan[]" value="17" type="checkbox" value="" id="juz_17">
                                                <label class="form-check-label" for="juz_17">
                                                    Juz 17
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="jumlah_hafalan[]" value="18" type="checkbox" value="" id="juz_18">
                                                <label class="form-check-label" for="juz_18">
                                                    Juz 18
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="jumlah_hafalan[]" value="19" type="checkbox" value="" id="juz_19">
                                                <label class="form-check-label" for="juz_19">
                                                    Juz 19
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="jumlah_hafalan[]" value="20" type="checkbox" value="" id="juz_20">
                                                <label class="form-check-label" for="juz_20">
                                                    Juz 20
                                                </label>
                                            </div>

                                        </div>
                                        <div class="col-4">
                                            <div class="form-check">
                                                <input class="form-check-input" name="jumlah_hafalan[]" value="21" type="checkbox" value="" id="juz_21">
                                                <label class="form-check-label" for="juz_21">
                                                    Juz 21
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="jumlah_hafalan[]" value="22" type="checkbox" value="" id="juz_22">
                                                <label class="form-check-label" for="juz_22">
                                                    Juz 22
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="jumlah_hafalan[]" value="23" type="checkbox" value="" id="juz_23">
                                                <label class="form-check-label" for="juz_23">
                                                    Juz 23
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="jumlah_hafalan[]" value="24" type="checkbox" value="" id="juz_24">
                                                <label class="form-check-label" for="juz_24">
                                                    Juz 24
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="jumlah_hafalan[]" value="25" type="checkbox" value="" id="juz_25">
                                                <label class="form-check-label" for="juz_25">
                                                    Juz 25
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="jumlah_hafalan[]" value="26" type="checkbox" value="" id="juz_26">
                                                <label class="form-check-label" for="juz_26">
                                                    Juz 26
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="jumlah_hafalan[]" value="27" type="checkbox" value="" id="juz_27">
                                                <label class="form-check-label" for="juz_27">
                                                    Juz 27
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="jumlah_hafalan[]" value="28" type="checkbox" value="" id="juz_28">
                                                <label class="form-check-label" for="juz_28">
                                                    Juz 28
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="jumlah_hafalan[]" value="29" type="checkbox" value="" id="juz_29">
                                                <label class="form-check-label" for="juz_29">
                                                    Juz 29
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="jumlah_hafalan[]" value="30" type="checkbox" value="" id="juz_30">
                                                <label class="form-check-label" for="juz_30">
                                                    Juz 30
                                                </label>
                                            </div>

                                        </div>

                                    </div>
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
                                    <input type="text" class="form-control" name="nama_ayah" id="nama_ayah">
                                </div>
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="pekerjaan_ayah" class="form-label">Pekerjaan</label>
                                    <input type="text" class="form-control" name="pekerjaan_ayah" id="pekerjaan_ayah">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="no_hp_ayah" class="form-label">No Hp</label>
                                    <input type="number" class="form-control" name="no_hp_ayah" id="no_hp_ayah">
                                </div>
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="desa_ayah" class="form-label">Desa</label>
                                    <input type="text" class="form-control" name="desa_ayah" id="desa_ayah">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="kecamatan_ayah" class="form-label">Kecamatan</label>
                                    <input type="text" class="form-control" name="kecamatan_ayah" id="kecamatan_ayah">
                                </div>
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="kabupaten_ayah" class="form-label">Kabupaten</label>
                                    <input type="text" class="form-control" name="kabupaten_ayah" id="kabupaten_ayah">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="provinsi_ayah" class="form-label">Provinsi</label>
                                    <input type="text" class="form-control" name="provinsi_ayah" id="provinsi_ayah">
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
                                    <input type="text" class="form-control" name="nama_ibu" id="nama_ibu">
                                </div>
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="pekerjaan_ibu" class="form-label">Pekerjaan</label>
                                    <input type="text" class="form-control" name="pekerjaan_ibu" id="pekerjaan_ibu">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="no_hp_ibu" class="form-label">Ho Hp</label>
                                    <input type="number" class="form-control" name="no_hp_ibu" id="no_hp_ibu">
                                </div>
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="desa_ibu" class="form-label">Desa</label>
                                    <input type="text" class="form-control" name="desa_ibu" id="desa_ibu">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="kecamatan_ibu" class="form-label">Kecamatan</label>
                                    <input type="text" class="form-control" name="kecamatan_ibu" id="kecamatan_ibu">
                                </div>
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="kabupaten_ibu" class="form-label">Kabupaten</label>
                                    <input type="text" class="form-control" name="kabupaten_ibu" id="kabupaten_ibu">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="provinsi_ibu" class="form-label">Provinsi</label>
                                    <input type="text" class="form-control" name="provinsi_ibu" id="provinsi_ibu">
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
                                    <input type="text" class="form-control" name="nama_wali" id="nama_wali">
                                </div>
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="pekerjaan_wali" class="form-label">Pekerjaan</label>
                                    <input type="text" class="form-control" name="pekerjaan_wali" id="pekerjaan_wali">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="no_hp_wali" class="form-label">No Hp</label>
                                    <input type="number" class="form-control" name="no_hp_wali" id="no_hp_wali">
                                </div>
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="desa_wali" class="form-label">Desa</label>
                                    <input type="text" class="form-control" name="desa_wali" id="desa_wali">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="kecamatan_wali" class="form-label">Kecamatan</label>
                                    <input type="text" class="form-control" name="kecamatan_wali" id="kecamatan_wali">
                                </div>
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="kabupaten_wali" class="form-label">Kabupaten</label>
                                    <input type="text" class="form-control" name="kabupaten_wali" id="kabupaten_wali">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="provinsi_wali" class="form-label">Provinsi</label>
                                    <input type="text" class="form-control" name="provinsi_wali" id="provinsi_wali">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary px-5"> Daftar</button>
                        </div>

                    </div>
                </form>
                <?php else: ?>
                <div class="text-center mb-4">
                    <h4>Pendaftaran Belum Dibuka</h4>
                </div>
                <?php endif; ?>
            </div>
        </div>

    </div>

</section>

<script>
    $(document).ready(function() {
        $('#kolom_jumlah_hafalan').hide();
    });

    $('#is_tahfid').on('change', function() {
        var is_tahfid = $(this).val();
        console.log(is_tahfid);
        if (is_tahfid == 1) {
            $('#kolom_jumlah_hafalan').show(500);
        } else {
            $('#kolom_jumlah_hafalan').hide(500);
        }
    });
</script>