<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kamera_model extends CI_Model {

    public function select()
    { return $this->db->get('kamera')->result(); }

    public function selectorder()
    { 
        $this->db->order_by('id_kamera','desc');
        return $this->db->get('kamera')->result(); }

    public function getTotal($box, $search)
    { 
        $this->db->select('*');
        $this->db->from('kamera');
        $this->db->join('kategori','kamera.id_kategori =kategori.id_kategori','left');

        if ($box != 'null' && $search != 'null')
        {  $this->db->like($box, $search); }

        return $this->db->count_all_results();
    }

    public function list($limit='null', $start='null', $box='null', $search='null')
    {
        $this->db->select('*');
        $this->db->from('kamera');
        $this->db->join('kategori','kamera.id_kategori=kategori.id_kategori','left');

        if ($box != 'null' && $search != 'null')
        { $this->db->like($box, $search); }

        $this->db->limit($limit,$start);
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result() : false;
    }

    public function insert($data = [])
    { return $this->db->insert('kamera', $data); }

    public function show($id)
    {
        $this->db->where('id_kamera',$id);
        return $this->db->get('kamera')->row();
    }

    public function update($id, $data)
    {
        // TODO: set data yang akan di update
        // https://www.codeigniter.com/userguide3/database/query_builder.html#updating-data

        $this->db->where('id_kamera', $id);
        $this->db->update('kamera', $data);
        return result;
    }
    
    public function delete($id)
    {
        // TODO: tambahkan logic penghapusan data
        $this->db->where('id_kamera', $id);
        $this->db->delete('kamera');
    }
}

/* End of file ModelName.php */