<?php
class Authors_model extends CI_Model {

    public  function  register_new_author($params) {

        $params['token'] = md5($params['email'].time());
        $sql = $this->db->insert('users', $params);
        $response = array();
        if($sql) {
            $response['status'] = 'success';
            $response['token'] = $params['token'];
        }
        else {
            $response['status'] = 'error';
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