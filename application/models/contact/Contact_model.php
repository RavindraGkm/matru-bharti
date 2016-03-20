<?php
class Contact_model extends CI_Model {

    public function contact_us_msg ($params) {

            $sql = $this->db->insert('contact_us', $params);
            if($sql) {
                $response['status'] = 'success';
                $response['msg'] = 'success';
            }
            else {
                $response['status'] = 'error';
                $response['msg'] = 'Server error';
            }

        return $response;
    }

    public function get_contact_list($auth_token) {

        $query = $this->db->get_where('authors', array('token' => $auth_token));
        $response = array();
        if($query->num_rows()>0) {
            $row = $query->row_array();
            if($row['type']=='admin') {
                $query = $this->db->get('contact_us');
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
//    public function get_contact_us($auth_token) {
//        $query = $this->db->get_where('authors', array('token' => $auth_token));
//        $response = array();
//        if($query->num_rows()>0) {
//            $row = $query->row_array();
//            if($row['type']=='admin') {
//                $query = $this->db->get('contact_us');
//                if($query->num_rows()>0) {
//                    $response['status'] = 'success';
//                    $response['result'] = $query->result_array();
//                }
//            }
//        }
//        else {
//            $response['status'] = 'error';
//            $response['msg'] = 'Anauthorized';
//        }
//        return $response;
//    }
}
?>