<?php
defined('BASEPATH') or exit ('no direct script access allowed');

class Home extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->helper('url');
    }

    public function index(){
        $this->load->view('home');
    }

    public function stok_warung(){
        $this->load->view('stok_warung');
    }

    public function sign_up(){
        $this->load->view('sign_up');
    }

    public function login(){
        $this->load->view('login');
    }

    public function dashboard(){
        $this->load->view('admin/navbar');
        $this->load->view('admin/dashboard');
    }

    public function kelolaproduk(){
        $this->load->view('admin/navbar');
        $this->load->view('admin/kelolaproduk');
    }

    public function stokproduk(){
        $this->load->view('admin/navbar');
        $this->load->view('admin/stokproduk');
    }

    public function laporanstok(){
        $this->load->view('admin/navbar');
        $this->load->view('admin/laporanstok');
    }

    public function laporanpemasukan(){
        $this->load->view('admin/navbar');
        $this->load->view('admin/laporanpemasukan');
    }

    public function transaksi(){
        $this->load->view('admin/navbar');
        $this->load->view('admin/transaksi');
    }
}