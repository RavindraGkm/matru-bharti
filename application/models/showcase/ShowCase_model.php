<?php
class ShowCase_model extends CI_Model {

    public function get_book_show_case_list($auth_token,$id=0) {

        $query = $this->db->get_where('authors', array('token' => $auth_token));
        $response = array();
        if($query->num_rows()>0) {
            $row = $query->row_array();
            if($row['type']=='admin') {
                $query = $this->db->get('book_show_case');
                if($query->num_rows()>0) {
                    $response['status'] = 'success';
                    $response['result'] = $query->result_array();
                }
            }
            if($row['type']=='guest') {
                $sql = "SELECT book_show_case.*, (SELECT authors.name FROM authors WHERE authors.id = book_show_case.author_id) AS author_name FROM book_show_case";
                $query = $this->db->query($sql);
//                $query = $this->db->get('book_show_case');
                if($query->num_rows()>0) {
                    $response['status'] = 'success';
                    $response['result'] = $query->result_array();
                }
            }
            else {
                $author_id = $row['id'];
                $query = $this->db->get_where('book_show_case', array('author_id'=>$author_id));
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

    public function upload_new_book_show_case ($params,$auth_token) {
        $query = $this->db->get_where('authors', array('token' => $auth_token));
        $response = array();
        if($query->num_rows()>0) {
            $sql = $this->db->insert('book_show_case', $params);
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

    public function delete_show_case($auth_token,$show_case_id,$author_id) {
        $query = $this->db->get_where('authors', array('token' => $auth_token));
        $response = array();
        if($query->num_rows()>0) {
            $this->db->delete('book_show_case', array('id'=>$show_case_id,'author_id'=>$author_id));
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

    public function get_book_show_case($auth_token,$id) {
        $query = $this->db->get_where('authors', array('token' => $auth_token));
        $response = array();
        if($query->num_rows()>0) {
            $sql = "SELECT book_show_case.*, (SELECT authors.name FROM authors WHERE authors.id = book_show_case.author_id) AS author_name, (SELECT authors.mobile FROM authors WHERE authors.id = book_show_case.author_id) AS author_contact, (SELECT  authors.email FROM authors WHERE authors.id=book_show_case.author_id) AS author_email FROM book_show_case where book_show_case.id=$id";
            $query = $this->db->query($sql);
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
}
?>