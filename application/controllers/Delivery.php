<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delivery extends CI_Controller
{
    var $API = "";
	public function __construct()
    {
        parent::__construct();
        
        // URL UNTUK REST
        $this->API = "http://localhost:8012/express_server/index.php";
        // URL UNTUK REST
    }

	public function store()
    {
        // Insert data
        $data = [
            'nama_user' => $this->input->post('name'),
            'alamat' => $this->input->post('alamat'),
            'no_hp' => $this->input->post('hp'),
            'email  ' => $this->input->post('email'),
            'password' => $this->encryption->encrypt($this->input->post('pass')),
            'role' => $this->input->post('role')
            ];
        
        if ($this->User_model->insert($data))
        { 
            if($this->session->role=='Administrator')
            { redirect('admin/user'); }
            else
            { redirect('home/'); }
        }
    }

	public function update($id)
    {
        //Ambil Value
        $id=$this->input->post('id');
        
		$data = [
            'nama_user' => $this->input->post('name'),
            'alamat' => $this->input->post('alamat'),
            'no_hp' => $this->input->post('hp'),
            'email  ' => $this->input->post('email'),
            'password' => $this->encryption->encrypt($this->input->post('pass')),
            'role' => $this->input->post('role')
            ];

        if ($this->User_model->update($id, $data))
        {
            if($this->session->role=='Administrator')
            { redirect('admin/user'); }
            else
            { redirect('home/'); }
        } 
	}
	
	public function destroy($id)
    {
        if($this->session->role!='Administrator')
        { redirect('log/'); }

		if ($this->User_model->delete($id))
		{ redirect('admin/user'); }
    }
}