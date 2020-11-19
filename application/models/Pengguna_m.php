<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna_m extends CI_Model {

    private $table = 'users';
    private $ID = 'idusers';

    public function getAll(){
        return $this->db->get($this->table)->result_array();
    }

    public function tambah($data){
        $this->db->insert($this->table,$data);
    }

    public function hapus($id){
        $this->db->delete($this->table,[$this->ID=>$id]);
    }

}

/* End of file Pengguna_m.php */