<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('WideImageLib');
    }

    public function ebook_file() {
        $DestinationDirectory = 'assets/uploads/ebooks/ebook-files/';
        $config['upload_path']          = $DestinationDirectory;
        $config['allowed_types']        = 'pdf';
//        $config['allowed_types']        = 'docx|pdf';
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('ebook_file')) {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode($error);
        }
        else {
            echo json_encode(array('status'=>'success'));
        }
    }

    public function ebook_cover_page() {
        $DestinationDirectory = 'assets/uploads/ebooks/ebook-cover-page/';
        $config['upload_path']          = $DestinationDirectory;
        $config['allowed_types']        = 'jpeg|png|jpg|gif';
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('ebook_cover')) {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode($error);
        }
        else {
            echo json_encode(array('status'=>'success'));
        }
    }

    public function event_cover_page() {
        $DestinationDirectory = 'assets/uploads/event-img/';
        $config['upload_path']          = $DestinationDirectory;
        $config['allowed_types']        = 'jpeg|png|jpg|gif';
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('event_cover')) {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode($error);
        }
        else {
            echo json_encode(array('status'=>'success'));
        }
    }

//    public function ebook_cover_page() {
//        $DestinationDirectory = 'assets/uploads/ebooks/ebook-cover-page';
//        if (!isset($_FILES['ebook_cover']) || !is_uploaded_file($_FILES['ebook_cover']['tmp_name'])) {
//            die('Something wrong with uploaded file, something missing!');
//        }
//        $ImageName = str_replace(' ', '-', strtolower($_FILES['ebook_cover']['name']));
//        $TempSrc = $_FILES['ebook_cover']['tmp_name'];
//        list($originalWidth, $originalHeight) = getimagesize($TempSrc);
//        $author_id = $this->input->post('author_id');
//        WideImage::load($TempSrc)->resize($originalWidth, $originalHeight)->saveToFile($DestinationDirectory.'author-'.$author_id.'.jpg');
//        echo json_encode(array('author_id',$this->input->post('author_id')));
//    }

//    public function image($one,$two=-1) {
//        if($two==-1) {
//            $DestinationDirectory = 'assets/uploads/authors-images/';
//            $image_name = $DestinationDirectory.'author-'.$one.'.jpg';
//            WideImage::load($image_name)->output('jpg',90);
//        }
//        else {
//            $array = explode("_",$one);
//            $DestinationDirectory = 'assets/uploads/authors-images/';
//            $image_name = $DestinationDirectory.'author-'.$two.'.jpg';
//            list($originalWidth, $originalHeight) = getimagesize($image_name);
//            $newWidth = $array[1];
//            $newHeight = ($originalHeight  / $originalWidth) * $newWidth;
//            WideImage::load($image_name)->resize($newWidth, $newHeight)->output('jpg',90);
//        }
//    }

}
