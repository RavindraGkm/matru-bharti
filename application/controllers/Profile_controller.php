<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_controller extends CI_Controller {
    public function index() {
        $data['remember_token'] = $_GET['rt'];
        $this->load->helper('html');
        $this->load->helper('url');
        $this->load->view('profile/index',$data);
    }
    public function profile_session() {
        $this->load->library('session');
        $remember_token = $this->input->post('token');
        $author_id = $this->input->post('id');
        $session_data = array(
            'author_id'  => $author_id,
            'remember_token'     => $remember_token,
            'logged_in' => TRUE
        );
        $this->session->set_userdata($session_data);

        echo json_encode(array('status'=>'success'));
    }
    public function profile_session_access() {
        $this->load->library('session');
        $this->session->unset_userdata('some_name');
        $this->session->set_userdata('some_name', 'some_value');
        echo json_encode(array('status'=>'success'));
    }
}
