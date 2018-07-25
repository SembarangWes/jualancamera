<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

    public function cart()
    {
        $data = [
            'carts' => $this->cart->contents(),
            'kamera' => $this->Kamera_model->select()
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
}