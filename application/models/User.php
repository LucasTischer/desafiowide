<?php

class User extends CI_Model{

    public function __construct(){
        $this->load->database();
    }
    
    //verifica se o usuario existe no banco de dados
    public function can_login($email, $senha){
        $this->db->where('email', $email);
        $this->db->where('password', $senha);

        $query = $this->db->get('users');

        if($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }

    }

    //insere os dados do usuario no banco de dados
    public function insert_user($data){

        $this->db->insert("users", $data);
    }

    //retorna os dados do usuario
    public function select_user($email){
        $this->db->where('email', $email);

        $query = $this->db->get('users');
        $data = $query->result();

        return $data;

    }
}