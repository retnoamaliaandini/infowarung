<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class ProdukKategoriModels extends CI_Model {
    public function __construct(){
         parent::__construct();
    }

    public function getAll(){
        $query = $this->db->get('produk_kategori');
        return $query;
    }
}