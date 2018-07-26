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
        $set = $this->Log_model->cek($user, $pass);
        if($set)
        { 
            $log = [
                'id' => $set->id_user,
                'username' => $set->nama_user,
                'role' => $set->role,
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

    public function logout()
    { 
        $this->session->sess_destroy();
        redirect('home/');
    }
}