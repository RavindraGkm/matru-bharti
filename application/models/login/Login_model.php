<?php
class Login_model extends CI_Model {

    public  function  check_login($params) {
        $sql = 'select * from authors where email=? and password=?';
        $result = $this->db->query($sql,array($params['email'],$params['password']));
        $response=array();
        if($result->num_rows()>0) {
            $row = $result->row();
            $token = md5($params['email'].time());
            $response['token']=$token;
            $this->db->set('token', $token, TRUE);
            $this->db->where('id', $row->id);
            if($this->db->update('authors')) {
                $response['status']='success';
                $response['id']=$row->id;
            }
            else {
                $response['status']='error';
            }
        }
        else{
            $response['status']='error';
        }
        return $response;
    }
}
?>