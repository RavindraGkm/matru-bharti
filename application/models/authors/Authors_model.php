<?php
class Authors_model extends CI_Model {

    public  function  register_new_author ($params) {

        $params['token'] = md5($params['email'].time());
        $sql = $this->db->insert('authors', $params);
        $response = array();
        if($sql) {
            $response['status'] = 'success';
            $response['token'] = $params['token'];
            $response['id'] = $this->db->insert_id();
        }
        else {
            $response['status'] = 'error';
        }
        return $response;
    }

    public  function  update_author ($params,$author_id) {
        $where = "id = ".$author_id;
        $sql = $this->db->update_string('authors', $params, $where);
        $response = array();
        if($this->db->query($sql)) {
            $response['updated'] = 'success';
        }
        else {
            $response['updated'] = 'failed';
        }
        return $response;
    }

    public function profile($remember_token) {
        $query = $this->db->get_where('users', array('token' => $remember_token));
        $response = array();
        if($query->num_rows()>0) {
            $query = $this->db->get('profile');
            $response['metadata'] = array('resultset'=>array('count'=>$query->num_rows()));
            $response['results'] = $query->result_array();
        }
        return $response;
    }
//    public  function  update_author($email,$mobile,$password) {
//        $data = array('user_name' => $name, 'address' => $address, 'city' => $city,'user_dob'=>$dob,'about_user'=>$about_yourself);
//        $where = "token = ".$user_id;
//        $sql = $this->db->update_string('authores', $data, $where);
//        $response = array();
//        if($this->db->query($sql)) {
//            $response['updated'] = 'success';
//        }
//        else {
//            $response['updated'] = 'failed';
//        }
//        return $response;
//    }

}
?>