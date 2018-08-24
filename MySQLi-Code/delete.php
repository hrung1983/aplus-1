<?php
include('class/mysqli_oop.php');
$db = new Database();
$db->connect();
$db->delete('tbshow','id=12');  // Table name, WHERE conditions
$res = $db->getResult();  
foreach($res as $output){
	echo $res[0];
}

//print_r($res);
// exectued correctly = 1
// did not execute correctly = 0
// error T
