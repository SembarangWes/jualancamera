<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller 
{
    var $API = "";
	public function __construct()
    {
        parent::__construct();
        if(empty($this->session->role))
        { redirect('log/'); }

        // URL UNTUK REST
        $this->API = "http://localhost:8012/express_server/index.php";
        // URL UNTUK REST
    }

    public function cart()
    {
        $data = [
            'carts' => $this->cart->contents(),
            'kamera' => $this->Kamera_model->select(),
            'kategori' => $this->Kategori_model->select(),
            'user' => $this->User_model->show($this->session->id),
            'page' => 'shop',
            'riwayat' => $this->Transaksi_model->usertrans($this->session->id)
        ];

		$this->load->view('shop',$data);
    }

    public function add()
    {
        $e=false;
        foreach ($this->cart->contents() as $c)
        { if ($c['id'] == $this->input->post('idkam')) { $e=true; } }

        if($e==false)
        {
            $data = [
                'id' => $this->input->post('idkam'),
                'name' => $this->input->post('namkam'),
                'price' => $this->input->post('harga'),
                'qty'=> $this->input->post('jumkam')
            ];
    
            $this->cart->insert($data);
        }
        else
        {
            $data = [
                'rowid' => $c['rowid'],
                'qty' => $this->input->post('jumkam')
            ];
    
            $this->cart->update($data);
        }

        redirect('shop/cart');
    }

    public function cancel()
    {
        if($this->uri->segment(3)=='delete')
        { $this->cart->destroy(); }
        else
        {
            $data= [
                'rowid' => $this->uri->segment(3),
                'qty'=>0
            ];
            $this->cart->update($data);
        }
		redirect('shop/cart');
    }

    public function confirm()
    {
        $weights = null;
        foreach ($this->cart->contents() as $c)
        { 
            $kam = $this->Kamera_model->show($c['id']);
            $weight = ($kam->berat * $c['qty']);
            if ($weight <= 1) { $weight = 1; }
            $weights += $weight;
        }

        $data = [
            'carts' => $this->cart->contents(),
            'kamera' => $this->Kamera_model->select(),
            'kategori' => $this->Kategori_model->select(),
            'user' => $this->User_model->show($this->session->id),
            'page' => 'confirm',
            'riwayat' => $this->Transaksi_model->usertrans($this->session->id),
            'kirim' => json_decode($this->curl->simple_get($this->API.'/kategori')),
            'berat' => $weights
        ];

        $this->load->view('shop',$data);
    }

    public function payment()
    {
        $kode=rand(99,1000);
        $id_kirim = explode(':', $this->input->post('id_kirim'));

        $data = [
            'id_user' => $this->session->id,
            'tgl_transaksi' => date("Y-m-d"),
            'kode_unik' => $kode,
            'id_kirim' => $id_kirim[0],
            'total' => $this->input->post('total_pembayaran'),
            'status' => false
        ];

        $id = $this->Transaksi_model->insert($data);

        $data = [];
        $cart = $this->cart->contents();
        foreach ($cart as $c)
        {
            $data[] = [
                'id_kamera' => $c['id'],
                'jumlah' => $c['qty'],
                'id_transaksi' => $id
            ];
        }
        $this->Detail_model->insert($data);

        $data = [
            'total' => $this->input->post('total_pembayaran'),
            'page' => 'pay',
            'kategori' => $this->Kategori_model->select(),
            'user' => $this->User_model->show($this->session->id),
            'id' => $id,
            'kirim' => $this->input->post('harga_kirim'),
            'kode' => $kode,
            'riwayat' => $this->Transaksi_model->usertrans($this->session->id)
        ];

        $this->cart->destroy();
        $this->load->view('shop', $data);
    }
}