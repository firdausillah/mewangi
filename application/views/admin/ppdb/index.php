<div class="nav-align-top mb-4">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-table-siswa-baru" aria-controls="navs-table-siswa-baru" aria-selected="true">
                Siswa Baru
            </button>
        </li>
        <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-setting" aria-controls="navs-setting" aria-selected="false">
                Setting
            </button>
        </li>

    </ul>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="navs-table-siswa-baru" role="tabpanel">
            <div class="d-flex justify-content-between">
                <h5 class="my-auto"><?= $title ? $title : '' ?></h5>
                <a href="#" onclick="exportExcel('<?= base_url('admin/ppdb/') ?>')" class="btn btn-sm btn-info my-auto">Export Excel</a>
            </div>
            <div class="table-responsive text-nowrap mt-2">
                <table id="table_siswa_baru" class="table table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>NISN</th>
                            <th>Jumlah Hafalan</th>
                            <th>No HP</th>
                            <th>Approve</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="navs-setting" role="tabpanel">
            <?= form_open_multipart(base_url('admin/ppdb/save')) ?>
            <div class="mb-3">
                <label class="form-label" for="tanggal_buka">tanggal pendaftaran dibuka <span class="text-danger">*</span></label>
                <input type="date" class="form-control" name="tanggal_buka" id="tanggal_buka" value="<?= @$ppdb_setting->tanggal_buka ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="tanggal_tutup">tanggal pendaftaran ditutup <span class="text-danger">*</span></label>
                <input type="date" class="form-control" name="tanggal_tutup" id="tanggal_tutup" value="<?= @$ppdb_setting->tanggal_tutup ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="tahun_ajaran">tahun ajaran <span class="text-danger">*</span></label>
                <input type="number" min="1900" max="2100" step="1" placeholder="YYYY" class="form-control" name="tahun_ajaran" id="tahun_ajaran" value="<?= @$ppdb_setting->tahun_ajaran ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="link">link informasi <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="link" id="link" value="<?= @$ppdb_setting->link ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="foto">Poster</label>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group input-group-merge">
                            <input class="form-control foto" type="file" name="foto">
                        </div>
                        <input type="hidden" class="form-control foto" type="input" name="file_foto" id="file_foto">
                        <input type="hidden" class="form-control" value="<?= @$ppdb_setting->foto ?>" name="gambar">
                    </div>
                    <div class="col-md-6">
                        <img src="<?= base_url('uploads/img/ppdb_setting/' . @$ppdb_setting->foto) ?>" height="200px" alt="">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="file">File Informasi</label>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group input-group-merge">
                            <input class="form-control file" type="file" name="file">
                        </div>
                        <input type="hidden" class="form-control" value="<?= @$ppdb_setting->file ?>" name="file_name">
                    </div>
                    <div class="col-md-6">
                        <a href="<?= base_url('uploads/file/ppdb_setting/' . @$ppdb_setting->file) ?>" target="_blank" class="text-black">File Informasi : <span class="text-info"><?= @$ppdb_setting->file ?></span></a>
                    </div>
                </div>
            </div>
            <a href="<?= base_url() ?>admin/ppdb_setting" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>

    </div>
</div>

<script>
    $(document).ready(function() {
        // BEGIN Event Trainer
        table_siswa_baru = $('#table_siswa_baru').DataTable({
            responsive: true,
            ajax: '<?= base_url('admin/ppdb/get_siswa_baru') ?>',
            order: [
                [0, 'desc']
            ],
            columns: [{
                    data: 'id',
                    visible: false
                },
                {
                    data: 'nama'
                },
                {
                    data: 'nik'
                },
                {
                    data: 'nisn'
                },
                {
                    data: 'jumlah_hafalan'
                },
                {
                    data: 'no_hp'
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
                                    <?php if ($this->session->userdata('role') == 'superadmin') : ?>
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
                    data: 'id',
                    render: function(data, type, row) {
                        return `<a class="text-info" href="<?= base_url('admin/posts/?page=edit&id=') ?>` + data + `"><i class="bx bx-edit-alt me-1"></i></a>
                        <a class="text-danger" href="#" onclick="confirmDelete('<?= base_url('admin/posts/delete/') ?>` + data + `')"><i class="bx bx-trash me-1"></i></a>`
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
            url: '<?= base_url('admin/ppdb/update_status_approve') ?>',
            type: 'POST',
            dataType: 'json',
            data: {
                id: id,
                is_approve: is_approve
            },
            success: function(json) {
                table_siswa_baru.ajax.reload(function() {
                    Swal.close();
                    Toast.fire({
                        icon: json.status,
                        title: json.message
                    });
                });
            },
            error: function(xhr, status, error) {
                console.error('Error:', status, error);
                table_siswa_baru.ajax.reload();
            }
        });
    }
</script>