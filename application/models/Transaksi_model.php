<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

    public function insert($data)
    {
        $this->db->insert('transaksi', $data);
        return $this->db->insert_id();
    }

    public function pay($data)
    {
        $this->db->update($data);
    }
}