<div class="card p-3">
    <div class="d-flex justify-content-between">
        <h5 class="my-auto"><?= $title ? $title : '' ?></h5>
        <div>
            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#ImportSiswa">
                Import data
            </button>
            <a href="<?= base_url('admin/siswa?page=add') ?>" class="btn btn-sm btn-success my-auto">Tambah data</a>
        </div>
        <!-- <a href="" class="btn btn-info">Tambah data</a> -->
    </div>
    <div class="table-responsive text-nowrap mt-2">
        <table id="datatables_table" class="table table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>NISN</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Kelas</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <?php foreach ($siswa as $index => $item) : ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $item->nama ?></td>
                        <td><?= $item->nisn ?></td>
                        <td><?= $item->tempat_lahir ?></td>
                        <td><?= $item->tanggal_lahir ?></td>
                        <td><?= $item->kelas ?></td>
                        <td>
                            <a class="text-info" href="<?= base_url('admin/siswa?page=edit&id=' . $item->id) ?>"><i class="bx bx-edit-alt me-1"></i></a>
                            <a class="text-danger" href="#" onclick="confirmDelete('<?= base_url('admin/siswa/delete/' . $item->id) ?>')"><i class="bx bx-trash me-1"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Import -->

<div class="modal fade" id="ImportSiswa" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ImportSiswaLabel"><?= $title ? $title : 'Judul Page' ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open_multipart('admin/import_excel/import_data_siswa') ?>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">File Excel</label>
                    <input type="file" class="form-control" name="excel">
                </div>
                <div class="mb-3">
                    <label class="form-label">Download Template Excel Disini <a class="text-success" href="<?= base_url() ?>assets/import_template/siswa-master-import.xlsx">Download</a></label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm">Import</button>
            </div>
            </form>
        </div>
    </div>
</div>
