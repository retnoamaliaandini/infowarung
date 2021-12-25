<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class TransaksiModels extends CI_Model {
    public function __construct(){
         parent::__construct();
    }

    public function insert($data = null){
        $query = $this->db->insert('transaksi',$data);
        return $query;
    }

    public function insertdetail($data = null){
        $query = $this->db->insert('transaksi_detail',$data);
        return $query;
    }

    public function getAll(){
        $query = $this->db
            ->order_by("created_at", "asc")
            ->get('transaksi');
        return $query;
    }

    public function getFiltered($year,$month){
        $query = $this->db
            ->where('year(created_at)', $year)
            ->where('month(created_at)', $month)
            ->order_by("created_at", "asc")
            ->get('transaksi');
        return $query;
    }

    public function getAlldetail(){
        $query = $this->db->insert('transaksi_detail');
        return $query;
    }

    public function getWhere($where){
        $query = $this->db
            ->order_by("created_at", "asc")
            ->get_where('transaksi', $where);
        return $query;
    }

    public function getWheredetail(){
        $query = $this->db->get_where('transaksi_detail',$where);
        return $query;
    }

    public function getSumPemasukan($month){
        $query = $this->db
            ->select('SUM(pemasukan) as total_pemasukan')
            ->where('month(created_at)', $month)
            ->get('transaksi');
        return $query;
    }
}