<?php
class Profile_model extends CI_Model {

    public  function  update($name,$email,$mobile,$address,$city,$dob,$about_yourself,$user_id) {
        $data = array('user_name' => $name, 'address' => $address, 'city' => $city,'user_dob'=>$dob,'about_user'=>$about_yourself);
        $where = "token = ".$user_id;
        $sql = $this->db->update_string('authores', $data, $where);
        $response = array();
        if($this->db->query($sql)) {
            $response['updated'] = 'success';
        }
        else {
            $response['updated'] = 'failed';
        }
        return $response;
    }
}
?>