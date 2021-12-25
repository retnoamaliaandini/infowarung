<!--Main layout-->
<main style="margin-top: 58px;">
    <div class="container">
        <h2 class="dashboard-title">Detail Warung</h2>
        <div class="detail-warung-form">
            <?php
                if($this->session->userdata('error_update_warung') != null){
                    echo '<div class="alert alert-danger" role="alert">';
                    echo $this->session->userdata('error_update_warung');
                    echo '</div>';
                }
            ?>
            <?php echo form_open_multipart('warung/update'); ?>
            <?php if ($foto == NULL): ?>
            <div class="mb-3">
                <label for="formFile" class="form-label">Foto Warung</label>
                <input name="foto_warung" class="form-control" type="file" id="formFile">
            </div>
            <?php else: ?>
                <div class="warung_foto">
                    <img class="foto_warung_detail" src="<?php echo base_url()?>assets/img/warung/<?php echo $foto ?>">
                    <button id="btn_hapus_foto_detail" type="button" class="btn btn-danger">X</button>
                </div>
            <?php endif; ?>
            <div class="form-group mb-3">
                <label>Nama Warung</label>
                <input name="nama_warung" type="text" class="form-control" placeholder="Nama Warung" value="<?php echo $nama ?>">
            </div>
            <div class="form-group mb-3">
                <label>Alamat Warung</label>
                <input name="alamat_warung" type="text" class="form-control" placeholder="Alamat Warung" value="<?php echo $alamat ?>">
            </div>
            <div class="form-group mb-3">
                <label>Penanggung Jawab</label>
                <input name="penanggung_jawab" type="text" class="form-control" placeholder="Penanggung Jawab" value="<?php echo $penanggung_jawab ?>">
            </div>
            <div class="row mb-3">
                <div class="col-md-6">   
                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input name="telepon" type="text" class="form-control" placeholder="Nomor Telepon" value="<?php echo $telepon ?>">
                    </div>
                </div>
                <div class="col-md-6">      
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo $email ?>">
                    </div>
                </div>
            </div>
            <div class="stok-produk-update">
                <button type="submit" class="btn btn-dark stok-update-btn">Perbaharui</button>
            </div> 
            <?php echo form_close(); ?>
        </div>
        <div class="detail-warung-update-pass-form">
            <h3 class="mb-3">Ubah Password</h3>
            <?php
                if($this->session->userdata('error_update_pass') != null){
                    echo '<div class="alert alert-danger" role="alert">';
                    echo $this->session->userdata('error_update_pass');
                    echo '</div>';
                }
            ?>
            <?php echo form_open('warung/updatepass'); ?>
            <div class="form-group mb-3">
                <label for="exampleInputPassword1">Password Lama</label>
                <input name="password_lama" type="password" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Password Lama">
            </div>
            <div class="form-group mb-3">
                <label for="exampleInputPassword1">Password Baru</label>
                <input name="password_baru" type="password" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Password Baru">
            </div>
            <div class="form-group mb-3">
                <label for="exampleInputPassword1">Konfirmasi Password Baru</label>
                <input name="password_baru_konfirm" type="password" class="form-control" id="exampleInputPassword1" placeholder="Konfirmasi Password Baru">
            </div>

            <div class="stok-produk-update">
                <button type="submit" class="btn btn-dark stok-update-btn">Perbaharui</button>
            </div> 
            <?php echo form_close(); ?>
        </div>
    </div>
</main>
<!--Main layout-->

<!--JS-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    <?php
        if($this->session->userdata('success_update_warung') != null){
            $message = $this->session->userdata('success_update_warung');
            echo 'alert("'.$message.'")';
        }

        if($this->session->userdata('success_update_pass') != null){
            $message = $this->session->userdata('success_update_pass');
            echo 'alert("'.$message.'")';
        }
    ?>
</script>
<script>
    $("#btn_hapus_foto_detail").click(function(){
        $.ajax({
            type: "POST",
            url: "http://localhost/infowarung/hapusfotowarung",
            data: null, 
            success: function(data){
                if(data.status =='success'){
                    alert(data.message);
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