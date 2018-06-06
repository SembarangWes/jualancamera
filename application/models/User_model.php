<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function select()
    { return $this->db->get('user')->result(); }

    public function insert($data)
    { $this->db->insert('user', $data); }

    public function update($id,$data)
    { $this->db->where('id_user', $id)->update('user', $data); }

    public function delete($id)
    { $this->db->where('id_user', $id)->delete('user'); }
}