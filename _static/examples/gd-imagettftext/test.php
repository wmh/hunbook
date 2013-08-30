<?php
//ini_set('memory_limit', '100M');

//get tektips logo
$im = imagecreatefromjpeg('000.jpg');

//get the image size
$w = imagesx($im);
$h = imagesy($im);

//now create the text on a new canvas (i've used identical sized canvases but in practice you probably will not want to do so)
//$text = imagecreatetruecolor($w, $h);
//imagealphablending($text, true);

// 001
//place some text (top, left)
//imagettftext($im, 60, 0, 100, 100, 0xFFFFFF, 'wqy-microhei.ttc', '简体繁體');
//imagettftext($im, 60, 0, 100, 100, 0xFFFFFF, 'wqy-microhei.ttc', '简体繁體');
imagefttext($im, 60, 30, 100, 100, 0xFFFFFF, 'wqy-microhei.ttc', '简体繁體', ['linespacing' => 100]);

// merge the two canvas
//set opacity to 50%
//imagecopymerge($im, $text, 0, 0, 0, 0, $w, $h, 70);

/*
// output the image
header('Content-Type: image/png');
imagepng($im);
imagedestroy ($text);
imagedestroy($im);
*/

imageJpeg($im, "003.jpg", 85);
echo "done";

?>
