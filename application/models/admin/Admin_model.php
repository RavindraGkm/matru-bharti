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

    public function show_book_case_status($auth_token,$params,$id) {
        $query= $this->db->get_where('authors',array('token'=>$auth_token));
        $response=array();
        if($query->num_rows()>0) {
            $where= "id=".$id;
            $sql=$this->db->update_string('book_show_case',$params,$where);
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

    public function delete_show_case($auth_token,$show_case_id) {
        $query = $this->db->get_where('authors', array('token' => $auth_token));
        $response = array();
        if($query->num_rows()>0) {
            $this->db->delete('book_show_case', array('id'=>$show_case_id));
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

    public function delete_event($auth_token,$event_id) {
        $query = $this->db->get_where('authors', array('token' => $auth_token));
        $response = array();
        if($query->num_rows()>0) {
            $this->db->delete('events', array('id'=>$event_id));
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