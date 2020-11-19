<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan_m extends CI_Model {

    private $table = 'pengajuan_surat';
    private $ID = 'idpengajuansurat';

    public function getAll(){
        return $this->db->select('*')
                    ->join('user_profile x2','x2.users_id=x.user_id')
                    ->join('surat x1','x1.idsurat=x.surat_id')
                    ->where('x.status !=','Buat')
                    ->order_by('x.idpengajuansurat','DESC')
                    ->get($this->table.' x')->result_array();
    }

    public function getAllById($id){
        return $this->db->select('*')
                    ->join('user_profile x2','x2.users_id=x.user_id')
                    ->join('surat x1','x1.idsurat=x.surat_id')
                    ->where('x.user_id',$id)
                    ->order_by('x.idpengajuansurat','DESC')
                    ->get($this->table.' x')->result_array();
    }

    public function getById($id){
        return $this->db->select('*')
                    ->join('user_profile x2','x2.users_id=x.user_id')
                    ->join('surat x1','x1.idsurat=x.surat_id')
                    ->where($this->ID,$id)
                    ->order_by('x.surat_id')
                    ->get($this->table.' x')->row_array();
    }

    public function tambah($data){
        $this->db->insert($this->table,$data);
        return $this->db->insert_id();
    }

    public function sendAjuan($data,$id){
        $this->db->update($this->table,$data,[$this->ID=>$id]);
    }

    public function ubahStatus($data,$id){
        $this->db->update($this->table,$data,[$this->ID=>$id]);
    }

    public function hapus($id){
        $this->db->delete($this->table,[$this->ID=>$id]);
    }

    public function uploadBerkas($data){
        $this->db->insert('berkas',$data);
    }

}

/* End of file Pengajuan_m.php */