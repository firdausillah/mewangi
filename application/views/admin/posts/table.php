<div class="card p-3">
    <div class="d-flex justify-content-between">
        <h5 class="my-auto"><?= $title ? $title : '' ?></h5>
        <a href="<?= base_url('admin/posts?page=add') ?>" class="btn btn-sm btn-success my-auto">Tambah data</a>
        <!-- <a href="" class="btn btn-info">Tambah data</a> -->
    </div>
    <div class="table-responsive text-nowrap mt-2">
        <table id="table_post" class="table table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Tanggal</th>
                    <th>Judul</th>
                    <th width='10px'>Tags</th>
                    <th>Type</th>
                    <th>Category</th>
                    <th>Author</th>
                    <th>Approval</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <!-- <?php foreach ($post as $index => $item) : ?>
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
                            <?php
                            if ($item->is_approve == 1) {
                                $bg = 'success';
                                $is_approve = 'Disetujui';
                            } else if ($data == 0) {
                                $bg = 'warning';
                                $is_approve = 'Diperiksa';
                            } else {
                                $bg = 'danger';
                                $is_approve = 'Ditolak';
                            }
                            echo
                            "<div class='btn-group'>
                                    <button type='button' class='btn btn-sm btn-" . $bg . " dropdown-toggle' data-bs-toggle='dropdown' aria-expanded='true'>
                                        " . $is_approve . "
                                    </button>
                                    <ul class='dropdown-menu' style='position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 39.5px, 0px);' data-popper-placement='bottom-start'>
                                        <li><a class='dropdown-item' href='javascript:void(0);' onClick='action_update_status_approve(" . $item->id . ",1)'>Disetujui</a></li>
                                        <li><a class='dropdown-item' href='javascript:void(0);' onClick='action_update_status_approve(" . $item->id . ",0)'>Diperiksa</a></li>
                                        <li><a class='dropdown-item' href='javascript:void(0);' onClick='action_update_status_approve(" . $item->id . ",2)'>Ditolak</a></li>
                                    </ul>
                                </div>";
                            ?>
                        </td>
                        <td>
                            <img src="<?= base_url('uploads/img/post/' . @$item->foto) ?>" height="100px" alt=""><img src="<?= $item->foto ?>" alt="">
                        </td>
                        <td>
                            <a class="text-info" href="<?= base_url('admin/posts/?page=edit&id=' . $item->id) ?>"><i class="bx bx-edit-alt me-1"></i></a>
                            <a class="text-danger" href="#" onclick="confirmDelete('<?= base_url('admin/posts/nonaktif/' . $item->id) ?>')"><i class="bx bx-trash me-1"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?> -->
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script>
    $(document).ready(function() {
        // BEGIN Event Trainer
        table_post = $('#table_post').DataTable({
            responsive: true,
            ajax: '<?= base_url('admin/posts/getPost') ?>',
            order: [
                [0, 'desc']
            ],
            columns: [{
                    data: 'id',
                    visible: false
                },
                {
                    data: 'tanggal'
                },
                {
                    data: 'nama',
                    render: function(data, type, row) {
                        return truncateContent(data, 30)
                    }
                },
                {
                    data: 'tags_t_nama'
                },
                {
                    data: 'post_type',
                    render: function(data, type, row) {
                        if (data == 'berita') {
                            return '<small class="badge bg-label-info">' + data + '</small>';
                        } else if (data == 'opinion') {
                            return '<small class="badge bg-label-success">' + data + '</small>';
                        } else {
                            return '<small class="badge bg-label-warning">' + data + '</small>';
                        }
                    }
                },
                {
                    data: 'category_nama'
                },
                {
                    data: 'author'
                },
                {
                    data: 'is_approve',
                    render: function(data, type, row) {
                        var id = row.id;
                        var bg = '';
                        var is_approve = '';
                        if (data == 1) {
                            bg = 'success';
                            is_approve = 'Disetujui';
                        } else if (data == 0) {
                            bg = 'warning';
                            is_approve = 'Diperiksa';
                        } else {
                            bg = 'danger';
                            is_approve = 'Ditolak';
                        }
                        if (data != '') {
                            return `<div class='btn-group'>
                                    <button type='button' class='btn btn-sm btn-` + bg + ` dropdown-toggle' data-bs-toggle='dropdown' aria-expanded='true'>
                                        ` + is_approve + `
                                    </button>
                                    <?php if($this->session->userdata('role') == 'superadmin') : ?>
                                    <ul class='dropdown-menu' style='position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 39.5px, 0px);' data-popper-placement='bottom-start'>
                                        <li><a class='dropdown-item' href='javascript:void(0);' onClick='action_update_status_approve(` + id + `,1)'>Disetujui</a></li>
                                        <li><a class='dropdown-item' href='javascript:void(0);' onClick='action_update_status_approve(` + id + `,0)'>Diperiksa</a></li>
                                        <li><a class='dropdown-item' href='javascript:void(0);' onClick='action_update_status_approve(` + id + `,2)'>Ditolak</a></li>
                                    </ul>
                                    <?php endif; ?>
                                </div>`;
                        } else {
                            return '';
                        }
                    }
                },
                {
                    data: 'foto',
                    render: function(data, type, row) {
                        return `
                                <a href="<?= base_url('uploads/img/post/') ?>` + data + `" target="_blank">
                                    <img src="<?= base_url('uploads/img/post/') ?>` + data + `" height="100px" alt="">
                                </a>
                            `
                    }
                },
                {
                    data: 'id',
                    render: function(data, type, row) {
                        return `<a class="text-info" href="<?= base_url('admin/posts/?page=edit&id=') ?>` + data + `"><i class="bx bx-edit-alt me-1"></i></a>
                        <a class="text-danger" href="#" onclick="confirmDelete('<?= base_url('admin/posts/nonaktif/') ?>` + data + `')"><i class="bx bx-trash me-1"></i></a>`
                    }
                }
            ],
            columnDefs: [{
                orderable: false,
                className: 'select-checkbox',
                targets: 0
            }],
            rowCallback: function(row, data) {
                $(row).attr('data-id_member', data.id);
            }
        });
    })
    // END Event Trainer
    function action_update_status_approve(id, is_approve) {
        Loading.fire({})
        $.ajax({
            url: '<?= base_url('admin/posts/update_status_approve') ?>',
            type: 'POST',
            dataType: 'json',
            data: {
                id: id,
                is_approve: is_approve
            },
            success: function(json) {
                table_post.ajax.reload(function() {
                    Swal.close();
                    Toast.fire({
                        icon: json.status,
                        title: json.message
                    });
                });
            },
            error: function(xhr, status, error) {
                console.error('Error:', status, error);
                table_post.ajax.reload();
            }
        });
    }

    function truncateContent(content, maxLength) {
        if (content) {
            if (content.length > maxLength) {
                return content.substring(0, maxLength) + '...';
            } else {
                return content;
            }
        }
    }
</script>