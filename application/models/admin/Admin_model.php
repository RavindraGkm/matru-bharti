<?php
class Admin_model extends CI_Model {

    public  function  ebook_approvel($auth_token,$params,$id) {
        $query = $this->db->get_where('authors', array('token' => $auth_token));
        $response = array();
        $current_date=date('Y-m-d');
        $params['published_at']=$current_date;
        if($query->num_rows()>0) {
            $where = "id = ".$id;
            $sql = $this->db->update_string('ebooks', $params, $where);
            $response = array();
            if($this->db->query($sql)) {
                $response['status'] = 'success';
                $response['msg'] = $params['status'].' Updated Successfully';
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

    public function composition_approvel($auth_token,$params,$id) {
        $query= $this->db->get_where('authors',array('token'=>$auth_token));
        $response=array();
        $current_date= date('Y-m-d');
        $params['published_at']=$current_date;
        if($query->num_rows()>0) {
            $where= "id=".$id;
            $sql=$this->db->update_string('compositions',$params,$where);
            $response=array();
            if($this->db->query($sql)) {
                $response['status']= 'success';
                $response['msg']= $params['status'].' Updated Successfully';
            }
            else {
                $response['status']='error';
                $response['msg']='Server Error';
            }
        }
        else {
            $response['status']='error';
            $response['msg']='Anauthorized';
        }
        return $response;
    }

    public function get_ebook_list($auth_token) {
        $query = $this->db->get_where('authors', array('token' => $auth_token));
        $response = array();
        if($query->num_rows()>0) {
            $query = $this->db->get('ebooks');
            if($query->num_rows()>0) {
                $response['status'] = 'success';
                $response['result'] = $query->result_array();
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

    public function get_composition_list($auth_token) {
        $query = $this->db->get_where('authors', array('token' => $auth_token));
        $response = array();
        if($query->num_rows()>0) {
            $query = $this->db->get('compositions');
            if($query->num_rows()>0) {
                $response['status'] = 'success';
                $response['result'] = $query->result_array();
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