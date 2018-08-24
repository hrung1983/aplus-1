<?php
session_start(); 
require_once("function.php"); 
include('class/mysqli_oop.php');
$db = new Database();
$db->connect();
$username=$_REQUEST["txtusername"];
$password=$_REQUEST["txtpassword"];
$link = @$_REQUEST["link"];
 	$sqlcmd = "SELECT
                    tbl_user.id,
                    tbl_user.fname,
                    tbl_user.sname,
                    tbl_user.username,
                    tbl_user.`password`,
                    tbl_user.tel,
                    tbl_user.status_active,
                    tbl_user.status_position
                    FROM
                    tbl_user
				WHERE tbl_user.username='$username' and tbl_user.`password`='$password' and tbl_user.status_active = 'y'";

$db->sql($sqlcmd);
$res = $db->getResult();
$row = $db->numRows();
if($row==0){
	echo Message(35,"red",$titel1,$msg1,"<a href='login.php?link=login'> $login </a>");
	exit;
} else {
	foreach($res as $output){
				$_SESSION["Uid"] = $output["id"];        
				$_SESSION["Uname"] = $output["fname"];
				$_SESSION["Usname"] = $output["sname"];
				$_SESSION["Uposition"] = $output["status_position"];	
			  if($link != ""){
				 header("Location:$link.php"); 
			  } else {
				 header("Location:index.php"); 
			 }
	}	
}
?>