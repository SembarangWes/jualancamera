<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

    public function selectordername($box, $search)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('user', 'transaksi.id_user = user.id_user');

        if ($box != 'null' && $search != 'null')
        { $this->db->like($box, $search); }

        $this->db->order_by('id_transaksi','asc');
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result() : false;
    }

    public function getTotal($box, $search)
    { 
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('user', 'transaksi.id_user = user.id_user');

        if ($box != 'null' && $search != 'null')
        {  $this->db->like($box, $search); }

        return $this->db->count_all_results();
    }

    public function list($limit, $start, $box, $search)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('user', 'transaksi.id_user = user.id_user');

        if ($box != 'null' && $search != 'null')
        {  $this->db->like($box, $search); }

        $this->db->order_by('id_transaksi', 'desc');
        $this->db->limit($limit,$start);
        
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result() : false;
    }

    public function admtrans()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('user', 'transaksi.id_user = user.id_user');
        return $this->db->get()->result();
    }

    public function usertrans($id)
    {
        $this->db->where('id_user', $id);
        $this->db->where('status', false);
        return $this->db->get('transaksi')->result();
    }

    public function insert($data)
    {
        $this->db->insert('transaksi', $data);
        return $this->db->insert_id();
    }

    public function update($id, $data)
    {
        $this->db->where('id_transaksi', $id);
        $this->db->update('transaksi', $data);
    }

    public function getStock($id)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('detail', 'transaksi.id_transaksi = detail.id_transaksi');
        $this->db->join('kamera', 'kamera.id_kamera = detail.id_kamera');
        $this->db->where('transaksi.id_transaksi', $id);
        return $this->db->get()->result();
    }

    public function delete($id)
    {
        $this->db->where('id_transaksi', $id);
        $this->db->delete('transaksi');
        return result;
    }
}