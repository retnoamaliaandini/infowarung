<!--Main layout-->
<main style="margin-top: 58px;">
    <div class="container">
        <h2 class="dashboard-title">Dashboard</h2>
        <div class="toggle-onoff">
            <span class="toggle-status">Tutup</span>
            <label class="switch-toggle">
                 <input type="checkbox">
                <span class="slider-toggle round-toggle"></span>
            </label>
         </div>
        <div class="dashboard-nama-warung">
            <h2>Warung Serba Guna tapi Ga Guna</h2>
        </div>
        <div class="chart-pendapatan">
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
        type: 'line',
        data: {
            labels: ["", "Januari", "Februari", "Maret"],
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