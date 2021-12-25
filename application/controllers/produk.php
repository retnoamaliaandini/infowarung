<?php
defined('BASEPATH') or exit ('no direct script access allowed');

class Produk extends CI_Controller{

    function __construct(){
        parent::__construct();

        $config['upload_path']      = FCPATH . 'assets/img/produk/';
        $config['allowed_types']    = '*';
        $config['max_size']         = 2048;
        $config['encrypt_name']     = TRUE;
        $config['overwrite']        = TRUE;
        $config['max_width']        = 0;
        $config['max_height']       = 0;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if( ! is_dir($config['upload_path'])) {
            @mkdir($config['upload_path'], 0755, true);
        }
    }

    public function create(){
        $userid = $this->session->userdata('user_id');
        if ($userid == NULL) {
            redirect(site_url('login'));
        }

        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('kategori_produk', 'Kategori Produk', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error_insert_produk', validation_errors());
            redirect(site_url('produk/kelola'));
        } else {
            $warungfilter = array(
                'id_user' => $userid  
            );
    
            $datawarung = $this->warungmodels->getWhere($warungfilter)->row();

            $data = array(
                'id_warung' => $datawarung->id,
                'id_kategori' => $this->input->post('kategori_produk'),
                'nama' => $this->input->post('nama_produk'),
                'harga' => $this->input->post('harga'),
                'stok' => $this->input->post('stok'),
            );

            if(!$this->upload->do_upload('gambar_produk')) {
                $this->session->set_flashdata('error_insert_produk', 'Terjadi Kesalahan Server. Mohon Diulangi Beberapa Saat Lagi');
                redirect(site_url('produk/kelola'));
            } else {
                $upload_data = $this->upload->data();
                $data["gambar"] = $upload_data['file_name'];
            }

            if($this->produkmodels->insert($data)){
                redirect(site_url('produk/kelola'));
            } else {
                $this->session->set_flashdata('error_insert_produk', 'Terjadi Kesalahan Server. Mohon Diulangi Beberapa Saat Lagi');
                redirect(site_url('produk/kelola'));
            }
        }
    }

    public function update(){
        $userid = $this->session->userdata('user_id');
        if ($userid == NULL) {
            redirect(site_url('login'));
        }

        $this->form_validation->set_rules('id_produk', 'Id Produk', 'required');
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error_update_produk', 'Data Tidak Valid! Mohon di Cek Kembali.');
            redirect(site_url('produk/kelola'));
        } else {
            $data = array(
                'nama' => $this->input->post('nama_produk'),
                'harga' => $this->input->post('harga'),
                'stok' => $this->input->post('stok'),
                'updated_at' => date("Y-m-d H:i:s")
            );
            
            $produkfilter = array(
                'id' => $this->input->post('id_produk')  
            );
            
            if (!empty($_FILES['gambar_produk']['name'])) {
                if(!$this->upload->do_upload('gambar_produk')) {
                    $this->session->set_flashdata('error_update_produk', 'Terjadi Kesalahan Server. Mohon Coba Beberapa Saat Lagi');
                    redirect(site_url('produk/kelola'));
                } else {
                    $upload_data = $this->upload->data();
                    $data["gambar"] = $upload_data['file_name'];
                }
            }

            if ($this->input->post('kategori_produk') != ''){
                $data["id_kategori"] = $this->input->post('kategori_produk');
            }

            if($this->produkmodels->update($data,$produkfilter)){
                $this->session->set_flashdata('success_update_produk', 'Berhasil Mengupdate Produk');
                redirect(site_url('produk/kelola'));
            } else {
                $this->session->set_flashdata('error_update_produk', 'Terjadi Kesalahan Server. Mohon Mencoba beberapa saat lagi');
                redirect(site_url('produk/kelola'));
            }
        }
    }

    public function get($id){
        $userid = $this->session->userdata('user_id');
        if ($userid == NULL) {
            redirect(site_url('login'));
        }

        $produkfilter = array(
            'id' => $id  
        );
        $produk = $this->produkmodels->getWhere($produkfilter)->row();

        if(!$produk){
            $return = array(
                'status' => 'error',
                'message' => 'Terjadi Kesalahan Server. Mohon Diulangi Beberapa Saat Lagi'
            );
        } else {
            $return = array(
                'status' => 'success',
                'produk' => $produk
            );
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($return));
    }

    public function getfilter($id){
        $userid = $this->session->userdata('user_id');
        if ($userid == NULL) {
            redirect(site_url('login'));
        }

        if($id != 0) {
            $warungfilter = array(
                'id_user' => $userid  
            );
    
            $datawarung = $this->warungmodels->getWhere($warungfilter)->row();

            $produkfilter = array(
                'id_kategori' => $id,
                'id_warung' => $datawarung->id
            );
            
            $produk = $this->produkmodels->getWhere($produkfilter)->result();
            if(!$produk){
                $return = array(
                    'status' => 'error',
                    'message' => 'Terjadi Kesalahan Server. Mohon Diulangi Beberapa Saat Lagi'
                );
            } else {
                $return = array(
                    'status' => 'success',
                    'produk' => $produk
                );
            }
        } else {
            $warungfilter = array(
                'id_user' => $userid  
            );
    
            $datawarung = $this->warungmodels->getWhere($warungfilter)->row();
    
            $produkfilter = array(
                'id_warung' => $datawarung->id  
            );

            $return = array(
                'status' => 'success',
                'produk' => $this->produkmodels->getWhere($produkfilter)->result()
            );
        }
        

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($return));
    }

    public function getfilterForUser($id_kategori, $id_warung){
        if($id_kategori != 0) {
            $produkfilter = array(
                'id_kategori' => $id_kategori,
                'id_warung' => $id_warung
            );
            
            $produk = $this->produkmodels->getWhere($produkfilter)->result();
            if(!$produk){
                $return = array(
                    'status' => 'error',
                    'message' => 'Terjadi Kesalahan Server. Mohon Diulangi Beberapa Saat Lagi'
                );
            } else {
                $return = array(
                    'status' => 'success',
                    'produk' => $produk
                );
            }
        }
        

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($return));
    }

    public function delete($id){
        $userid = $this->session->userdata('user_id');
        if ($userid == NULL) {
            redirect(site_url('login'));
        }

        $produkfilter = array(
            'id' => $id  
        );

        $produk = $this->produkmodels->getWhere($produkfilter)->row();
        $gambarproduk = FCPATH . 'assets/img/produk/'.$produk->gambar;
        unlink($gambarproduk);
        if($this->produkmodels->delete($produkfilter)){
            $return = array(
                'status' => 'success',
                'message' => 'produk berhasil dihapus'
            );
        } else {
            $return = array(
                'status' => 'error',
                'message' => 'produk gagal dihapus'
            );
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($return));
    }

    public function deletegambar($id){
        $userid = $this->session->userdata('user_id');
        if ($userid == NULL) {
            redirect(site_url('login'));
        }

        $data = array(
            'gambar' => '',
            'updated_at' => date("Y-m-d H:i:s")
        );
        
        $produkfilter = array(
            'id' => $id  
        );
        $produk = $this->produkmodels->getWhere($produkfilter)->row();

        if($this->produkmodels->update($data,$produkfilter)){
            $gambarproduk = FCPATH . 'assets/img/warung/'.$produk->gambar;
            unlink($gambarproduk);
            $this->session->set_flashdata('success_deletegambar_produk', 'Berhasil Menghapus Gambar Produk');
            $return = array(
                'status' => 'success',
                'message' => 'gambar produk berhasil dihapus'
            );
        } else {
            $return = array(
                'status' => 'error',
                'message' => 'gambar produk gagal dihapus'
            );
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($return));
    }

    public function updatestok(){
        $userid = $this->session->userdata('user_id');
        if ($userid == NULL) {
            redirect(site_url('login'));
        }
        
        $input = $this->input->post();
        $update = $input["update"];

        foreach($update as $upd){
            $produkfilter = array(
                'id' => $upd["id"]  
            );
            
            $produk = $this->produkmodels->getWhere($produkfilter)->row();
            $stok_awal = $produk->stok;
            if($produk){
                if($this->produkmodels->updatestok($upd["tambahstok"],$upd["id"])){
                    $stokhistory = array(
                        'id_barang' => $upd["id"],
                        'id_warung' => $produk->id,
                        'tipe' => 'masuk',
                        'stok_awal' => $stok_awal,
                        'jumlah' => $upd["tambahstok"],
                        'stok_akhir' => $stok_awal + $upd["tambahstok"]
                    );
                    $this->stokhistorymodels->insert($stokhistory);
                    $return = array(
                        'status' => 'success',
                        'message' => 'stok produk berhasil diupdate'
                    );
                } else {
                    $return = array(
                        'status' => 'error',
                        'message' => 'Terjadi Kesalahan Server, Mohon coba beberapa saat lagi'
                    );
                }
            } else {
                $return = array(
                    'status' => 'error',
                    'message' => 'Terjadi Kesalahan Server, Mohon coba beberapa saat lagi'
                );
            }
            
        } 

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($return));
    }
}