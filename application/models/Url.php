<?php

class Url extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    public function show_urls($sessao){

        $this->db->where('user', $sessao);

        $query = $this->db->get('urls');
        $data = $query->result_array();

        return $data;

    }

    public function insert_url($data){

        $this->db->insert("urls", $data);
    }

}