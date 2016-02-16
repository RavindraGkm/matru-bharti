<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'libraries/REST_Controller.php');

class Forgot extends REST_Controller {

    public function index_post () {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST");
        $email = $this->post('email');
        $data = array();
        if($email===NULL) {
            $data[] = "Email not provided";
        }
        if($email=="") {
            $data[] = "Email can not be blank";
        }
        if(count($data)>0) {
            $error['error'] = $data;
            $this->response($error,REST_Controller::HTTP_UNPROCESSABLE_ENTITY);
        }
        else {
            $params = $this->post();
            $this->load->database();
            $this->load->model('forgot/Forgot_password_model');
            $response = $this->Forgot_password_model->get_forgot_password($params);
            $this->db->close();
            if($response['status']=='success') {
                $this->response($response,REST_Controller::HTTP_OK);
            }
            else {
                $this->response($response,REST_Controller::HTTP_UNAUTHORIZED);
            }
        }
    }
}
?>