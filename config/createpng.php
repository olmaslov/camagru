<?php
$img="../private/photo/1.png";

$wm=imagecreatefrompng('../public/img/masks/unit-logo-white.png');

$wmW=imagesx($wm);

$wmH=imagesy($wm);

$image=imagecreatetruecolor($wmW, $wmH);

if(preg_match("/.gif/i",$img)):
    $image=imagecreatefromgif($img);
elseif(preg_match("/.jpeg/i",$img) or preg_match("/.jpg/i",$img)):
    $image=imagecreatefromjpeg($img);
elseif(preg_match("/.png/i",$img)):
    $image=imagecreatefrompng($img);
else:
    die("Error! Unknown file format!");
endif;
$size=getimagesize($img);

$cx=$size[0]-$wmW-10;
$cy=$size[1]-$wmH-10;

imagecopyresampled($image, $wm, $cx, $cy, 0, 0, $wmW, $wmH, $wmW, $wmH);

//header('Content-Type: image/jpeg');

ob_start();

imagejpeg($image, NULL,100);

$imagedata = ob_get_contents();
ob_end_clean();

print base64_encode($imagedata);
//print '<p><img src="data:image/png;base64,'.base64_encode($imagedata).'" alt="image 1" width="96" height="48"/></p>';

imagedestroy($image);

imagedestroy($wm);

unset($image,$img);
?>