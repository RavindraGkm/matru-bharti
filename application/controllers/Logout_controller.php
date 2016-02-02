<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Logout_controller extends CI_Controller {
    public function index(){
        $this->load->library('session');
        $this->session->sess_destroy();
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->view('index/index');
    }
}
?>