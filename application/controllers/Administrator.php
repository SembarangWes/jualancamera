<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

	public function index()
	{
		$this->load->view('administrator/index');
	}

	public function buttons()
	{
		$this->load->view('administrator/buttons');
	}

	public function calendar()
	{
		$this->load->view('administrator/calendar');
	}

	public function editors()
	{
		$this->load->view('administrator/editors');
	}

	public function forms()
	{
		$this->load->view('administrator/forms');
	}

	public function login()
	{
		$this->load->view('administrator/login');
	}

	public function signup()
	{
		$this->load->view('administrator/signup');
	}

	public function stats()
	{
		$this->load->view('administrator/stats');
	}

	public function tables()
	{
		$this->load->view('administrator/tables');
	}
}