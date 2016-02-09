<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'libraries/REST_Controller.php');

class Admin extends REST_Controller {

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
            $response = $this->Admin_model->get_ebook_list($headers['Authorization']);
            $this->db->close();
            if ($response['status']=='success') {
                $this->response($response, REST_Controller::HTTP_OK);
            } else {
                if($response['msg']=='Server Error') {
                    $response = array('errors' => array($response['msg']));
                    $this->response($response, REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                }
                else {
                    $this->response($response, REST_Controller::HTTP_UNAUTHORIZED);
                }
            }

            $this->load->model('admin/Admin_model');
            $response = $this->Composition_model->get_composition_list($headers['Authorization']);
            $this->db->close();

            if ($response['status']=='success') {
                $this->response($response, REST_Controller::HTTP_OK);
            } else {
                if($response['msg']=='Server Error') {
                    $response = array('errors' => array($response['msg']));
                    $this->response($response, REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                }
                else {
                    $this->response($response, REST_Controller::HTTP_UNAUTHORIZED);
                }
            }
        }
    }

}
?>