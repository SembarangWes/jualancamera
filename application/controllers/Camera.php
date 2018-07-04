<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Camera extends CI_Controller {

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
    
    public function create()
    { 
        $data = [
            'page' => 'create',
            'error' => ''
        ];
        $this->load->view('admin/camera', $data);
    }

    public function store()
    {
        // Percobaan Upload
        if ( ! $this->upload->do_upload('foto'))
        {
            $data = [ 
                'page' => 'create',
                'error' => $this->upload->display_errors()
            ];
            $this->load->view('admin/camera', $data);
        }
        else
        {
            // Insert data
            $data = [
                'nama_kamera' => $this->input->post('kamera'),
                'spesifikasi' => $this->input->post('spesifikasi'),
                'harga' => $this->input->post('harga'),
                'stok' => $this->input->post('stok'),
                'foto_kamera' => $this->upload->data('file_name')
                ];
            
            if ($this->Kamera_model->insert($data))
            { redirect('admin/camera'); }
        }
    }

    public function edit($id)
    {
        $data = [
            'error' => '',
            'page' => 'edit',
			'dataid' => $this->Kamera_model->show($id)
        ];
        $this->load->view('admin/camera', $data);
    }

	public function update($id)
    {
        //Ambil Value
        $id=$this->input->post('id');

        if ( ! $this->upload->do_upload('foto'))
        {
            $data = [
                'nama_kamera' => $this->input->post('kamera'),
                'spesifikasi' => $this->input->post('spesifikasi'),
                'harga' => $this->input->post('harga'),
                'stok' => $this->input->post('stok')
            ];

            $result = $this->Kamera_model->update($id,$data);

            if ($result)
            { redirect('admin/camera'); }
        }
        else
        {
            $data = [
                'nama_kamera' => $this->input->post('kamera'),
                'spesifikasi' => $this->input->post('spesifikasi'),
                'harga' => $this->input->post('harga'),
                'stok' => $this->input->post('stok'),	
                'foto_kamera' => $this->upload->data('file_name')
            ];
            
            $delpic = $this->Kamera_model->show($id);
            unlink('./assets/uploads/'.$delpic->foto_kamera);

            $result = $this->Kamera_model->update($id,$data);
            
            if ($result)
            { redirect('admin/camera'); }
        }
    }

    public function destroy($id)
    {
        $kamera = $this->Kamera_model->show($id);
        unlink('./assets/uploads/'.$kamera->foto_kamera);
        
        $this->Kamera_model->delete($id);

        redirect('admin/camera');
    }
}