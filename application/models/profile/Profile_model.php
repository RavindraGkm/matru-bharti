<?php
class Profile_model extends CI_Model {

    public  function  update_author($params,$author_id) {
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
}
?>