<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class UserModels extends CI_Model {
    public function __construct(){
         parent::__construct();
    }

    public function insert($data = null){
        $query = $this->db->insert('user',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function getAll(){
        $query = $this->db->get('user');
        return $query;
    }

    public function getWhere($where){
        $query = $this->db
                ->where('email',$where["email"])
                ->or_where('telepon',$where["telepon"])
                ->get('user');
        return $query;
    }

    public function update($data = null, $where = null){
        $query = $this->db->update('user',$data, $where);
        return $query;
    }

    public function delete($where){
        $query = $this->db->delete('user', $where);
        return $query;
    }
}