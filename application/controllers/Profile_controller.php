<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_controller extends CI_Controller {
    public function index() {
//        echo $_GET['rt'];
        $this->load->helper('html');
        $this->load->helper('url');
        $this->load->view('profile/index');
    }

}
