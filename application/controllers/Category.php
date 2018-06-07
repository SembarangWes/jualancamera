<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }

	public function store()
    {
            // Insert data
            $data = [ 'nama_kategori' => $this->input->post('kategori') ];
            
            if ($this->Kategori_model->insert($data))
            { redirect('admin/category'); }        
    }

	public function update($id)
    {
        //Ambil Value
        $id=$this->input->post('id');
		
		$data = [ 'nama_kategori' => $this->input->post('kategori') ];

        $result = $this->Kategori_model->update($id,$data);

        if ($result)
        { redirect('admin/category'); }
	}
	
	public function destroy($id)
    {
		$result = $this->Kategori_model->delete($id);
		if ($result)
		{ redirect('admin/category'); }
    }
}