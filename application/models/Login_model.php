<?php

class Login_model extends CI_Model {

    public function check_login ($params) {
        $sql = "SELECT * FROM users WHERE email=? AND password=? AND  is_active=?";
        $result=$this->db->query($sql,array($params['email'],$params['password'],1));
        $response = array();
        if($result->num_rows()>0) {
            $response['login'] = 'success';
        }
        else {
            $response['login'] = 'failed';
        }
        return $response;
    }

}