<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Persyaratan_m extends CI_Model {

    private $table = 'surat_syarat';
    private $ID = 'idsurat_syarat';

    public function getAll(){
        return $this->db->select('*')
                        ->join('surat','surat.idsurat=surat_syarat.surat_id')
                        ->order_by('surat_id')
                        ->get($this->table)->result_array();
    }

    public function tambah($data){
        $this->db->insert($this->table,$data);
    }

    public function hapus($id){
        $this->db->delete($this->table,[$this->ID=>$id]);
    }

}

/* End of file Persyaratan_m.php */