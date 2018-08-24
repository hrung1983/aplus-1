<?php
include('class/mysqli_oop.php');
$db = new Database();
$db->connect();
$db->sql('SELECT * FROM tbshow');
$res = $db->getResult();
foreach($res as $output){
	echo $output["name"]."<br />";
}
