<!--Main layout-->
<main style="margin-top: 58px;">
    <div class="container">
        <h2 class="dashboard-title">Dashboard</h2>
        <div class="toggle-onoff">
            <span class="toggle-status"><?php echo $status ?></span>
            <label class="switch-toggle">
                <?php if($status == "Buka") { ?>
                    <input id="statuswarung" type="checkbox" checked>
                <?php } else { ?>
                    <input id="statuswarung" type="checkbox">
                <?php } ?>
                
                <span class="slider-toggle round-toggle"></span>
            </label>
         </div>
        <div class="dashboard-nama-warung">
            <h2><?php echo $nama ?></h2>
        </div>
        <div class="chart-pendapatan">
            <canvas id="myChart" width="400" height="100"></canvas>
        </div>
    </div>
</main>
<!--Main layout-->

<!--JS-->
<script src="<?php echo base_url()?>node_modules/chartjs/dist/chart.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php 
                echo '["",' ;
                foreach($month_transaksi as $mt){
                    echo '"'.$mt.'"'.',';
                }
                echo ']';
                ?>,
            datasets: [{
                label: "Pemasukan",
                data: <?php 
                echo '[0,' ;
                foreach($pendapatan_transaksi as $pt){
                    echo $pt.',';
                }
                echo ']';
                ?>,
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
<script>
    $("#statuswarung").change(function(){
        var status = 0;
        if(this.checked) {
            status = 1;
        }

        $.ajax({
            type: "POST",
            url: "http://localhost/infowarung/statuswarung",
            data: "status="+status,        //POST variable name value
            success: function(data){
                if(data.message =='success'){
                    alert('Warung Sudah '+data.status);
                    location.reload();
                } else {
                    alert('Terjadi Kesalahan Server');
                }
            }
        }); 
    }); 
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>