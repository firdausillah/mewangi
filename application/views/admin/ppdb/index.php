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
                <!-- <a href="<?= base_url('admin/ppdb?page=add') ?>" class="btn btn-sm btn-success my-auto">Tambah data</a> -->
            </div>
            <div class="table-responsive text-nowrap mt-2">
                <table id="datatables_table" class="table table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Keterangan</th>
                            <th>link</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="navs-setting" role="tabpanel">

        </div>

    </div>
</div>