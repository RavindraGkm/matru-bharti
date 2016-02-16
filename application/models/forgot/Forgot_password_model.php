<?php
class Forgot_password_model extends CI_Model {

    public function get_forgot_password($params) {
        $query = $this->db->get_where('authors', array('email' => $params['email']));
        $response=array();
        if($query->num_rows()>0) {
            $response['status'] = 'success';
            $response['result'] = $query->row_array();
        }
        else{
            $response['status']='error';
            $response['msg']='Unauthorized email';
        }
        return $response;
    }
}
?>