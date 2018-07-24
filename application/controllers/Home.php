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
		];
		$this->load->view('index', $data);
	}

	public function about_us()
	{ $this->load->view('about_us'); }

	public function mail_us()
	{ $this->load->view('mail_us'); }
}