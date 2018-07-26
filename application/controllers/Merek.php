<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merek extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // Konfigurasi Upload
        $config['upload_path']          = './assets/uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1500;
        $config['max_width']            = 1366;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if($this->session->role!='Administrator')
        { redirect('log/'); }
    }

    public function store()
    {
        // Percobaan Upload
        if (!$this->upload->do_upload('foto'))
        {
            $error = $this->upload->display_errors();
            //echo 1;
            redirect('admin/merek/'.$error);
        }
        else
        {
            // Insert data
            $data = [
                'nama_merek' => $this->input->post('name'),
                'foto_merek' => $this->upload->data('file_name')
                ];
            
            if ($this->Merek_model->insert($data))
            { redirect('admin/merek'); } else {echo 2;}
        }
    }

    public function update($id)
    {
        //Ambil Value
        $id=$this->input->post('id');

        if (!$this->upload->do_upload('foto'))
        {
            $data = [ 'nama_merek' => $this->input->post('name') ];

            $result = $this->Merek_model->update($id,$data);

            if ($result)
            { redirect('admin/merek'); }
        }
        else
        {
            $data = [
                'nama_merek' => $this->input->post('name'),
                'foto_merek' => $this->upload->data('file_name')
            ];

            $delpic = $this->Merek_model->show($id);
            unlink('./assets/uploads/'.$delpic->foto_merek);

            $result = $this->Merek_model->update($id,$data);
            
            if ($result)
            { redirect('admin/merek'); }
        }
    }

    public function destroy($id)
    {
        $merek = $this->Merek_model->show($id);
        unlink('./assets/uploads/'.$merek->foto_merek);
        
        $this->Merek_model->delete($id);

        redirect('admin/merek');
    }
}