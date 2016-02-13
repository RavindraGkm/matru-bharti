<?php
class Authors_model extends CI_Model {

    public function get_author($auth_token,$author_id) {
        $query = $this->db->get_where('authors', array('token' => $auth_token));
        $response = array();
        if($query->num_rows()>0) {
            $query = $this->db->get_where('authors', array('id' => $author_id));
            if($query->num_rows()>0) {
                $response['status'] = 'success';
                $response['result'] = $query->row_array();
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

    public function register_new_author ($params) {

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

    public function update_author ($params,$author_id,$auth_token) {
        $query = $this->db->get_where('authors', array('token' => $auth_token));
        $response = array();
        if($query->num_rows()>0) {
            $where = "id = ".$author_id;
            $sql = $this->db->update_string('authors', $params, $where);
            $response = array();
            if($this->db->query($sql)) {
                $response['status'] = 'success';
                $response['msg'] = 'success';
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

    public function delete_author($auth_token,$author_id) {
        $query = $this->db->get_where('authors', array('token' => $auth_token));
        $response = array();
        if($query->num_rows()>0) {
            $this->db->delete('authors', array('id'=>$author_id));
            if($this->db->affected_rows()>0) {
                $this->db->delete('ebooks', array('author_id'=>$author_id));
                $this->db->delete('compositions', array('author_id'=>$author_id));
                $response['status'] = 'success';
                $response['msg'] = 'Deleted Successfully';
            }
            else {
                $response['status'] = 'error';
                $response['msg'] = 'Unprocessable Entity !';
            }
        }
        else {
            $response['status'] = 'error';
            $response['msg'] = 'Anauthorized';
        }
        return $response;
    }

    public function get_authors_list($auth_token) {
        $query = $this->db->get_where('authors', array('token' => $auth_token));
        $response = array();
        if($query->num_rows()>0) {
            $row = $query->row_array();
            if($row['type']=='admin') {
                $query = $this->db->get_where('authors', array('type' => "public"));
                if ($query->num_rows() > 0) {
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
}
?>