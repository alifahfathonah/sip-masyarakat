<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Persyaratan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('persyaratan_m');
    }
    
    public function index()
    {
        $data['master'] = $data['persyaratan'] = true;
        $data['persyaratan_all'] = $this->persyaratan_m->getAll();
        $data['content'] = 'master/persyaratan';
        $this->load->view('index',$data);
    }

    public function add(){
        $data = [ 
            'surat_id'=>$this->input->post('surat_id',true),
            'nama_syarat'=>$this->input->post('nama_syarat',true)
        ];
        $this->persyaratan_m->tambah($data);
        $this->session->set_flashdata('success','Data persyaratan berhasil di tambahkan');
        redirect('master/persyaratan');
    }

    public function delete($id){
        if(check_id('berkas','surat_syarat_id',$id)==0){
            $this->persyaratan_m->hapus($id);
            $this->session->set_flashdata('success','Data persyaratan berhasil di hapus');
        }else{
            $this->session->set_flashdata('error','Data persyaratan telah terkait, sehingga gagal di hapus');
        }
        redirect('master/persyaratan');
    }

}

/* End of file Persyaratan.php */