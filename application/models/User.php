<?php

class User extends CI_Model{
    
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
}