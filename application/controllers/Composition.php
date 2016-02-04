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
            $data[] = "About this book not provided";
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
            $data[] = "About this book can not be blank";
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
}
?>