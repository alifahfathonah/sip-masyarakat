<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_m');
    }
    
    public function index()
    {
        is_logged_out();
        $data['login'] = true;
        $this->load->view('login',$data);
    }

    public function register()
    {
        $data['login'] = false;
        $this->load->view('login',$data);
    }

    public function create(){
        $data = [ 
            'username'=>$this->input->post('username',true),
            'password'=>password_hash($this->input->post('password',true),PASSWORD_DEFAULT),
            'level'=>"user"
        ];
        $user_id = $this->auth_m->tambah($data);
        $data = [
            'users_id'=>$user_id,
            'nik'=>$this->input->post('username',true)
        ];
        $this->auth_m->addProfil($data);
        $this->session->set_flashdata('success','Anda berhasil membuat akun, silahkan masuk dengan akun yang didaftarkan');
        redirect('auth');
    }

    public function check_login(){
        $username = $this->input->post('username',true);
        $password = $this->input->post('password',true);

        $cek = $this->auth_m->check_username($username);
        
        if($cek){
            if(password_verify($password,$cek['password'])){
                $data = [
                    'iduser'=>$cek['idusers'],
                    'username'=>$cek['username'],
                    'level'=>$cek['level']
                ];
                $this->session->set_userdata($data);
                $this->session->set_flashdata('success','Selamat datang, silahkan gunakan sistem ini dengan bijak');
                redirect('dashboard/profil_saya');
            }else{
                $this->session->set_flashdata('error','Maaf, password anda salah');
            }
        }else{
            $this->session->set_flashdata('error','Maaf, username anda belum terdaftar');
        }
        redirect('auth');
    }

    public function logout(){
        $id = __session('iduser');
        $this->session->sess_destroy($id);
        redirect('auth');
    }

}

/* End of file Auth.php */