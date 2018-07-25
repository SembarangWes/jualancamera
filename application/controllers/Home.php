<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    { parent::__construct(); }

	public function index()
	{
		$data=[
			'kategori' => $this->Kategori_model->select(),
			'kamera' => $this->Kamera_model->select(),
            'kamorder' => $this->Kamera_model->selectorder(),
            'merek' => $this->Kamera_model->select()
		];
		$this->load->view('index', $data);
	}

	public function products()
	{ 
		// Cek isi kotak
        if($this->uri->segment(3))
        { $search=$this->uri->segment(3); }
        else
        {
            if($this->input->post("search"))
            { $search = $this->input->post("search"); }
            else
            { $search = 'null'; }
        }

        $data = [];
        $total = $this->Kamera_model->getTotalProducts($search);
        if ($total > 0)
        {
            $limit = 9;
            $start = $this->uri->segment(4, 0);
            $config = [
                'base_url' => base_url() . 'home/products/' . $search,
                'total_rows' => $total,
                'per_page' => $limit,
                'uri_segment' => 5,

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
				'data' => $this->Kamera_model->listProducts($limit, $start, $search),
                'kategori' => $this->Kategori_model->select(),
                'links' => $this->pagination->create_links(),
                'merek' => $this->Merek_model->select(),
				'start' => $start,
				'limit' => $limit,
				'total' => $total
            ];
		}
		
		$this->load->view('products', $data);
	}

	public function about_us()
	{ $this->load->view('about_us'); }

	public function mail_us()
	{ $this->load->view('mail_us'); }

	public function show($id)
	{ 
        $data['kamerow']=$this->Kamera_model->show($id);
        $this->load->view('show', $data); }
}