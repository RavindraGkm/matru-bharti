<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'libraries/REST_Controller.php');

class Authors extends REST_Controller {
	public function index_get ($id=0) {
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Methods: GET");

		$headers = $this->input->request_headers();
		if (!isset($headers['Authorization']) || empty($headers['Authorization'])) {
			$this->response(array('error' => 'No authorization header supplied'), REST_Controller::HTTP_UNAUTHORIZED);
		}
		else {
			if($id!=0 && $id>-1) {
				$this->load->database();
				$this->load->model('authors/Authors_model');
				$response = $this->Authors_model->get_author($headers['Authorization'],$id);
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
		$about=$this->put('about');
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
		if($about===NULL) {
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
		if($about=="") {
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
				if($id!=0 && $id>-1) {
					$params = $this->put();
					$this->load->database();
					$this->load->model('authors/Authors_model');
					$response = $this->Authors_model->update_author($params,$id,$headers['Authorization']);
					if($response['status']=='success') {
						$this->response($response,REST_Controller::HTTP_OK);
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
				}
			}
		}
	}
}
?>