<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		$kat = $this->Kategori_model->list();
		$this->load->view('index', $kat);
	}

	public function about()
	{
		$this->load->view('about');
	}
}