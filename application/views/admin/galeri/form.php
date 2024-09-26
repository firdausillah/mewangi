<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><?= $title ? $title : '' ?></h5>
    </div>
    <div class="card-body">
        <?= form_open_multipart(base_url('admin/galeri/save')) ?>
        <input type="hidden" name="id" value="<?= @$galeri->id ?>">
        <div class="mb-3">
            <label class="form-label" for="nama">judul <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="nama" id="nama" value="<?= @$galeri->nama ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="is_video">Video</label>
            <select name="is_video" id="is_video" class="form-control">
                <option value="0" <?= @$galeri->is_video == '0' ? 'selected' : '' ?>>Tidak</option>
                <option value="1" <?= @$galeri->is_video == '1' ? 'selected' : '' ?>>Ya</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="keterangan">keterangan <span class="text-danger">*</span></label>
            <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="10"><?= @$galeri->keterangan ?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label" for="link">link</label>
            <input type="text" class="form-control" name="link" id="link" value="<?= @$galeri->link ?>">
            <small>lengkap dengan http://. contoh. https://www.google.com/</small>
        </div>
        <div class="mb-3" id="foto">
            <label class="form-label" for="foto">Foto</label>
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group input-group-merge">
                        <input class="form-control foto" type="file" name="foto">
                    </div>
                    <input type="hidden" class="form-control foto" type="input" name="file_foto" id="file_foto">
                    <input type="hidden" class="form-control" value="<?= @$galeri->foto ?>" name="gambar">
                </div>
                <div class="col-md-6">
                    <img src="<?= base_url('uploads/img/galeri/' . @$galeri->foto) ?>" height="200px" alt="">
                </div>
            </div>
        </div>
        <a href="<?= base_url('admin/galeri/') ?>" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

<script src="<?= base_url(); ?>assets/js/ckeditor.js"></script>

<script>
    $(document).ready(function() {
        // var is_video = $('#is_video').val();
        // if (is_video == 1) {
        //     $("#foto").hide();
        // } else {
        //     $("#foto").show();
        // }
    });
    // $('#is_video').change(function() {
    //     var is_video = $(this).val();
    //     if (is_video == 1) {
    //         $("#foto").hide();
    //     } else {
    //         $("#foto").show();
    //     }
    // });

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