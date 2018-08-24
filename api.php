<?php
require_once('genqrcode.php');
    $host="localhost";
    $username="root"; 
    $password=""; 
    $database="";
    mysql_connect($host, $username, $password) or die("Connection fail");
    mysql_select_db("$database");
    mysql_query("SET CHARACTER SET UTF8");
$result = $_REQUEST["result"];

/*
if($result!=""){
    $response = array();
    $strSQL = "  ";
 ////echo ">>".$strSQL;
    $resultSQL = mysql_query($strSQL);
    $numRow = mysql_num_rows($resultSQL);
    if ($numRow == 0) {
        $strAddUser = " INSERT INTO tbl_qrcoderegister (qrcode) VALUES ('$result') ";
        $resultAddUser = mysql_query($strAddUser);
        if ($resultAddUser) {
            $response['status'] = 1;
            $response['message'] = 'Complete';
        }
    } else {
        $response['status'] = 0;
        $response['message'] = 'Duplicate';
    }
    gentqrcode($result);
    
    echo json_encode($response);
}else{
    echo "<h1>Results</h1><br>";

}
*/
?>