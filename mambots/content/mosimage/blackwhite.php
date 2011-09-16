<?php
function getExtension($filename) {
     $path_info = pathinfo($filename);
     return $path_info['extension'];
   }

function show_grayscale($filename,$r){
  $ras = $r;  
  $img_size = GetImageSize($filename);
  $width = $img_size[0];
  $height = $img_size[1];
  $img = imageCreate($width,$height);
  for ($c = 0; $c < 256; $c++) {
    ImageColorAllocate($img, $c,$c,$c);
  }
  
  if(($ras == 'jpeg')or($ras == 'jpg'))
  {$img2 = ImageCreateFromJpeg($filename);
  ImageCopyMerge($img,$img2,0,0,0,0, $width, $height, 100);
  //Отдаем полученное изображение браузеру
  header("Content-type: image/jpeg");
  imagejpeg($img);}
  
  if($ras == 'png')
  {$img2 = ImageCreateFromPng($filename);
  ImageCopyMerge($img,$img2,0,0,0,0, $width, $height, 100);
  //Отдаем полученное изображение браузеру
  header("Content-type: image/png");
  imagepng($img);}
  
  if($ras == 'gif')
  {$img2 = ImageCreateFromGif($filename);
  ImageCopyMerge($img,$img2,0,0,0,0, $width, $height, 100);
  //Отдаем полученное изображение браузеру
  header("Content-type: image/gif");
  imagegif($img);}
  
  imagedestroy($img);
}
$imm = $_GET['imm'];
$ras = getExtension($imm);

$itt = show_grayscale($imm,$ras);
?>