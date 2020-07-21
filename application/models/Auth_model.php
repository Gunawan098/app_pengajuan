<?php
class Auth_model extends CI_Model {
  
    public function __construct()
    {
        $this->load->database();
    }
     
    public function auth_check($data)
    {
        $query = $this->db->get_where('t_user', $data);
        if($query){   
         return $query->row();
        }
        return false;
    }

    public function insert_user($data)
    {
 
        $insert = $this->db->insert('t_user', $data);
        if ($insert) {
           return $this->db->insert_id();
        } else {
            return false;
        }
    }

    private function _upload($id,$name)
    {
        //$path = mkdir($iduser);
        
        $config['upload_path']          = './uploads/user/';
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
        return " ";
    }

    public function update_user($id,$data)
    { 
        $image_old = array($data['foto_old'],$data['ktp_kk_old']);
        unset($data['foto_old']);  
        unset($data['ktp_kk_old']); 

        if(!empty($_FILES["foto"]["name"])){
            $data['foto'] = $this->_upload($id,'foto');            
        }else{
            $data['foto'] = $image_old[0];
        }

        if(!empty($_FILES["ktp_kk"]["name"])){
            $data['ktp_kk'] = $this->_upload($id,'ktp_kk');            
        }else{
            $data['ktp_kk'] = $image_old[1];
        }

        //$data['ktp_kk'] = $this->_upload($id,'ktp_kk');
        $this->db->where('id_user', $id);
        $this->db->update('t_user', $data);
    }

    function pengecekan_register($nik,$kk,$tlp,$email)
    {
        $query = $this->db->query("SELECT no_nik, no_kk, no_tlp, email FROM t_user WHERE no_nik='$nik' OR no_kk='$kk' OR no_tlp='$tlp' OR email='$email'");
        return $query->num_rows();
    }
}