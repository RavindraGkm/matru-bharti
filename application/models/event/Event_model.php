<?php
class Event_model extends CI_Model {

    public function get_event_list($auth_token,$event_id=0) {

        $query = $this->db->get_where('authors', array('token' => $auth_token));
        $response = array();
        if($query->num_rows()>0) {
            $row = $query->row_array();
            if($row['type']=='admin') {
                $query = $this->db->get('events');
                if($query->num_rows()>0) {
                    $response['status'] = 'success';
                    $response['result'] = $query->result_array();
                }
            }
            else {
                $author_id = $row['id'];
                $query = $this->db->get_where('events', array('author_id' => $author_id));
                if($query->num_rows()>0) {
                    $response['status'] = 'success';
                    $response['result'] = $query->result_array();
                }
            }
        }
        else {
            $response['status'] = 'error';
            $response['msg'] = 'Anauthorized';
        }
        return $response;
    }

    public function upload_new_event ($params,$auth_token) {
        $query = $this->db->get_where('authors', array('token' => $auth_token));
        $response = array();
        if($query->num_rows()>0) {
            $sql = $this->db->insert('events', $params);
            if($sql) {
                $response['status'] = 'success';
                $response['msg'] = 'success';
            }
            else {
                $response['status'] = 'error';
                $response['msg'] = 'Server error';
            }
        }
        else {
            $response['status'] = 'error';
            $response['msg'] = 'Anauthorized';
        }
        return $response;
    }

    public function delete_event($auth_token,$event_id,$author_id) {
        $query = $this->db->get_where('authors', array('token' => $auth_token));

        $response = array();
        if($query->num_rows()>0) {
            $this->db->delete('events', array('id'=>$event_id,'author_id'=>$author_id));
            if($this->db->affected_rows()>0) {
                $response['status'] = 'success';
                $response['msg'] = 'Deleted Successfully';
            }
            else {
                $response['status'] = 'error';
                $response['msg'] = 'Server Error';
            }
        }
        else {
            $response['status'] = 'error';
            $response['msg'] = 'Anauthorized';
        }
        return $response;
    }
}
?>