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
                'page' => 'index'
            ];
        }
        
		$this->load->view('admin/camera', $data);
    }
    
    public function user()
    { $this->load->view('admin/user'); }

	public function login()
	{ $this->load->view('admin/login'); }

	public function signup()
	{ $this->load->view('admin/signup'); }

}