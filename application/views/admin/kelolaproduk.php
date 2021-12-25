<!--Main layout-->
<main style="margin-top: 58px;">
    <div class="container">
        <div class="kelolaproduk-header row">
            <div class="col-md-10">
                <h2 class="kelolaproduk-title">Kelola Produk</h2>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-dark kelolaproduk-btn" data-bs-toggle="modal" data-bs-target="#modal-add-produk">+ Tambah</button>
            </div>
        </div>
        <div class="kategori-produk">
            <select id="select-kategori-produk" class="form-select kategori-produk-select" aria-label="Default select example">
                <option value="0" selected>Semua</option>
                <?php foreach($kategori as $k){ ?>   
                    <option value="<?php echo $k->id; ?>"><?php echo $k->kategori; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="produk-list">
            <div class="row">
                <?php foreach($produk as $p){ ?>
                    <div class="produk-info col-md-3">
                        <button data-id="<?php echo $p->id; ?>" type="button" class="btn produk-btn" data-bs-toggle="modal" data-bs-target="#modal-edit-produk">
                            <img class="produk-info-gambar" src="<?php echo base_url()?>assets/img/produk/<?php echo $p->gambar; ?>"/>
                            <p class="produk-info-nama"><?php echo $p->nama; ?></p>
                        </button>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</main>
<!--Main layout-->

<!-- Modal -->
<div class="modal fade" id="modal-add-produk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <?php echo form_open_multipart('produk/create'); ?>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <?php
                if($this->session->userdata('error_insert_produk') != null){
                    echo '<div class="alert alert-danger" role="alert">';
                    echo $this->session->userdata('error_insert_produk');
                    echo '</div>';
                }
            ?>
            <div class="form-group mb-3">
                <label>Nama Produk</label>
                <input name="nama_produk" type="text" class="form-control" placeholder="Masukkan Nama Produk">
            </div>
            <div class="form-group mb-3">
                <label>Kategori Produk</label>
                <select name="kategori_produk" class="form-select" aria-label="Default select example">
                    <option selected disabled>Pilih Kategori</option>
                    <?php foreach($kategori as $k){ ?>   
                        <option value="<?php echo $k->id; ?>"><?php echo $k->kategori; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="formFile" class="form-label">Gambar Produk</label>
                <input name="gambar_produk" class="form-control" type="file" id="formFile">
            </div>
            <div class="form-group mb-3">
                <label>Harga</label>
                <input name="harga" type="text" class="form-control" placeholder="Masukkan Harga Produk">
            </div>
            <div class="form-group mb-3">
                <label>Stok</label>
                <input name="stok" type="text" class="form-control" placeholder="Masukkan Stok Produk">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    <?php echo form_close(); ?>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-edit-produk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?php echo form_open_multipart('produk/update'); ?>
        <div class="modal-body">
            <?php
                if($this->session->userdata('error_update_produk') != null){
                    echo '<div class="alert alert-danger" role="alert">';
                    echo $this->session->userdata('error_update_produk');
                    echo '</div>';
                }
            ?>
            <input name="id_produk" type="hidden" class="form-control">
            <div class="form-group mb-3">
                <label>Nama Produk</label>
                <input name="nama_produk" type="text" class="form-control" placeholder="Masukkan Nama Produk">
            </div>
            <div class="form-group mb-3">
                <label>Kategori Produk</label>
                <select name="kategori_produk" class="form-select" aria-label="Default select example">
                    <option selected disabled>Pilih Kategori</option>
                    <?php foreach($kategori as $k){ ?>   
                        <option value="<?php echo $k->id; ?>"><?php echo $k->kategori; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group update_gambar mb-3">
                <label for="formFile" class="form-label">Gambar Produk</label>
                <input name="gambar_produk" class="form-control" type="file" id="formFile">
            </div>
            <div class="form-group mb-3">
                <label>Harga</label>
                <input name="harga" type="text" class="form-control" placeholder="Masukkan Harga Produk">
            </div>
            <div class="form-group mb-3">
                <label>Stok</label>
                <input name="stok" type="text" class="form-control" placeholder="Masukkan Stok Produk">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger btn-hapus-produk" data-bs-dismiss="modal">Delete</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    <?php echo form_close(); ?>
    </div>
  </div>
</div>
<!--/Modal-->

<!--JS-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
    <?php
        if($this->session->userdata('error_insert_produk') != null){
            echo '$("document").ready(function() {';
            echo '$("#modal-add-produk").modal("show")';
            echo '});';
        }

        if($this->session->userdata('error_update_produk') != null){
            echo '$("document").ready(function() {';
            echo '$("#modal-edit-produk").modal("show")';
            echo '});';
        }
        
        if($this->session->userdata('success_deletegambar_produk') != null){
            echo '$("document").ready(function() {';
            echo '$("#modal-edit-produk").modal("show")';
            echo '});';
        }
        
        if($this->session->userdata('success_update_produk') != null){
            $message = $this->session->userdata('success_update_produk');
            echo 'alert("'.$message.'")';
        }

        if($this->session->userdata('success_delete_produk') != null){
            $message = $this->session->userdata('success_delete_produk');
            echo 'alert("'.$message.'")';
        }
    ?>
</script>
<script>
    $('.produk-list').on('click', '.produk-btn', function() {
        var id = $(this).data('id');
        $.ajax({
            type: "GET",
            url: "http://localhost/infowarung/produk/"+id,
            data: null, 
            success: function(data){
                if(data.status =='success'){
                    $("#modal-edit-produk").find('input[name="id_produk"]').val( id );
                    $("#modal-edit-produk").find('input[name="nama_produk"]').val( data.produk.nama );
                    $("#modal-edit-produk").find('input[name="harga"]').val( data.produk.harga );
                    $("#modal-edit-produk").find('input[name="stok"]').val( data.produk.stok );
                    $("#modal-edit-produk").find('.btn-hapus-produk').attr("data-id", id);
                    if (data.produk.gambar != '') {
                        $("#modal-edit-produk .update_gambar").html(
                            "<label for='formFile' class='form-label'>Gambar Produk</label><div class='warung_foto'><img class='foto_warung_detail' src='<?php echo base_url()?>assets/img/produk/"+data.produk.gambar+"'><button data-id='"+data.produk.id+"' type='button' class='btn btn-danger btn_hapus_gambar_produk'>X</button></div>"
                        );
                    }
                } else {
                    alert(data.message);
                }
            }
        }); 
    }); 

    $('#modal-edit-produk').on('click', '.btn_hapus_gambar_produk', function() {
        var id = $(this).data('id');
        $.ajax({
            type: "DELETE",
            url: "http://localhost/infowarung/produk/deletegambar/"+id,
            data: null, 
            success: function(data){
                if(data.status =='success'){
                    alert(data.message);
                } else {
                    alert('Terjadi Kesalahan Server');
                }
            }
        }); 
    }); 

    $('#modal-edit-produk').on('click', '.btn-hapus-produk', function() {
        var id = $(this).data('id');
        $.ajax({
            type: "DELETE",
            url: "http://localhost/infowarung/produk/delete/"+id,
            data: null, 
            success: function(data){
                if(data.status =='success'){
                    if(!alert(data.message)){
                        window.location.reload();  
                    }
                } else {
                    alert('Terjadi Kesalahan Server');
                }
            }
        }); 
    }); 

    $("#select-kategori-produk").on('change', function() {
        var id_kategori = $(this).val();
        $.ajax({
            type: "GET",
            url: "http://localhost/infowarung/produk/filter/"+id_kategori,
            data: null, 
            success: function(data){
                $(".produk-list .row").empty();
                if(data.status =='success'){
                    $.each(data.produk, function(k, v) {
                        $(".produk-list .row").append(
                            "<div id='produk-info-filtered' class='produk-info col-md-3'><button data-id='"+v.id+"' type='button' class='btn produk-btn' data-bs-toggle='modal' data-bs-target='#modal-edit-produk'><img class='produk-info-gambar' src='<?php echo base_url()?>assets/img/produk/"+v.gambar+"'/><p class='produk-info-nama'>"+v.nama+"</p></button></div>"
                        );
                    });
                } else {
                    $(".produk-list .row").append(
                            "<center><p>Tidak Ada Produk</p></center>"
                    );
                }
            }
        }); 
    }); 
</script>
</body>
</html>