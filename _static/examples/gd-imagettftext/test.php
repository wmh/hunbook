<?php
//ini_set('memory_limit', '100M');

// http://www.johnciacia.com/2010/01/04/using-php-and-gd-to-add-border-to-text/
function imagettfstroketext(&$image, $size, $angle, $x, $y, &$textcolor, &$strokecolor, $fontfile, $text, $px) {
    for($c1 = ($x-abs($px)); $c1 <= ($x+abs($px)); $c1++)
        for($c2 = ($y-abs($px)); $c2 <= ($y+abs($px)); $c2++)
            $bg = imagettftext($image, $size, $angle, $c1, $c2, $strokecolor, $fontfile, $text);
   return imagettftext($image, $size, $angle, $x, $y, $textcolor, $fontfile, $text);
}

//get tektips logo
$im = imagecreatefromjpeg('000.jpg');

//get the image size
$w = imagesx($im);
$h = imagesy($im);

//now create the text on a new canvas (i've used identical sized canvases but in practice you probably will not want to do so)
//$text = imagecreatetruecolor($w, $h);
//imagealphablending($text, true);

// place some text (top, left)
// array imagettftext ( resource $image , float $size , float $angle , int $x , int $y , int $color , string $fontfile , string $text )
//imagettftext($im, 60, 0, 300, 100, 0xFFFFFF, 'wqy-microhei.ttc', '简体繁體'); // 001
//imagettftext($im, 60, 10, 300, 130, 0xFFFFFF, 'wqy-microhei.ttc', '简体繁體'); // 002
$font_color = imagecolorallocate($im, 255, 255, 255);
$stroke_color = imagecolorallocate($im, 0, 0, 0);
imagettfstroketext($im, 60, 10, 300, 130, $font_color, $stroke_color, "wqy-microhei.ttc", "简体繁體", 2);

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
