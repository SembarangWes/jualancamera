<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

    public function getTotal($search)
    { 
        if ($search != 'null')
        {  $this->db->like('nama_kategori', $search); }

        return $this->db->count_all_results('kategori');
    }

    public function list($limit, $start, $search)
    { 
        if ($search != 'null')
        {  $this->db->like('nama_kategori', $search); }

        $this->db->order_by("nama_kategori", "asc");
        $query = $this->db->get('kategori', $limit, $start);
        return ($query->num_rows() > 0) ? $query->result() : false;
    }

    public function insert($data = [])
    { return $this->db->insert('kategori', $data); }

    public function update($id, $data)
    {
        // TODO: set data yang akan di update
        // https://www.codeigniter.com/userguide3/database/query_builder.html#updating-data

        $this->db->where('id_kategori', $id);
        $this->db->update('kategori', $data);
        return result;
    }

    public function delete($id)
    {
        // TODO: tambahkan logic penghapusan data
        $this->db->where('id_kategori', $id);
        $this->db->delete('kategori');
        return result;
    }
}