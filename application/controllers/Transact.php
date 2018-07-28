<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transact extends CI_Controller {

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
        $data = [ 'status' => $this->uri->segment(3) ];
        
        $this->Transaksi_model->update($id, $data);
        if($this->session->role=='Administrator')
        { redirect('admin/transact'); }
        else
        { redirect('home'); }
    }
}