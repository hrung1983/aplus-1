<?php
//    header("content-type:text/javascript;charset=utf-8"); 
//    require_once dirname(__FILE__) . "/db/db.php";
    $txtusername = $_REQUEST["txtusername"];
    $txtpassword = $_REQUEST["txtpassword"];
$response = array(); 
      $sql = "SELECT
        tbl_user.id,
        tbl_user.fname,
        tbl_user.sname,
        tbl_user.username,
        tbl_user.`password`  
        FROM
        tbl_user
        Where tbl_user.username = '$txtusername'  
        And tbl_user.`password` = '$txtpassword'
        And tbl_user.status_active = 'y'";
/*  $result=$db->sql_query($sql);
  
$response['status'] = 'NoData';
while($data=$db->sql_fetchrow($result)){
    if($data["id"]!=""){
        $response['id'] =$data["id"];
        $response['fname'] = $data["fname"];
        $response['sname'] = $data["sname"];
        $response['username'] = $data["username"];
        $response['status'] = 'complete';
    }       
}
*/

include('class/mysqli_oop.php');
$db = new Database();
$db->connect();
$db->sql($sql);
$res = $db->getResult();
$response['status'] = 'NoData';
foreach($res as $output){
	    $response['id'] =$output["id"];
        $response['fname'] = $output["fname"];
        $response['sname'] = $output["sname"];
        $response['username'] = $output["username"];
        $response['status'] = 'complete';
}

print_r(str_replace("\/","/",json_encode($response)));

?>