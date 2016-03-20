<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'libraries/REST_Controller.php');

class Aboutus extends REST_Controller {

    public function index_get () {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET");
        $this->load->database();
        $this->load->model('admin/Admin_model');
        $response = $this->Admin_model->get_about_us();
        if ($response['status']=='success') {
            $this->response($response, REST_Controller::HTTP_OK);
        }
        else {
            if($response['msg']=='Server Error') {
                $response = array('errors' => array($response['msg']));
                $this->response($response, REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
        }
        $this->db->close();
    }
}
?>