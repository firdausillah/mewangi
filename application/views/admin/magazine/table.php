<div class="card p-3">
    <div class="d-flex justify-content-between">
        <h5 class="my-auto"><?= $title ? $title : '' ?></h5>
        <a href="<?= base_url('admin/magazine?page=add') ?>" class="btn btn-sm btn-success my-auto">Tambah data</a>
        <!-- <a href="" class="btn btn-info">Tambah data</a> -->
    </div>
    <div class="table-responsive text-nowrap mt-2">
        <table id="table_magazine" class="table table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Tanggal</th>
                    <th>Judul</th>
                    <th>Keterangan</th>
                    <th>File</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script>
    $(document).ready(function() {
        // BEGIN Event Trainer
        table_magazine = $('#table_magazine').DataTable({
            responsive: true,
            ajax: '<?= base_url('admin/magazine/getMagazine') ?>',
            order: [
                [0, 'desc']
            ],
            columns: [{
                    data: 'id',
                    visible: false
                },
                {
                    data: 'created_on',
                    visible: false
                },
                {
                    data: 'nama',
                    render: function(data, type, row) {
                        return truncateContent(data, 30)
                    }
                },
                {
                    data: 'keterangan',
                    render: function(data, type, row) {
                        return truncateContent(data, 30)
                    }
                },
                {
                    data: 'link',
                    render: function(data, typr, row) {
                        return `
                                <a href="`+ data + `" target="_blank">
                                    Link
                                </a>
                            `
                    }
                },
                {
                    data: 'foto',
                    render: function(data, type, row) {
                        return `
                                <a href="<?= base_url('uploads/img/magazine/') ?>` + data + `" target="_blank">
                                    <img src="<?= base_url('uploads/img/magazine/') ?>` + data + `" height="100px" alt="">
                                </a>
                            `
                    }
                },
                {
                    data: 'id',
                    render: function(data, type, row) {
                        return `<a class="text-info" href="<?= base_url('admin/magazine?page=edit&id=') ?>` + data + `"><i class="bx bx-edit-alt me-1"></i></a>
                        <a class="text-danger" href="#" onclick="confirmDelete('<?= base_url('admin/magazine/delete/') ?>` + data + `')"><i class="bx bx-trash me-1"></i></a>`
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
            url: '<?= base_url('admin/magazine/update_status_approve') ?>',
            type: 'POST',
            dataType: 'json',
            data: {
                id: id,
                is_approve: is_approve
            },
            success: function(json) {
                table_magazine.ajax.reload(function() {
                    Swal.close();
                    Toast.fire({
                        icon: json.status,
                        title: json.message
                    });
                });
            },
            error: function(xhr, status, error) {
                console.error('Error:', status, error);
                table_magazine.ajax.reload();
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