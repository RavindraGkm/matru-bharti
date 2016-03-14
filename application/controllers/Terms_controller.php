<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Terms_controller extends CI_Controller {

    public function index() {
        $this->load->helper('html');
        $this->load->helper('url');
        $this->load->view('terms/index');
    }
}
?>