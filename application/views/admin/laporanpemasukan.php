<!--Main layout-->
<main style="margin-top: 58px;">
    <div class="container">
        <h2 class="dashboard-title">Laporan Pemasukan</h2>
        <div class="laporanstok-header row">
            <div class="col-md-10 laporanstok-date">

            </div>
            <div class="col-md-2 laporanstok-date">
                <input id="filter-transaksi" class="form-control" type="text" id="checkin" name="checkin" placeholder="Filter By Month &#xf133;" onfocus="(this.type='month')" style="font-family: var(--bs-font-sans-serif), FontAwesome">
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
                <tbody class="transaksi-tablebody">
                    <?php $no = 1; foreach($laporan_pemasukan as $lp){ ?>   
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo date("d M Y H:i:s", strtotime($lp->created_at))?></td>
                        <td>Rp <?php echo number_format($lp->pemasukan, 0, ',', '.') ?></td>
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
    function formatUang(nStr)
    {
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + '.' + '$2');
        }
        return x1 + x2;
    }
    $("#filter-transaksi").on('change', function() {
        var month = $(this).val();
        $.ajax({
            type: "GET",
            url: "http://localhost/infowarung/transaksi/filter/"+month,
            data: null, 
            success: function(data){
                $(".transaksi-tablebody").empty();
                if(data.status =='success' && data.transaksi.length > 0){
                    $.each(data.transaksi, function(k, v) {
                        $(".transaksi-tablebody").append(
                            "<tr><td>"+ k +"</td><td>"+v.created_at+"</td><td>Rp " +formatUang(v.pemasukan)+"</td></tr>"
                        );
                    });
                } else {
                    $(".transaksi-tablebody").append(
                            "<td colspan='3'><center><p>Tidak Ada Laporan Stok</p></center></td>"
                    );
                }
            }
        }); 
    });
</script>
</body>
</html>