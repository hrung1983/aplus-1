<?php
ini_set('max_execution_time', 300000000);
require("MySQLi-Code/class/mysqli_oop.php");
$db=new database();
$db->connect();
require_once("genqrcode.php");

if (!file_exists("op")) mkdir("op");
function createoutput($tel){
	
	$newqrcode=imagecreatefrompng("img_qrcode/qrcode-".$tel.".png");
	$card=imagecreatefromjpeg("card.jpg");
	$card_width=imagesx($card);
	$card_height=imagesy($card);
	$qr_width=imagesx($newqrcode);
	$qr_height=imagesx($newqrcode);
	
	$width=$card_width;
	$height=$card_height;
	if (!file_exists("op")) mkdir("op");
	$im=imagecreatetruecolor($width,$height);
	imagecopyresized($im, $card, 0, 0, 0, 0,$width,$height, $card_width, $card_height);
	imagecopyresized($im, $newqrcode, 45, 38, 0, 0,(381-46),(373-40), $qr_width, $qr_height);
	imagepng($im, 'op/'.$tel.'.png');
}
$sms = 1;
$sql="select id,tel from tbl_employee where sms = $sms";
$db->sql($sql);
$i=0;

$res = $db->getResult();	
foreach($res as $data){
	$id = $data["id"];
	$tel1 = substr($data["tel"],1,2);
	$tel3 = substr($data["tel"],7,9);
	$new_qr_code = $tel1.$tel3.rand(10,99);
	
	gentqrcode($new_qr_code);
	createoutput($new_qr_code);
	$db->update('tbl_employee',array('qrcode'=>$new_qr_code),'id='.$id);	

}
?>