<!--Main layout-->
<main style="margin-top: 58px;">
    <div class="container">
        <div class="laporanstok-header row">
            <div class="col-md-2 laporanstok-title">
                <h2 class="dashboard-title">Transaksi</h2>
            </div>
            <div class="col-md-10 laporanstok-date">
                <button type="button" class="btn btn-dark transaksi-add-btn"  data-bs-toggle="modal" data-bs-target="#modal-transaksi-produk">+</button>
            </div>
        </div>
        <div id="transaksi-table" class="laporan-stok-section">
            <table class="table laporan-stok-table">
                <thead>
                    <tr>
                        <th scope="col">Item</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Harga Satuan</th>
                        <th scope="col">Harga</th>
                    </tr>
                </thead>
                <tbody id="transaksi-row">
                </tbody>
                    <tr class="transaksi-total-section" style="border:none;">
                        <td colspan="3" class="transaksi-total-text" style="border:none;">&emsp;&emsp;
                        TOTAL</td>
                        <td class="transaksi-total-harga" style="border:none;font-weight:bold;">Rp 0</td>
                    </tr>
            </table>
        </div>
        <div class="stok-produk-update">
            <button id="transaksi-batal-btn" type="button" class="btn btn-danger stok-update-btn">Batalkan Transaksi</button>
            <button id="submit-transaksi-btn" type="button" class="btn btn-dark stok-update-btn transaksi-simpan-btn">Simpan</button>
        </div>   
    </div>
</main>
<!--Main layout-->

<!-- Modal -->
<div class="modal fade" id="modal-transaksi-produk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div id="transaksi-form-modal" class="modal-body">
            <div class="form-group mb-3">
                <label>Produk</label>
                <select id="select-produk" name="produk" class="form-select" aria-label="Default select example">
                    <option selected disabled>Pilih Produk</option>
                    <?php foreach($produk as $p){ ?>   
                        <option value="<?php echo $p->id; ?>" data-harga="<?php echo $p->harga; ?>" data-nama="<?php echo $p->nama; ?>"><?php echo $p->nama; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group mb-3">
                <label>Quantity</label>
                <input name="quantity" type="text" class="form-control" placeholder="Masukkan Quantity Produk">
            </div>
            <input name="total_harga" type="hidden" class="form-control">
            <p class="total-harga-modal-text">Total : <span class="total-harga-modal">Rp. 0</span></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button id="btn-simpan-transaksi-modal" type="button" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>

<!--JS-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
    function formatUang(nStr){
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

    $(document).ready(function() {
        if(localStorage.getItem('temp_transaksi') !== null){
            window.localStorage.removeItem('temp_transaksi');
        }
    });

    $('#select-produk').on('change', function() {
        harga = $("#transaksi-form-modal").find('option:selected').attr('data-harga');
        $("#transaksi-form-modal").find('input[name="total_harga"]').val( harga );
        $("#transaksi-form-modal").find('input[name="quantity"]').val( '' );
        $("#transaksi-form-modal").find('.total-harga-modal').text( 'Rp. '+formatUang(harga) );
    });

    $('input[name="quantity"]').on('change', function() {
        harga = $("#transaksi-form-modal").find('option:selected').attr('data-harga');
        total_harga = harga * $(this).val();
        $("#transaksi-form-modal").find('input[name="total_harga"]').val( total_harga );
        $("#transaksi-form-modal").find('.total-harga-modal').text( 'Rp. '+formatUang(total_harga) );
    });

    $('#btn-simpan-transaksi-modal').on('click', function() {
        id_produk = $("#transaksi-form-modal").find('#select-produk').val();
        harga_satuan = $("#transaksi-form-modal").find('option:selected').attr('data-harga');
        produk = $("#transaksi-form-modal").find('option:selected').attr('data-nama');
        quantity = $("#transaksi-form-modal").find('input[name="quantity"]').val();
        total_harga = $("#transaksi-form-modal").find('input[name="total_harga"]').val();
        total_seluruh_transaksi = 0;

        json = {
            'id_produk' : id_produk,
            'harga_satuan' : harga_satuan,
            'quantity' : quantity,
            'total_harga' : total_harga
        };

        if(localStorage.getItem('temp_transaksi') !== null){
            current = JSON.parse(localStorage.getItem('temp_transaksi'));
            current.total = parseInt(current.total) + parseInt(total_harga);
            current.data.push(json);
            window.localStorage.setItem('temp_transaksi', JSON.stringify(current));
            
            total_seluruh_transaksi = current.total;
        } else {
            newdata = [];
            newdata.push(json);
            newtransaksi = {
                'total' : total_harga,
                'data': newdata
            };
            window.localStorage.setItem('temp_transaksi', JSON.stringify(newtransaksi));
            
            total_seluruh_transaksi = total_harga;
        }

        $("#transaksi-row").append(
            "<tr><td>"+produk+"</td><td>"+quantity+"</td><td>Rp "+harga_satuan+"</td><td>Rp "+formatUang(total_harga)+"</td></tr>"
        );

        $("#transaksi-form-modal").find('#select-produk').prop('selectedIndex',0);
        $("#transaksi-form-modal").find('input[name="quantity"]').val('');
        $("#transaksi-form-modal").find('input[name="total_harga"]').val('');
        $("#transaksi-form-modal").find('.total-harga-modal').text( 'Rp. '+0 );
        $("#modal-transaksi-produk").modal("toggle");

        $("#transaksi-table").find('.transaksi-total-harga').text( 'Rp. '+formatUang(total_seluruh_transaksi) );
    });

    $('#transaksi-batal-btn').on('click', function() {
        if(localStorage.getItem('temp_transaksi') !== null){
            window.localStorage.removeItem('temp_transaksi');
        }

        $("#transaksi-form-modal").find('#select-produk').prop('selectedIndex',0);
        $("#transaksi-form-modal").find('input[name="quantity"]').val('');
        $("#transaksi-form-modal").find('input[name="total_harga"]').val('');
        $("#transaksi-form-modal").find('.total-harga-modal').text( 'Rp. '+0 );

        $("#transaksi-table").find('.transaksi-total-harga').text( 'Rp. '+0 );
        $("#transaksi-row").empty();
    });

    $('#submit-transaksi-btn').on('click', function() {
        if(localStorage.getItem('temp_transaksi') !== null){
            transaksi = JSON.parse(localStorage.getItem('temp_transaksi'));
            $.ajax({
                type: "POST",
                url: "http://localhost/infowarung/transaksi/simpan",
                data: {transaksi:transaksi}, 
                success: function(data){
                    if(data.status =='success'){
                        if(!alert(data.message)){
                            window.location.reload();  
                        }
                    } else {
                        alert(data.message);
                    }
                }
            }); 
        }
    });
</script>
</body>
</html>