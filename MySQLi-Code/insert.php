<?php
include('class/mysqli_oop.php');
$db = new Database();
$db->connect();
$data = $db->escapeString("name5@email.com"); // Escape 
$db->insert('tbshow',array('name'=>'D','lname'=>'DD'));  // Table name, column names => values
$res = $db->getResult();  
foreach($res as $output){
	echo $res[0];
}

//print_r($res);
// exectued correctly = id
// did not execute correctly = 0
// error T
