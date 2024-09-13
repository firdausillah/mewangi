<div class="card p-3">
    <div class="d-flex justify-content-between">
        <h5 class="my-auto"><?= $title ? $title : '' ?></h5>
        <a href="<?= base_url('admin/galeri?page=add') ?>" class="btn btn-sm btn-success my-auto">Tambah data</a>
        <!-- <a href="" class="btn btn-info">Tambah data</a> -->
    </div>
    <div class="table-responsive text-nowrap mt-2">
        <table id="datatables_table" class="table table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Judul</th>
                    <th>Keterangan</th>
                    <th>link</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <?php foreach ($galeri as $index => $item) : ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= substr($item->nama, 0, 30) . '...' ?></td>
                        <td><?= substr($item->keterangan, 0, 30) . '...' ?></td>
                        <td><?= substr($item->link, 0, 30) . '...' ?></td>
                        <td>
                            <img src="<?= base_url('uploads/img/galeri/' . @$item->foto) ?>" height="100px" alt=""><img src="<?= $item->foto ?>" alt="">
                        </td>
                        <td>
                            <a class="text-info" href="<?= base_url('admin/galeri?page=edit&id=' . $item->id) ?>"><i class="bx bx-edit-alt me-1"></i></a>
                            <a class="text-danger" href="#" onclick="confirmDelete('<?= base_url('admin/galeri/delete/' . $item->id) ?>')"><i class="bx bx-trash me-1"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>