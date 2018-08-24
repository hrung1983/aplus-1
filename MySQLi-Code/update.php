<?php
include('class/mysqli_oop.php');
$db = new Database();
$db->connect();
$db->update('tbshow',array('name'=>"Name 4",'lname'=>"name4@email.com"),'id="5"'); // Table name, column names and values, WHERE conditions
$res = $db->getResult();
foreach($res as $output){
	echo $res[0];
}

//print_r($res);
// exectued correctly = 1
// did not execute correctly = 0
// error T