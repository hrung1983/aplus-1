<?php 

require_once('qrlib.php');
//gentqrcode($_REQUEST["tel"]);

function gentqrcode($data_name){
   // $name_file = str_replace("http:////","",$data_name);
   // $name_file = $data_name;
$count = 1;
$name_file  = str_replace("http://", "https://", $data_name, $count);

    $tempDir = "img_qrcode/qrcode-";
    $codeContents = $name_file;
    $fileName = $codeContents.".png";
    $pngAbsoluteFilePath = addslashes($tempDir.$fileName);
    QRcode::png(addslashes($codeContents), $pngAbsoluteFilePath); 
}
?>