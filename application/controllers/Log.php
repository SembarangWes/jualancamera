<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller {

	public function __construct()
    { parent::__construct(); }

	public function index($error='')
    {
        $error = [ 'error' => $error ];
        $this->load->view('admin/login', $error);
    }
    
    public function login()
    {
        $user = $this->input->post('user');
        $pass = $this->input->post('pass');

        $set = $this->User_model->cekLogin($user);
        foreach ($set as $s)
        {
            $p=$this->encryption->decrypt($s->password);
            if($p == $pass)
            { 
                $log = [
                    'id' => $s->id_user,
                    'username' => $s->nama_user,
                    'role' => $s->role,
                    'status' => 'Logged'
                ];
                $this->session->set_userdata($log);            
    
                if($this->session->role=="Administrator")
                { redirect('admin/'); }
                else
                { redirect('home/'); }
            }
            else
            { $this->index($error = 'Username atau Password Salah!'); }
        }
    }

    public function logout()
    { 
        $this->session->sess_destroy();
        redirect('home/');
    }
}