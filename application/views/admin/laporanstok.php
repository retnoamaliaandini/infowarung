<!--Main layout-->
<main style="margin-top: 58px;">
    <div class="container">
        <div class="laporanstok-header row">
            <div class="col-md-10 laporanstok-title">
                <h2 class="dashboard-title">Laporan Stok Produk</h2>
            </div>
            <div class="col-md-2 laporanstok-date">
                <input id="filter-stok" class="form-control" type="text" id="checkin" name="checkin" placeholder="Filter By Month &#xf133;" onfocus="(this.type='month')" style="font-family: var(--bs-font-sans-serif), FontAwesome">
            </div>
        </div>
        <div class="laporan-stok-section">
            <table class="table laporan-stok-table">
                <thead>
                    <tr>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Produk</th>
                        <th scope="col">Tipe</th>
                        <th scope="col">Stok Awal</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Stok Akhir</th>
                    </tr>
                </thead>
                <tbody class="stok-tablebody">
                    <?php foreach($laporan_stok as $ls){ ?>   
                        <tr>
                            <td><?php echo date("d M Y H:i:s", strtotime($ls->created_at))?></td>
                            <td><?php echo $ls->nama ?></td>
                            <td><?php echo $ls->tipe ?></td>
                            <td><?php echo $ls->stok_awal ?></td>
                            <td><?php echo $ls->jumlah ?></td>
                            <td><?php echo $ls->stok_akhir ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<!--Main layout-->

<!--JS-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
    $("#filter-stok").on('change', function() {
        var month = $(this).val();
        $.ajax({
            type: "GET",
            url: "http://localhost/infowarung/stok/filter/"+month,
            data: null, 
            success: function(data){
                $(".stok-tablebody").empty();
                if(data.status =='success' && data.stok.length > 0){
                    $.each(data.stok, function(k, v) {
                        $(".stok-tablebody").append(
                            "<tr><td>"+v.created_at+"</td><td>"+v.nama+"</td><td>"+v.tipe+"</td><td>"+v.stok_awal+"</td><td>"+v.jumlah+"</td><td>"+v.stok_akhir+"</td></tr>"
                        );
                    });
                } else {
                    $(".stok-tablebody").append(
                            "<td colspan='6'><center><p>Tidak Ada Laporan Stok</p></center></td>"
                    );
                }
            }
        }); 
    });
</script>
</body>
</html>