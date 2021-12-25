<!--Main layout-->
<main style="margin-top: 58px;">
    <div class="container">
        <h2 class="dashboard-title">Stok Produk</h2>
        <div class="kategori-produk">
            <select id="select-kategori-produk" class="form-select kategori-produk-select" aria-label="Default select example">
                <option value="0" selected>Semua</option>
                <?php foreach($kategori as $k){ ?>   
                    <option value="<?php echo $k->id; ?>"><?php echo $k->kategori; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="produk-list">
            <div id="produk-row" class="row">
                <?php foreach($produk as $p){ ?>
                    <div class="produk-info col-md-3">
                        <img class="produk-info-gambar" src="<?php echo base_url()?>assets/img/produk/<?php echo $p->gambar; ?>"/>
                        <p class="produk-info-nama"><?php echo $p->nama; ?></p>
                        <p class="produk-info-stok">Stok : <?php echo $p->stok; ?></p>
                        <div class="produk-info-tambahstok form-group row">
                            <div class="col-sm-8 col-form-label">
                                <label for="stokproduk" class="produk-info-tambahstok-label">Tambah Stok</label>
                            </div>
                            <div class="col-sm-3 produk-info-tambahstok-input">
                                <input type="text" class="form-control-plaintext produk-info-tambahstok-value" id="stokproduk-<?php echo $p->id; ?>" data-id="<?php echo $p->id; ?>" placeholder="0">
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div id="update-stok" class="stok-produk-update">
            <button type="button" class="btn btn-dark stok-update-btn">Perbaharui</button>
        </div>   
    </div>
</main>
<!--Main layout-->

<!--JS-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
    $("#select-kategori-produk").on('change', function() {
        var id_kategori = $(this).val();
        $.ajax({
            type: "GET",
            url: "http://localhost/infowarung/produk/filter/"+id_kategori,
            data: null, 
            success: function(data){
                $(".produk-list #produk-row").empty();
                if(data.status =='success'){
                    $.each(data.produk, function(k, v) {
                        $(".produk-list #produk-row").append(
                            "<div class='produk-info col-md-3'><img class='produk-info-gambar' src='<?php echo base_url()?>assets/img/produk/"+v.gambar+"'/><p class='produk-info-nama'>"+v.nama+"</p><p class='produk-info-stok'>Stok :"+v.stok+"</p><div class='produk-info-tambahstok form-group row'><div class='col-sm-8 col-form-label'><label for='stokproduk' class='produk-info-tambahstok-label'>Tambah Stok</label></div><div class='col-md-3 produk-info-tambahstok-input'><input type='text' class='form-control-plaintext produk-info-tambahstok-value' id='stokproduk-"+v.id+"' data-id='"+v.id+"'placeholder='0'></div></div></div>"
                        );
                    });
                } else {
                    $(".produk-list #produk-row").append(
                        "<center><p>Tidak Ada Produk</p></center>"
                    );
                }
            }
        }); 
    });
</script>
<script>
    $('#update-stok').on('click', '.stok-update-btn', function() {
        arrayProduk = <?php echo json_encode($produk) ?>;
        data = [];
        $.each(arrayProduk, function (i, value) {
            updated_stok = $('#stokproduk-'+value.id).val();
            if(updated_stok != ""){
                update = {};
                update.id = value.id;
                update.tambahstok = updated_stok;
                data.push(update);
            }
        });
        
        if (data.length !== 0) {
            $.ajax({
                type: "POST",
                url: "http://localhost/infowarung/produk/updatestok",
                data: {update:data}, 
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