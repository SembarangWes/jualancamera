<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function getTotal($box, $search)
    { 
        if ($box != 'null' && $search != 'null')
        {  $this->db->like($box, $search); }

        return $this->db->count_all_results('user');
    }

    public function list($limit, $start, $box, $search)
    {
        if ($box != 'null' && $search != 'null')
        {  $this->db->like($box, $search); }

        $query = $this->db->get('user', $limit, $start);
        return ($query->num_rows() > 0) ? $query->result() : false;
    }

    public function insert($data = [])
    { return $this->db->insert('user', $data); }

    public function show($id)
    {
        $this->db->where('id_user', $id);
        return $this->db->get('user')->row();
    }

    public function update($id, $data)
    {
        // TODO: set data yang akan di update
        // https://www.codeigniter.com/userguide3/database/query_builder.html#updating-data

        $this->db->where('id_user', $id);
        $this->db->update('user', $data);
        return result;
    }
    
    public function delete($id)
    {
        // TODO: tambahkan logic penghapusan data
        $this->db->where('id_user', $id);
        $this->db->delete('user');
        return result;
    }
}

/* End of file ModelName.php */