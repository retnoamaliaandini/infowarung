<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="<?php echo base_url()?>assets/css/home.css" rel="stylesheet">
    <title>InfoWarung-Login</title>
</head>
<body>
    <center>
        <div class="halaman_login">
            <div class="container">
                <h1 class="title_sign_up">Login</h1>
                <div class="form_sign_up">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="nama warung">
                        <label for="floatingInput">Alamat Email/Nomor Telepon</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="alamat warung">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <button type="submit" class="btn btn-dark button_login">Login</button>
                </div>
                    <p class="informasi_sign_up">Belum Memiliki Akun?<a href="#"> Daftar Sekarang</a></p>
            </div>
        </div>    
    </center>
    <!--JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>