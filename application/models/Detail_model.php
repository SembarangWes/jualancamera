<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merek_model extends CI_Model {

    public function insert($data)
    { $this->db->insert_batch('detail',$data); }
}