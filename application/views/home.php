<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?php echo base_url()?>assets/css/home.css" rel="stylesheet">
    <title>InfoWarung</title>
</head>
<body>
    <div class = "header">
        <div class ="container">
            <div class="row">
                <div class="col-md-10">
                    <img class="logo"src ="<?php echo base_url()?>assets/img/logo.png">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-dark tombol_buka_warung">Buka Warung</button>
                </div>    
            </div>
        </div>  
    </div>

    <div class="container">
        <div class="input-group mb-3 search">
            <span class="input-group-text" id="basic-addon1"><i class="fa fa-search" style="font-size:24px"></i></span>
            <input type="text" class="form-control" placeholder="Cari Warung Terdekat" aria-label="Username" aria-describedby="basic-addon1">
        </div>
    </div>

    <div class="list_warung">
        <div class="container">
            <div class="row">
                <div class ="col-md-6">
                    <div class="warung1">
                        <div class="row">
                            <div class ="col-md-6">
                                <img class="gambar_warung"src="<?php echo base_url()?>assets/img/warung1.jpg">
                            </div>
                            <div class ="col-md-6 identitas_warung">
                                <p>Warung Sembako Pak Eko</p>
                                <p>Jalan apa aja</p>
                                <p>0.3Km</p>
                                <a class="home_lihat"href="#">Lihat</a>
                            </div>
                        </div>
                    </div>
                    <div class="warung1">
                        <div class="row">
                            <div class ="col-md-6">
                                <img class="gambar_warung"src="<?php echo base_url()?>assets/img/warung1.jpg">
                            </div>
                            <div class ="col-md-6 identitas_warung">
                                <p>Warung Sembako Pak Eko</p>
                                <p>Jalan apa aja</p>
                                <p>0.3Km</p>
                                <a class="home_lihat"href="#">Lihat</a>
                            </div>
                        </div>
                    </div>
                </div>  

                <div class ="col-md-6">
                    <div class="warung1">
                        <div class="row">
                            <div class ="col-md-6">
                                <img class="gambar_warung"src="<?php echo base_url()?>assets/img/warung1.jpg">
                            </div>
                            <div class ="col-md-6 identitas_warung">
                                <p>Warung Sembako Pak Eko</p>
                                <p>Jalan apa aja</p>
                                <p>0.3Km</p>
                                <a class="home_lihat"href="#">Lihat</a>
                            </div>
                        </div>
                    </div>
                    <div class="warung1">
                        <div class="row">
                            <div class ="col-md-6">
                                <img class="gambar_warung"src="<?php echo base_url()?>assets/img/warung1.jpg">
                            </div>
                            <div class ="col-md-6 identitas_warung">
                                <p>Warung Sembako Pak Eko</p>
                                <p>Jalan apa aja</p>
                                <p>0.3Km</p>
                                <a class="home_lihat"href="#">Lihat</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 


    
    <!--JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>