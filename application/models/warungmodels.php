<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class WarungModels extends CI_Model {
    public function __construct(){
         parent::__construct();
    }

    public function insert($data = null){
        $query = $this->db->insert('warung',$data);
        return $query;
    }

    public function getAll(){
        $query = $this->db->get('warung');
        return $query;
    }

    public function getWhere($where){
        $query = $this->db->get_where('warung', $where);
        return $query;
    }

    public function getFilteredNama($name){
        $query = $this->db->like('nama', $name)
                ->get('warung')
                ->result();
        return $query;
    }

    public function update($data = null, $where = null){
        $query = $this->db->update('warung',$data, $where);
        return $query;
    }

    public function delete($where){
        $query = $this->db->delete('warung', $where);
        return $query;
    }
}