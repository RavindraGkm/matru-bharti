<?php

class Profile_model extends CI_Model {

    public function update ($params,$user_id) {
        $where = "id = ".$user_id;
        $sql = $this->db->update_string('profiles', $params, $where);
        $response = array();
        if($this->db->query($sql)) {
            $response['updated'] = 'success';
        }
        else {
            $response['updated'] = 'failed';
        }
        return $response;
    }

    public function profiles($remember_token) {
        $query = $this->db->get_where('users', array('remember_token' => $remember_token));
        $response = array();
        if($query->num_rows()>0) {
            $query = $this->db->get('profiles');
            $response['metadata'] = array('resultset'=>array('count'=>$query->num_rows()));
            $response['results'] = $query->result_array();
        }
        return $response;
    }

    public function profile($id,$remember_token) {
        $query = $this->db->get_where('users', array('remember_token' => $remember_token));
        $response = array();
        if($query->num_rows()>0) {
            $query = $this->db->get_where('profiles', array('id' => $id));
            return $query->row_array();
        }
        else {
            return NULL;
        }
    }

}