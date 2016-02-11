<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'libraries/REST_Controller.php');

class Ebook extends REST_Controller {
    public function index_post () {

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST");
        $author_id=$this->post('author_id');
        $language = $this->post('language');
        $category=$this->post('category');
        $title=$this->post('title');
        $about=$this->post('about');
        $tag=$this->post('tag');
        $file=$this->post('file');
        $cover=$this->post('cover');
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
        if($tag===NULL) {
            $data[] = "Tags not provided";
        }
        if($file===NULL) {
            $data[] = "File not provided";
        }
        if($cover===NULL) {
            $data[] = "Cover page not provided";
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
        if($tag=="") {
            $data[] = "Tags can not be blank";
        }
        if($file=="") {
            $data[] = "File can not be blank";
        }
        if($cover=="") {
            $data[] = "Cover page can not be blank";
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
                $this->load->model('ebook/Ebook_model');
                $response = $this->Ebook_model->upload_new_ebook($params,$headers['Authorization']);
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
            $this->load->model('ebook/Ebook_model');
            if($id!=0 && $id>-1) {
                $response = $this->Ebook_model->get_ebook_list($headers['Authorization'],$id);
            }
            else {
                $response = $this->Ebook_model->get_ebook_list($headers['Authorization']);
            }

            $this->response($response,REST_Controller::HTTP_OK);
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
        }
    }
    public function  index_delete ($ebook_id=0) {

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: DELETE");
        $headers = $this->input->request_headers();
        if (!isset($headers['Authorization']) || empty($headers['Authorization'])) {
            $this->response(array('error' => 'No authorization header supplied'), REST_Controller::HTTP_UNAUTHORIZED);
        }
        else {
            if($ebook_id!=0 &&  $ebook_id>1) {
                $this->load->database();
                $this->load->model('ebook/Ebook_model');
                $author_id = $this->delete('author_id');
                $response= $this->Ebook_model->delete_ebook($headers['Authorization'],$ebook_id,$author_id);
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
}
?>