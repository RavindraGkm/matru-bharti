<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_controller extends CI_Controller {

    public function index() {
        $data['active_tab'] = $_GET['page'];
        $this->load->helper('html');
        $this->load->helper('url');
        $this->load->view('home/index',$data);
    }
}
?>