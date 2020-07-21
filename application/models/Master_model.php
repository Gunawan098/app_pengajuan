<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Master_model extends CI_Model
{
    private $_table = "t_pengajuan";

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

    function deleteUser($id)
    {
        $rowData = $this->db->query("DELETE FROM t_user WHERE id_user='$id'");
        return $rowData;
    }

    function updateVerifikasiUser($id,$verifikasi)
    {
        $rowData = $this->db->query("UPDATE t_user SET verifikasi='$verifikasi' WHERE id_user='$id'");
        return $rowData;
    }



    function updateVerifikasiPengajuan($id,$NAME,$verifikasi)
    {
        $rowData = $this->db->query("UPDATE t_pengajuan SET $NAME='$verifikasi' WHERE id_pengajuan='$id'");
        return $rowData;
    }

    function deletePengajuan($id)
    {
        $rowData = $this->db->query("DELETE FROM t_pengajuan WHERE id_pengajuan='$id'");
        return $rowData;
    }

    function updateDataVerifikasiPengajuanKk($id,$post)
    {
        $idpelayanan = $post['id_pelayanan'];
        $image_old = array($post['kk_lama_old'],$post['ektp_suami_old'],$post['ektp_istri_old'],$post['akta_nikah_old'],$post['skl_old'],$post['surat_pindah_kk_old'],$post['form_kk_old']);

        unset($post['kk_lama_old']);unset($post['ektp_suami_old']); 
        unset($post['ektp_istri_old']);unset($post['akta_nikah_old']); 
        unset($post['skl_old']);unset($post['surat_pindah_kk_old']); 
        unset($post['form_kk_old']);
        
        if(!empty($_FILES["kk_lama"]["name"])){
            $post['kk_lama'] = $this->_upload($idpelayanan,'kk_lama');
        }else{
            $post['kk_lama'] = $image_old[0];
        }

        if(!empty($_FILES["ektp_suami"]["name"])){
            $post['ektp_suami'] = $this->_upload($idpelayanan,'ektp_suami');
        }else{
            $post['ektp_suami'] = $image_old[1];
        }

        if(!empty($_FILES["ektp_istri"]["name"])){
            $post['ektp_istri'] = $this->_upload($idpelayanan,'ektp_istri');
        }else{
            $post['ektp_istri'] = $image_old[2];
        }

        if(!empty($_FILES["akta_nikah"]["name"])){
            $post['akta_nikah'] = $this->_upload($idpelayanan,'akta_nikah');
        }else{
            $post['akta_nikah'] = $image_old[3];
        }

        if(!empty($_FILES["skl"]["name"])){
            $post['skl'] = $this->_upload($idpelayanan,'skl');
        }else{
            $post['skl'] = $image_old[4];
        }

        if(!empty($_FILES["surat_pindah_kk"]["name"])){
            $post['surat_pindah_kk'] = $this->_upload($idpelayanan,'surat_pindah_kk');
        }else{
            $post['surat_pindah_kk'] = $image_old[5];
        }

        if(!empty($_FILES["form_kk"]["name"])){
            $post['form_kk'] = $this->_upload($idpelayanan,'form_kk');
        }else{
            $post['form_kk'] = $image_old[6];
        }



        return $this->db->update($this->_table, $post, array('id_pengajuan' => $id));
    }

    function updateDataVerifikasiPengajuanEktpBaru($id,$post)
    {
        $idpelayanan = $post['id_pelayanan'];
        $image_old = array($post['kk_baru_skrng_old'],$post['foto_old'],$post['ijazah_old']);

        unset($post['kk_baru_skrng_old']);unset($post['foto_old']); 
        unset($post['ijazah_old']);
        
        if(!empty($_FILES["kk_baru_skrng"]["name"])){
            $post['kk_baru_skrng'] = $this->_upload($idpelayanan,'kk_baru_skrng');
        }else{
            $post['kk_baru_skrng'] = $image_old[0];
        }

        if(!empty($_FILES["foto"]["name"])){
            $post['foto'] = $this->_upload($idpelayanan,'foto');
        }else{
            $post['foto'] = $image_old[1];
        }

        if(!empty($_FILES["ijazah"]["name"])){
            $post['ijazah'] = $this->_upload($idpelayanan,'ijazah');
        }else{
            $post['ijazah'] = $image_old[2];
        }


        return $this->db->update($this->_table, $post, array('id_pengajuan' => $id));
    }

    function updateDataVerifikasiPengajuanSuratPindahKeluar($id,$post)
    {
        $idpelayanan = $post['id_pelayanan'];
        $image_old = array($post['kk_baru_skrng_old'],$post['ektp_baru_skrng_old'],$post['formulir_surat_pindah_old']);

        unset($post['kk_baru_skrng_old']);unset($post['ektp_baru_skrng_old']); 
        unset($post['formulir_surat_pindah_old']);
        
        if(!empty($_FILES["kk_baru_skrng"]["name"])){
            $post['kk_baru_skrng'] = $this->_upload($idpelayanan,'kk_baru_skrng');
        }else{
            $post['kk_baru_skrng'] = $image_old[0];
        }

        if(!empty($_FILES["ektp_baru_skrng"]["name"])){
            $post['ektp_baru_skrng'] = $this->_upload($idpelayanan,'ektp_baru_skrng');
        }else{
            $post['ektp_baru_skrng'] = $image_old[1];
        }

        if(!empty($_FILES["formulir_surat_pindah"]["name"])){
            $post['formulir_surat_pindah'] = $this->_upload($idpelayanan,'formulir_surat_pindah');
        }else{
            $post['formulir_surat_pindah'] = $image_old[2];
        }


        return $this->db->update($this->_table, $post, array('id_pengajuan' => $id));
    }

    function ambilData($idpengajuan)
    {
        $this->db->select('t_pengajuan.no_pengajuan, t_pengajuan.nama_pemohon, t_pengajuan.create_date, t_pengajuan.id_pelayanan, t_user.alamat');
        $this->db->from('t_pengajuan');
        $this->db->join('t_user', 't_pengajuan.id_user=t_user.id_user');
        $this->db->where('t_pengajuan.id_pengajuan',$idpengajuan);
        $query = $this->db->get();
        return $query->row();
    }

    function getPengajuanKK()
    {
        $query = $this->db->query("SELECT COUNT(verifikasi_kk) as blm_kk FROM t_pengajuan WHERE verifikasi_kk='belum verifikasi'");
        return $query->row_array();
    }

    function getPengajuanEKTP()
    {
        $query = $this->db->query("SELECT COUNT(verifikasi_ektp_baru) as blm_ektp FROM t_pengajuan WHERE verifikasi_ektp_baru='belum verifikasi'");
        return $query->row_array();
    }

    function getPengajuanSPK()
    {
        $query = $this->db->query("SELECT COUNT(verifikasi_surat_pindah_keluar) as blm_spk FROM t_pengajuan WHERE verifikasi_surat_pindah_keluar='belum verifikasi'");
        return $query->row_array();
    }



    function getBuktiPengajuanKK()
    {
        $query = $this->db->query("SELECT COUNT(verifikasi_kk) as sdh_kk FROM t_pengajuan WHERE verifikasi_kk='sudah verifikasi'");
        return $query->row_array();
    }

    function getBuktiPengajuanEKTP()
    {
        $query = $this->db->query("SELECT COUNT(verifikasi_ektp_baru) as sdh_ektp FROM t_pengajuan WHERE verifikasi_ektp_baru='sudah verifikasi'");
        return $query->row_array();
    }

    function getBuktiPengajuanSPK()
    {
        $query = $this->db->query("SELECT COUNT(verifikasi_surat_pindah_keluar) as sdh_spk FROM t_pengajuan WHERE verifikasi_surat_pindah_keluar='sudah verifikasi'");
        return $query->row_array();
    }

    
}