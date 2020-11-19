<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('pengajuan_m');
    }
    

    public function index()
    {
        $data['pengajuan_surat'] = true;
        $data['pengajuan_all'] = $this->pengajuan_m->getAll();
        $data['content'] = 'pengajuan';
        $this->load->view('index',$data);
    }

    public function ajuan_pengguna()
    {
        $data['pengajuan_saya'] = true;
        $data['pengajuan_all'] = $this->pengajuan_m->getAllById(__session('iduser'));
        $data['content'] = 'pengajuan_saya';
        $this->load->view('index',$data);
    }

    public function berkas(){
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'pdf|jpg|png';
        $config['max_size']             = 2048;
        $config['encrypt_name']         = TRUE;

        $this->load->library('upload', $config);
        $pengajuan_id = $this->input->post('pengajuan_surat_id',true);

        if ( ! $this->upload->do_upload('berkas'))
        {
            $msg = $this->upload->display_errors();
        }
        else
        {
            $file = $this->upload->data();
            $data = [ 
                'pengajuan_surat_id'=>$pengajuan_id,
                'surat_syarat_id'=>$this->input->post('surat_syarat_id',true),
                'nama_berkas'=>$file['file_name']
            ];
            $this->pengajuan_m->uploadBerkas($data);
            $msg = "Berkas persyaratan berhasil di unggah";
        }
        echo json_encode($msg);
    }

    public function create_ajuan(){
        $data = [ 
            'user_id'=>__session('iduser'),
            'surat_id'=>$this->input->post('surat_id',true),
            'status'=>'Buat',
            'create_by'=>__session('iduser')
        ];
        $pengajuan_id = $this->pengajuan_m->tambah($data);
        $this->session->set_flashdata('success','Anda sedang membuat ajuan, silahkan unggah berkas persyaratan yang dibutuhkan');
        redirect('pengajuan/upload_file/'.$pengajuan_id);
    }
    
    public function send_ajuan(){
        $data = [ 
            'status'=>'Pengajuan',
            'create_by'=>__session('iduser')
        ];
        $this->pengajuan_m->sendAjuan($data,$this->input->post('pengajuan_surat_id',true));
        $this->session->set_flashdata('success','Anda telah berhasil membuat pengajuan');
        redirect('dashboard');
    }

    public function upload_file($id){

        $data['dashboard'] = true;
        $data['surat_byid'] = $this->pengajuan_m->getById($id);
        $data['content'] = 'upload_berkas';
        $this->load->view('index',$data);
    }

    public function ubah($id){
        $data['pengajuan_surat'] = true;
        $data['ajuan_byid'] = $this->pengajuan_m->getById($id);
        $data['content'] = 'pengajuan_detail';
        $this->load->view('index',$data);
    }

    public function proses($id){
        $data = [
            'status'=>'Proses'
        ];
        $this->pengajuan_m->ubahStatus($data,$id);
        $this->session->set_flashdata('success','Status pengajuan berhasil diubah dari Pengajuan ke Proses');
        redirect('pengajuan/ubah/'.$id);
    }

    public function selesai($id){
        $data = [
            'status'=>'Selesai'
        ];
        $this->pengajuan_m->ubahStatus($data,$id);
        $this->session->set_flashdata('success','Status pengajuan berhasil diubah dari Proses ke Selesai');
        redirect('pengajuan/ubah/'.$id);
    }

}

/* End of file Pengajuan.php */