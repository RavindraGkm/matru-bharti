<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_controller extends CI_Controller {

    public function index() {
        $data['active_tab'] = $_GET['tab'];
        $this->load->library('session');
        $data['remember_token']=$this->session->userdata('remember_token');
        $data['author_id']=$this->session->userdata('author_id');
        $this->load->helper('html');
        $this->load->helper('url');
        $this->load->view('admin/index',$data);
    }

}
?>