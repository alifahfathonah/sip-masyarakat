<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('pengguna_m');
    }
    
    public function index()
    {
        $data['master'] = $data['pengguna'] = true;
        $data['pengguna_all'] = $this->pengguna_m->getAll();
        $data['content'] = 'master/pengguna';
        $this->load->view('index',$data);
    }

    public function add(){
        $this->form_validation->set_rules('username','Username','required|is_unique[users.username]');
        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('error','Username telah di gunakan !');
        }else{
            $data = [ 
                'username'=>$this->input->post('username',true),
                'password'=>password_hash($this->input->post('password',true), PASSWORD_DEFAULT),
                'level'=>'admin'
            ];
            $this->pengguna_m->tambah($data);
            $this->session->set_flashdata('success','Data pengguna berhasil di tambahkan');
        }
        redirect('master/pengguna');
    }

    public function delete($id){
        if(check_id('surat_syarat','surat_id',$id)==0){
            $this->pengguna_m->hapus($id);
            $this->session->set_flashdata('success','Data pengguna berhasil di hapus');
        }else{
            $this->session->set_flashdata('error','Data pengguna telah terkait, sehingga gagal di hapus');
        }
        redirect('master/pengguna');
    }

}

/* End of file Pengguna.php */