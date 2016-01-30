<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('WideImageLib');
    }

    public function index() {

    }

}
