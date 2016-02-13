<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'libraries/REST_Controller.php');

class Admin extends REST_Controller {

    public function index_put ($id=0) {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: PUT");
        $status=$this->put('status');
        $data = array();
        if($status===NULL) {
            $data[] = "Name not provided";
        }
        if($status=="") {
            $data[] = "Name can not be blank";
        }
        if($id==0) {
            $response = array('error'=>'Invalid Method');
            $this->response($response,REST_Controller::HTTP_METHOD_NOT_ALLOWED);
        }

        if(count($data)>0){
            $error['error'] = $data;
            $this->response($error,REST_Controller::HTTP_UNPROCESSABLE_ENTITY);
        }
        else{
            $headers = $this->input->request_headers();
            if(!isset($headers['Authorization']) || empty($headers['Authorization'])) {
                $this->response(array('error'=>'Unauthorized Access'),REST_Controller::HTTP_UNAUTHORIZED);
            }
            else {
                $params = $this->put();
                $this->load->database();
                $this->load->model('admin/Admin_model');
                $response = $this->Admin_model->ebook_approvel($headers['Authorization'],$params,$id);
                if($response['status']=='success') {
                    $this->response($response,REST_Controller::HTTP_OK);
                }
                else {
                    $this->response($response,REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                }

                $this->load->model('admin/Admin_model');
                $response = $this->Admin_model->composition_approvel($headers['Authorization'],$params,$id);
                if($response['status']=='success') {
                    $this->response($response,REST_Controller::HTTP_OK);
                }
                else {
                    $this->response($response,REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                }
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
            $this->load->model('admin/Admin_model');
            $response = $this->Admin_model->get_authors_list($headers['Authorization']);
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
}
?>