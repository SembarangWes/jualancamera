<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transact extends CI_Controller 
{
    public function pay()
    {
        $id = $this->uri->segment(4);
        $data = [ 'bayar' => $this->uri->segment(3) ];
        
        $this->Transaksi_model->update($id, $data);
        if($this->session->role=='Administrator')
        { redirect('admin/transact'); }
        else
        { redirect('home'); }
    }

    public function ver()
    {
        $id = $this->uri->segment(4);
        $data = [
            'status' => $this->uri->segment(3),
            'bayar' => $this->uri->segment(3)
        ];
        
        $this->Transaksi_model->update($id, $data);

        $row = $this->Transaksi_model->getStock($id);
        foreach ($row as $r)
        {
            $sisa = $r->stok-$r->jumlah;
            $data = [ 'stok' => $sisa ];
            $this->Kamera_model->update($r->id_kamera, $data);
        }

        redirect('delivery/store/'.$id);
    }

    public function destroy($id)
    {
        if($this->session->role!='Administrator')
        { redirect('log/'); }

		if (
            $this->Transaksi_model->delete($id)
            &&
            $this->Detail_model->delete($id)
            )
        { redirect('admin/transact'); }
    }
}