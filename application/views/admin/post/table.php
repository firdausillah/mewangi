<div class="card p-3">
    <div class="d-flex justify-content-between">
        <h5 class="my-auto"><?= $title ? $title : '' ?></h5>
        <a href="<?= base_url('admin/post?page=add') ?>" class="btn btn-sm btn-success my-auto">Tambah data</a>
        <!-- <a href="" class="btn btn-info">Tambah data</a> -->
    </div>
    <div class="table-responsive text-nowrap mt-2">
        <table id="datatables_table" class="table table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Judul</th>
                    <th width='10px'>Tags</th>
                    <th>Type</th>
                    <th>Category</th>
                    <th>Author</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <?php foreach ($post as $index => $item) : ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= substr($item->nama, 0, 30) . '...' ?></td>
                        <td class="overflow-auto">
                            <?php
                            $tags = explode(',', $item->tags_t_nama);
                            foreach ($tags as $key => $value) {
                                echo '<small class="badge bg-label-secondary">' . $value . '</small> ';
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($item->post_type == 'berita') {
                                echo '<small class="badge bg-label-info">' . $item->post_type . '</small>';
                            } else if ($item->post_type == 'opinion') {
                                echo '<small class="badge bg-label-success">' . $item->post_type . '</small>';
                            } else {
                                echo '<small class="badge bg-label-warning">' . $item->post_type . '</small>';
                            }
                            ?>
                        </td>
                        <td><?= $item->category_nama ?></td>
                        <td><?= $item->author ?></td>
                        <td>
                            <img src="<?= base_url('uploads/img/post/' . @$item->foto) ?>" height="100px" alt=""><img src="<?= $item->foto ?>" alt="">
                        </td>
                        <td>
                            <a class="text-info" href="<?= base_url('admin/post/?page=edit&id=' . $item->id) ?>"><i class="bx bx-edit-alt me-1"></i></a>
                            <a class="text-danger" href="#" onclick="confirmDelete('<?= base_url('admin/post/nonaktif/' . $item->id) ?>')"><i class="bx bx-trash me-1"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>