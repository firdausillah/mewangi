<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><?= $title ? $title : '' ?></h5>
    </div>
    <div class="card-body">
        <?= form_open_multipart(base_url('admin/post/save')) ?>
        <input type="hidden" name="id" value="<?= @$post->id ?>">
        <div class="mb-3">
            <label class="form-label" for="nama">judul <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="nama" id="nama" value="<?= @$post->nama ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="content">content <span class="text-danger">*</span></label>
            <textarea class="form-control" name="content" id="content" cols="30" rows="10"><?= @$post->content ?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label" for="id_post_category">Post Category</label>
            <select class="form-control" name="id_post_category" id="id_post_category">
                <option value="">--Pilih--</option>
                <?php foreach ($post_category as $key => $value) : ?>
                    <option value="<?= $value->id ?>" <?= @$post->id_post_category == $value->id ? 'selected' : '' ?>><?= $value->nama ?></option>
                <?php endforeach; ?>

            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="tags">tags</label>
            <input type="text" class="form-control" name="tags" id="tags" value="<?= @$post->tags_t_nama ?>">
            <small>masukan tags dipisahkan dengan koma tanpa spasi. contoh: teknologi,google,internet</small>
        </div>
        <div class="mb-3">
            <label class="form-label" for="post_type">post type <span class="text-danger">*</span></label>
            <?php if ($post_type == 'opinion') : ?>
                <input type="text" class="form-control" name="post_type" id="post_type" value="opinion" readonly>
            <?php else : ?>
                <select class="form-control" name="post_type" id="post_type">
                    <option value="">--Pilih--</option>
                    <option value="berita" <?= @$post->post_type == 'berita' ? 'selected' : '' ?>>Berita</option>
                    <option value="artikel" <?= @$post->post_type == 'artikel' ? 'selected' : '' ?>>Artikel</option>
                </select>
            <?php endif ?>
        </div>
        <div class="mb-3">
            <label class="form-label" for="foto">Foto</label>
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group input-group-merge">
                        <input class="form-control foto" type="file" name="foto">
                    </div>
                    <input type="hidden" class="form-control foto" type="input" name="file_foto" id="file_foto">
                    <input type="hidden" class="form-control" value="<?= @$post->foto ?>" name="gambar">
                </div>
                <div class="col-md-6">
                    <img src="<?= base_url('uploads/img/post/' . @$post->foto) ?>" height="200px" alt="">
                </div>
            </div>
        </div>
        <a href="<?= base_url('admin/post/' . $post_type) ?>" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

<script src="<?= base_url(); ?>assets/js/ckeditor.js"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#content'), {
            // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
        })
        .then(editor => {
            window.editor = editor;
        })
        .catch(err => {
            console.error(err.stack);
        });
</script>