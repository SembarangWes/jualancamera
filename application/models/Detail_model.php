<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_model extends CI_Model
{
    public function getDetail($id)
    {
        $this->db->join('kamera', 'kamera.id_kamera = detail.id_kamera');
        $this->db->where('detail.id_transaksi', $id);
        return $this->db->get('detail')->result();
    }

    public function insert($data)
    { $this->db->insert_batch('detail',$data); }

    public function delete($id)
    {
        $this->db->where('id_transaksi', $id);
        return $this->db->delete('detail');
    }
}