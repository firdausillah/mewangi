<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><?= $title ? $title : '' ?></h5>
    </div>
    <div class="card-body">
        <?= form_open_multipart(base_url('admin/download/save')) ?>
        <input type="hidden" name="id" value="<?= @$download->id ?>">
        <div class="mb-3">
            <label class="form-label" for="nama">judul <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="nama" id="nama" value="<?= @$download->nama ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="keterangan">keterangan</label>
            <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="10"><?= @$download->keterangan ?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label" for="is_file">File</label>
            <select name="is_file" id="is_file" class="form-control">
                <option value="1" <?= @$download->is_file == '1' ? 'selected' : '' ?>>Ya</option>
                <option value="0" <?= @$download->is_file == '0' ? 'selected' : '' ?>>Tidak</option>
            </select>
        </div>
        <div class="mb-3" id="link">
            <label class="form-label" for="link">link</label>
            <input type="text" class="form-control" name="link" value="<?= @$download->link ?>">
            <small>lengkap dengan http://. contoh. https://www.google.com/</small>
        </div>
        <div class="mb-3" id="file">
            <label class="form-label" for="file">File</label>
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group input-group-merge">
                        <input class="form-control file" type="file" name="file">
                    </div>
                    <input type="hidden" class="form-control" value="<?= @$download->file ?>" name="file_name">
                </div>
                <div class="col-md-6">
                    <a href="<?= base_url('uploads/file/download/' . @$download->file) ?>" target="_blank" class="text-black">File : <span class="text-info"><?= @$download->file ?></span></a>
                </div>
            </div>
        </div>
        <a href="<?= base_url('admin/download/') ?>" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

<script src="<?= base_url(); ?>assets/js/ckeditor.js"></script>

<script>
    $(document).ready(function() {
        var is_file = $('#is_file').val();
        if (is_file == 1) {
            $("#file").show();
            $("#link").hide();
        } else {
            $("#file").hide();
            $("#link").show();
        }
    });
    $('#is_file').change(function() {
        var is_file = $(this).val();
        if (is_file == 1) {
            $("#file").show();
            $("#link").hide();
        } else {
            $("#file").hide();
            $("#link").show();
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