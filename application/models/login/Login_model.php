<?php
class Login_model extends CI_Model {

    public  function  check_login($email,$password) {
        $sql = 'select * from users where email=? and password=?';
        $result = $this->db->query($sql,array('email'=>$email,'password'=>$password));
        $response=array();
        if($result->num_rows()>0) {
            $row = $result->row();
            $response['login']='success';
            $token = md5($email.time());
            $response['remember_token']=$token;
            $this->db->set('token', $token, TRUE);
            $this->db->where('id', $row->id);
            $this->db->update('users');
        }
        else{
            $response['login']='failed';
        }
        return $response;
    }
}
?>