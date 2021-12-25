<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="<?php echo base_url()?>assets/css/home.css" rel="stylesheet">
    <title>InfoWarung-SignUp</title>
</head>
<body>
    <center>
        <div class="halaman_sign_up">
            <div class="container">
                <h1 class="title_sign_up">Sign Up</h1>
                <?php echo form_open('auth/daftar'); ?>
                    <div class="form_sign_up">
                        <?php
                            if($this->session->userdata('error_signup') != null)
                            {
                                echo '<div class="alert alert-danger" role="alert">';
                                echo $this->session->userdata('error_signup');
                                echo '</div>';
                            }
                        ?>
                        <div class="form-floating mb-3">
                            <input name="nama_warung" type="text" class="form-control" id="floatingInput" placeholder="nama warung">
                            <label for="floatingInput">Nama Warung</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="alamat_warung" type="text" class="form-control" id="floatingPassword" placeholder="alamat warung">
                            <label for="floatingPassword">Alamat Warung</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="penanggung_jawab" type="text" class="form-control" id="floatingPassword" placeholder="penanggung jawab">
                            <label for="floatingPassword">Penanggung Jawab</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="telepon" type="text" class="form-control" id="floatingPassword" placeholder="no telepon">
                            <label for="floatingPassword">Nomor Telepon</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="email" type="email" class="form-control" id="floatingPassword" placeholder="alamat email">
                            <label for="floatingPassword">Alamat Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="passkonfirm" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Konfirmasi Password</label>
                        </div>
                        <button type="submit" class="btn btn-dark button_sign_up">Sign Up</button>
                    </div>
                <?php echo form_close(); ?>
                <p class="informasi_sign_up">Sudah Memiliki Akun?<a href="#"> Login Sekarang</a></p>
            </div>
        </div>

            
    </center>
    

    <!--JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>