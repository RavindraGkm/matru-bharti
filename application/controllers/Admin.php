<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'libraries/REST_Controller.php');

class Admin extends REST_Controller {

    public function index_post () {

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST");
        $data = array();
        if(count($data)>0){
            $error['error'] = $data;
            $this->response($error,REST_Controller::HTTP_UNPROCESSABLE_ENTITY);
        }
        else{
            $headers = $this->input->request_headers();
            if (!isset($headers['Authorization']) || empty($headers['Authorization'])) {
                $this->response(array('error' => 'Unauthorized Access'), REST_Controller::HTTP_UNAUTHORIZED);
            }
            else {
                $params = $this->post();
                $this->load->database();
                $this->load->model('admin/Admin_model');
                if(($this->post('bk_category'))) {
                    $response = $this->Admin_model->upload_advertisement($params,$headers['Authorization']);
                }
                else if(($this->post('lang'))) {
                    $response = $this->Admin_model->upload_new_language($params,$headers['Authorization']);
                }
                else if((($this->post('book_category')))) {
                    $response = $this->Admin_model->upload_new_book_category($params,$headers['Authorization']);
                }
                else if((($this->post('category')))) {
                    $response = $this->Admin_model->upload_new_composition_category($params,$headers['Authorization']);
                }
                if($response['status']=='success') {
                    $this->response($response,REST_Controller::HTTP_OK);
                }
                else {
                    $this->response($response,REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                }
            }
        }
    }

    public function index_put ($id=0) {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: PUT");
        $data = array();
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
                if($this->put('about_english')||$this->put('about_hindi')) {
                    $response = $this->Admin_model->update_about_data($headers['Authorization'],$params,$id);
                }
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

    public function  index_delete ($id=0) {

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: DELETE");
        $headers = $this->input->request_headers();
        if (!isset($headers['Authorization']) || empty($headers['Authorization'])) {
            $this->response(array('error' => 'No authorization header supplied'), REST_Controller::HTTP_UNAUTHORIZED);
        }
        else {
            $this->load->database();
            $this->load->model('admin/Admin_model');
            if ($id != 0 && $id > -1) {
                $response = $this->Admin_model->delete_event($headers['Authorization'], $id);
            }

            if ($response['status'] == 'success') {
                $this->response($response, REST_Controller::HTTP_OK);
            } else {
                if ($response['msg'] == 'Server Error') {
                    $response = array('errors' => array($response['msg']));
                    $this->response($response, REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                } else {
                    $this->response($response, REST_Controller::HTTP_UNAUTHORIZED);
                }
            }
            $this->db->close();
        }
//        $this->response("Hello",REST_Controller::HTTP_OK);
    }

    public function index_get ($id=0) {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET");
        $headers = $this->input->request_headers();
        if($id==0) {
            $response = array('error'=>'Invalid Method');
            $this->response($response,REST_Controller::HTTP_METHOD_NOT_ALLOWED);
        }
        if (!isset($headers['Authorization']) || empty($headers['Authorization'])) {
            $this->response(array('error' => 'No authorization header supplied'), REST_Controller::HTTP_UNAUTHORIZED);
        }
        else {
            $this->load->database();
            $this->load->model('admin/Admin_model');
            $response = $this->Admin_model->get_about_data($headers['Authorization'],$id);
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