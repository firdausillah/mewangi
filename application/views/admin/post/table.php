<div class="card p-3">
    <div class="d-flex justify-content-between">
        <h5 class="my-auto"><?= $title ? $title : '' ?></h5>
        <a href="<?= base_url('admin/post/' . $post_type . '?page=add') ?>" class="btn btn-sm btn-success my-auto">Tambah data</a>
        <!-- <a href="" class="btn btn-info">Tambah data</a> -->
    </div>
    <div class="table-responsive text-nowrap mt-2">
        <table id="datatables_table" class="table table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Judul</th>
                    <th>Tags</th>
                    <?php if ($post_type != 'opinion') :?>
                    <th>Type</th>
                    <?php endif; ?>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <?php foreach ($post as $index => $item) : ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $item->nama ?></td>
                        <td>
                            <?php
                            $tags = explode(',', $item->tags);
                            foreach ($tags as $key => $value) {
                                echo '<small class="badge bg-label-secondary">' . $value . '</small> ';
                            }
                            ?>
                        </td>
                        <?php if ($post_type != 'opinion') :?>
                            <td>
                                <?php
                                if($item->post_type == 'berita'){
                                    echo '<small class="badge bg-label-info">'.$item->post_type.'</small>';
                                }else{
                                    echo '<small class="badge bg-label-warning">'.$item->post_type.'</small>';
                                }
                                ?>
                            </td>
                        <?php endif; ?>

                        <td><?= $item->category_nama ?></td>
                        <td>
                            <img src="<?= base_url('uploads/img/post/' . @$item->foto) ?>" height="100px" alt=""><img src="<?= $item->foto ?>" alt="">
                        </td>
                        <td>
                            <a class="text-info" href="<?= base_url('admin/post/' . $post_type . '?page=edit&id=' . $item->id) ?>"><i class="bx bx-edit-alt me-1"></i></a>
                            <a class="text-danger" href="#" onclick="confirmDelete('<?= base_url('admin/post/nonaktif/' . $item->id) ?>')"><i class="bx bx-trash me-1"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>