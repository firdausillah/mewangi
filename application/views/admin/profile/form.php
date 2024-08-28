<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><?= $title ? $title : '' ?></h5>
    </div>
    <div class="card-body">
        <?= form_open_multipart(base_url('admin/profile/save')) ?>
        <div class="mb-3">
            <label class="form-label" for="nama_sekolah">nama sekolah <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="nama_sekolah" id="nama_sekolah" value="<?= @$profile->nama_sekolah ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="nama_kepalasekolah">nama kepalasekolah <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="nama_kepalasekolah" id="nama_kepalasekolah" value="<?= @$profile->nama_kepalasekolah ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="foto">Logo</label>
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group input-group-merge">
                        <input class="form-control foto" type="file" name="foto">
                    </div>
                    <input type="hidden" class="form-control" value="<?= @$profile->foto ?>" name="file_name">
                </div>
                <div class="col-md-6">
                    <img src="<?= base_url('uploads/img/profile/' . @$profile->foto) ?>" height="200px" alt="">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="alamat">alamat</label>
            <input type="text" class="form-control" name="alamat" id="alamat" value="<?= @$profile->alamat ?>">
        </div>
        <div class="mb-3">
            <label class="form-label" for="tahun_ajaran">tahun ajaran <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="tahun_ajaran" id="tahun_ajaran" value="<?= @$profile->tahun_ajaran ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="cp_1">contact Person 1</label>
            <input type="text" class="form-control" name="cp_1" id="cp_1" value="<?= @$profile->cp_1 ?>">
        </div>
        <div class="mb-3">
            <label class="form-label" for="cp_2">contact Person 2</label>
            <input type="text" class="form-control" name="cp_2" id="cp_2" value="<?= @$profile->cp_2 ?>">
        </div>
        <div class="mb-3">
            <label class="form-label" for="website">website</label>
            <input type="text" class="form-control" name="website" id="website" value="<?= @$profile->website ?>">
        </div>
        <div class="mb-3">
            <label class="form-label" for="facebook">facebook</label>
            <input type="text" class="form-control" name="facebook" id="facebook" value="<?= @$profile->facebook ?>">
        </div>
        <div class="mb-3">
            <label class="form-label" for="youtube">youtube</label>
            <input type="text" class="form-control" name="youtube" id="youtube" value="<?= @$profile->youtube ?>">
        </div>
        <div class="mb-3">
            <label class="form-label" for="twitter">twitter</label>
            <input type="text" class="form-control" name="twitter" id="twitter" value="<?= @$profile->twitter ?>">
        </div>
        <div class="mb-3">
            <label class="form-label" for="instagram">instagram</label>
            <input type="text" class="form-control" name="instagram" id="instagram" value="<?= @$profile->instagram ?>">
        </div>
        <div class="mb-3">
            <label class="form-label" for="tiktok">tiktok</label>
            <input type="text" class="form-control" name="tiktok" id="tiktok" value="<?= @$profile->tiktok ?>">
        </div>
        <a href="<?= base_url() ?>admin/profile" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>