<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'libraries/REST_Controller.php');

class Profile extends REST_Controller {

    public function index_get ($f_param=0,$s_param=0) {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET");
        if($f_param==0 && $s_param==0) {
            $headers = $this->input->request_headers();
            if (!isset($headers['Authorization']) || empty($headers['Authorization'])) {
                $this->response(array('error' => 'No authorization header supplied'), REST_Controller::HTTP_UNAUTHORIZED);
            } else {
                $this->load->database();
                $this->load->model('Profile_model');
                $response = $this->Profile_model->profile($headers['Authorization']);
                $this->db->close();
                if (count($response) > 0) {
                    $this->response($response, REST_Controller::HTTP_OK);
                } else {
                    $response = array('errors' => array('Authorization failed'));
                    $this->response($response, REST_Controller::HTTP_UNAUTHORIZED);
                }
            }
        }
    }

    public function index_put ($id=0) {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: PUT");
        $name = $this->put('name');
        $hindi_name = $this->put('hindi_name');
        $email = $this->put('email');
        $mobile = $this->put('mobile');
        $address = $this->put('address');
        $city=$this->put('city');
        $dob=$this->put('dob');
        $about_yourself=$this->put('about_yourself');
        $data = array();
        if($name===NULL) {
            $data[] = "Name not provided";
        }
        if($hindi_name===NULL) {
            $data[] = "Hindi name not provided";
        }
        if($email===NULL) {
            $data[] = "Email not provided";
        }
        if($mobile===NULL) {
            $data[] = "Mobile number not provided";
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
        if($hindi_name=="") {
            $data[] = "Hindi name can not be blank";
        }
        if($email=="") {
            $data[] = "Email can not be blank";
        }
        if($mobile=="") {
            $data[] = "Mobile can not be blank";
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
                $params= $this->put('profile');
                $response = $this->Profile_model->update_author($name,$hindi_name,$email,$mobile,$address,$city,$dob,$about_yourself,$id);
                if($response['status']=='success') {
                    $this->response($response,REST_Controller::HTTP_OK);
                }
                else {
                    $this->response($response,REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                }
            }
        }

    }

//	public function index_put ($id) {
//		header("Access-Control-Allow-Origin: *");
//		header("Access-Control-Allow-Methods: PUT");
//		$token=$this->put('txt_token_no');
//		$name = $this->put('name');
//		$email = $this->put('email');
//		$mobile=$this->put('mobile');
//		$address=$this->put('address');
//		$city=$this->put('city');
//		$dob=$this->put('dob');
//		$about_yourself=$$this->put('about_yourself');
//		$data = array();
//		if($name===NULL) {
//			$data[] = "name not provided";
//		}
//		if($email===NULL) {
//			$data[] = "Email not provided";
//		}
//		if($mobile===NULL) {
//			$data[] = "Mobile number not provided";
//		}
//		if($address===NULL) {
//			$data[] = "Mobile number not provided";
//		}
//		if($city===NULL) {
//			$data[] = "City number not provided";
//		}
//		if($dob===NULL) {
//			$data[] = "Date of Birth not provided";
//		}
//		if($about_yourself===NULL) {
//			$data[] = "About your self not provided";
//		}
//		if($name=="") {
//			$data[] = "Name can not be blank";
//		}
//		if($email=="") {
//			$data[] = "Email can not be blank";
//		}
//		if($mobile=="") {
//			$data[] = "Password can not be blank";
//		}
//		if($address=="") {
//			$data[] = "Address can not be blank";
//		}
//		if($city=="") {
//			$data[] = "City can not be blank";
//		}
//		if($dob=="") {
//			$data[] = "Date of Birth can not be blank";
//		}
//		if($about_yourself=="") {
//			$data[] = "About your self can not be blank";
//		}
//		if($id==0) {
//			$response = array('error'=>'Invalid Method');
//			$this->response($response,REST_Controller::HTTP_METHOD_NOT_ALLOWED);
//		}
//		else {
////			if(){
////
////			}
////			else
//
////			{
//			$this->load->database();
//			$this->load->model('register/Profile_model');
//			$response = $this->Profile_model->update($name,$email,$mobile,$address,$city,$dob,$about_yourself,$id);
//
////			}
//		}
//	}

}
?>