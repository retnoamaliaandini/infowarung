<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class StokHistoryModels extends CI_Model {
    public function __construct(){
         parent::__construct();
    }

    public function insert($data = null){
        $query = $this->db->insert('stok_history',$data);
        return $query;
    }

    public function getAll(){
        $query = $this->db
            ->order_by("created_at", "asc")
            ->get('stok_history');
        return $query;
    }

    public function getWhere($where){
        $query = $this->db->get_where('stok_history', $where);
        return $query;
    }

    public function getFiltered($year,$month){
        $query = $this->db
            ->where('year(created_at)', $year)
            ->where('month(created_at)', $month)
            ->order_by("created_at", "asc")
            ->get('stok_history');
        return $query;
    }

    public function getjoinproduk($id_warung){
        $query = $this->db
            ->join('produk', 'produk.id = stok_history.id_barang', 'left')
            ->get_where('stok_history', array('stok_history.id_warung'=>$id_warung));
        return $query;
    }
}