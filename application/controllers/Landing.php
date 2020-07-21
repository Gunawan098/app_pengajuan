<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model("landing_model");
		$this->load->helper('download');	
        $this->load->library('pdf');	
        $this->cek = $this->db->get_where('t_user', array('id_user' => $this->session->userdata('id_user')))->row();
    }

	public function index($id='1')
	{
		$data =array(
			'id' => $id,
			'cek' => $this->cek
		);
		$this->load->view('landing/index',$data);
	}

	function pengajuan($lookup_id)
	{
		$post = $this->input->post();

		if($this->session->userdata('status') != "login"){
			redirect(base_url("auth"));
		}elseif($this->cek->verifikasi=='belum verifikasi'){
			$this->session->set_flashdata('info','Diharapkan untuk melengkapi data profilenya setelah registrasi akun.<br>
				Setelah melengkapi data profile diharapkan untuk menunggu verifikasi akun oleh pihak kecamatan.<br>
				jika sudah diverifkasi, bisa melakukan pendaftaran pengajuan di aplikasi ini.<br><br>
				<b>Salam Terima Kasih</b>');
			$this->load->view('landing/pemberitahuan');
		}else{
			if(empty($post)){
				$uri = $this->uri->segment(1);
				$data['title'] = str_replace('-', ' ',$uri);	
				$data['lookup_id'] = $lookup_id;				
				$data['lookup'] = $this->db->get_where('t_pelayanan', array('id_pelayanan' => $lookup_id))->row();
				$data['pelayanan'] = $this->db->get_Where('t_pengajuan', array('id_user'=>$this->session->userdata('id_user'), 'id_pelayanan'=>$lookup_id))->row();
				$data['cek'] = $this->cek;

				$data['index_uri'] = str_replace('add-', 'pengajuan-',$this->uri->segment(1) );
				$this->load->view('landing/form-pengajuan',$data);				
			}else{
				$index_uri = $post['index_uri'];
				unset($post['index_uri']);		

				$landing = $this->landing_model;

			    if($lookup_id=='1'){		    	
			    	$landing->savePengajuanKk($lookup_id);
			    }elseif($lookup_id=='2'){
			    	$landing->savePengajuanEktpBaru($lookup_id);
		    	}elseif($lookup_id=='3'){
		    		$landing->savePengajuanSuratPindahKeluar($lookup_id);
		    	}else{
		    		redirect(base_url("auth"));
		    	}
		
            	$this->session->set_flashdata('successs','<b>Data Pengajuan Berhasil dilakukan, Harap Menunggu Persetujuan dari Kecamatan.</b>');
				redirect($index_uri);
			}
		}
	}

	function status_pengajuan($lookup_id)
	{
		if($this->session->userdata('status') != "login"){
			redirect(base_url("auth"));
		}elseif($this->cek->verifikasi=='belum verifikasi'){
			$this->session->set_flashdata('info','Diharapkan untuk melengkapi data profilenya setelah registrasi akun.<br>
				Setelah melengkapi data profile diharapkan untuk menunggu verifikasi akun oleh pihak kecamatan.<br>
				jika sudah diverifkasi, bisa melakukan pendaftaran pengajuan di aplikasi ini.<br><br>
				<b>Salam Terima Kasih</b>');
			$this->load->view('landing/pemberitahuan');
		}else{

			$uri = $this->uri->segment(1);		
			$data['lookup_id'] = $lookup_id;
			$data['title'] = str_replace('-', ' ',str_replace('status-', '',$uri ));	
			$data['lookup'] = $this->db->get_where('t_pelayanan', array('id_pelayanan' => $lookup_id))->row();
			$data['data'] = $this->db->get_where('t_pengajuan', array('id_pelayanan' => $lookup_id, 'id_user' => $this->session->userdata('id_user')))->result();
			$data['cek'] = $this->cek;
			
			$this->load->view('landing/status-pengajuan',$data);
		}
	}

	function detail_status_pengajuan()
	{
		if($this->session->userdata('status') == "login"){
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
						$output .='<tr>
									<td><b>KK</b></td>
									<td><a class="btn btn-sm btn-info" href="'.base_url().'landing/get_image/'.$row["id_pelayanan"].'/'.$row["kk_baru_skrng"].'" title="Download"><i class="glyphicon glyphicon-download-alt"></i> Download</a></td>
									</tr>';}

					if(strstr($lookup->deskripsi_layanan, "ektp_baru_skrng")) { 
						$output .='<tr><td><b>EKTP</b></td>
								<td><a class="btn btn-sm btn-info" href="'.base_url().'landing/get_image/'.$row["id_pelayanan"].'/'.$row["ektp_baru_skrng"].'" title="Download"><i class="glyphicon glyphicon-download-alt"></i> Download</a></td></tr>';}
						    			
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
						$output .='<tr><td><b>KK Lama</b></td>
								<td><a class="btn btn-sm btn-info" href="'.base_url().'landing/get_image/'.$row["id_pelayanan"].'/'.$row["kk_lama"].'" title="Download"><i class="glyphicon glyphicon-download-alt"></i> Download</a></td></tr>';}

					if(strstr($lookup->deskripsi_layanan, "ektp_suami")) { 
						if(!empty($row['ektp_suami'])){
						$output .='<tr><td><b>EKTP Suami</b></td>
								<td><a class="btn btn-sm btn-info" href="'.base_url().'landing/get_image/'.$row["id_pelayanan"].'/'.$row["ektp_suami"].'" title="Download"><i class="glyphicon glyphicon-download-alt"></i> Download</a></td></tr>';
						}else{
						$output .='<tr><td><b>EKTP Suami</b></td>
								<td>'.$row["ektp_suami"].'</td></tr>';}

						if(!empty($row['ektp_istri'])){
						$output .='<tr><td><b>EKTP Istri</b></td>
								<td><a class="btn btn-sm btn-info" href="'.base_url().'landing/get_image/'.$row["id_pelayanan"].'/'.$row["ektp_istri"].'" title="Download"><i class="glyphicon glyphicon-download-alt"></i> Download</a></td></tr>';
						}else{
						$output .='<tr><td><b>EKTP Istri</b></td>
								<td>'.$row["ektp_istri"].'</td></tr>';}
					}

					if(strstr($lookup->deskripsi_layanan, "akta_nikah")) { 
						if(!empty($row['akta_nikah'])){
						$output .='<tr><td><b>Buku Nikah / Akte Nikah</b></td>
								<td><a class="btn btn-sm btn-info" href="'.base_url().'landing/get_image/'.$row["id_pelayanan"].'/'.$row["akta_nikah"].'" title="Download"><i class="glyphicon glyphicon-download-alt"></i> Download</a></td></tr>';
						}else{
						$output .='<tr><td><b>Buku Nikah / Akte Nikah</b></td>
								<td>'.$row["akta_nikah"].'</td></tr>';}
					}

					if(strstr($lookup->deskripsi_layanan, "nama_ygpindah")) { 
						$output .='<tr><td><b>Nama yg Pindah</b></td>
								<td>'.$row["nama_ygpindah"].'</td></tr>';}

					if(strstr($lookup->deskripsi_layanan, "jumlah_ygpindah")) { 
						$output .='<tr><td><b>Jumlah yg Pindah</b></td>
								<td>'.$row["jumlah_ygpindah"].'</td></tr>';}

								
						$output .='		</table>
									</div>
									<div class="col-lg-6">
										<table class="table table-bordered">';


					if(strstr($lookup->deskripsi_layanan, "formulir_surat_pindah")) { 
						$output .='
								<tr><td><b>Formulir Surat Pindah</b></td>
								<td><a class="btn btn-sm btn-info" href="'.base_url().'landing/get_image/'.$row["id_pelayanan"].'/'.$row["formulir_surat_pindah"].'" title="Download"><i class="glyphicon glyphicon-download-alt"></i> Download</a></td></tr>';}



					if(strstr($lookup->deskripsi_layanan, "foto")) { 
						$output .='<tr><td><b>Foto</b></td>
								<td><a class="btn btn-sm btn-info" href="'.base_url().'landing/get_image/'.$row["id_pelayanan"].'/'.$row["foto"].'" title="Download"><i class="glyphicon glyphicon-download-alt"></i> Download</a></td></tr>';}

					if(strstr($lookup->deskripsi_layanan, "skl")) { 
						if(!empty($row['skl'])){
						$output .='<tr><td><b>SKL</b></td>
								<td><a class="btn btn-sm btn-info" href="'.base_url().'landing/get_image/'.$row["id_pelayanan"].'/'.$row["skl"].'" title="Download"><i class="glyphicon glyphicon-download-alt"></i> Download</a></td></tr>';
						}else{
						$output .='<tr><td><b>SKL</b></td>
								<td>'.$row["skl"].'</td></tr>';}
					}

					if(strstr($lookup->deskripsi_layanan, "surat_pindah_kk")) { 
						if(!empty($row['surat_pindah_kk'])){
						$output .='<tr><td><b>Surat Pindah</b></td>
								<td><a class="btn btn-sm btn-info" href="'.base_url().'landing/get_image/'.$row["id_pelayanan"].'/'.$row["surat_pindah_kk"].'" title="Download"><i class="glyphicon glyphicon-download-alt"></i> Download</a></td></tr>';
						}else{
						$output .='<tr><td><b>Surat Pindah</b></td>
								<td>'.$row["surat_pindah_kk"].'</td></tr>';}
					}

					if(strstr($lookup->deskripsi_layanan, "form_kk")) { 
						$output .='<tr><td><b>Form KK F1.01</b></td>
								<td><a class="btn btn-sm btn-info" href="'.base_url().'landing/get_image/'.$row["id_pelayanan"].'/'.$row["form_kk"].'" title="Download"><i class="glyphicon glyphicon-download-alt"></i> Download</a></td></tr>';}

					if(strstr($lookup->deskripsi_layanan, "ijazah")) { 
						$output .='<tr><td><b>Ijazah Terakhir</b></td>
								<td><a class="btn btn-sm btn-info" href="'.base_url().'landing/get_image/'.$row["id_pelayanan"].'/'.$row["ijazah"].'" title="Download"><i class="glyphicon glyphicon-download-alt"></i> Download</a></td></tr>';}

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

		}else{
			redirect(base_url("auth"));			
		}
		
	}

	function get_image()
    {
    	if($this->session->userdata('status') == "login"){
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
    }

	function bukti_pengajuan($lookup_id)
	{		
    	if($this->session->userdata('status') == "login"){
					
			$uri = $this->uri->segment(1);			
			$data['lookup_id'] = $lookup_id;
			$data['title'] = str_replace('-', ' ',str_replace('status-', '',$uri ));	
			$data['lookup'] = $this->db->get_where('t_pelayanan', array('id_pelayanan' => $lookup_id))->row();
			$data['data'] = $this->db->get_where('t_pengajuan', array('id_pelayanan' => $lookup_id))->result();
			$this->load->view('landing/bukti-pengajuan',$data);
		}else{
			redirect(base_url("auth"));			
		}
	}
}
