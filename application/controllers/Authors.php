<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'libraries/REST_Controller.php');

class Authors extends REST_Controller {

	public function index_post () {
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Methods: POST");
		$email = $this->post('email');
		$mobile=$this->post('mobile');
		$password=$this->post('password');
		$data = array();
		if($email===NULL) {
			$data[] = "Email not provided";
		}
		if($mobile===NULL) {
			$data[] = "Mobile number not provided";
		}
		if($password===NULL) {
			$data[] = "Password not provided";
		}
		if($email=="") {
			$data[] = "Email can not be blank";
		}
		if($mobile=="") {
			$data[] = "Password can not be blank";
		}
		if($password=="") {
			$data[] = "Password can not be blank";
		}
		if(count($data)>0){
			$error['error'] = $data;
			$this->response($error,REST_Controller::HTTP_UNPROCESSABLE_ENTITY);
		}
		else {
			$params = $this->post();
			$this->load->database();
			$this->load->model('authors/Authors_model');
			$response = $this->Authors_model->register_new_author($params);
			if($response['status']=='success') {
				$this->response($response,REST_Controller::HTTP_OK);
			}
			else {
				$this->response($response,REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
			}
		}

	}

	public function index_put ($id=0) {
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Methods: PUT");
		$name = $this->put('name');
		$address = $this->put('address');
		$city=$this->put('city');
		$dob=$this->put('dob');
		$about_yourself=$this->put('about_yourself');
		$data = array();
		if($name===NULL) {
			$data[] = "Name not provided";
		}
		if($address===NULL) {
			$data[] = "Address not provided";
		}
		if($city===NULL) {
			$data[] = "City not provided";
		}
		if($dob===NULL) {
			$data[] = "Date of birth not provided";
		}
		if($about_yourself===NULL) {
			$data[] = "About your self not provided";
		}
		if($name=="") {
			$data[] = "Name can not be blank";
		}
		if($address=="") {
			$data[] = "Address can not be blank";
		}
		if($city=="") {
			$data[] = "City can not be blank";
		}
		if($dob=="") {
			$data[] = "Date of birth can not be blank";
		}
		if($about_yourself=="") {
			$data[] = "About your self can not be blank";
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
				$this->load->model('profile/Profile_model');
				$response = $this->Profile_model->update_author($name,$address,$city,$dob,$about_yourself,$id);
				if($response['status']=='success') {
					$this->response($response,REST_Controller::HTTP_OK);
				}
				else {
					$this->response($response,REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
				}
				$this->response($params,REST_Controller::HTTP_OK);
			}
		}
	}
}
?>