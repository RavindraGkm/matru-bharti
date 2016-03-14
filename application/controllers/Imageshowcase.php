<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'libraries/REST_Controller.php');

class Imageshowcase extends REST_Controller {
    public function index_get ($id=0) {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET");
        $headers = $this->input->request_headers();
//        $this->response( REST_Controller::HTTP_OK);
        if (!isset($headers['Authorization']) || empty($headers['Authorization'])) {
            $this->response(array('error' => 'No authorization header supplied'), REST_Controller::HTTP_UNAUTHORIZED);
        }
        else {
            $this->load->database();
            $this->load->model('showcase/ShowCase_model');
            if($id!=0 && $id>-1) {
                $response = $this->ShowCase_model->get_book_show_case($headers['Authorization'],$id);
//                $this->response($id, REST_Controller::HTTP_OK);
            }

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