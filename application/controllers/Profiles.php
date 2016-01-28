<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'libraries/REST_Controller.php');

class Profiles extends REST_Controller {

    public function index_get ($f_param=0,$s_param=0) {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET");
        if($f_param==0 && $s_param==0) {
            $headers = $this->input->request_headers();
            if(!isset($headers['Authorization']) || empty($headers['Authorization'])) {
                $this->response(array('error'=>'No authorization header supplied'),REST_Controller::HTTP_UNAUTHORIZED);
            }
            else {
                $this->load->database();
                $this->load->model('Profile_model');
                $response = $this->Profile_model->profiles($headers['Authorization']);
                $this->db->close();
                if(count($response)>0) {
                    $this->response($response,REST_Controller::HTTP_OK);
                }
                else {
                    $response = array('errors'=>array('Authorization failed'));
                    $this->response($response,REST_Controller::HTTP_UNAUTHORIZED);
                }
            }
        }
        elseif($s_param==0) {
            $headers = $this->input->request_headers();
            if(!isset($headers['Authorization']) || empty($headers['Authorization'])) {
                $this->response(array('errors'=>array('No authorization header supplied')),REST_Controller::HTTP_UNAUTHORIZED);
            }
            else {
                $this->load->database();
                $this->load->model('Profile_model');
                $response = $this->Profile_model->profile($f_param,$headers['Authorization']);
                $this->db->close();
                if(count($response)==1)
                    $this->response($response,REST_Controller::HTTP_OK);
                else
                    $this->response($response,REST_Controller::HTTP_NOT_FOUND);
            }
        }
        else {
            $this->response("multiple profile",REST_Controller::HTTP_OK);
        }
    }
    public function index_put ($id=0) {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: PUT");
        if($id==0) {
            $response = array('error'=>'Invalid Method');
            $this->response($response,REST_Controller::HTTP_METHOD_NOT_ALLOWED);
        }
        else {
            $headers = $this->input->request_headers();
            if(!isset($headers['Authorization']) || empty($headers['Authorization'])) {
                $this->response(array('error'=>'Unauthorized Access'),REST_Controller::HTTP_UNAUTHORIZED);
            }
            else {
                $this->load->database();
                $this->load->model('Profile_model');
                $params = $this->put('profile');
                $response = $this->Profile_model->update($params,$id);
                $this->response($response,REST_Controller::HTTP_OK);
            }
        }
    }
}
