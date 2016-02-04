<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Index_controller extends CI_Controller
{
    public function index() {
        $this->load->helper('html');
        $this->load->helper('url');
        $this->load->view('index/index');
    }
    public function ebook() {
        $this->load->helper('html');
        $this->load->helper('url');
        $this->load->view('ebook/index');
    }
}
?>