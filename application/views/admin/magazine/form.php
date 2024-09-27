<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><?= $title ? $title : '' ?></h5>
    </div>
    <div class="card-body">
        <?= form_open_multipart(base_url('admin/magazine/save')) ?>
        <input type="hidden" name="id" value="<?= @$magazine->id ?>">
        <div class="mb-3">
            <label class="form-label" for="nama">judul <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="nama" id="nama" value="<?= @$magazine->nama ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="keterangan">keterangan <span class="text-danger">*</span></label>
            <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="10"><?= @$magazine->keterangan ?></textarea>
        </div>
        <!-- <div class="mb-3">
            <label class="form-label" for="link">link</label>
            <input type="text" class="form-control" name="link" id="link" value="<?= @$magazine->link ?>">
        </div> -->
        <div class="mb-3">
            <label class="form-label" for="foto">Foto</label>
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group input-group-merge">
                        <input class="form-control foto" type="file" name="foto">
                    </div>
                    <input type="hidden" class="form-control foto" type="input" name="file_foto" id="file_foto">
                    <input type="hidden" class="form-control" value="<?= @$magazine->foto ?>" name="gambar">
                </div>
                <div class="col-md-6">
                    <img src="<?= base_url('uploads/img/magazine/' . @$magazine->foto) ?>" height="200px" alt="">
                </div>
            </div>
        </div>
        <div class="mb-3" id="file">
            <label class="form-label" for="file">File</label>
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group input-group-merge">
                        <input class="form-control file" type="file" name="file">
                    </div>
                    <input type="hidden" class="form-control" value="<?= @$magazine->file ?>" name="file_name">
                </div>
                <div class="col-md-6">
                    <a href="<?= base_url('uploads/file/magazine/' . @$magazine->file) ?>" target="_blank" class="text-black">File : <span class="text-info"><?= @$magazine->file ?></span></a>
                </div>
            </div>
        </div>
        <a href="<?= base_url('admin/magazine') ?>" class="btn btn-secondary">Batal</a>
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