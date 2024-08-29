<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><?= $title ? $title : '' ?></h5>
    </div>
    <div class="card-body">
        <?= form_open_multipart(base_url('admin/trainer/save')) ?>
        <input type="hidden" name="id" value="<?= @$trainer->id ?>">
        <div class="mb-3">
            <label class="form-label" for="nama">nama <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="nama" id="nama" value="<?= @$trainer->nama ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="username">username <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="username" id="username" value="<?= @$trainer->username ?>">
        </div>
        <div class="mb-3">
            <label class="form-label" for="password">password <span class="text-danger">*</span></label>
            <input type="password" class="form-control" name="password" id="password" value="<?= @$trainer->password ?>">
        </div>
        <div class="mb-3">
            <label class="form-label" for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="<?= @$trainer->email ?>">
        </div>
        <div class="mb-3">
            <label class="form-label" for="nomor_telepon">Nomor Whatsapp</label>
            <input type="text" class="form-control" name="nomor_telepon" id="nomor_telepon" value="<?= @$trainer->nomor_telepon ?>">
        </div>
        <div class="mb-3">
            <label class="form-label" for="specialization">Spesifikasi</label>
            <!-- <input type="text" class="form-control" name="specialization" id="specialization" value="<?= @$trainer->specialization ?>"> -->
            <textarea class="form-control" name="specialization" id="specialization" cols="10" rows="5"><?= @$trainer->specialization ?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label" for="foto">Foto</label>
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group input-group-merge">
                        <input class="form-control foto" type="file" name="foto">
                    </div>
                    <input type="hidden" class="form-control foto" type="input" name="file_foto" id="file_foto">
                    <input type="hidden" class="form-control" value="<?= @$trainer->foto ?>" name="gambar">
                </div>
                <div class="col-md-6">
                    <img src="<?= base_url('uploads/img/trainer/' . @$trainer->foto) ?>" height="200px" alt="">
                </div>
            </div>
        </div>
        <a href="<?= base_url('admin/post/'.$post_type) ?>" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>