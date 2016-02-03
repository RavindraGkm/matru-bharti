<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image_controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('WideImageLib');
    }
    public function index() {
        $DestinationDirectory = 'assets/uploads/authors-images/';
        if (!isset($_FILES['ImageFile']) || !is_uploaded_file($_FILES['ImageFile']['tmp_name'])) {
            die('Something wrong with uploaded file, something missing!');
        }
        $ImageName = str_replace(' ', '-', strtolower($_FILES['ImageFile']['name']));
        $TempSrc = $_FILES['ImageFile']['tmp_name'];
        list($originalWidth, $originalHeight) = getimagesize($TempSrc);
        $author_id = $this->input->post('author_id');
        WideImage::load($TempSrc)->resize($originalWidth, $originalHeight)->saveToFile($DestinationDirectory.'author-'.$author_id.'.jpg');
        echo json_encode(array('author_id',$this->input->post('author_id')));
    }

    public function image() {
        $DestinationDirectory = 'assets/uploads/authors-images/';
        list($originalWidth, $originalHeight) = getimagesize($DestinationDirectory.'author-3.jpg');
        $ratio = $originalWidth / $originalHeight;
        $newWidth = 400;
        $newHeight = ($originalHeight  / $originalWidth) * $newWidth;
        WideImage::load($DestinationDirectory.'author-3.jpg')->resize($newWidth, $newHeight)->output('jpg',90);
    }

}
