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
                $response['msg'] = ' Updated Successfully';
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

    public  function  advertisement_req_approve($auth_token,$params,$id) {
        $query = $this->db->get_where('authors', array('token' => $auth_token));
        $response = array();
        $current_date=date('Y-m-d');
        $params['adv_start_date']=$current_date;
        if($query->num_rows()>0) {
            $where = "id = ".$id;
            $sql = $this->db->update_string('ebooks', $params, $where);
            $response = array();
            if($this->db->query($sql)) {
                $response['status'] = 'success';
                $response['msg'] = 'Updated Successfully';
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

    public function upload_new_language ($params,$auth_token) {
        $query = $this->db->get_where('authors', array('token' => $auth_token));
        $response = array();
        if($query->num_rows()>0) {
            $sql = $this->db->insert('book_language', $params);
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

    public function upload_new_book_category ($params,$auth_token) {
        $query = $this->db->get_where('authors', array('token' => $auth_token));
        $response = array();
        if($query->num_rows()>0) {
            $sql = $this->db->insert('book_category', $params);
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

    public function upload_new_composition_category ($params,$auth_token) {
        $query = $this->db->get_where('authors', array('token' => $auth_token));
        $response = array();
        if($query->num_rows()>0) {
            $sql = $this->db->insert('composition_category', $params);
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

    public function event_approvel($auth_token,$params,$id) {
        $query= $this->db->get_where('authors',array('token'=>$auth_token));
        $response=array();
//        $current_date= date('Y-m-d');
//        $params['published_at']=$current_date;
        if($query->num_rows()>0) {
            $where= "id=".$id;
            $sql=$this->db->update_string('events',$params,$where);
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

    public  function  update_terms_condition($auth_token,$params,$terms_id) {
        $query= $this->db->get_where('authors',array('token'=>$auth_token));
        $response=array();
        if($query->num_rows()>0) {
            $row=$query->row_array();
//            if($row['type']=='admin') {
                $where= "id=".$terms_id;
                $sql=$this->db->update_string('terms',$params,$where);
                $response=array();
                if($this->db->query($sql)) {
                    $response['status']= 'success';
                    $response['msg']='Updated Successfully';
                }
                else {
                    $response['status']='error';
                    $response['msg']='Server Error';
                }
//            }
        }
        else {
            $response['status']='error';
            $response['msg']='Anauthorized';
        }
        return $response;
    }

    public function upload_new_terms ($params,$auth_token) {
        $query = $this->db->get_where('authors', array('token' => $auth_token));
        $response = array();
        if($query->num_rows()>0) {
            $sql = $this->db->insert('terms', $params);
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

    public function get_terms_list($auth_token) {

        $query = $this->db->get_where('authors', array('token' => $auth_token));
        $response = array();
        if($query->num_rows()>0) {
            $row = $query->row_array();
            if($row['type']=='admin') {
                $query = $this->db->get('terms');
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

    public function get_about_data($auth_token,$id) {
        $query = $this->db->get_where('authors', array('token' => $auth_token));
        $response = array();
        if($query->num_rows()>0) {
            $row = $query->row_array();
            if($row['type']=='admin') {
                $query = $this->db->get_where('about_mng',array('id'=>$id));
                if($query->num_rows()>0) {
                    $response['status'] = 'success';
                    $response['result'] = $query->row_array();
                }
            }
        }
        else {
            $response['status'] = 'error';
            $response['msg'] = 'Anauthorized';
        }
        return $response;
    }

    public function get_about_us() {
        $response = array();
        $query = $this->db->get('about_mng');
        if($query->num_rows()>0) {
            $response['status'] = 'success';
            $response['result'] = $query->row_array();
        }
        return $response;
    }

    public function upload_advertisement ($params,$auth_token) {
        $query = $this->db->get_where('authors', array('token' => $auth_token));
        $response = array();
        $current_date=date('Y-m-d');
        $params['start_date']=$current_date;
        if($query->num_rows()>0) {
            $sql = $this->db->insert('advertisement', $params);
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

    public  function  update_about_data($auth_token,$params,$id) {
        $query = $this->db->get_where('authors', array('token' => $auth_token));
        $response = array();
        if($query->num_rows()>0) {
            $where = "id = ".$id;
            $sql = $this->db->update_string('about_mng', $params, $where);
            $response = array();
            if($this->db->query($sql)) {
                $response['status'] = 'success';
                $response['msg'] = ' Updated Successfully';
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