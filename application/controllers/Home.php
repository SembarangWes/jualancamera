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
            'merek' => $this->Merek_model->select(),
            'user' => $this->User_model->show($this->session->id),
            'riwayat' => $this->Transaksi_model->usertrans($this->session->id)
		];
		$this->load->view('index', $data);
	}

	public function products()
	{ 
		// Cek kolom combobox
        if($this->uri->segment(3))
        { $box = $this->uri->segment(3); }
        else
        { 
            if($this->input->post("kolom"))
            { $box = $this->input->post("kolom"); }
            else
            { $box = 'null'; }
        }

        // Cek isi kotak
        if($this->uri->segment(4))
        { $search = $this->uri->segment(4); }
        else
        { 
            if($this->input->post("search"))
            { $search = $this->input->post("search"); }
            else
            { $search = 'null'; }
        }

        $data = [];
        if($box=='harga' || $box=='id_kamera')
        { $total = $this->Kamera_model->getTotalOrder($box,$search); }
        else
        { $total = $this->Kamera_model->getTotal($box,$search); }

        if ($total > 0)
        {
            $limit = 9;
            $start = $this->uri->segment(5, 0);
            $config = [
                'base_url' => base_url() . 'home/products/' . $box . '/' . $search,
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
            if($box=='harga' || $box=='id_kamera')
            { $listlist = $this->Kamera_model->listOrder($limit, $start, $box, $search); }
            else
            { $listlist = $this->Kamera_model->list($limit, $start, $box, $search); }
            $data = [
				'data' => $listlist,
                'kategori' => $this->Kategori_model->select(),
                'links' => $this->pagination->create_links(),
                'merek' => $this->Merek_model->select(),
				'start' => $start,
				'limit' => $limit,
                'total' => $total,
                'user' => $this->User_model->show($this->session->id),
                'riwayat' => $this->Transaksi_model->usertrans($this->session->id)
            ];
		}
		
		$this->load->view('products', $data);
	}

	public function about_us()
	{ 

        $data = [
            'kategori' => $this->Kategori_model->select(),
            'user' => $this->User_model->show($this->session->id),
            'riwayat' => $this->Transaksi_model->usertrans($this->session->id)
        ];
        $this->load->view('about_us', $data);
    }

	public function mail_us()
	{ 
        $data = [
            'kategori' => $this->Kategori_model->select(),
            'user' => $this->User_model->show($this->session->id),
            'riwayat' => $this->Transaksi_model->usertrans($this->session->id)
        ];
        $this->load->view('mail_us', $data); 
    }

	public function show($id)
	{ 
        $data = [
            'kategori' => $this->Kategori_model->select(),
            'kamerow' => $this->Kamera_model->show($id),
            'user' => $this->User_model->show($this->session->id),
            'cart' => $this->cart->contents(),
            'riwayat' => $this->Transaksi_model->usertrans($this->session->id)
        ];
        $this->load->view('show', $data);
    }
}