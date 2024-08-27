    <div class="misc-wrapper container relative">
        <h1>Halaman Real Count</h1>

        <div class="row d-flex justify-content-center mb-3" style="min-width: 100%;">
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-center gap-3">
                            <div class="d-flex flex-column flex-row align-items-start justify-content-between">
                                <div class="card-title">
                                    <h5 class="text-nowrap mb-2">Data Masuk</h5>
                                    <span class="badge bg-label-warning rounded-pill"><span id="datenow"></span> <span id="timenow"></span></span>
                                </div>
                                <div class="mx-auto">
                                    <h3 class="mb-0" id="total_vouter"></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center mb-3">
            <?php foreach ($vote_data_d as $key => $value) : ?>
                <div class="col-md-4 my-2">
                    <div class="card h-100">
                        <div class="card-header bg-primary text-white p-1">
                            <h3 class="text-white mb-0 mt-1" id="count<?= $value->id ?>"></h3>
                        </div>
                        <img class="img-fluid" src="<?= base_url('uploads/img/vote_data_d/' . $value->foto) ?>" alt="<?= $value->nama ?>">
                        <div class="card-body p-2">
                            <h4 class="card-title my-2"><?= $value->nama ?></h4>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <a href="<?= base_url('real_count') ?>" class="btn btn-secondary"><i class='bx bx-arrow-back'></i> Kembali</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

    <script>
        function refreshcounter() {
            $.ajax({
                url: '<?= base_url('real_count/get_real_count_data/' . $id_vote_data_h) ?>',
                type: 'POST',
                dataType: 'json',
                data: {},
                success: function(json) {
                    if (json != undefined) {
                        json.data.forEach(element => {
                            $('#count' + element.id).html(element.counter);
                        });

                        $('#total_vouter').html(json.percent_total_voters_data + '%');
                    }
                }
            });
        }
        setInterval(refreshcounter, 1000);
    </script>

    <script>
        //intital tanggal dan waktu dari id
        var dateDisplay = document.getElementById("datenow");
        var timeDisplay = document.getElementById("timenow");
        //fungsi
        function refreshTime() {
            var dateString = new Date().toLocaleString("id-ID", {
                timeZone: "Asia/Jakarta"
            }); //gettime
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth() + 1;
            var yyyy = today.getFullYear();
            if (dd < 10) {
                dd = '0' + dd;
            }
            if (mm < 10) {
                mm = '0' + mm;
            }
            var todayy = dd + '/' + mm + '/' + yyyy;
            var formattedString = dateString.replace(",", "-");

            dateDisplay.innerHTML = todayy; // date

            var splitarray = new Array();
            splitarray = formattedString.split(" ");
            var splitarraytime = new Array();
            splitarraytime = splitarray[1].split(".");
            timeDisplay.innerHTML = splitarraytime[0] + ':' + splitarraytime[1] + ':' + splitarraytime[2]; // time
        }
        //panggil ulang otomatis fungsi
        setInterval(refreshTime, 1000);
    </script>