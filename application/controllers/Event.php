<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'libraries/REST_Controller.php');

class Event extends REST_Controller {
    public function index_post () {

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST");
        $author_id=$this->post('author_id');
        $title=$this->post('title');
        $event_date=$this->post('event_date');
        $event_pic=$this->post('event_pic');
        $data = array();

        if($title===NULL) {
            $data[] = "Title not provided";
        }
        if($event_date===NULL) {
            $data[] = "Tags not provided";
        }
        if($event_pic===NULL) {
            $data[] = "Event image not provided";
        }

        if($title=="") {
            $data[] = "Event title can not be blank";
        }
        if($event_date=="") {
            $data[] = "Event date can not be blank";
        }
        if($event_pic=="") {
            $data[] = "Event image can not be blank";
        }

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
                $this->load->model('event/Event_model');
                $response = $this->Event_model->upload_new_event($params,$headers['Authorization']);
                if($response['status']=='success') {
                    $this->response($response,REST_Controller::HTTP_OK);
                }
                else {
                    $this->response($response,REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                }
            }
        }
    }

    public function index_get ($id=0) {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET");
        $headers = $this->input->request_headers();
        if (!isset($headers['Authorization']) || empty($headers['Authorization'])) {
            $this->response(array('error' => 'No authorization header supplied'), REST_Controller::HTTP_UNAUTHORIZED);
        }
        else {
            $this->load->database();
            $this->load->model('event/Event_model');
            if($id!=0 && $id>-1) {
                $response = $this->Event_model->get_event_list($headers['Authorization'],$id);
            }
            else {
                $response = $this->Event_model->get_event_list($headers['Authorization']);
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

    public function  index_delete ($id=0) {

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: DELETE");
        $headers = $this->input->request_headers();
        if (!isset($headers['Authorization']) || empty($headers['Authorization'])) {
            $this->response(array('error' => 'No authorization header supplied'), REST_Controller::HTTP_UNAUTHORIZED);
        }
        else {
            $this->load->database();
            if ($id != 0 && $id > -1) {
                $this->load->model('event/Event_model');
                $author_id = $this->delete('author_id');
                $response = $this->Event_model->delete_event($headers['Authorization'], $id, $author_id);
            }
//            else {
//                $this->load->model('admin/Admin_model');
//                $response = $this->Admin_model->delete_event($headers['Authorization'], $event_id);
//            }
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
}
?>