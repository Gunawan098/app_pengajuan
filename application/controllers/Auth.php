<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
class Auth extends CI_Controller {
  
    public function __construct()
    {
    	parent::__construct();
    	$this->load->model('Auth_model');
        $this->id_user = $this->session->userdata('id_user');   
        $this->cek = $this->db->get_where('t_user', array('id_user' => $this->session->userdata('id_user')))->row();
    }
  
  
    public function index()
    {
    	$this->load->view('landing/login');
    }

    public function post_login()
    { 
        $this->form_validation->set_rules('no_nik', 'NIK', 'required|integer');
        $this->form_validation->set_rules('password', 'Password', 'required');
 
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_message('required', 'Enter %s');
 
        if ($this->form_validation->run() === FALSE)
        {  
            $this->load->view('landing/login');
        }
        else
        {   
            $data = array(
               'no_nik' => $this->input->post('no_nik'),
               'password' => md5($this->input->post('password')),
 
             );
   
            $check = $this->Auth_model->auth_check($data);
            
            if($check != false){
 
                 $user = array(
                 'id_user' => $check->id_user,
                 'no_nik' => $check->no_nik,
                 'no_tlp' => $check->no_tlp,
                 'nama' => $check->nama,
                 'email' => $check->email,
                 'no_kk' => $check->no_kk,
                 'nama_kepala' => $check->nama_kepala,
                 'j_k' => $check->j_k,
                 'tgl_lahir' => $check->tgl_lahir,
                 'foto' => $check->foto,
                 'ktp_kk' => $check->ktp_kk,
                 'alamat' => $check->alamat,
                 'alamat_kk' => $check->alamat_kk,
                 'verifikasi' => $check->verifikasi,
                 'status' => 'login'
                );
  
            $this->session->set_userdata($user);
 
             redirect( base_url('pengajuan-pembuatan-KK') ); 
            }
           $this->session->set_flashdata('danger','<b>NIK dan Password Salah.</b>');
           $this->load->view('landing/login');
        }         
    }   

    public function post_register()
    { 
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|alpha');
        $this->form_validation->set_rules('no_tlp', 'No. HP', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('no_nik', 'No. NIK', 'required|numeric');
        $this->form_validation->set_rules('no_kk', 'No. KK', 'numeric');
        $this->form_validation->set_rules('nama_kepala', 'Nama Kepala Keluarga', 'alpha');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
 
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
 
        if ($this->form_validation->run() === FALSE)
        {  
            $this->load->view('landing/register');
        }else
        {   
            $data = array(
               'nama' => $this->input->post('nama'),
               'no_tlp' => $this->input->post('no_tlp'),
               'email' => $this->input->post('email'),
               'no_nik' => $this->input->post('no_nik'),
               'no_kk' => $this->input->post('no_kk'),
               'nama_kepala' => $this->input->post('nama_kepala'),
               'password' => md5($this->input->post('password')), 
            );
            
            //$pengecekannik = $this->Auth_model->pengecekan_register($data['no_nik'],$data['no_kk'],$data['no_tlp'],$data['email']);
            $pengecekannik = $this->db->get_where('t_user', array('no_nik' => $data['no_nik']))->num_rows();
            if($data['no_kk'] != ''){
                $pengecekankk = $this->db->get_where('t_user', array('no_kk' => $data['no_kk']))->num_rows();
            }else{
                $pengecekankk = 0;
            }
            $pengecekantlp = $this->db->get_where('t_user', array('no_tlp' => $data['no_tlp']))->num_rows();
            $pengecekanemail = $this->db->get_where('t_user', array('email' => $data['email']))->num_rows();

            if($pengecekannik>0) { 
                $this->session->set_flashdata('danger','No. NIK sudah tersedia');
                $this->load->view('landing/register');
            }elseif($pengecekankk>0){
                $this->session->set_flashdata('danger','No. KK sudah tersedia');
                $this->load->view('landing/register');
            }elseif($pengecekantlp>0){
                $this->session->set_flashdata('danger','No. Tlp sudah tersedia');
                $this->load->view('landing/register');
            }elseif($pengecekanemail>0){
                $this->session->set_flashdata('danger','Email sudah tersedia');
                $this->load->view('landing/register');
            }else{

                //echo $pengecekan;exit();                
                $check = $this->Auth_model->insert_user($data);
     
                if($check != false){
     
                    $user = array(
                     'id_user' => $check,
                     'no_nik' => $this->input->post('no_nik'),
                     'no_tlp' => $this->input->post('no_tlp'),
                     'nama' => $this->input->post('nama'),
                     'email' => $this->input->post('email'),
                     'no_kk' => $this->input->post('no_kk'),
                     'nama_kepala' => $this->input->post('nama_kepala'),
                     'j_k' => $this->input->post('j_k'),
                     'tgl_lahir' => $this->input->post('tgl_lahir'),
                     'foto' => $this->input->post('foto'),
                     'ktp_kk' => $this->input->post('ktp_kk'),
                     'alamat' => $this->input->post('alamat'),
                     'alamat_kk' => $this->input->post('alamat_kk'),
                     'verifikasi' => 'belum verifikasi',
                   	 'status' => 'login',
                    );
                 }
      
                 $this->session->set_userdata($user);
     
                $this->session->set_flashdata('success','Berhasil Daftar, Harap Mengisi Profile Pribadi Sebelum Melakukan Pengajuan.');
                redirect( base_url('auth/profile') ); 
            }
        }         
    }

    public function logout()
    {
		$this->session->sess_destroy();
		redirect(base_url('auth/post_login'));
	}  

    public function profile()
    {      
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('no_tlp', 'No. HP', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('j_k', 'Jenis kelamin', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat Lengkap', 'required');
        // $this->form_validation->set_rules('no_kk', 'No. KK', 'required');
        // $this->form_validation->set_rules('nama_kepala', 'Nama Kepala Keluarga', 'required');
        // $this->form_validation->set_rules('alamat_kk', 'Alamat KK', 'required');
 
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_message('required', 'Enter %s');

        
        if($this->session->userdata('status') != "login"){
            redirect(base_url("auth"));
        }
        if ($this->form_validation->run() === FALSE)
        {  
            $uri = $this->uri->segment(1);
            $data['title'] = str_replace('-', ' ',$uri);
            $data['user'] = $this->db->get_Where('t_user', array('id_user'=>$this->session->userdata('id_user')))->row();
            $data['cek'] = $this->cek;
            
            $data['index_uri'] = str_replace('add-', 'pengajuan-',$this->uri->segment(1) );
            $this->load->view('landing/profile',$data);
        }
        else
        {
            $data = $this->input->post();
            $id = $data['id_user'];

            $check = $this->Auth_model->update_user($id,$data);
 
            $this->session->set_flashdata('success','Data yang anda Update berhasil.');
            redirect( base_url('pengajuan-pembuatan-KK') );
        }

    }

}