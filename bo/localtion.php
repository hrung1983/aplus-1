<?php
    header("content-type: text/html; charset=utf-8");
    header ("Expires: Wed, 21 Aug 2013 13:13:13 GMT");
    header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");

include('class/mysqli_oop.php');
$db = new Database();
$db->connect();



    $data = $_REQUEST['data'];
    $val = $_REQUEST['val'];


    if ($data=='position_dep') {
         echo "<select name='position_dep' >";
         echo "<option value='0'>- Select -</option>\n";
         $sql="SELECT id,position_dep FROM tbl_department Where id = $data And active_status = 'y'";
    $db->sql($sql);
    $result = $db->getResult();
	foreach($result as $data){
              echo "<option value='$data[id]' >$data[position_dep]</option>" ;
         }
    }
    echo "</select>\n";
    echo mysql_error();

?>
