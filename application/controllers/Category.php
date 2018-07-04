<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->username!='admin')
        { redirect('log/'); }
    }

    public function list()
    {
        $result = $this->Kategori_model->select();
        header("Content-Type: application/json");
        echo json_encode($result);
    }

    public function add()
    { 
        $data = $this->input->post();
        $this->Kategori_model->insert($data);
    }

    public function edit()
    { 
        $id = $this->input->post('id_kategori');
        $data = $this->input->post();
        $this->Kategori_model->update($id,$data);
    }

    public function destroy()
    { 
        $id = $this->input->post('id_kategori');
        $this->Kategori_model->delete($id);
    }
}