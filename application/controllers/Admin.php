<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    var $API = "", $PT = "";
	public function __construct()
    {
        parent::__construct();
        if($this->session->role!='Administrator')
        { redirect('log/'); }

        // URL UNTUK REST
        $this->API = "http://localhost:8012/express_server/index.php";
        // URL UNTUK REST
        $this->PT = "PT. Bakul Kamera";
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
            $limit = 5;
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
            
            $model='';
            if($this->input->post("tombol")=='print')
            { $model = $this->Kamera_model->selectordername($box, $search); }
            else
            { $model = $this->Kamera_model->list($limit, $start, $box, $search); }

            $data = [
                'data' => $model,
                'links' => $this->pagination->create_links(),
                'start' => $start,
                'page' => 'index',
                'box' => $box,
                'search' => $search
            ];
        }
        
        if($this->input->post("tombol")=='print')
        {
            $this->pdf->setPaper('A4', 'landscape');
            $this->pdf->load_view('report/report_camera', $data, 'print.pdf'); 
        }
        else
        { $this->load->view('admin/camera', $data); }
    }

    public function category()
    { $this->load->view('admin/category'); }
    
    public function brand($error='')
    {
        // Cek kolom combobox
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
        $total = $this->Merek_model->getTotal($search);
        if ($total > 0)
        {
            $limit = 5;
            $start = $this->uri->segment(4, 0);
            $config = [
                'base_url' => base_url() . 'admin/brand/'. $search,
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
                'data' => $this->Merek_model->list($limit, $start, $search),
                'links' => $this->pagination->create_links(),
                'start' => $start,
                'error' => $error
            ];
        }
        
		$this->load->view('admin/brand', $data);
    }

    public function user()
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
        $total = $this->User_model->getTotal($box, $search);
        if ($total > 0)
        {
            $limit = 5;
            $start = $this->uri->segment(5, 0);
            $config = [
                'base_url' => base_url() . 'admin/user/' . $box . '/' . $search,
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

            $model='';
            if($this->input->post("tombol")=='print')
            { $model = $this->User_model->selectordername($box, $search); }
            else
            { $model = $this->User_model->list($limit, $start, $box, $search); }

            $data = [
                'data' => $model,
                'links' => $this->pagination->create_links(),
                'start' => $start,
                'box' => $box,
                'search' => $search
            ];
        }
        
        if($this->input->post("tombol")=='print')
        {
            $this->pdf->setPaper('A4', 'landscape');
            $this->pdf->load_view('report/report_user', $data, 'print.pdf'); 
        }
        else
        { $this->load->view('admin/user', $data); }
		
    }

    public function transact()
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
            {
                $search = $this->input->post("search");
                if($search=='belum'||$search=='belum dibayar'||$search=='belum diverifikasi')
                {$search="0";}
                if($search=='sudah'||$search=='sudah dibayar'||$search=='sudah diverifikasi'||$search=='dibayar'||$search=='diverifikasi')
                {$search="1";}
            }
            else
            { $search = 'null'; }
        }

        $data = [];
        $total = $this->Transaksi_model->getTotal($box, $search);
        if ($total > 0)
        {
            $limit = 5;
            $start = $this->uri->segment(5, 0);
            $config = [
                'base_url' => base_url() . 'admin/transact/' . $box . '/' . $search,
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

            $model='';
            if($this->input->post("tombol")=='print')
            { $model = $this->Transaksi_model->selectordername($box, $search); }
            else
            { $model = $this->Transaksi_model->list($limit, $start, $box, $search); }

            $data = [
                'data' => $this->Transaksi_model->list($limit, $start, $box, $search),
                'links' => $this->pagination->create_links(),
                'start' => $start,
                'box' => $box,
                'search' => $search
            ];
        }
        
        if($this->input->post("tombol")=='print')
        {
            $this->pdf->setPaper('A4', 'landscape');
            $this->pdf->load_view('report/report_transact', $data, 'print.pdf'); 
        }
        else
        { $this->load->view('admin/transact', $data); }
    }

    public function delivery()
    {
        $params = [
            'box' => 'nama',
            'search' => $this->PT
        ];
        
        $data = [ 
            'data' => json_decode($this->curl->simple_get($this->API.'/pengiriman', $params))
        ];
        
        $this->load->view('admin/delivery', $data);
    }

    public function report()
    {
        if($this->input->post('submit')=='submit')
        {
            $date = $this->input->post('kolom');
            $data = [
                'data' => $this->Transaksi_model->reportTime($date),
                'date' => $date
            ];

            $this->pdf->setPaper('A4', 'landscape');
            $this->pdf->load_view('report/report_report', $data, 'print.pdf');
        }
        else
        { $this->load->view('admin/report'); }
    }

	public function login()
	{ $this->load->view('admin/login'); }
}