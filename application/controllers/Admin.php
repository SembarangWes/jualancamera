<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        // Konfigurasi Upload
        $config['upload_path']          = './assets/uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1500;
        $config['max_width']            = 1336;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);
    }

	public function index()
	{
		$this->load->view('admin/index');
	}

	public function camera($page='',$error='',$id='')
	{
        $data = [];
        $total = $this->Kamera_model->getTotal();
        if ($total > 0)
        {
            $limit = 2;
            $start = $this->uri->segment(3, 0);
            $config = [
                'base_url' => base_url() . 'admin/camera',
                'total_rows' => $total,
                'per_page' => $limit,
                'uri_segment' => 3,

                // Bootstrap 3 Pagination
                'first_link' => '&laquo;',
                'last_link' => '&raquo;',
                'next_link' => 'Next',
                'prev_link' => 'Prev',
                'full_tag_open' => '<ul class="pagination">',
                'full_tag_close' => '</ul>',
                'num_tag_open' => '<li>',
                'num_tag_close' => '</li>',
                'cur_tag_open' => '<li class="active"><span>',
                'cur_tag_close' => '<span class="sr-only">(current)</span></span></li>',
                'next_tag_open' => '<li>',
                'next_tag_close' => '</li>',
                'prev_tag_open' => '<li>',
                'prev_tag_close' => '</li>',
                'first_tag_open' => '<li>',
                'first_tag_close' => '</li>',
                'last_tag_open' => '<li>',
                'last_tag_close' => '</li>',
            ];
            $this->pagination->initialize($config);
            $data = [
                'data' => $this->Kamera_model->list($limit, $start),
                'links' => $this->pagination->create_links(),
                'start' => $start,
                'page' => $page,
			    'error' => $error,
			    'dataid' => $this->Kamera_model->show($id)
            ];
        }
        
		$this->load->view('admin/camera', $data);
	}

	public function store()
    {
		$page = 'create';
        // Ambil value 
        $value = [
            'nama_kamera' => $this->input->post('kamera'),
            'spesifikasi' => $this->input->post('spesifikasi'),
            'harga' => $this->input->post('harga'),
            'stok' => $this->input->post('stok')
        ];

        // Validasi Nama dan Jabatan
        $errorval = $this->validate($value);

        // Pesan Error atau Upload
        if ($errorval==false)
        {
            // Percobaan Upload
            if ( ! $this->upload->do_upload('foto'))
            {
                $error = $this->upload->display_errors();
                $this->camera($page,$error);
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
                $result = $this->Kamera_model->insert($data);
                
                if ($result)
                {
                    redirect('admin/camera');
                }
                else
                {
					$data = [
						'page' => $page,
						'error' => 'Gagal'
					];
                    $this->load->view('admin/camera', $error);
                }
            }
        }
        else
        {
            $error = validation_errors();
            $this->camera($page,$error);
        }
    }

	public function update($id)
    {
		$page = 'edit';
        //Ambil Value
        $id=$this->input->post('id');
		$value = [
            'nama_kamera' => $this->input->post('kamera'),
            'spesifikasi' => $this->input->post('spesifikasi'),
            'harga' => $this->input->post('harga'),
            'stok' => $this->input->post('stok')
        ];

        // Validasi Nama dan Jabatan
        $errorval = $this->validate($value);

        if ($errorval==false)
        {
            if ( ! $this->upload->do_upload('foto'))
            {
                $result = $this->Kamera_model->update($id,$value);

                if ($result)
                {
                    redirect('admin/camera');
                }
                else
                {
					$data = [
						'page' => $page,
						'error' => 'Gagal'
					];
                    $this->load->view('admin/camera', $data);
                }
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
                {
                    redirect('admin/camera');
                }
                else
                {
                    $data = [
						'page' => $page,
						'error' => 'Gagal'
					];
                    $this->load->view('admin/camera', $data);
                }
            }
        }
        else
        {
            $error = validation_errors();
            $this->camera($page,$error);
        }
    }

    public function destroy($id)
    {
        $kamera = $this->Kamera_model->show($id);
        unlink('./assets/uploads/'.$kamera->foto_kamera);
        
        $this->Kamera_model->delete($id);

        redirect('admin/camera');
    }

	public function login()
	{
		$this->load->view('admin/login');
	}

	public function signup()
	{
		$this->load->view('admin/signup');
	}

	public function validate($dataval)
    {
        // Validasi

		$this->form_validation->set_rules('kamera','Kamera','trim|required');
		$this->form_validation->set_rules('spesifikasi','Spesifikasi','trim|required');
		$this->form_validation->set_rules('harga','Harga','trim|required');
		$this->form_validation->set_rules('stok','Stok','trim|required');

        if (! $this->form_validation->run())
        { return true; }
        else
        { return false; }
    } 
}