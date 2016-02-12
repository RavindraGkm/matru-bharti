<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'libraries/REST_Controller.php');
class Composition extends REST_Controller {
    public function index_post () {

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST");
        $author_id=$this->post('author_id');
        $language = $this->post('language');
        $category=$this->post('category');
        $title=$this->post('title');
        $about=$this->post('about');
//        $created_at=$this->post('created_at');

        $data = array();
        if($author_id===NULL) {
            $data[] = "Language not provided";
        }
        if($language===NULL) {
            $data[] = "Language not provided";
        }
        if($category===NULL) {
            $data[] = "Category not provided";
        }
        if($title===NULL) {
            $data[] = "Title not provided";
        }
        if($about===NULL) {
            $data[] = "About this Composition not provided";
        }

        if($language=="") {
            $data[] = "Language can not be blank";
        }
        if($category=="") {
            $data[] = "Category can not be blank";
        }
        if($title=="") {
            $data[] = "Title can not be blank";
        }
        if($about=="") {
            $data[] = "About this Composition can not be blank";
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
//            $this->response($this->post(),REST_Controller::HTTP_OK);//<<== "this code show post value retrive or not"
                $params = $this->post();
                $this->load->database();
                $this->load->model('composition/Composition_model');
                $response = $this->Composition_model->upload_new_composition($params,$headers['Authorization']);
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
            $this->load->model('composition/Composition_model');
            if($id!=0 && $id>-1) {
                $response = $this->Composition_model->get_composition_list($headers['Authorization'],$id);
            }
            else {
                $response = $this->Composition_model->get_composition_list($headers['Authorization']);
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

    public function  index_delete ($composition_id=0) {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: DELETE");
        $headers = $this->input->request_headers();
        if (!isset($headers['Authorization']) || empty($headers['Authorization'])) {
            $this->response(array('error' => 'No authorization header supplied'), REST_Controller::HTTP_UNAUTHORIZED);
        }
        else {
            if($composition_id!=0 &&  $composition_id>1) {
                $this->load->database();
                $this->load->model('composition/Composition_model');
                $author_id = $this->delete('author_id');
                $response= $this->Composition_model->delete_composition($headers['Authorization'],$composition_id,$author_id);
                $this->db->close();
                if ($response['status']=='success') {
                    $this->response($response, REST_Controller::HTTP_OK);
                } else {
                    if($response['msg']=='Server Error') {
                        $response = array('errors' => array($response['msg']));
                        $this->response($response, REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                    }
                    else {
                        $this->response("asasas", REST_Controller::HTTP_UNAUTHORIZED);
                    }
                }
            }
        }
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
                $response = $this->Admin_model->composition_approvel($headers['Authorization'],$params,$id);
                if($response['status']=='success') {
                    $this->response($response,REST_Controller::HTTP_OK);
                }
                else {
                    $this->response($response,REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                }

//                $this->load->model('admin/Admin_model');
//                $response = $this->Admin_model->composition_approvel($headers['Authorization'],$params,$id);
//                if($response['status']=='success') {
//                    $this->response($response,REST_Controller::HTTP_OK);
//                }
//                else {
//                    $this->response($response,REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
//                }
            }
        }

    }

//    public function index_put ($id=0) {
//        header("Access-Control-Allow-Origin: *");
//        header("Access-Control-Allow-Methods: PUT");
//        $status=$this->put('status');
//        $data = array();
//        if($status===NULL) {
//            $data[] = "Name not provided";
//        }
//        if($status=="") {
//            $data[] = "Name can not be blank";
//        }
//        if($id==0) {
//            $response = array('error'=>'Invalid Method');
//            $this->response($response,REST_Controller::HTTP_METHOD_NOT_ALLOWED);
//        }
//
//        if(count($data)>0){
//            $error['error'] = $data;
//            $this->response($error,REST_Controller::HTTP_UNPROCESSABLE_ENTITY);
//        }
//        else{
//            $headers = $this->input->request_headers();
//            if(!isset($headers['Authorization']) || empty($headers['Authorization'])) {
//                $this->response(array('error'=>'Unauthorized Access'),REST_Controller::HTTP_UNAUTHORIZED);
//            }
//            else {
//                $params = $this->put();
//                $this->load->database();
//                $this->load->model('admin/Admin_model');
//                $response = $this->Admin_model->composition_approvel($headers['Authorization'],$params,$id);
//                if($response['status']=='success') {
//                    $this->response($response,REST_Controller::HTTP_OK);
//                }
//                else {
//                    $this->response($response,REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
//                }
//
////                $this->load->model('admin/Admin_model');
////                $response = $this->Admin_model->composition_approvel($headers['Authorization'],$params,$id);
////                if($response['status']=='success') {
////                    $this->response($response,REST_Controller::HTTP_OK);
////                }
////                else {
////                    $this->response($response,REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
////                }
//            }
//        }
//
//    }
}
?>