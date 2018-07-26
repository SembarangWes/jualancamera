<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

    public function cart()
    {
        $data = [
            'carts' => $this->cart->contents(),
            'kamera' => $this->Kamera_model->select(),
            'kategori' => $this->Kategori_model->select(),
            'user' => $this->User_model->show($this->session->id)
        ];

		$this->load->view('cart',$data);
    }

    public function add()
    {
        $data = [
            'id' => $this->input->post('idkam'),
			'name' => $this->input->post('namkam'),
			'price' => $this->input->post('harga'),
            'qty'=> $this->input->post('jumkam'),
            'user' => $this->User_model->show($this->session->id)
        ];
        $this->cart->insert($data);
        redirect('shop/cart/'.$id);
    }

    public function cancel()
    {
		$data= [
            'rowid' => $this->uri->segment(3),
			'qty'=>0
        ];
        $this->cart->update($data);
		redirect('shop/cart');
    }

    public function confirm()
    {
        $data = [
            'carts' => $this->cart->contents(),
            'kamera' => $this->Kamera_model->select(),
            'kategori' => $this->Kategori_model->select(),
            'user' => $this->User_model->show($this->session->id)
        ];

		$this->load->view('confirm',$data);
    }

    public function done()
    {
        $data = [
            'id_user' => $this->session->id,
            'tgl_transaksi' => date("Y-m-d"),
            'total' => $this->cart->total(),
            'status' => false
        ];

        $id=$this->Transaksi_model->insert($data);

        $cart = $this->cart->contents();
        foreach ($cart as $c)
        {
            $data = [
                'id_kamera' => $c['id'],
                'jumlah' => $c['qty'],
                'id_transaksi' => $id
            ];
        }

        $this->Detail_model->insert($data);
        $this->cart->destroy();
    }
}