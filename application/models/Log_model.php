<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_model extends CI_Model {

    public function cek($user, $pass)
    { 
        $this->db->where('email',$user);
        $this->db->where('password',$pass);
        return $this->db->get('user')->row();
    }
}
    

/* End of file ModelName.php */