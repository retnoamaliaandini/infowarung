<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class ProdukModels extends CI_Model {
    public function __construct(){
         parent::__construct();
    }

    public function insert($data = null){
        $query = $this->db->insert('produk',$data);
        return $query;
    }

    public function getAll(){
        $query = $this->db->get('produk');
        return $query;
    }

    public function getWhere($where){
        $query = $this->db->get_where('produk', $where);
        return $query;
    }

    public function update($data = null, $where = null){
        $query = $this->db->update('produk',$data, $where);
        return $query;
    }

    public function updatestok($stok = null, $id = null){
        $query = $this->db
            ->where('id', $id)
            ->set('stok', 'stok+'.$stok, FALSE)
            ->update('produk');
        return $query;
    }

    public function delete($where){
        $query = $this->db->delete('produk', $where);
        return $query;
    }
}