<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'libraries/REST_Controller.php');

class Profile extends REST_Controller {

	public function index_put ($id) {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: PUT");
		$token=$this->put('txt_token_no');
		$name = $this->put('name');
		$email = $this->put('email');
		$mobile=$this->put('mobile');
		$address=$this->put('address');
		$city=$this->put('city');
		$dob=$this->put('dob');
		$about_yourself=$$this->put('about_yourself');
		$data = array();
		if($name===NULL) {
			$data[] = "name not provided";
		}
		if($email===NULL) {
			$data[] = "Email not provided";
		}
		if($mobile===NULL) {
			$data[] = "Mobile number not provided";
		}
		if($address===NULL) {
			$data[] = "Mobile number not provided";
		}
		if($city===NULL) {
			$data[] = "City number not provided";
		}
		if($dob===NULL) {
			$data[] = "Date of Birth not provided";
		}
		if($about_yourself===NULL) {
			$data[] = "About your self not provided";
		}
		if($name=="") {
			$data[] = "Name can not be blank";
		}
		if($email=="") {
			$data[] = "Email can not be blank";
		}
		if($mobile=="") {
			$data[] = "Password can not be blank";
		}
		if($address=="") {
			$data[] = "Address can not be blank";
		}
		if($city=="") {
			$data[] = "City can not be blank";
		}
		if($dob=="") {
			$data[] = "Date of Birth can not be blank";
		}
		if($about_yourself=="") {
			$data[] = "About your self can not be blank";
		}
		if($id==0) {
			$response = array('error'=>'Invalid Method');
			$this->response($response,REST_Controller::HTTP_METHOD_NOT_ALLOWED);
		}
		else {
//			if(){
//
//			}
//			else

//			{
				$this->load->database();
				$this->load->model('register/Profile_model');
				$response = $this->Profile_model->update($name,$email,$mobile,$address,$city,$dob,$about_yourself,$id);

//			}
		}
	}

}
?>