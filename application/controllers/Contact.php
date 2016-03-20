<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'libraries/REST_Controller.php');

class Contact extends REST_Controller {

    public function index_post () {

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST");
        $data = array();
        if(count($data)>0){
            $error['error'] = $data;
            $this->response($error,REST_Controller::HTTP_UNPROCESSABLE_ENTITY);
        }
        else{
                $params = $this->post();
                $this->load->database();
                $this->load->model('contact/Contact_model');
                $response = $this->Contact_model->contact_us_msg($params);
                if($response['status']=='success') {
                    $this->response($response,REST_Controller::HTTP_OK);
                }
                else {
                    $this->response($response,REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                }

        }
    }
    public function index_get () {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET");
        $headers = $this->input->request_headers();
        if (!isset($headers['Authorization']) || empty($headers['Authorization'])) {
            $this->response(array('error' => 'No authorization header supplied'), REST_Controller::HTTP_UNAUTHORIZED);
        }
        else {
            $this->load->database();
            $this->load->model('contact/Contact_model');
            $response = $this->Contact_model->get_contact_list($headers['Authorization']);
            if ($response['status']=='success') {
                $this->response($response, REST_Controller::HTTP_OK);
            }
            else {
                if($response['msg']=='Server Error') {
                    $response = array('errors' => array($response['msg']));
                    $this->response($response, REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                }
                else {
                    $this->response($response, REST_Controller::HTTP_UNAUTHORIZED);
                }
            }
            $this->db->close();
        }
    }

//    public function index_get () {
//        header("Access-Control-Allow-Origin: *");
//        header("Access-Control-Allow-Methods: GET");
//        $headers = $this->input->request_headers();
//        if (!isset($headers['Authorization']) || empty($headers['Authorization'])) {
//            $this->response(array('error' => 'No authorization header supplied'), REST_Controller::HTTP_UNAUTHORIZED);
//        }
//        else {
//            $this->load->database();
//            $this->load->model('contact/Contact_model');
//            $response = $this->Admin_model->get_contact_us($headers['Authorization']);
//            if ($response['status']=='success') {
//                $this->response($response, REST_Controller::HTTP_OK);
//            }
//            else {
//                if($response['msg']=='Server Error') {
//                    $response = array('errors' => array($response['msg']));
//                    $this->response($response, REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
//                }
//                else {
//                    $this->response($response, REST_Controller::HTTP_UNAUTHORIZED);
//                }
//            }
//            $this->db->close();
//        }
//    }
}
?>