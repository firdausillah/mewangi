<div class="card p-3">
    <div class="d-flex justify-content-between">
        <h5 class="my-auto"><?= $title ? $title : '' ?></h5>
        <div>
            <!-- <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#Importptk">
                Import data
            </button> -->
            <a href="<?= base_url('admin/ptk?page=add') ?>" class="btn btn-sm btn-success my-auto">Tambah data</a>
        </div>
        <!-- <a href="" class="btn btn-info">Tambah data</a> -->
    </div>
    <div class="table-responsive text-nowrap mt-2">
        <table id="datatables_table" class="table table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Foto</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <?php foreach ($ptk as $index => $item) : ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $item->nama ?></td>
                        <td><?= $item->jabatan ?></td>
                        <td><img src="<?= base_url('uploads/img/ptk/' . @$item->foto) ?>" height="100px" alt=""><img src="<?= $item->foto ?>" alt=""></td>
                        <td>
                            <a class="text-info" href="<?= base_url('admin/ptk?page=edit&id=' . $item->id) ?>"><i class="bx bx-edit-alt me-1"></i></a>
                            <a class="text-danger" href="#" onclick="confirmDelete('<?= base_url('admin/ptk/delete/' . $item->id) ?>')"><i class="bx bx-trash me-1"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>