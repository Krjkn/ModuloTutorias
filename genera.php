<?php
	$captcha_string = $_GET["captcha_string"];
    header("Content-type: image/png");
	$image = imagecreatetruecolor(200, 50);
	imageantialias($image, true);
	$colors = [];
	$red = rand(125, 175);
	$green = rand(125, 175);
	$blue = rand(125, 175);
	for($i = 0; $i < 5; $i++) {
		$colors[] = imagecolorallocate($image, $red - 20*$i, $green - 20*$i, $blue - 20*$i);
	}
	imagefill($image, 0, 0, $colors[0]);
	for($i = 0; $i < 10; $i++) {
		imagesetthickness($image, rand(2, 10));
		$rect_color = $colors[rand(1, 4)];
		imagerectangle($image, rand(-10, 190), rand(-10, 10), rand(-10, 190), rand(40, 60), $rect_color);
	}
	$black = imagecolorallocate($image, 0, 0, 0);
	$white = imagecolorallocate($image, 255, 215, 255);
	$textcolors = [$black, $white];
	$fonts = ['calligra.ttf','Montserrat-Bold.ttf','VeraBI.ttf','VeraBI.ttf'];
	$string_length = 6;
	$letter_space = 170/$string_length;
	$initial = 15;
	for($i = 0; $i < $string_length; $i++) {
		imagettftext($image, 20,rand(-15, 15), $initial + $i*$letter_space, rand(20, 40), $textcolors[rand(0, 1)],$fonts[array_rand($fonts)],$captcha_string[$i]);
	}
	//rand(-15, 15)
	//$fonts[array_rand($fonts)]   $captcha_string[$i]
	imagepng($image);
	imagedestroy($image);
?>