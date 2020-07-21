<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Landing_model extends CI_Model
{
    private $_table = "t_pengajuan";

    public function cekNomorPengajuan($idpelayanan)
    {
        $query = $this->db->query("SELECT MAX(no_pengajuan) as kodepengajuan from t_pengajuan WHERE id_pelayanan='$idpelayanan'");
        $hasil = $query->row();
        return $hasil->kodepengajuan;
    }

    private function _upload($idpelayanan,$name)
    {
        if($idpelayanan==1){
            $alamat = 'kk/';
        }elseif($idpelayanan==2){
            $alamat = 'ektp/';
        }else{
            $alamat = 'surat_pindah_keluar/';
        }
        $config['upload_path']          = './uploads/'.$alamat;
        $config['allowed_types']        = 'gif|jpg|png|pdf';
        // $config['file_name']            = $iduser.'-'.$idpelayanan;
        $config['overwrite']            = false;
        // $config['max_size']             = 2048; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload($name)) {
            return $this->upload->data('file_name');
        }
    }

    function savePengajuanKk($lookup_id)
    {
        $post = $this->input->post(); 
        $idpelayanan = $post['lookup_id'];
        unset($post['index_uri']);  
        unset($post['lookup_id']);   
        
        $kode = $this->cekNomorPengajuan($idpelayanan);
        $urutan = (int) substr($kode, 2, 3);
        $urutan++;
        //$huruf = "KK-";
        $nomor_pelayanan = sprintf("%03s", $urutan);

        //echo $nomor_pelayanan;exit();

        $post['kk_lama'] = $this->_upload($idpelayanan,'kk_lama');

        if(!empty($_FILES["ektp_suami"]["name"])){
            $post['ektp_suami'] = $this->_upload($idpelayanan,'ektp_suami');
        }
        if(!empty($_FILES["ektp_istri"]["name"])){
            $post['ektp_istri'] = $this->_upload($idpelayanan,'ektp_istri');
        }
        if(!empty($_FILES["akta_nikah"]["name"])){
            $post['akta_nikah'] = $this->_upload($idpelayanan,'akta_nikah');
        }
        if(!empty($_FILES["skl"]["name"])){
            $post['skl'] = $this->_upload($idpelayanan,'skl');
        }
        if(!empty($_FILES["surat_pindah_kk"]["name"])){
            $post['surat_pindah_kk'] = $this->_upload($idpelayanan,'surat_pindah_kk');
        }

        $post['form_kk'] = $this->_upload($idpelayanan,'form_kk');

        $post['no_pengajuan'] = $nomor_pelayanan;
        $post['id_pelayanan'] = $lookup_id;
        $post['verifikasi_kk'] = 'belum verifikasi';
        return $this->db->insert($this->_table, $post);
    }

    function savePengajuanEktpBaru($lookup_id)
    {
        $post = $this->input->post(); 
        $idpelayanan = $post['lookup_id'];
        unset($post['index_uri']);  
        unset($post['lookup_id']);   

        $kode = $this->cekNomorPengajuan($idpelayanan);
        $urutan = (int) substr($kode, 2, 3);
        $urutan++;
        //$huruf = "EKTP-";
        $nomor_pelayanan = sprintf("%03s", $urutan);
        //$nomor_pelayanan = $urutan++;

        //echo $nomor_pelayanan;exit();

        $post['kk_baru_skrng'] = $this->_upload($idpelayanan,'kk_baru_skrng');
        $post['foto'] = $this->_upload($idpelayanan,'foto');
        $post['ijazah'] = $this->_upload($idpelayanan,'ijazah');
        
        $post['no_pengajuan'] = $nomor_pelayanan;
        $post['id_pelayanan'] = $lookup_id;
        $post['verifikasi_ektp_baru'] = 'belum verifikasi';
        return $this->db->insert($this->_table, $post);
    }

    function savePengajuanSuratPindahKeluar($lookup_id)
    {
        $post = $this->input->post();
        $idpelayanan = $post['lookup_id'];
        unset($post['index_uri']);  
        unset($post['lookup_id']);
        
        $kode = $this->cekNomorPengajuan($idpelayanan);
        $urutan = (int) substr($kode, 2, 3);
        $urutan++;
        //$huruf = "KK-";
        $nomor_pelayanan = sprintf("%03s", $urutan);

        //echo $nomor_pelayanan;exit();

        $post['kk_baru_skrng'] = $this->_upload($idpelayanan,'kk_baru_skrng');
        $post['ektp_baru_skrng'] = $this->_upload($idpelayanan,'ektp_baru_skrng');
        $post['formulir_surat_pindah'] = $this->_upload($idpelayanan,'formulir_surat_pindah');  

        // $post['no_nik'] = $this->session->userdata('no_nik');
        // $post['nama_pemohon'] = $this->session->userdata('nama');
        $post['no_pengajuan'] = $nomor_pelayanan;
        $post['id_pelayanan'] = $lookup_id;
        $post['verifikasi_surat_pindah_keluar'] = 'belum verifikasi';
        $post['nama_pemohon'] = $this->session->userdata('nama');
        $post['no_nik'] = $this->session->userdata('no_nik');
        return $this->db->insert($this->_table, $post);
    }    

}