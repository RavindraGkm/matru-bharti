<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'libraries/REST_Controller.php');

class TopAuthors extends REST_Controller {

    public function index_get ($id=0) {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET");

        $headers = $this->input->request_headers();
        if (!isset($headers['Authorization']) || empty($headers['Authorization'])) {
            $this->response(array('error' => 'No authorization header supplied'), REST_Controller::HTTP_UNAUTHORIZED);
        }
        else {
            $this->load->database();
            $this->load->model('authors/Authors_model');
            $response = $this->Authors_model->get_top_authors_ebook($headers['Authorization']);
            $this->db->close();

            if ($response['status'] == 'success') {
                $this->response($response, REST_Controller::HTTP_OK);
            }
            else {
                if ($response['msg'] == 'Server Error') {
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