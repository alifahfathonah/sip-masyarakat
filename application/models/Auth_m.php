<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_m extends CI_Model {

    private $table = 'users';
    private $ID = 'idusers';

    public function check_username($username){
        return $this->db->get_where($this->table,['username'=>$username])->row_array();
    }

    public function tambah($data){
        $this->db->insert($this->table,$data);
        return $this->db->insert_id();
    }

    public function addProfil($data){
        $this->db->insert('user_profile',$data);
    }

    public function updateProfil($data,$id){
        $this->db->update('user_profile',$data,['iduser_profile'=>$id]);
    }

    public function updatePass($data,$id){
        $this->db->update($this->table,$data,[$this->ID=>$id]);
    }
}

/* End of file Auth_m.php */