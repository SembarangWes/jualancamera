<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delivery extends CI_Controller
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

	public function store($id)
    {    
        $detail = $this->Detail_model->getDetail($id);
        $weights = null;
        foreach ($detail as $d)
        {
            $weight = $d->berat * $d->jumlah;
            if ($weight <= 1) { $weight = 1; }
            $weights += $weight;
        }

        $short = $this->Transaksi_model->selectShortTrans($id);
        $dataPengiriman = [
            'nama_penerima' => $short->nama_user,
            'alamat_penerima' => $short->alamat,
            'berat' => $weights,
            'id_kategori' => $short->id_kirim,
            'nama_pengirim' => $this->PT
        ];
        
        $id_pengiriman = $this->curl->simple_post($this->API.'/pengiriman', $dataPengiriman, array(CURLOPT_BUFFERSIZE => 10));
        
        foreach ($detail as $d)
        {
            $weight = $d->berat * $d->jumlah;
            if ($weight <= 1) { $weight = 1; }

            $dataPaket = [
                'nama_paket' => $d->nama_kamera." (".$d->jumlah." buah)" ,
                'berat' => $weight,
                'id_pengiriman' => $id_pengiriman
            ];
            
            $this->curl->simple_post($this->API.'/paket', $dataPaket, array(CURLOPT_BUFFERSIZE => 10));
        }

        redirect('admin/delivery');
    }

	public function update($id)
    {
        //Ambil Value
        $id=$this->input->post('id');
        
		$data = [
            'nama_user' => $this->input->post('name'),
            'alamat' => $this->input->post('alamat'),
            'no_hp' => $this->input->post('hp'),
            'email  ' => $this->input->post('email'),
            'password' => $this->encryption->encrypt($this->input->post('pass')),
            'role' => $this->input->post('role')
            ];

        if ($this->User_model->update($id, $data))
        {
            if($this->session->role=='Administrator')
            { redirect('admin/user'); }
            else
            { redirect('home/'); }
        } 
	}
	
	public function destroy($id)
    {
        if($this->session->role!='Administrator')
        { redirect('log/'); }

        $data = [
            'id_pengiriman' => $id
        ];

		if ($this->curl->simple_delete($this->API.'/pengiriman', $data, array(CURLOPT_BUFFERSIZE => 10)))
        { redirect('admin/delivery'); }
    }
}