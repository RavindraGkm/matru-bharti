<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'libraries/REST_Controller.php');

class Login extends REST_Controller {

	public function index_post () {

		$this->response('asas',REST_Controller::HTTP_ACCEPTED);
//        header("Access-Control-Allow-Origin: *");
//        header("Access-Control-Allow-Methods: POST");
//		$email = $this->post('email');
//		$password = $this->post('password');
//		$data = array();
//		if($email===NULL) {
//			$data[] = "Email not provided";
//		}
//		if($password===NULL) {
//			$data[] = "Password not provided";
//		}
//		if($email=="") {
//			$data[] = "Email can not be blank";
//		}
//		if($password=="") {
//			$data[] = "Password can not be blank";
//		}
//		if(count($data)>0) {
//			$error['error'] = $data;
//			$this->response($error,REST_Controller::HTTP_UNPROCESSABLE_ENTITY);
//		}
//		else {
//			$this->load->database();
//			$this->load->model('login/Login_model');
//			$response = $this->Login_model->check_login($email,$password);
//            $this->db->close();
//			if($response['login']=='success') {
//				$this->response($response,REST_Controller::HTTP_OK);
//			}
//			else {
//				$this->response($response,REST_Controller::HTTP_UNAUTHORIZED);
//			}
//		}
	}

}
?>