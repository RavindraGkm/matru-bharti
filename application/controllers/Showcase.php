<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'libraries/REST_Controller.php');

class Showcase extends REST_Controller {
    public function index_post () {

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST");
        $author_id=$this->post('author_id');
        $title=$this->post('title');
        $show_case_category=$this->post('category');
        $book_file=$this->post('book_file');
        $data = array();

        if($show_case_category===NULL) {
            $data[] = "Tags not provided";
        }
        if($title===NULL) {
            $data[] = "Title not provided";
        }
        if($book_file===NULL) {
            $data[] = "Event image not provided";
        }

        if($show_case_category=="") {
            $data[] = "Event date can not be blank";
        }
        if($title=="") {
            $data[] = "Event title can not be blank";
        }
        if($book_file=="") {
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
                $this->load->model('showcase/ShowCase_model');
                $response = $this->ShowCase_model->upload_new_book_show_case($params,$headers['Authorization']);
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
            $this->load->model('showcase/ShowCase_model');
            if($id!=0 && $id>-1) {
                $response = $this->ShowCase_model->get_book_show_case_list($headers['Authorization'],$id);
            }
            else {
                $response = $this->ShowCase_model->get_book_show_case_list($headers['Authorization']);
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
            $this->load->model('admin/Admin_model');

                $response = $this->Admin_model->delete_show_case($headers['Authorization'], $id);
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
        $this->response("Hello",REST_Controller::HTTP_OK);
    }

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
                $response = $this->Admin_model->show_book_case_status($headers['Authorization'],$params,$id);
                if($response['status']=='success') {
                    $this->response($response,REST_Controller::HTTP_OK);
                }
                else {
                    $this->response($response,REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                }
            }
        }

    }
}
?>