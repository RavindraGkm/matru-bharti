<?php
class Ebook_model extends CI_Model {
    public function upload_new_ebook ($params,$auth_token) {
        $query = $this->db->get_where('authors', array('token' => $auth_token));
        $response = array();
        $current_date=date('Y-m-d');
        $params['created_at']=$current_date;
        if($query->num_rows()>0) {
            $sql = $this->db->insert('ebooks', $params);
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

    public function get_ebook_list($auth_token,$ebook_id=0) {

        $query = $this->db->get_where('authors', array('token' => $auth_token));
        $response = array();
        if($query->num_rows()>0) {
            $row = $query->row_array();
            if($row['type']=='admin') {
                $query = $this->db->get('ebooks');
                if($query->num_rows()>0) {
                    $response['status'] = 'success';
                    $response['result'] = $query->result_array();
                }
            }
            else {
                $author_id = $row['id'];
                $query = $this->db->get_where('ebooks', array('author_id' => $author_id));
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

    public function delete_ebook($auth_token,$ebook_id) {
        $query = $this->db->get_where('authors', array('token' => $auth_token));
        $response = array();
        if($query->num_rows()>0) {
            $row = $query->row_array();
            $author_id = $row['id'];
            $this->db->delete('ebooks', array('author_id'=>$author_id,'id'=>$ebook_id));
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