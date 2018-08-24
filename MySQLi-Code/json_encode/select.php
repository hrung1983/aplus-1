<?php
header('content-type: application/json; charset=utf-8');
include('../class/mysqli_oop.php');
$db = new Database();
$db->connect();
$db->jsonSelect('SELECT * FROM tbshow'); // SQL
$res = $db->getResult();

echo json_encode($res);