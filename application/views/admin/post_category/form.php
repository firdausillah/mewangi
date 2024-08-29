<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><?= $title ? $title : '' ?></h5>
    </div>
    <div class="card-body">
        <?= form_open_multipart(base_url('admin/post_category/save')) ?>
        <input type="hidden" name="id" value="<?= @$post_category->id ?>">
        <div class="mb-3">
            <label class="form-label" for="nama">nama <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="nama" id="nama" value="<?= @$post_category->nama ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="keterangan">keterangan</label>
            <input type="text" class="form-control" name="keterangan" id="keterangan" value="<?= @$post_category->keterangan ?>">
        </div>
        <a href="<?= base_url('admin/post_category') ?>" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>