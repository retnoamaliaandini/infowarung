<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="<?php echo base_url()?>assets/css/home.css" rel="stylesheet">
    <title>InfoWarung</title>
</head>
<body>
    <div class= "stok_header" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('../assets/img/warung/<?php echo $warung->foto; ?>');">  
        <div class = "container">
            <a href="<?php echo base_url()?>" class="btn btn-light tombol_stok_warung">Kembali</a>
            <center>
                <h1 class="stok_nama_warung"><?php echo $warung->nama; ?></h1>
            </center>
        </div>  
    </div>

    <div class = "stok_navbar">
            <nav class="navbar navbar-expand-lg navbar-light stok_navbar">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <?php foreach($kategori as $k){ ?>
                            <li class="nav-item">
                                <button type="button" class="btn btn-secondary btn-kategori-stok" data-id="<?php echo $k->id?>"><?php echo $k->kategori?></button>
                            </li>
                                <?php  if( next( $kategori ) ) { ?>
                                    <li class="nav-item">
                                    <p class="stok_navbar_spacer">|</p>
                                </li>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </nav>
    </div>

    <div class ="stok_barang">
        <div class ="container">
            <center>
            <div class="list_stok_barang">
                <div class="row stok_barang_section">
                    <?php foreach($produk as $p){ ?>
                    <div class="col-md-4">
                        <img class="gambar_produk" src = "<?php echo base_url()?>assets/img/produk/<?php echo $p->gambar?>">
                        <p class="nama_produk"><?php echo $p->nama?></p>
                        <p class="data_produk">Stok : <?php echo $p->stok?></p>
                        <p class="data_produk">harga : Rp. <?php echo $p->harga?></p>
                    </div>
                    <?php } ?>    
                </div>
            </div>
            </center>
        </div>
    </div>



     <!--JS-->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        $(".btn-kategori-stok").on('click', function() {
            id = $(this).data('id');
            id_warung = $(location).attr("href").split('/').pop();
            $.ajax({
                type: "GET",
                url: "http://localhost/infowarung/produk/filter/user/"+id+"/"+id_warung,
                data: null, 
                success: function(data){
                    $(".stok_barang_section").empty();
                    if(data.status =='success'){
                        $.each(data.produk, function(k, v) {
                            $(".stok_barang_section").append(
                                '<div class="col-md-4"><img class="gambar_produk" src = "<?php echo base_url()?>assets/img/produk/'+v.gambar+'"><p class="nama_produk">'+v.nama+'</p><p class="data_produk">Stok : '+v.stok+'</p><p class="data_produk">harga : Rp. '+v.harga+'</p></div>'
                            );
                        });
                    } else {
                        $(".stok_barang_section").append(
                                "<center><p style='padding-bottom:100px;'>Tidak Ada Produk</p></center>"
                        );
                    }
                }
            }); 
        });
    </script>
</body>
</html>