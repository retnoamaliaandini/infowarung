<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--FONT AWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!--CSS-->
    <link href="<?php echo base_url()?>assets/css/home.css" rel="stylesheet">
    
    <title>InfoWarung - Admin</title>
</head>
<body>
    <header>
    <!-- Sidebar -->
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
        <div class="position-sticky">
        <div class="list-group list-group-flush mx-3 mt-4">
            <img class="dashboard-logo" src="<?php echo base_url()?>assets/img/logo.png">
            <a href="<?php echo base_url()?>dashboard" class="dashboard-navbar-link list-group-item list-group-item-action py-2" aria-current="true">
                Home
            </a>
            <a class="list-group-item list-group-item-action py-2 ripple dashboard-navbar-link dashboard-navbar-produk-expand" aria-current="true" data-bs-toggle="collapse" href="#collapseExample1" aria-expanded="false" aria-controls="collapseExample1" role="button">
                Produk<span class="produk-expand-arrow"><i class="fa fa-caret-right" style=""></i><i class="fa fa-caret-down"></i></span>
            </a>
            <ul id="collapseExample1" class="collapse list-group list-group-flush dashboard-navbar-link">
                <li class="list-group-item py-1 dashboard-navbar-link">
                    <a href="<?php echo base_url()?>produk/kelola" class="dashboard-navbar-link list-group-item list-group-item-action py-2" aria-current="true">
                        Kelola Produk
                    </a>
                </li>
                <li class="list-group-item py-1 dashboard-navbar-link">
                    <a href="<?php echo base_url()?>produk/stok" class="dashboard-navbar-link list-group-item list-group-item-action py-2" aria-current="true">
                        Stok Produk
                    </a>
                </li>
            </ul>
            <a href="<?php echo base_url()?>transaksi" class="dashboard-navbar-link list-group-item list-group-item-action py-2" aria-current="true">
                Transaksi
            </a>
            <a href="<?php echo base_url()?>laporan/stok" class="dashboard-navbar-link list-group-item list-group-item-action py-2" aria-current="true">
                Laporan Stok
            </a>
            <a href="<?php echo base_url()?>laporan/pemasukan" class="dashboard-navbar-link list-group-item list-group-item-action py-2" aria-current="true">
                Laporan Pemasukan
            </a>
            <a href="#" class="dashboard-navbar-link list-group-item list-group-item-action py-2" aria-current="true">
                Logout
            </a>
        </div>
        </div>
    </nav>
    <!-- Sidebar -->
    </header>
