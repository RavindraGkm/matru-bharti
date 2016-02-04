<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File_controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('WideImageLib');
    }
    public function index() {
        $DestinationDirectory = 'assets/uploads/authors-images/';
        if (!isset($_FILES['ebook_file']) || !is_uploaded_file($_FILES['ebook_file']['tmp_name'])) {
            die('Something wrong with uploaded file, something missing!');
        }
        $TempSrc = $_FILES['ebook_file']['tmp_name'];
        list($originalWidth, $originalHeight) = getimagesize($TempSrc);
        $author_id = $this->input->post('author_id');
        WideImage::load($TempSrc)->resize($originalWidth, $originalHeight)->saveToFile($DestinationDirectory.'author-'.$author_id.'.docx');
        echo json_encode(array('author_id',$this->input->post('author_id')));
    }

    public function image($one,$two=-1) {
        if($two==-1) {
            $DestinationDirectory = 'assets/uploads/authors-images/';
            $image_name = $DestinationDirectory.'author-'.$one.'.jpg';
            WideImage::load($image_name)->output('jpg',90);
        }
        else {
            $array = explode("_",$one);
            $DestinationDirectory = 'assets/uploads/authors-images/';
            $image_name = $DestinationDirectory.'author-'.$two.'.jpg';
            list($originalWidth, $originalHeight) = getimagesize($image_name);
            $newWidth = $array[1];
            $newHeight = ($originalHeight  / $originalWidth) * $newWidth;
            WideImage::load($image_name)->resize($newWidth, $newHeight)->output('jpg',90);
        }
    }

}
