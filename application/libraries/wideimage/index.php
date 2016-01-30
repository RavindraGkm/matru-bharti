<?php

include_once 'WideImage.php';
list($originalWidth, $originalHeight) = getimagesize('bg_1.jpg');
$ratio = $originalWidth / $originalHeight;
$newWidth = 259;
$newHeight = ($originalHeight  / $originalWidth) * $newWidth;
echo round($newHeight);
WideImage::load('bg_1.jpg')->resize($newWidth, $newHeight)->saveToFile('small.jpg');