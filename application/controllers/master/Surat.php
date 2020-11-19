<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('surat_m');
    }
    
    public function index()
    {
        $data['master'] = $data['surat'] = true;
        $data['surat_all'] = $this->surat_m->getAll();
        $data['content'] = 'master/surat';
        $this->load->view('index',$data);
    }

    public function add(){
        $data = [ 
            'nama_surat'=>$this->input->post('nama_surat',true),
            'keterangan'=>$this->input->post('keterangan',true)
        ];
        $this->surat_m->tambah($data);
        $this->session->set_flashdata('success','Data surat berhasil di tambahkan');
        redirect('master/surat');
    }

    public function delete($id){
        if(check_id('surat_syarat','surat_id',$id)==0){
            $this->surat_m->hapus($id);
            $this->session->set_flashdata('success','Data surat berhasil di hapus');
        }else{
            $this->session->set_flashdata('error','Data surat telah terkait, sehingga gagal di hapus');
        }
        redirect('master/surat');
    }

}

/* End of file Surat.php */