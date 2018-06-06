<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function list()
    {
        $result = $this->User_model->select();
        header("Content-Type: application/json");
        echo json_encode($result);
    }

    public function add()
    { 
        $data = $this->input->post();
        $this->User_model->insert($data);
    }

    public function edit()
    { 
        $id = $this->input->post('id_user');
        $data = $this->input->post();
        $this->User_model->update($id,$data);
    }

    public function destroy()
    { 
        $id = $this->input->post('id_user');
        $this->User_model->delete($id);
    }
}