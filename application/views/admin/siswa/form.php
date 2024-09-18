<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><?= $title ? $title : '' ?></h5>
    </div>
    <div class="card-body">
        <?= form_open_multipart(base_url('admin/banner/save')) ?>
        <input type="hidden" name="id" value="<?= @$banner->id ?>">
        <div class="mb-3">
            <label class="form-label" for="nama">judul <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="nama" id="nama" value="<?= @$banner->nama ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="urutan">urutan tampil di web</label>
            <input type="number" class="form-control" name="urutan" id="urutan" value="<?= @$banner->urutan ?>">
            <small>urut dari yang terkecil</small>
        </div>
        <div class="mb-3">
            <label class="form-label" for="is_tampil">tampilkan judul</label>
            <select name="is_tampil" id="is_tampil" class="form-control">
                <option value="">--Pilih--</option>
                <option value="1" <?= @$banner->is_tampil == '1' ? 'selected' : '' ?>>Ya</option>
                <option value="0" <?= @$banner->is_tampil == '0' ? 'selected' : '' ?>>Tidak</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="keterangan">keterangan <span class="text-danger">*</span></label>
            <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="10"><?= @$banner->keterangan ?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label" for="link">link</label>
            <input type="text" class="form-control" name="link" id="link" value="<?= @$banner->link ?>">
            <small>lengkap dengan http://. contoh. https://www.google.com/</small>
        </div>
        <div class="mb-3">
            <label class="form-label" for="foto">Foto</label>
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group input-group-merge">
                        <input class="form-control foto" type="file" name="foto">
                    </div>
                    <input type="hidden" class="form-control foto" type="input" name="file_foto" id="file_foto">
                    <input type="hidden" class="form-control" value="<?= @$banner->foto ?>" name="gambar">
                </div>
                <div class="col-md-6">
                    <img src="<?= base_url('uploads/img/banner/' . @$banner->foto) ?>" height="200px" alt="">
                </div>
            </div>
        </div>
        <a href="<?= base_url('admin/banner/') ?>" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

<script src="<?= base_url(); ?>assets/js/ckeditor.js"></script>

<script>
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