<?php $this->load->view('components/front_title') ?>

<section>
    <div class="container">
        <div class="card w-100 mb-3 border-0 shadow">
            <div class="card-body p-3">
                <form class="row g-3" onsubmit="return false">
                    <div class="col-md-6">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" id="nama">
                    </div>
                    <div class="col-md-6">
                        <label for="kelas" class="form-label">Kelas</label>
                        <select name="kelas" class="form-control" id="kelas">
                            <option value="">--Pilih--</option>
                        </select>
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary px-5" onclick="action_search_siswa()"><i class="bi bi-search"></i> Cari</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</section>
