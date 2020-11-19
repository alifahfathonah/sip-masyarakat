<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_m extends CI_Model {

    private $table = 'surat';
    private $ID = 'idsurat';

    public function getAll(){
        return $this->db->get($this->table)->result_array();
    }

    public function getById($id){
        return $this->db->get_where($this->table,[$this->ID=>$id])->row_array();
    }

    public function tambah($data){
        $this->db->insert($this->table,$data);
    }

    public function hapus($id){
        $this->db->delete($this->table,[$this->ID=>$id]);
    }

}

/* End of file Surat_m.php */