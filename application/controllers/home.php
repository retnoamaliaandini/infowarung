<?php
defined('BASEPATH') or exit ('no direct script access allowed');

class Home extends CI_Controller{

    function __construct(){
        parent::__construct();
    }

    public function index(){
        $warung = $this->warungmodels->getAll()->result();
        $data = array(
            'warung' => $warung
        );

        $this->load->view('home', $data);
    }

    public function stok_warung($id){
        $warungfilter = array(
            'id' => $id  
        );

        $produkfilter = array(
            'id_warung' => $id
        );

        $data = array(
            'warung' => $this->warungmodels->getWhere($warungfilter)->row(),
            'produk' => $this->produkmodels->getWhere($produkfilter)->result(),
            'kategori' => $this->produkkategorimodels->getAll()->result()
        );
        
        $this->load->view('stok_warung', $data);
    }

    public function sign_up(){
        $this->load->view('sign_up');
    }

    public function login(){
        $this->load->view('login');
    }

    public function dashboard(){
        $userid = $this->session->userdata('user_id');
        if ($userid == NULL) {
            redirect(site_url('login'));
        }

        $warungfilter = array(
          'id_user' => $userid  
        );
        $warung = $this->warungmodels->getWhere($warungfilter)->row();
        
        $transaksifilter = array(
            'id_warung' => $warung->id  
        );
        
        $transaksi = $this->transaksimodels->getWhere($transaksifilter)->result();

        $pendapatanTransaksi = [];
        $monthTransaksi = [];
        $existingmonth = "";
        foreach($transaksi as $t){
            $month = date("F Y", strtotime($t->created_at));

            if($month != $existingmonth) {
                array_push($monthTransaksi, $month);
                $pemasukan = $this->transaksimodels->getSumPemasukan(date("m", strtotime($t->created_at)))->row();
                array_push($pendapatanTransaksi, $pemasukan->total_pemasukan);
            } 

            $existingmonth = $month;
        }

        $data = array(
            'nama' => $warung->nama,
            'status' => $warung->status==1 ? 'Buka' : 'Tutup' , 
            'month_transaksi' => $monthTransaksi,
            'pendapatan_transaksi' => $pendapatanTransaksi
        );

        $this->load->view('admin/navbar');
        $this->load->view('admin/dashboard', $data);
    }

    public function detailwarung(){
        $userid = $this->session->userdata('user_id');
        if ($userid == NULL) {
            redirect(site_url('login'));
        }

        $warungfilter = array(
            'id_user' => $userid  
          );
        $warung = $this->warungmodels->getWhere($warungfilter)->row();

        $this->load->view('admin/navbar');
        $this->load->view('admin/detailwarung', $warung);
    }

    public function kelolaproduk(){
        $userid = $this->session->userdata('user_id');
        if ($userid == NULL) {
            redirect(site_url('login'));
        }

        $warungfilter = array(
            'id_user' => $userid  
        );

        $datawarung = $this->warungmodels->getWhere($warungfilter)->row();

        $produkfilter = array(
            'id_warung' => $datawarung->id  
        );

        $data = array(
            'produk' => $this->produkmodels->getWhere($produkfilter)->result(),
            'kategori' => $this->produkkategorimodels->getAll()->result()
        );

        $this->load->view('admin/navbar');
        $this->load->view('admin/kelolaproduk', $data);
    }

    public function stokproduk(){
        $userid = $this->session->userdata('user_id');
        if ($userid == NULL) {
            redirect(site_url('login'));
        }

        $warungfilter = array(
            'id_user' => $userid  
        );

        $datawarung = $this->warungmodels->getWhere($warungfilter)->row();

        $produkfilter = array(
            'id_warung' => $datawarung->id  
        );

        $data = array(
            'produk' => $this->produkmodels->getWhere($produkfilter)->result(),
            'kategori' => $this->produkkategorimodels->getAll()->result()
        );

        $this->load->view('admin/navbar');
        $this->load->view('admin/stokproduk', $data);
    }

    public function laporanstok(){
        $userid = $this->session->userdata('user_id');
        if ($userid == NULL) {
            redirect(site_url('login'));
        }

        $warungfilter = array(
            'id_user' => $userid  
        );

        $datawarung = $this->warungmodels->getWhere($warungfilter)->row();
        $data = array(
            'laporan_stok' => $this->stokhistorymodels->getjoinproduk($datawarung->id)->result()
        );

        $this->load->view('admin/navbar');
        $this->load->view('admin/laporanstok', $data);
    }

    public function laporanpemasukan(){
        $userid = $this->session->userdata('user_id');
        if ($userid == NULL) {
            redirect(site_url('login'));
        }

        $data = array(
            'laporan_pemasukan' => $this->transaksimodels->getAll()->result()
        );

        $this->load->view('admin/navbar');
        $this->load->view('admin/laporanpemasukan', $data);
    }

    public function transaksi(){
        $userid = $this->session->userdata('user_id');
        if ($userid == NULL) {
            redirect(site_url('login'));
        }

        $warungfilter = array(
            'id_user' => $userid  
        );

        $datawarung = $this->warungmodels->getWhere($warungfilter)->row();
        $produkfilter = array(
            'id_warung' => $datawarung->id  
        );

        $data = array(
            'produk' => $this->produkmodels->getWhere($produkfilter)->result()
        );

        $this->load->view('admin/navbar');
        $this->load->view('admin/transaksi', $data);
    }
}