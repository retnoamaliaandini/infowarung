<!--Main layout-->
<main style="margin-top: 58px;">
    <div class="container">
        <h2 class="dashboard-title">Laporan Pemasukan</h2>
        <div class="laporanstok-header row">
            <div class="col-md-10 laporanstok-date">
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-1 col-form-label">Show :</label>
                    <div class="col-sm-3">
                        <select class="form-select laporanpemasukan-showentries-select" aria-label="Default select example">
                            <option value="10" selected>10 Entries</option>
                            <option value="25">25 Entries</option>
                            <option value="50">50 Entries</option>
                            <option value="100">100 Entries</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-2 laporanstok-date">
                <input class="form-control" type="text" id="checkin" name="checkin" placeholder="Sort By Date &#xf133;" onfocus="(this.type='date')" style="font-family: var(--bs-font-sans-serif), FontAwesome">
            </div>
        </div>
        <div class="laporan-stok-section">
            <table class="table laporan-stok-table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Pemasukan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>10 Jan 2021</td>
                        <td>Rp 2.500.000</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>11 Jan 2021</td>
                        <td>Rp 3.500.000</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>13 Jan 2021</td>
                        <td>Rp 4.500.000</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="chart-pendapatan laporan-stok-section">
            <canvas id="myChart" width="400" height="100"></canvas>
        </div>
    </div>
</main>
<!--Main layout-->

<!--JS-->
<script src="<?php echo base_url()?>node_modules/chartjs/dist/chart.js"></script>
<script>
     var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["", "10 Jan 2021", "11 Jan 2021", "12 Jan 2021"],
            datasets: [{
                label: "Pemasukan",
                data: [0, 2000, 3000, 5000],
                backgroundColor: 'rgba(0, 0, 0, 0.8)',
                borderColor: 'rgba(0, 0, 0, 0.8)'
            }]
        },
        options: {
        scales: {
            x: {
                beginAtZero: true
                }
            }
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>