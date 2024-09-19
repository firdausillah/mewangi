<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><?= $title ? $title : '' ?></h5>
    </div>
    <div class="card-body">
        <?= form_open_multipart(base_url('admin/siswa/save')) ?>
        <input type="hidden" name="id" value="<?= @$siswa->id ?>">
        <div class="mb-3">
            <label class="form-label" for="nama">nama <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="nama" id="nama" value="<?= @$siswa->nama ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="nisn">nisn</label>
            <input type="text" class="form-control" name="nisn" id="nisn" value="<?= @$siswa->nisn ?>">
        </div>
        <div class="mb-3">
            <label class="form-label" for="tempat_lahir">tempat lahir</label>
            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="<?= @$siswa->tempat_lahir ?>">
        </div>
        <div class="mb-3">
            <label class="form-label" for="tanggal_lahir">tanggal lahir</label>
            <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="<?= @$siswa->tanggal_lahir ?>">
        </div>
        <div class="mb-3">
            <label class="form-label" for="kelas">kelas</label>
            <input type="text" class="form-control" name="kelas" id="kelas" value="<?= @$siswa->kelas ?>">
        </div>
        <a href="<?= base_url('admin/siswa/') ?>" class="btn btn-secondary">Batal</a>
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