<?php
namespace phpqrcode;
require('phpqrcode.php');
class qrtest{
	public function msg_qrcode($url='http://www.lxxxjs.cn/index.php/Home/Meswall/index/wecha_id/gh_4211a0061fd5',$level=3,$size=4){
	   $errorCorrectionLevel =intval($level) ;//容错级别 
	   $matrixPointSize = intval($size);//生成图片大小 
	   //生成二维码图片 
	   //echo $_SERVER['REQUEST_URI'];
	   $object = new \QRcode();
	   $object->png($url, false, $errorCorrectionLevel, $matrixPointSize, 2);   
	 
	}
}

