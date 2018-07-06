<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

    public function select()
    { return $this->db->get('kategori')->result(); }

    public function insert($data)
    { $this->db->insert('kategori', $data); }

    public function update($id,$data)
    { $this->db->where('id_kategori', $id)->update('kategori', $data); }

    public function delete($id)
    { $this->db->where('id_kategori', $id)->delete('kategori'); }
}