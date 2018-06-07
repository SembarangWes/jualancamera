<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{ $this->load->view('admin/index'); }

	public function camera()
	{
        // Cek kolom combobox
        if($this->uri->segment(3))
        { $box=$this->uri->segment(3); }
        else
        {
            if($this->input->post("kolom"))
            { $box = $this->input->post("kolom"); }
            else
            { $box = 'null'; }
        }

        // Cek isi kotak
        if($this->uri->segment(4))
        { $search=$this->uri->segment(4); }
        else
        {
            if($this->input->post("search"))
            { $search = $this->input->post("search"); }
            else
            { $search = 'null'; }
        }

        $data = [];
        $total = $this->Kamera_model->getTotal($box, $search);
        if ($total > 0)
        {
            $limit = 2;
            $start = $this->uri->segment(5, 0);
            $config = [
                'base_url' => base_url() . 'admin/camera/' . $box . '/' . $search,
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
                'data' => $this->Kamera_model->list($limit, $start, $box, $search),
                'links' => $this->pagination->create_links(),
                'start' => $start,
                'page' => 'index',
            ];
        }
        
		$this->load->view('admin/camera', $data);
    }

    public function category()
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
        $total = $this->Kategori_model->getTotal($search);
        if ($total > 0)
        {
            $limit = 2;
            $start = $this->uri->segment(4, 0);
            $config = [
                'base_url' => base_url() . 'admin/category/' . $search,
                'total_rows' => $total,
                'per_page' => $limit,
                'uri_segment' => 4,

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
                'data' => $this->Kategori_model->list($limit, $start, $search),
                'links' => $this->pagination->create_links(),
                'start' => $start
            ];
        }

        $this->load->view('admin/category', $data);
    }

    public function user()
    { $this->load->view('admin/user'); }

	public function login()
	{ $this->load->view('admin/login'); }

	public function signup()
	{ $this->load->view('admin/signup'); }

}