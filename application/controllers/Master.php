<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

	public function __construct()
    {
    	parent::__construct();
        $this->load->model('master_model');
        $this->id_user = $this->session->userdata('id_user');
        $this->type = $this->session->userdata('type_login');
        $this->load->helper('download');
        $this->load->library('pdf');
    }

	public function index()//oke
	{
		if(!empty($this->id_user) && $this->type == 'admin'){
            $data['user'] = $this->db->get_where('t_user', ["type_login" => "user"])->num_rows();
            $data['v_user'] = $this->db->get_where('t_user', ["type_login" => "user","verifikasi" => "belum verifikasi"])->num_rows();
            $data['kk'] = $this->db->get_where('t_pengajuan', ["id_pelayanan" => 1])->num_rows();
            $data['ektp'] = $this->db->get_where('t_pengajuan', ["id_pelayanan" => 2])->num_rows();
            $data['spk'] = $this->db->get_where('t_pengajuan', ["id_pelayanan" => 3])->num_rows();
            $data['v_kk'] = $this->master_model->getPengajuanKK();
            $data['v_ektp'] = $this->master_model->getPengajuanEKTP();
            $data['v_spk'] = $this->master_model->getPengajuanSPK();

            $data['b_kk'] = $this->master_model->getBuktiPengajuanKK();
            $data['b_ektp'] = $this->master_model->getBuktiPengajuanEKTP();
            $data['b_spk'] = $this->master_model->getBuktiPengajuanSPK();
			$this->load->view('admin/index',$data);
		}else{
			$this->load->view('admin/login');
		}
	}

	function post_login()
	{ 
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
 
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_message('required', 'Enter %s');
 
        if ($this->form_validation->run() === FALSE)
        {  
            $this->load->view('admin/login');
        }
        else
        {   
            $data = array(
               'email' => $this->input->post('email'),
               'password' => md5($this->input->post('password')),
 
             );
   
            $this->load->model('Auth_model');
            $check = $this->Auth_model->auth_check($data);
            
            if($check != false){

            	if($check->type_login == 'admin'){
 
                 $user = array(
                 'id_user' => $check->id_user,
                 'type_login' => $check->type_login,
                 'email' => $check->email,
                 'no_tlp' => $check->no_tlp,
                 'nama' => $check->nama,
                 'email' => $check->email,
                 'no_kk' => $check->no_kk,
                 'nama_kepala' => $check->nama_kepala,
                 'j_k' => $check->j_k,
                 'tgl_lahir' => $check->tgl_lahir,
                 'alamat' => $check->alamat,
                 'alamat_kk' => $check->alamat_kk,
                 'status' => 'login'
                );
  
             	$this->session->set_userdata($user); 
	            redirect( base_url('admin') ); 
	        	}else{
	        		echo "Anda Bukan Admin";
           			$this->load->view('admin/login');
	        	}
            }else{
 				echo 'Email dan Password Salah';
        		$this->load->view('admin/login');
       		}
        }         
    }

    function logout()//oke
    {
		$this->session->sess_destroy();
		redirect(base_url('admin-login'));
	}

    function get_image()//oke hanya perlu menambahkan folder yg namanya dari id user
    {
        $id=$this->uri->segment(3);
        $foto=$this->uri->segment(4);
        if($id==1){
            $path='./uploads/kk/'.$foto;
        }elseif($id==2){
            $path='./uploads/ektp/'.$foto;             
        }elseif($id==3){
            $path='./uploads/surat_pindah_keluar/'.$foto;            
        }elseif($id=='user'){
            $path='./uploads/user/'.$foto; 
        }else{}
        $data = file_get_contents($path);
        force_download($foto, $data);
    }

	function user()//oke
	{
		if(!empty($this->id_user) && $this->type == 'admin'){
            $uri = $this->uri->segment(1);
            $data['redirectt'] = $uri;    
			$data['user'] = $this->db->get_where('t_user', ["type_login" => "user"])->result();
			$this->load->view('admin/user',$data);
		}else{
			$this->load->view('admin/login');
		}
	}

    function detail_status_user()//oke
    {
        $iduser=$this->input->post('iduser');

        if(isset($iduser) and !empty($iduser)){
            $records = $this->db->get_where('t_user', ["id_user" => $iduser]);
            $output = '';
            foreach($records->result_array() as $row){
                $output .= '
                     
                        <div class="row">
                            <div class="col-lg-6">
                            <table class="table table-bordered">
                                <tr>
                                    <td><b>No. NIK</b></td>
                                    <td>'.$row["no_nik"].'</td>
                                </tr>
                                <tr>
                                    <td><b>Nama</b></td>
                                    <td>'.$row["nama"].'</td>
                                </tr>
                                <tr>
                                    <td><b>No. HP</b></td>
                                    <td>'.$row["no_tlp"].'</td>
                                </tr>
                                <tr>
                                    <td><b>Email</b></td>
                                    <td>'.$row["email"].'</td>
                                </tr>
                                <tr>
                                    <td><b>Jenis Kelamin</b></td>
                                    <td>'.$row["j_k"].'</td>
                                </tr>
                                <tr>
                                    <td><b>Tanggal lahir</b></td>
                                    <td>'.$row["tgl_lahir"].'</td>
                                </tr>
                                <tr>
                                    <td><b>Alamat Lengkap</b></td>
                                    <td>'.$row["alamat"].'</td>
                                </tr>

                                
                                <tr>
                                    <td><b>Foto</b></td>
                                    <td><a class="btn btn-sm btn-outline-info" href="'.base_url().'master/get_image/user/'.$row["foto"].'" title="Download"><i class="fa fa-download"></i> Download</a></td>
                                </tr>
                                <tr>
                                    <td><b>EKTP / KK</b></td>
                                    <td><a class="btn btn-sm btn-outline-info" href="'.base_url().'master/get_image/user/'.$row["ktp_kk"].'" title="Download"><i class="fa fa-download"></i> Download</a></td>
                                </tr>
                                </table>
                                </div>

                                <div class="col-lg-6">
                                <table class="table table-bordered">
                                <tr>
                                    <td><b>No. KK</b></td>
                                    <td>'.$row["no_kk"].'</td>
                                </tr>
                                <tr>
                                    <td><b>Nama Kepala Keluarga</b></td>
                                    <td>'.$row["nama_kepala"].'</td>
                                </tr>
                                <tr>
                                    <td><b>Alamat KK</b></td>
                                    <td>'.$row["alamat_kk"].'</td>
                                </tr>
                            
                            </table>
                            </div>  
                        </div>';

            }               
            echo $output;
        }
        else {
            echo '<center><ul class="list-group"><li class="list-group-item">'.'Select a User'.'</li></ul></center>';
        }
    }

    function persetujuan_user()//oke
    {
        $id=$this->input->post('id_user');
        if($this->input->post('verifikasi')=='sudah verifikasi'){
            $verifikasi = 'belum verifikasi';
        }else{
            $verifikasi = 'sudah verifikasi';
        }
        $redirectt=$this->input->post('redirectt');
        $this->master_model->updateVerifikasiUser($id,$verifikasi);
        redirect(base_url($redirectt));
    }

    function edit_view_user()
    {
        $post = $this->input->post();
        if(!empty($this->id_user) && $this->type == 'admin'){
            if(empty($post)){
                $id = $this->uri->segment(3); 
                $data['user'] = $this->db->get_where('t_user', ["id_user" => $id])->result();
                $this->load->view('admin/edit_user',$data);
            }else{
                $id = $post['id_user'];
                $this->load->model('Auth_model');
                $check = $this->Auth_model->update_user($id,$post);
 
                redirect( base_url('admin-user') );
            }  
        }else{
            $this->load->view('admin/login');
        }
    }

    function delete_user()//oke
    {
        $id=$this->input->post('id_user');
        $redirectt=$this->input->post('redirectt');
        $data = $this->db->get_where('t_user', array('id_user' => $id))->row();

        if(!empty($data->foto)){
            unlink("uploads/user/".$data->foto);
        }
        if(!empty($data->ktp_kk)){
            unlink("uploads/user/".$data->ktp_kk);
        }

        $this->master_model->deleteUser($id);
        redirect(base_url($redirectt));
    }

    function verifikasi($lookup_id)//oke
    {        
        if(!empty($this->id_user) && $this->type == 'admin'){
            $uri = $this->uri->segment(1);      
            $data['lookup_id'] = $lookup_id;
            $data['title'] = str_replace('-', ' ',str_replace('admin-', '',$uri )); 
            $data['redirectt'] = $uri;    
            $data['lookup'] = $this->db->get_where('t_pelayanan', array('id_pelayanan' => $lookup_id))->row();
            $data['data'] = $this->db->get_where('t_pengajuan', array('id_pelayanan' => $lookup_id))->result();
            $this->load->view('admin/verifikasi',$data);

        }else{
            redirect(base_url("admin-login"));
        }
    }

    function detail_verifikasi_pengajuan()//oke
    {
        $idpengajuan=$this->input->post('idpengajuan');
        $idpelayanan=$this->input->post('idpelayanan');

        if(isset($idpengajuan) and !empty($idpengajuan)){
            $records = $this->db->get_where('t_pengajuan', ["id_pengajuan" => $idpengajuan]);
            $lookup = $this->db->get_where('t_pelayanan', array('id_pelayanan' => $idpelayanan))->row();
            $output = '';
            foreach($records->result_array() as $row){
                $output .= '
                     
                        <div class="row">
                            <div class="col-lg-6">
                            <table class="table table-bordered">';

                if(strstr($lookup->deskripsi_layanan, "kk_baru_skrng")) { 
                    if(!empty($row['kk_baru_skrng'])){
                    $output .='<tr>
                                <td><b>KK</b></td>
                                <td><a class="btn btn-sm btn-outline-info" href="'.base_url().'master/get_image/'.$row["id_pelayanan"].'/'.$row["kk_baru_skrng"].'" title="Download"><i class="fa fa-download"></i> Download</a></td>
                                </tr>';
                    }else{
                    $output .='<tr>
                                <td><b>KK</b></td>
                                <td>'.$row["kk_baru_skrng"].'</td>
                            </tr>';
                    }
                }

                if(strstr($lookup->deskripsi_layanan, "ektp_baru_skrng")) { 
                    if(!empty($row['ektp_baru_skrng'])){
                    $output .='<tr><td><b>EKTP</b></td>
                            <td><a class="btn btn-sm btn-outline-info" href="'.base_url().'master/get_image/'.$row["id_pelayanan"].'/'.$row["ektp_baru_skrng"].'" title="Download"><i class="fa fa-download"></i> Download</a></td></tr>';
                    }else{
                    $output .='<tr>
                                <td><b>KK</b></td>
                                <td>'.$row["ektp_baru_skrng"].'</td>
                            </tr>';
                    }
                }
                                    
                if(strstr($lookup->deskripsi_layanan, "nama_pemohon")) { 
                    $output .='<tr><td><b>Nama Pemohon</b></td>
                            <td>'.$row["nama_pemohon"].'</td></tr>';}

                if(strstr($lookup->deskripsi_layanan, "no_nik")) { 
                    $output .='<tr><td><b>NIK Pemohon</b></td>
                            <td>'.$row["no_nik"].'</td></tr>';}  

                if(strstr($lookup->deskripsi_layanan, "status_pemohon")) { 
                    $output .='<tr><td><b>Status Pemohon</b></td>
                            <td>'.$row["status_pemohon"].'</td></tr>';}


                if(strstr($lookup->deskripsi_layanan, "kk_lama")) { 
                    if(!empty($row['kk_lama'])){
                    $output .='<tr><td><b>KK Lama</b></td>
                            <td><a class="btn btn-sm btn-outline-info" href="'.base_url().'master/get_image/'.$row["id_pelayanan"].'/'.$row["kk_lama"].'" title="Download"><i class="fa fa-download"></i> Download</a></td></tr>';
                    }else{
                    $output .='<tr>
                                <td><b>KK</b></td>
                                <td>'.$row["kk_lama"].'</td>
                            </tr>';
                    }
                }

                if(strstr($lookup->deskripsi_layanan, "ektp_suami")) { 
                    if(!empty($row['ektp_suami'])){
                    $output .='<tr><td><b>EKTP Suami</b></td>
                            <td><a class="btn btn-sm btn-outline-info" href="'.base_url().'master/get_image/'.$row["id_pelayanan"].'/'.$row["ektp_suami"].'" title="Download"><i class="fa fa-download"></i> Download</a></td></tr>
                                <tr><td><b>EKTP Istri</b></td>';
                    }else{
                    $output .='<tr><td><b>EKTP Suami</b></td>
                            <td>'.$row["ektp_suami"].'</td></tr>';
                    }

                    if(!empty($row['ektp_istri'])){
                    $output .='<td><a class="btn btn-sm btn-outline-info" href="'.base_url().'master/get_image/'.$row["id_pelayanan"].'/'.$row["ektp_istri"].'" title="Download"><i class="fa fa-download"></i> Download</a></td></tr>';
                    }else{
                    $output .='<tr><td><b>EKTP Istri</b></td>
                            <td>'.$row["ektp_istri"].'</td></tr>';
                    }
                }

                if(strstr($lookup->deskripsi_layanan, "akta_nikah")) { 
                    if(!empty($row['akta_nikah'])){
                    $output .='<tr><td><b>Buku Nikah / Akte Nikah</b></td>
                            <td><a class="btn btn-sm btn-outline-info" href="'.base_url().'master/get_image/'.$row["id_pelayanan"].'/'.$row["akta_nikah"].'" title="Download"><i class="fa fa-download"></i> Download</a></td></tr>';
                    }else{
                    $output .='<tr>
                                <td><b>KK</b></td>
                                <td>'.$row["akta_nikah"].'</td>
                            </tr>';
                    }
                }

                if(strstr($lookup->deskripsi_layanan, "nama_ygpindah")) { 
                    $output .='<tr><td><b>Nama yg Pindah</b></td>
                            <td>'.$row["nama_ygpindah"].'</td></tr>';}

                if(strstr($lookup->deskripsi_layanan, "jumlah_ygpindah")) { 
                    $output .='<tr><td><b>Jumlah yg Pindah</b></td>
                            <td>'.$row["jumlah_ygpindah"].'</td></tr>';}

                            
                    $output .='     </table>
                                </div>
                                <div class="col-lg-6">
                                    <table class="table table-bordered">';


                if(strstr($lookup->deskripsi_layanan, "formulir_surat_pindah")) { 
                    if(!empty($row['formulir_surat_pindah'])){
                    $output .='
                            <tr><td><b>Formulir Surat Pindah</b></td>
                            <td><a class="btn btn-sm btn-outline-info" href="'.base_url().'master/get_image/'.$row["id_pelayanan"].'/'.$row["formulir_surat_pindah"].'" title="Download"><i class="fa fa-download"></i> Download</a></td></tr>';
                    }else{
                    $output .='<tr>
                                <td><b>KK</b></td>
                                <td>'.$row["formulir_surat_pindah"].'</td>
                            </tr>';
                    }
                }

                if(strstr($lookup->deskripsi_layanan, "foto")) { 
                    if(!empty($row['foto'])){
                    $output .='<tr><td><b>Foto</b></td>
                            <td><a class="btn btn-sm btn-outline-info" href="'.base_url().'master/get_image/'.$row["id_pelayanan"].'/'.$row["foto"].'" title="Download"><i class="fa fa-download"></i> Download</a></td></tr>';
                    }else{
                    $output .='<tr>
                                <td><b>KK</b></td>
                                <td>'.$row["foto"].'</td>
                            </tr>';
                    }
                }

                if(strstr($lookup->deskripsi_layanan, "skl")) { 
                    if(!empty($row['skl'])){
                    $output .='<tr><td><b>SKL</b></td>
                            <td><a class="btn btn-sm btn-outline-info" href="'.base_url().'master/get_image/'.$row["id_pelayanan"].'/'.$row["skl"].'" title="Download"><i class="fa fa-download"></i> Download</a></td></tr>';
                    }else{
                    $output .='<tr>
                                <td><b>KK</b></td>
                                <td>'.$row["skl"].'</td>
                            </tr>';
                    }
                }

                if(strstr($lookup->deskripsi_layanan, "surat_pindah_kk")) { 
                    if(!empty($row['surat_pindah_kk'])){
                    $output .='<tr><td><b>Surat Pindah</b></td>
                            <td><a class="btn btn-sm btn-outline-info" href="'.base_url().'master/get_image/'.$row["id_pelayanan"].'/'.$row["surat_pindah_kk"].'" title="Download"><i class="fa fa-download"></i> Download</a></td></tr>';
                    }else{
                    $output .='<tr>
                                <td><b>KK</b></td>
                                <td>'.$row["surat_pindah_kk"].'</td>
                            </tr>';
                    }
                }

                if(strstr($lookup->deskripsi_layanan, "form_kk")) { 
                    if(!empty($row['form_kk'])){
                    $output .='<tr><td><b>Form KK F1.01</b></td>
                            <td><a class="btn btn-sm btn-outline-info" href="'.base_url().'master/get_image/'.$row["id_pelayanan"].'/'.$row["form_kk"].'" title="Download"><i class="fa fa-download"></i> Download</a></td></tr>';
                    }else{
                    $output .='<tr>
                                <td><b>KK</b></td>
                                <td>'.$row["form_kk"].'</td>
                            </tr>';
                    }
                }

                if(strstr($lookup->deskripsi_layanan, "ijazah")) { 
                    if(!empty($row['ijazah'])){
                    $output .='<tr><td><b>Ijazah Terakhir</b></td>
                            <td><a class="btn btn-sm btn-outline-info" href="'.base_url().'master/get_image/'.$row["id_pelayanan"].'/'.$row["ijazah"].'" title="Download"><i class="fa fa-download"></i> Download</a></td></tr>';
                    }else{
                    $output .='<tr>
                                <td><b>KK</b></td>
                                <td>'.$row["ijazah"].'</td>
                            </tr>';
                    }
                }

                if(strstr($lookup->deskripsi_layanan, "alasan_pindah")) { 
                    $output .='<tr><td><b>Alasan Pindah</b></td>
                            <td>'.$row["alasan_pindah"].'</td></tr>';}

                if(strstr($lookup->deskripsi_layanan, "alamat_asal")) { 
                    $output .='<tr><td><b>Alamat Asal</b></td>
                            <td>'.$row["alamat_asal"].'</td></tr>';}

                if(strstr($lookup->deskripsi_layanan, "alamat_pindah")) { 
                    $output .='<tr><td><b>Alamat Pindah</b></td>
                            <td>'.$row["alamat_pindah"].'</td></tr>';}
                $output .='                 
                            </table>
                            </div>  
                        </div>';

            }               
            echo $output;
        }
        else {
            echo '<center><ul class="list-group"><li class="list-group-item">'.'Select a Pengajuan'.'</li></ul></center>';
        }
        
    }

    function persetujuan_verifikasi()//oke
    {
        $id=$this->input->post('id_pengajuan');
        $idpelayanan=$this->input->post('id_pelayanan');
        if($idpelayanan==1){
            $NAME='verifikasi_kk';
        }elseif($idpelayanan==2){
            $NAME='verifikasi_ektp_baru';             
        }elseif($idpelayanan==3){
            $NAME='verifikasi_surat_pindah_keluar';            
        }else{
            redirect(base_url('master/post_login'));die();
        }

        //-----//

        if($this->input->post('verifikasi')=='sudah verifikasi'){
            $verifikasi = 'belum verifikasi';
        }else{
            $verifikasi = 'sudah verifikasi';
        }

        $redirectt=$this->input->post('redirectt');
        $this->master_model->updateVerifikasiPengajuan($id,$NAME,$verifikasi);
        redirect(base_url($redirectt));
    }

    function edit_view_verifikasi($lookup_id)//oke
    {        
        $post = $this->input->post();
        if(!empty($this->id_user) && $this->type == 'admin'){
            if(empty($post)){
                $uri = $this->uri->segment(1);      
                $id = $this->uri->segment(3); 
                $data['lookup_id'] = $lookup_id;
                $data['index_uri'] = 
                $data['title'] = str_replace('-', ' ',str_replace('admin-', '',$uri )); 
                $data['verifikasi'] = $this->db->get_where('t_pengajuan', array('id_pelayanan' => $lookup_id, 'id_pengajuan' => $id))->result();           
                $data['lookup'] = $this->db->get_where('t_pelayanan', array('id_pelayanan' => $lookup_id))->row();
                $this->load->view('admin/edit_verifikasi',$data);
            }else{
                $redirect = 'admin-'.$post['nama_pelayanan'];
                unset($post['nama_pelayanan']);
                $id = $post['id_pengajuan'];

                $master = $this->master_model;

                if($lookup_id=='1'){                
                    $master->updateDataVerifikasiPengajuanKk($id,$post);
                }elseif($lookup_id=='2'){
                    $master->updateDataVerifikasiPengajuanEktpBaru($id,$post);
                }elseif($lookup_id=='3'){
                    $master->updateDataVerifikasiPengajuanSuratPindahKeluar($id,$post);
                }else{
                    redirect(base_url('master/post_login'));die();
                }

                // $check = $this->master_model->updateDataVerifikasiPengajuan($id,$post);
 
                redirect( base_url($redirect) );
            }  
        }else{
            $this->load->view('admin/login');
        }
    }

    function delete_verifikasi()//oke
    {
        $id=$this->input->post('id_pengajuan');
        $idpelayanan=$this->input->post('id_pelayanan');
        $redirectt=$this->input->post('redirectt');
        $data = $this->db->get_where('t_pengajuan', array('id_pengajuan' => $id))->row();
        $cek = $this->db->get_where('t_pelayanan', array('id_pelayanan' => $idpelayanan))->row();


        if($idpelayanan==1){
            $path='uploads/kk/';
        }elseif($idpelayanan==2){
            $path='uploads/ektp/';             
        }elseif($idpelayanan==3){
            $path='uploads/surat_pindah_keluar/';  
        }else{}

        // $data = file_get_contents($path);
        // force_download($foto, $data);
        
        if(strstr($cek->deskripsi_layanan, "kk_lama")){
        unlink($path.$data->kk_lama);
        }

        if(strstr($cek->deskripsi_layanan, "ektp_suami")){
        unlink($path.$data->ektp_suami);
        }

        if(strstr($cek->deskripsi_layanan, "ektp_istri")){
        unlink($path.$data->ektp_istri);
        }

        if(strstr($cek->deskripsi_layanan, "akta_nikah")){
        unlink($path.$data->akta_nikah);
        }

        if(strstr($cek->deskripsi_layanan, "skl")){
        unlink($path.$data->skl);
        }

        if(strstr($cek->deskripsi_layanan, "surat_pindah_kk")){
        unlink($path.$data->surat_pindah_kk);
        }

        if(strstr($cek->deskripsi_layanan, "form_kk")){
        unlink($path.$data->form_kk);
        }

        if(strstr($cek->deskripsi_layanan, "kk_baru_skrng")){
        unlink($path.$data->kk_baru_skrng);
        }

        if(strstr($cek->deskripsi_layanan, "ektp_baru_skrng")){
        unlink($path.$data->ektp_baru_skrng);
        }

        if(strstr($cek->deskripsi_layanan, "ijazah")){
        unlink($path.$data->ijazah);
        }

        if(strstr($cek->deskripsi_layanan, "formulir_surat_pindah")){
        unlink($path.$data->formulir_surat_pindah);
        }

        if(strstr($cek->deskripsi_layanan, "foto")){
        unlink($path.$data->foto);
        }


        $this->master_model->deletePengajuan($id);
        redirect(base_url($redirectt));
    }


    function bukti_pendaftaran($lookup_id)//oke
    {        
        if(!empty($this->id_user) && $this->type == 'admin'){
            $uri = $this->uri->segment(1);      
            $data['lookup_id'] = $lookup_id;
            $data['title'] = str_replace('-', ' ',str_replace('admin-', '',$uri )); 
            $data['redirectt'] = $uri;    
            $data['lookup'] = $this->db->get_where('t_pelayanan', array('id_pelayanan' => $lookup_id))->row();
            $data['data'] = $this->db->get_where('t_pengajuan', array('id_pelayanan' => $lookup_id))->result();
            $this->load->view('admin/bukti_pendaftaran',$data);

        }else{
            redirect(base_url("admin-login"));
        }
    }

    function download_bukti_pendaftaran($idpengajuan){

        //$data = $this->db->get_where('t_pengajuan', array('id_pengajuan' => $id))->row();
        $data = $this->master_model->ambilData($idpengajuan);
        if($data->id_pelayanan==1){
            $title = 'Pendaftaran Permohonan KK';
            $dataa = 'KK-'.$data->no_pengajuan;
            $tgl = date('Y-m-d',strtotime($data->create_date));
            $tgl_pengambilan = date('Y-m-d', strtotime('+14 days', strtotime($tgl)));
        }
        if($data->id_pelayanan==2){
            $title = 'Pendaftaran E-KTP Baru';
            $dataa = 'EKTP-'.$data->no_pengajuan;
            $tgl = date('Y-m-d',strtotime($data->create_date));
            $tgl_pengambilan = date('Y-m-d', strtotime('+5 days', strtotime($tgl)));
        }
        if($data->id_pelayanan==3){
            $title = 'Pendaftaran Surat Pindah Keluar';
            $dataa = 'SPK-'.$data->no_pengajuan;
            $tgl = date('Y-m-d',strtotime($data->create_date));
            $tgl_pengambilan = date('Y-m-d', strtotime('+5 days', strtotime($tgl)));
        }



        $pdf = new FPDF('l','mm',array(140,140));
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',14);
        // mencetak string 
        //$pdf->Cell(190,7,'KECAMATAN SERANG BARU',0,1,'C');
        $pdf->Cell(0,0,'KECAMATAN SERANG BARU',0,1,'C');
        $pdf->SetFont('Arial','B',13);
        $pdf->Cell(0,11,'BUKTI '.strtoupper($title),0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat

        $pdf->Cell(0,5,'',0,1);
        $pdf->SetFont('Arial','B',8);

        $pdf->Cell(0,5,'Hallo '.$data->nama_pemohon,0,1);
        $pdf->Cell(0,5,'Anda telah berhasil melakukan '.$title.' secara online',0,1);
        $pdf->Cell(190,7,'pada tanggal '.date('Y-m-d',strtotime($data->create_date)).'.  Berikut data singkat permohonan anda : ',0,1);
        // $pdf->Cell(190,7,'Berikut data singkat permohonan anda.',0,1);
        $pdf->Cell(190,7,'Nomor pendaftaran              : '.$dataa,0,1);
        $pdf->Cell(190,7,'Nama                                      : '.$data->nama_pemohon,0,1);
        $pdf->Cell(190,7,'Alamat                                    : '.$data->alamat,0,1);
        $pdf->Cell(190,7,'Tanggal Pengambilan           : '.$tgl_pengambilan,0,1);


        $pdf->Cell(0,5,'',0,1);


        $pdf->Cell(160,7,'lakukan pengurusan pengajuan pada saat jam operasional di hari Senin - Jumat',0,1);
        $pdf->Cell(190,7,'Pukul 08.00 WIB s/d 15.00 WIB',0,1);


        $pdf->Cell(190,7,'',0,1);


        $pdf->Cell(190,7,'Terlampir ialah Bukti pendaftaran pengajuan anda.',0,1);
        $pdf->Cell(190,7,'Harap Perlihatkan kepada petugas loket',0,1);

        $pdf->Cell(190,7,'-Terima Kasih -');

        // $pdf->SetFont('Arial','B',10);
        // $pdf->Cell(20,6,'NIM',1,0);
        // $pdf->Cell(85,6,'NAMA MAHASISWA',1,0);
        // $pdf->Cell(27,6,'NO HP',1,0);
        // $pdf->Cell(25,6,'TANGGAL LHR',1,1);
        // $pdf->SetFont('Arial','',10);
        // $mahasiswa = $this->db->get('mahasiswa')->result();
        // foreach ($mahasiswa as $row){
        //     $pdf->Cell(20,6,$row->nim,1,0);
        //     $pdf->Cell(85,6,$row->nama_lengkap,1,0);
        //     $pdf->Cell(27,6,$row->no_hp,1,0);
        //     $pdf->Cell(25,6,$row->tanggal_lahir,1,1); 
        // }
        $pdf->Output();
    }
}