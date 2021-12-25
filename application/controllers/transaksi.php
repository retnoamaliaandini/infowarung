<?php
defined('BASEPATH') or exit ('no direct script access allowed');

class Transaksi extends CI_Controller{

    function __construct(){
        parent::__construct();
    }

    public function getTransaksifilter($month){
        $yearonly = strtok($month, '-');
        $monthonly = substr($month, strpos($month, "-") + 1);

        $transaksi = $this->transaksimodels->getFiltered($yearonly, $monthonly)->result();
        $return = array(
            'status' => 'success',
            'transaksi' => $transaksi
        );

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($return));
    }

    public function simpanTransaksi(){
        $userid = $this->session->userdata('user_id');
        if ($userid == NULL) {
            redirect(site_url('login'));
        }
        
        $input = $this->input->post();
        $transaksi = $input["transaksi"];

        $warungfilter = array(
            'id_user' => $userid  
        );

        $datawarung = $this->warungmodels->getWhere($warungfilter)->row();

        $datatransaksi = array(
            'id_warung' => $datawarung->id,
            'pemasukan' => $transaksi["total"]
        );

        if($this->transaksimodels->insert($datatransaksi)){
            $id_transaksi = $this->db->insert_id();
            foreach($transaksi["data"] as $detail){
                $datadetail = array(
                    'id_transaksi' => $id_transaksi,
                    'id_produk' => $detail["id_produk"],
                    'quantity' => $detail["quantity"],
                    'total_harga' => $detail["total_harga"]
                );

                $this->transaksimodels->insertdetail($datadetail);
            }
        } else {
            $return = array(
                'status' => 'error',
                'message' => 'Terjadi Kesalahan Server, Mohon coba beberapa saat lagi'
            );
        }

        $return = array(
            'status' => 'success',
            'message' => 'Transaksi Berhasil Disimpan'
        );

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($return));
    }
}