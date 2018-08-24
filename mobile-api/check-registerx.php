<?php
header("content-type:text/javascript;charset=utf-8"); 
require_once dirname(__FILE__) . "/db/db.php";
$txtresult = $_REQUEST["result"];
$sql = "SELECT
            tbl_employee.id,
            tbl_employee.firstname,
            tbl_employee.fname,
            tbl_employee.sname,
            tbl_employee.tel,
            tbl_employee.qrcode,
            tbl_employee.register_status,
            tbl_employee.register_dte_tme,
            tbl_employee.register_by,
            tbl_employee.register_by_user
        FROM
            tbl_employee
        Where tbl_employee.qrcode = '$txtresult'
        And tbl_employee.register_status = 'n'";
 $result=$db->sql_query($sql);
 $response = array();
 $response['status'] = "no";
 $response['tel'] = $txtresult;

 while($data=$db->sql_fetchrow($result)){
    $today = getdate();
    $dte = $today["year"] ."-".$today["mon"]."-".$today["mday"]." ".($today["hours"]-1).":".$today["minutes"].":".$today["seconds"];            
        $val = "register_status='y',register_by='Mobile App',register_by_user=''";
        $where = " qrcode = '$txtresult'";
        $xx = $db->sql_update("tbl_employee",$val,$where,false);                    
            $response['status'] = "yes";
            $response['fname'] =$data["fname"];
            $response['sname'] = $data["sname"];
            $response['tel'] = $data["tel"];
            $response['register_status'] = 'Mobile App';
            $response['register_dte_tme'] = $dte;
            $response['register_by'] = $data["register_by"];
    //        $response['register_by_user'] = '';       
 }
 print_r(str_replace("\/","/",json_encode($response)));
?>