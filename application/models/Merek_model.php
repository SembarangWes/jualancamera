<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merek_model extends CI_Model {

    public function select()
    { return $this->db->get('merek')->result(); }

    public function selectorder()
    {
        $this->db->from('merek')->order_by('nama_merek', 'asc');
        return $this->db->get()->result();
    }

    public function getTotal($search)
    {
        if ($search != 'null')
        {  $this->db->like('nama_merek', $search); }

        return $this->db->count_all_results('merek');
    }

    public function list($limit, $start, $search)
    {
        if ($search != 'null')
        {  $this->db->like('nama_merek', $search); }

        $query = $this->db->get('merek', $limit, $start);
        return ($query->num_rows() > 0) ? $query->result() : false;
    }

    public function insert($data = [])
    { return $this->db->insert('merek', $data); }

    public function show($id)
    {
        $this->db->where('id_merek',$id);
        return $this->db->get('merek')->row();
    }

    public function update($id, $data)
    {
        $this->db->where('id_merek', $id);
        $this->db->update('merek', $data);
        return result;
    }
    
    public function delete($id)
    {
        // TODO: tambahkan logic penghapusan data
        $this->db->where('id_merek', $id);
        $this->db->delete('merek');
        return result;
    }
}