<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if($this->session->role!='Administrator')
        { redirect('log/'); }
    }

	public function store()
    {
            // Insert data
            $data = [
                'nama_user' => $this->input->post('name'),
                'alamat' => $this->input->post('alamat'),
                'no_hp' => $this->input->post('hp'),
                'email  ' => $this->input->post('email'),
                'password' => $this->input->post('pass'),
                'role' => $this->input->post('role')
                ];
            
            if ($this->User_model->insert($data))
            { redirect('admin/user'); }        
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
            'password' => $this->input->post('pass'),
            'role' => $this->input->post('role')
            ];

        if ($this->User_model->update($id,$data))
        { redirect('admin/user'); }
	}
	
	public function destroy($id)
    {
		if ($this->User_model->delete($id))
		{ redirect('admin/user'); }
    }
}