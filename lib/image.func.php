<?php
	require_once 'string.func.php';
	
	function verifyImage($type=1,$lenght=4,$pixel=20,$line=2,$sess_name='verify'){
		session_start();
		$width = 100;
		$height = 40;
		$image = imagecreatetruecolor($width, $height);
		$white = imagecolorallocate($image, 255, 255, 255);
		$black = imagecolorallocate($image, 0, 0, 0);

		//用矩形填充画布
		imagefilledrectangle($image, 1, 1, $width-2, $height-2, $white);
		$chars = buildRandomString($type,$lenght);
		$sess_name = 'verify';
		$_SESSION[$sess_name] = $chars;
		$fontfiles = array('msyh.ttc','msyhbd.ttc','simsun.ttc','SIMYOU.TTF');
		for($i=0;$i<$lenght;$i++){
			$size = mt_rand(18,20);
			$angle=mt_rand(-15,15);
			$x=15+$i*$size;
			$y=mt_rand(25,31);
			$fontfile=ROOT.'/fonts/'.$fontfiles[mt_rand(0,count($fontfiles)-1)];
			$color= imagecolorallocate($image, mt_rand(50,90), mt_rand(80,100), mt_rand(90,100));
			$text = substr($chars, $i , 1);
			imagettftext($image, $size, $angle, $x, $y, $color, $fontfile, $text);
		}
		for($i=0;$i<$pixel;$i++){
			imagesetpixel($image, mt_rand(0,$width-1), mt_rand(0,$height-1), $black);
		}
		
		for($i=1;$i<$line;$i++){
			$color= imagecolorallocate($image, mt_rand(50,90), mt_rand(80,100), mt_rand(90,100));
			imageline($image, mt_rand(0,$width-1), mt_rand(0,$height-1),  mt_rand(0,$width-1), mt_rand(0,$height-1), $color);
		}
		ob_clean();
		header('content-type:image/gif');
		imagegif($image);
		imagedestroy($image);
	}
	

	
?>