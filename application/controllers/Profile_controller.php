<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_controller extends CI_Controller {

    public function index() {
        $this->load->library('session');
        $data['remember_token']=$this->session->userdata('remember_token');
        $data['author_id']=$this->session->userdata('author_id');
        $data['type']=$this->session->userdata('type');
        $this->load->helper('html');
        $this->load->helper('url');
        $this->load->view('profile/index',$data);
    }

    public function profile_session() {
        $this->load->library('session');
        $remember_token = $this->input->post('token');
        $author_id = $this->input->post('id');
        $session_data = array(
            'author_id'  => $author_id,
            'remember_token'     => $remember_token,
            'logged_in' => TRUE
        );
        $this->session->set_userdata($session_data);
        echo json_encode(array('status'=>'success'));
    }

    public function profile_image() {

        $this->load->helper('url');
        $this->load->library('session');
        $headers = $this->input->request_headers();
        $author_id =$this->session->userdata('author_id');
        if (isset($_POST)) {
            $ThumbSquareSize = 100;
            $BigImageMaxSize = 300;
            $ThumbPrefix = "thumb_";
            $DestinationDirectory = 'assets/uploads/';
            $Quality = 90;
            if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
                die();
            }
            if (!isset($_FILES['ImageFile']) || !is_uploaded_file($_FILES['ImageFile']['tmp_name'])) {
                die('Something wrong with uploaded file, something missing!');
            }
            $RandomNumber = rand(0, 9999999999);
            $ImageName = str_replace(' ', '-', strtolower($_FILES['ImageFile']['name']));
            $ImageSize = $_FILES['ImageFile']['size'];
            $TempSrc = $_FILES['ImageFile']['tmp_name'];
            $ImageType = $_FILES['ImageFile']['type'];
            switch (strtolower($ImageType)) {
                case 'image/png':
                    $CreatedImage = imagecreatefrompng($_FILES['ImageFile']['tmp_name']);
                    break;
                case 'image/gif':
                    $CreatedImage = imagecreatefromgif($_FILES['ImageFile']['tmp_name']);
                    break;
                case 'image/jpeg':
                case 'image/pjpeg':
                    $CreatedImage = imagecreatefromjpeg($_FILES['ImageFile']['tmp_name']);
                    break;
                default:
                    die('Unsupported File!');
            }
            list($CurWidth, $CurHeight) = getimagesize($TempSrc);
            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt = str_replace('.', '', $ImageExt);
            $ImageName = preg_replace("/\\.[^.\\s]{3,4}$/", "", $ImageName);
            $NewImageName = $ImageName . '-' . $RandomNumber . '.' . $ImageExt;
            $thumb_DestRandImageName = $DestinationDirectory . $ThumbPrefix . $NewImageName;
            $DestRandImageName = $DestinationDirectory . $NewImageName;
            if ($this->resizeImage($CurWidth, $CurHeight, $BigImageMaxSize, $DestRandImageName, $CreatedImage, $Quality, $ImageType)) {
                if (!$this->cropImage($CurWidth, $CurHeight, $ThumbSquareSize, $thumb_DestRandImageName, $CreatedImage, $Quality, $ImageType)) {
                    echo 'Error Creating thumbnail';
                }
            }
            else {
                die('Resize Error');
            }
            echo json_encode(array('status'=>$headers['Authorization']));
        }
    }

    function resizeImage($CurWidth,$CurHeight,$MaxSize,$DestFolder,$SrcImage,$Quality,$ImageType) {
        if($CurWidth <= 0 || $CurHeight <= 0) {
            return false;
        }
        $ImageScale      	= min($MaxSize/$CurWidth, $MaxSize/$CurHeight);
        $NewWidth  			= ceil($ImageScale*$CurWidth);
        $NewHeight 			= ceil($ImageScale*$CurHeight);
        $NewCanves 			= imagecreatetruecolor($NewWidth, $NewHeight);
        if(imagecopyresampled($NewCanves, $SrcImage,0, 0, 0, 0, $NewWidth, $NewHeight, $CurWidth, $CurHeight)) {
            switch(strtolower($ImageType)) {
                case 'image/png':
                    imagepng($NewCanves,$DestFolder);
                    break;
                case 'image/gif':
                    imagegif($NewCanves,$DestFolder);
                    break;
                case 'image/jpeg':
                case 'image/pjpeg':
                    imagejpeg($NewCanves,$DestFolder,$Quality);
                    break;
                default:
                    return false;
            }
            if(is_resource($NewCanves)) {imagedestroy($NewCanves);}
            return true;
        }
    }
    function cropImage($CurWidth,$CurHeight,$iSize,$DestFolder,$SrcImage,$Quality,$ImageType) {
        //Check Image size is not 0
        if($CurWidth <= 0 || $CurHeight <= 0) {
            return false;
        }
        //abeautifulsite.net has excellent article about "Cropping an Image to Make Square bit.ly/1gTwXW9
        if($CurWidth>$CurHeight) {
            $y_offset = 0;
            $x_offset = ($CurWidth - $CurHeight) / 2;
            $square_size 	= $CurWidth - ($x_offset * 2);
        }
        else {
            $x_offset = 0;
            $y_offset = ($CurHeight - $CurWidth) / 2;
            $square_size = $CurHeight - ($y_offset * 2);
        }
        $NewCanves 	= imagecreatetruecolor($iSize, $iSize);
        if(imagecopyresampled($NewCanves, $SrcImage,0, 0, $x_offset, $y_offset, $iSize, $iSize, $square_size, $square_size)) {
            switch(strtolower($ImageType)) {
                case 'image/png':
                    imagepng($NewCanves,$DestFolder);
                    break;
                case 'image/gif':
                    imagegif($NewCanves,$DestFolder);
                    break;
                case 'image/jpeg':
                case 'image/pjpeg':
                    imagejpeg($NewCanves,$DestFolder,$Quality);
                    break;
                default:
                    return false;
            }
            //Destroy image, frees memory
            if(is_resource($NewCanves)) {
                imagedestroy($NewCanves);
            }
            return true;
        }

    }
}
